<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\Customer;

class CustomerLoginController extends Controller
{
    public function register(Request $request)
    {
        $validated =$request->validate([
            'email' =>'required|max:30|email|unique:duongduykhanhcustomers',
            'password' =>'required|confirmed',
        ]);
        $email = $request->email;
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->address;
        $password = $request->password;

        $passwordHash = Hash::make($password);

        $dataRegister = [
            'email' => $email, 
            'password' => $passwordHash, 
            'customerName' => $name,
            'phone' => $phone,
            'address' => $address,
        ];

        $register = Customer::insert($dataRegister);
        $message = 'Register failed!';

         if($register){
            $message = 'Register successfully!';
         }

         $categories=Category::where('status',2)->get();
        return view('frontend.home.index', ['categories' => $categories])->with('message', $message);

    }
    public function login(){
        return view('frontend.login',['title'=>"ĐĂNG NHẬP"]);
    }
    public function dologin(Request $request)
    { 
        $validated =$request->validate([
            'email' =>'required|max:30|Email',
            'password' =>'required',
    ]);
    $data=['email'=>$request->input('email'),
    'password'=>$request->input('password'),];
    if(Auth::guard('customer')->attempt($data,$request->input('remember'))) 
        return redirect('/');
    else return redirect('/login')->with('success','Đăng nhập thất bại'); 
    }
    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect('/');
    }
}
