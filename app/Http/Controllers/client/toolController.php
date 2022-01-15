<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\type_product;
use Illuminate\Http\Request;

class toolController extends Controller
{
    //
    public function showTool()
    {
        return view('client.dasboa.tool');
    }
    public function postTypeProduct(Request $request)
    {
        type_product::create($request->only('name'));
        return redirect()->route('home');
    }
}
