<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\type_product;
use Carbon\Carbon;
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

    public function carbon()
    {
        $dt = Carbon::now();
        // echo $dt;
        // echo $dt->addDays(29);
        // echo $dt->addDay(1);
        echo $dt->subDay(1);
        // echo $dt->subDays(29);

    }

}
