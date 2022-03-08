<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\cornerstone;
use App\Models\Product;
use App\Models\size;
use App\Models\type_product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class toolController extends Controller
{
    //
    public function showTool()
    {
        $show = cornerstone::all();

        return view('client.dasboa.tool', [
            'shows' => $show,
        ]);
    }
    public function postTypeProduct(Request $request)
    {

        // $inputs = preg_split('/\r\n|\r|\n/', );

        $type = type_product::create($request->only('name'));

        $inputs = explode("|", $request->size);
        $i = 0;
        foreach ($inputs as $input) {
            size::create([
                'id_types' => $type->id,
                'name' => $inputs[$i++],

            ]);
        }

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
    public function Sku()
    {
        foreach (Product::all() as $skus) {
            $id = $skus->id;
            $names = $skus->type_product->name;
            $name = substr($names, 0, 3);
            $sku = $name . $id;
            product::where('id', $id)->update([
                'Sku' => $sku,
            ]);

        }
        print "ok";
    }
    public function cornerstone(Request $request)
    {

        cornerstone::create($request->only('name'));
        return redirect()->route('showtool');
    }
    public function cornerstoneProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->cornerstones()->attach($request->cornerstone);
        return redirect()->route('home');
    }

}
