<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\ProductPngDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class finePngController extends Controller
{
    //SELECT
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
        // INNER JOIN users ON products.id_idea = users.id
            ->join('users', 'products.id_idea', '=', 'users.id')
            ->select(DB::raw('
            users.name as "name",
            products.title as "title",
            product_png_details.ImagePngDetail as "ImagePngDetail"
            '
            ))
            ->Where('product_png_details.Sku', 'like', "%{$keyword}%")
            ->Where('title', 'like', "%{$keyword}%")
            ->paginate(33);

        return view('client.findPNG.indexPNG', ['shows' => $show,
        ]);
    }
}
