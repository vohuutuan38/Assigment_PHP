<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showFormLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $user = $request->only('email','password');
        // dd($user);
        // attempt là để so sánh đối chiếu có trùng với bảng user khong
        if(Auth::attempt($user)){
           return redirect()->intended('/');
        }

        return  redirect()->back()->withErrors([
            'email' => 'Thông tin người dùng nhập không đúng',
        ]);
    }

    public function showFormRegister(Request $request){
        return view('auth.register');
    }


    public function register(Request $request){
        $data = $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|string|email|max:255', 
         'password' => 'required|string|min:5',
        ]);

        $user = User::query()->create($data);

         Auth::login($user);

         return redirect()->intended('/');

    }


    public function logout(Request $request){
        
        Auth::logout();
        return redirect('/ ');
    }
}
