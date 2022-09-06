<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('admin.login',['title'=>"
            ĐĂNG NHẬP"]);
    }
    public function dologin(Request $request)
    { $validated =$request->validate([
            'email' =>'required|max:30|Email',
            'password' =>'required',
        ]);
    $data=['email'=>$request->input('email'),
    'password'=>$request->input('password'),];
    if(Auth::guard('user')->attempt($data,$request->input('remember'))) 
        return redirect('admin');
    else return redirect('/admin/login')->with('success','Đăng nhập thất bại'); 
    }
    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect('/admin/login');
    }
}
