<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function tampil_login(){
        return view('auth.login');
    }
    function tampil_register(){
        return view('auth.register');
    }
    function submit_register(Request $request){
        $cek_user = User::where('email', $request->email)->first();
        if($cek_user){
            return redirect('/register') ->with('error','Email sudah Digunakan,Silahkan Gunakan Email Lain');
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        //diarahkan kehalaman login
        return redirect('/login') ->with('success','Anda Sudah Berhasil Membuat akun, Silahkan Login');

    }
    function submit_login(Request $request){
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect('/dashboard');
        }else{
            return "Email atau Password Salah";
        }


    }

    function submit_logout(){
        Auth::logout();
        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }
}