<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\cart;

class logincontroller extends Controller
{
    //
    public function index() {
        return view('client.auth.login');
    }

    public function login(Request $request){

        // dd($request->all());

        if (Auth::attempt($request->only('email', 'password'))) {
            return 'ok';
        } else{
            return 'no';
        }
    }

    public function logout(){

        if(Auth::check()){
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
