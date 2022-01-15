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
                return redirect()->route('Dashboard');
            } elseif (Auth::user()->role == 2) {
                return redirect()->route('home');
            } else {
                return redirect()->route('showUser');
            }

        } else {
            return redirect()->back();
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
