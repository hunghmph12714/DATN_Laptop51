<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResendVerifyRequest;
use App\Http\Requests\VerifyRequest;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;

class AuthController extends Controller
{   

    protected function register(){

        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('auth.register');
    }
    protected function create(RegisterRequest $request)
    {
        $pool = '0123456789';
        $code_verify = substr(str_shuffle(str_repeat($pool, 2)), 0, 6);
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['password'] = $request->password;
        $phoneSend['phone'] = '+84' . $request->phone;
        /* Get credentials from .env */
        // $token = getenv("TWILIO_AUTH_TOKEN");
        // $twilio_sid = getenv("TWILIO_SID");
        // $twilio_number = getenv("TWILIO_NUMBER");
        // $twilio = new Client($twilio_sid, $token);
        // $twilio->verify->v2->services($twilio_verify_sid)
        //     ->verifications
        //     ->create($phoneSend['phone'], "sms");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_number = getenv("TWILIO_NUMBER");
        $twilio = new Client($twilio_sid, $token);
        $twilio->messages->create(
            $phoneSend['phone'],
            array(
                'from' => $twilio_number,
                'body' => 'Ma xac minh cua ban la: '. $code_verify,
            )
            );
            // Tạo mã xác minh
        DB::table('code_verify')->insert([
                'code_verify' => $code_verify,
                'phone_number' => $request->phone,
                'status' => 0,
                'time_request' => 0,
                'created_at' => Carbon::now(),
            ]);

            // Tạo tài khoản người dùng
        $user = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'id_role' => 0,
        ]);
        auth()->login($user);
        session()->put('phone_verify', $request->phone);
        Toastr::success('Gửi mã xác minh thành công', 'Thành công');
        return redirect()->route('verify');
    }

    protected function resendVerify(ResendVerifyRequest $request)
    {   
        session()->put('phone_verify', $request->phone);
        $pool = '0123456789';
        $code_verify = substr(str_shuffle(str_repeat($pool, 2)), 0, 6);
        $phoneSend['phone'] = '+84' . $request->phone;
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_number = getenv("TWILIO_NUMBER");
        $twilio = new Client($twilio_sid, $token);
        $twilio->messages->create(
            $phoneSend['phone'],
            array(
                'from' => $twilio_number,
                'body' => 'Ma xac minh cua ban la: '. $code_verify,
            )
            );
            // Tạo mã xác minh
        DB::table('code_verify')->insert([
                'code_verify' => $code_verify,
                'phone_number' => $request->phone,
                'status' => 0,
                'time_request' => 0,
                'created_at' => Carbon::now(),
            ]);

        Toastr::success('Gửi mã xác minh thành công', 'Thành công');
        return back();
    }

    protected function showVerify()
    {   

        if(Auth::check()){
            if(Auth::user()->isVerified == true){
                return redirect()->route('home');
            }
            return view('auth.verify'); 
        }
        return redirect()->route('home');
    }
    protected function verify(VerifyRequest $request)
    {      
        $code_verify = DB::table('code_verify')->where('phone_number',$request->phone)->orderBy('created_at','DESC')->first();
        $phoneSend['phone'] = '+84' . $request->phone;
        if ($request->verification_code == $code_verify->code_verify && $request->phone == $code_verify->phone_number && $code_verify->status == 0) {
            $user = tap(User::where('phone', $request->phone))
            ->update([
                'isVerified' => true,
            ]);
            $update_code_verify = DB::table('code_verify')
            ->where('phone_number', $request->phone)
            ->orderBy('created_at','DESC')
            ->limit(1)
            ->update(['status' => 1]);
            /* Authenticate user */
            Auth::login($user->first());
            
            if (Session::has('url_path') != null) {
                $url_path = session()->get('url_path');
                session()->forget('phone_verify');
                Toastr::success('Xác minh số điện thoại thành công', 'Thành công');
                return redirect($url_path);
            }
            session()->forget('phone_verify');
            Toastr::success('Xác minh số điện thoại thành công', 'Thành công');
            return redirect()->route('home');
        }
        elseif($request->phone == $code_verify->phone_number){
            $actual_end_at = Carbon::parse(Carbon::now());
            $actual_start_at   = Carbon::parse($code_verify->created_at);
            $mins = $actual_end_at->diffInMinutes($actual_start_at, true);
            if($code_verify->time_request >= 10 || $mins >= 10 || $code_verify->status == 1){
                $update_code_verify = DB::table('code_verify')
                ->where('phone_number', $request->phone)
                ->orderBy('created_at','DESC')
                ->limit(1)
                ->update(['status' => 1]);
                Toastr::error('Mã xác minh đã quá hạn, vui lòng gửi lại mã', 'Thất bại');
                return back()->with(['phone' => $request->phone]); 
            }
            $update_code_verify = DB::table('code_verify')
              ->where('phone_number', $request->phone)
              ->orderBy('created_at','DESC')
              ->limit(1)
              ->update(['time_request' => $code_verify->time_request + 1]);
            Toastr::error('Mã xác minh không đúng', 'Thất bại');
            return back()->with(['phone' => $request->phone]);
        }
        Toastr::error('Mã xác minh không đúng', 'Thất bại');
        return back()->with(['phone' => $request->phone]);
    }
}