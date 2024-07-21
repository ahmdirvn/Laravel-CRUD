<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function login(){
        // pengecekan apakah user sudah login / belum
        if (Auth::check()){
            return redirect('home');
        }else{
            return view('login');
        }
    }

    public function actionlogin(Request $request){
        $data =[
            'email' => $request->email,
            'password' => $request->password
        ];

        // pengecekan validasi login ke table users & fasilitas session jika login berhasil
        // menggunakan manual dibandingkan menggunakan tools seperti laravel/ui laravel/breeze dan jetstream
        if (Auth::attempt($data)){
            return redirect('home');
        }else{
            //session flash digunakan untuk menampilkan pesan error
            Session::flash('error', 'Email atau password salah');
            return redirect('login');
        }
    }

    public function actionlogout(){
        // menghapus session login
        Auth::logout();
        return redirect('login');
    }
}

