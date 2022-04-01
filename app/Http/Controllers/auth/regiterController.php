<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Jobs\NewJob;
use App\Models\User;

class regiterController extends Controller
{
    //
    public function index()
    {
        return view('client.auth.Register');
    }
    public function postList(UserRequest $request)
    {

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => 0,
            'password' => bcrypt($request->password),
            'remember_token' => md5($request->name . time()),
        ];
        $input = [
            'link' => route('senmail', [md5($request->name . time())]),
            'name' => $request->name,
        ];

        // send mail queue job
        $emailJob = (new NewJob($request->email, $input))->delay(now()->addSecond(2));
        dispatch($emailJob);
        User::create($data);
        return redirect()->route('alert')->with('success', 'Bạn đăng ký thanh công, kiểm tra mail để verry tài khoản');
    }
}
