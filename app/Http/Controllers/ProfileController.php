<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Bill;
use App\Models\BookingDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return view('auth.login')->with('message', 'Bạn phải đăng nhập để vào trang này');
        }
    }

    public function index()
    {
        $id = Auth::id();
        $user = User::find($id);
        // dd($user);
        $bill = DB::table('bill_users')
            ->join('bills', 'bill_users.bill_code', 'bills.code')
            ->join('bill_details', 'bills.code', 'bill_details.bill_code')
            ->join('products', 'bill_details.product_id', 'products.id')
            ->select('bill_users.address', 'bills.id', 'bills.total', 'bills.payment_status', 'bill_details.qty', 'bill_details.price', 'bill_details.bill_code', 'bill_details.created_at', 'products.name')
            ->where('bills.user_id', '=', auth()->user()->id)
            ->groupBy('bills.total')
            ->get();

        if (!empty(auth()->user())) {
            $repair = DB::table('bookings')
                ->join('booking_details', 'bookings.id', 'booking_details.booking_id')
                ->join('repair_parts', 'booking_details.id', 'repair_parts.booking_detail_id')
                ->select('repair_parts.into_money','bookings.created_at','booking_details.status_booking','booking_details.code')
                ->where('bookings.phone', '=', auth()->user()->phone)
                ->get();

            return view('website.profile', compact('user', 'bill', 'repair'))->with('message', 'Đăng nhập thành công');
        }

        return view('website.profile', compact('user', 'bill'))->with('message', 'Đăng nhập thành công');
    }

    public function cancelOrder(Request $request, $code)
    {
        $data = Bill::where('code', $code)->first();
        $data['payment_status'] = 0;
        // dd($data);
        $data->save();
        return redirect()->back();
    }

    public function restoreOrder(Request $request, $code)
    {
        $data = Bill::where('code', $code)->first();
        if ($data['payment_status'] == 0) {
            $data['payment_status'] = 1;
            $data->save();
        }

        return redirect()->back();
    }

    public function cancelRepair(Request $request, $code)
    {
        $data = BookingDetail::where('code', $code)->first();
        $data['status_booking'] = 'cancel';
        // dd($data);
        $data->save();
        return redirect()->back();
    }

    public function restoreRepair(Request $request, $code)
    {
        $data = BookingDetail::where('code', $code)->first();
        if ($data['payment_status'] == 0) {
            $data['payment_status'] = 1;
            $data->save();
        }

        return redirect()->back();
    }

    public function changeImage(Request $request)
    {

        $id = Auth::id();
        $user = User::find($id);
        if ($request->hasFile('avatar')) {
            // $oldImg = str_replace('storage/', 'public/', $model->avatar);
            $imgu = new User;
            $request->validate(
                [
                    'avatar' => 'mimes:jpg,png,jpeg',
                ],
                [
                    'avatar.mimes' => 'Sai định dạng ảnh',
                ]
            );
            Storage::delete($user->avatar);
            $imgu = $request->file('avatar')->store('products');
            $imgu = str_replace('public/', 'storage', $imgu);
            $user->avatar = $imgu;
            $user->save();
            return Redirect::back()->with('message', 'Thay đổi ảnh thành công');
        }

        // dd($user);
        return Redirect::back()->with('message', 'Thay đổi ảnh thành công');
    }

    public function changeInfo(ProfileRequest $reque)
    {
        // $reque->validate([
        //     'name' => 'required',
        //     'email' => 'required||email||regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
        //     // 'interval' => 'required',
        //     // 'repair_type' => 'required'
        //  ]);
        $id = Auth::id();
        $user = User::find($id);
        if (!$user) {
            return back();
        }
        $user->fill($reque->all());
        $user->save();
        return Redirect::back()->with('message', 'Thay đổi thông tin thành công');
    }


    public function changePassword(Request $request)
    {
        $user = Auth::user();

        $userPassword = $user->password;

        $request->validate(
            [
                'current_password' => 'required',
                'password' => 'required|same:confirm_password|min:6',
                'confirm_password' => 'required',
            ],
            [
                'current_password.required' => 'Nhập mật khẩu cũ',
                'password.required' => 'Nhập mật khẩu mới',
                'password.min' => 'Yêu cầu nhập tối thiểu 6 ký tự',
                'password.same' => 'Mật khẩu không trùng',
                'confirm_password.required' => 'Xác nhận mật khẩu mới',

            ]
        );

        if (!Hash::check($request->current_password, $userPassword)) {
            return Redirect::back()->with('current_password', 'Sai mật khẩu');
            // dd($user);
        }

        $user->password = Hash::make($request->password);
        $user->save();
        return Redirect::back()->with('message', 'Thay đổi mật khẩu thành công');
    }

    public function history()
    {
        dd(1);
        $bill = DB::table('bills')
            ->join('bill_details', 'bills.code', 'bill_details.bill_code')
            ->join('products', 'bill_details.product_id', 'products.id')
            ->select('bills.total', 'bill_details.qty', 'bill_details.price', 'bill_details.bill_code', 'bill_details.created_at', 'products.name')
            ->where('bills.user_id', '=', auth()->user()->id)
            ->groupBy('bills.total')
            ->get();
        return view('website.profile', compact('bill'));
    }

    public function historyDetail(Request $request, $code)
    {
        $user = User::find(auth()->user()->id);
        $bill = DB::table('bills')
            ->join('bill_details', 'bills.code', 'bill_details.bill_code')
            ->join('products', 'bill_details.product_id', 'products.id')
            ->select('bills.total', 'bill_details.qty', 'bill_details.bill_code', 'bill_details.price', 'bill_details.created_at', 'products.name', 'products.image')
            ->where('bills.user_id', '=', auth()->user()->id)
            ->where('bill_details.bill_code', '=', $code)
            // ->groupBy('bill_details.bill_code')
            ->get();
        return view('website.history-detail', compact('bill', 'code', 'user'));
    }
}
