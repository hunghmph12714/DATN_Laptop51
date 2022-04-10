<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User_FormRequest;



class UserController extends Controller
{
    public function index(){
        $users = User::all();
        $users->load('role');
        return view('admin.users.index',compact('users'));
    }
    public function addForm(){
        $roles = Role::all();
        return view('admin.users.add', compact('roles'));
    }
    public function saveAdd(User_FormRequest $request){
        // dd($request);
        $model = new User();
        
        if($request->hasFile('avatar')){
            $model->avatar = $request->file('avatar')->storeAs('user', uniqid() . '-' . $request->avatar->getClientOriginalName());
        }
        
        $model->fill($request->all());
        $model->password = Hash::make($request->password);
        $model->save();
        return redirect(route('user.index'));
    }
    public function remove($id)
    {
        $model=User::find($id);
       
        if(!empty($model->avatar)){
            $imgPath = str_replace('storage/', 'public/', $model->avatar);
            Storage::delete($imgPath);
        }
        $model->delete(); 
        return redirect(route('user.index'));
    }
    public function editForm($id)
    {   $roles = Role::all();
        $user = User::find($id);
        // $users = User::all();
        if (!$user) {
            return back();
        }
        
        return view(
            'admin.users.edit',
            compact('user','roles')
        );
    }
    public function saveEdit(Request $request,$id)
    {   
        $model = User::find($id);

        if (!$model) {
            return back();
        }
        
        if($request->hasFile('avatar')){
            // $oldImg = str_replace('storage/', 'public/', $model->avatar);
            Storage::delete($model->avatar);

            $imgPath = $request->file('avatar')->store('user');
            $imgPath = str_replace('public/', 'storage', $imgPath);
            $model->avatar = $imgPath;
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('user.index'));
    }
}