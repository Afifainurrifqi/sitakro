<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        }

        return view('login');
    }

    function error()
    {
        return view('errorsrole');
    }

    function maintance()
    {
        return view('maintance');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password'=> 'required'
        ],[
            'email.required'=> 'Email wajib diisi',
            'password.required'=> 'Password wajib diisi'
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role=='admin'){
                return redirect('dashboard');
            }elseif(Auth::user()->role =='operator'){
                return redirect('dashboard');
            }elseif(Auth::user()->role =='dasawisma'){
                return redirect('dashboard');
            }elseif(Auth::user()->role =='akundemo'){
                return redirect('dashboard');
            }
        } else {
            return redirect()->back()->withErrors(['email' => 'Username dan password salah']);
        }
    }

    function logout()
    {
        if (Auth::check()) {
            Auth::logout(); // Lakukan logout pengguna
        }
        return redirect('/');
    }
}
