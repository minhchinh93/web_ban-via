<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminHomeController extends Controller
{
    //
    public function home()
    {
        return view('admin/home/index');
    }
}
