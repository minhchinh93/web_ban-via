<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logincontroller extends Controller
{
    //
    public function index()
    {
        return view('client.auth.login');
    }

    public function login(Request $request)
    {

        if (Auth::attempt($request->only('email', 'password'))) {

            if (Auth::user()->role == 1) {
                return redirect()->route('dasboa');
            } elseif (Auth::user()->role == 2) {
                return redirect()->route('dasboa');
            } else {
                return redirect()->route('showdasboa');
            }

        } else {
            return redirect()->back()->with('erros', 'đăng nhập không thành công !');
        }
    }

    public function logout()
    {

        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
