<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\ProductPngDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class finePngController extends Controller
{
    // SELECT
    // users.name as "name",
    // products.title as "title",
    // product_png_details.ImagePngDetail as "ImagePngDetail"
    // FROM product_png_details
    // INNER JOIN products ON product_png_details.product_id = products.id
    // INNER JOIN users ON products.id_idea = users.id
    public function findPNG(Request $request)
    {
        $keyword = $request->keyword;
        $show = ProductPngDetails::join('products', 'product_png_details.product_id', '=', 'products.id')
            ->join('users', 'products.User_id', '=', 'users.id')
            ->leftJoin('oder_details', 'oder_details.oder_sku', '=', 'product_png_details.Sku')
            ->select(DB::raw('
            users.name as "name",
            products.title as "title",
            products.id as "id",
            product_png_details.ImagePngDetail as "ImagePngDetail",
            product_png_details.Sku as "Sku",
            oder_details.Number_Items as "Number_Items",
            oder_details.order_Total as "Order_Total",
            oder_details.Sale_Date as "Sale_Date",
            oder_details.Date_Shipped as "Date_Shipped",
            oder_details.saller as "saller"
            '
            ))
            ->Where('product_png_details.Sku', 'like', "%{$keyword}%")
            ->orWhere('title', 'like', "%{$keyword}%")
            ->paginate(32);

        return view('client.findPNG.indexPNG', ['shows' => $show,
        ]);
    }
}
