<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\mocupProduct;
use App\Models\Product;
use App\Models\ProductPngDetails;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class dasboaController extends Controller
{
    //
    public function showdasboa()
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $time = $dt->toDateString();
        $totaDay = Product::where('created_at', 'LIKE', '%' . $time . '%')->count();
        $totaSusecDay = Product::where('created_at', 'LIKE', '%' . $time . '%')->where('status', 5)->count();
        $totalidea = Product::all()->count();
        $totalPNG = ProductPngDetails::all()->count();
        $totaldayPNG = ProductPngDetails::where('created_at', 'LIKE', '%' . $time . '%')->count();
        $totalMockup = mocupProduct::all()->count();
        $totaldayMockup = mocupProduct::where('created_at', 'LIKE', '%' . $time . '%')->count();
        $totalIdeamember = User::where('role', '<>', 2)->count();
        $totalDesigner = User::where('role', '<>', 1)->count();
        // $totalATM = bill::where('payment', 'ATM')->count();
        $Idea = User::join('products', 'products.id_idea', '=', 'users.id')
            ->select(DB::raw('COUNT(products.id_idea) as "sum",
            users.name as "name",
            users.email as "email",
            users.role as "role",
            users.deleted_at as "deleted_at",
            products.id_idea as "id"
            '
            ))
            ->orderBy('sum', 'DESC')
            ->groupBy('products.id_idea')
            ->get();
        // $designer = User::join('products', 'products.User_id', '=', 'users.id')
        //     ->join('product_png_details', 'product_png_details.product_id', '=', 'products.id')
        //     ->join('mocup_products', 'mocup_products.product_id', '=', 'products.id')
        //     ->select(DB::raw('COUNT(product_png_details.id) as "product_png_details",
        //     COUNT(mocup_products.id) as "mocup_products",
        //     users.name as "name",
        //     users.email as "email",
        //     users.role as "role",
        //     users.deleted_at as "deleted_at",
        //     products.User_id as "id"
        //     '
        //     ))
        // // ->where('created_at', 'LIKE', '%' . $time . '%')
        //     ->groupBy('products.User_id')
        //     ->orderBy('mocup_products', 'DESC')
        //     ->get();

        $designer = User::join('products', 'products.User_id', '=', 'users.id')
            ->join('mocup_products', 'mocup_products.product_id', '=', 'products.id')
            ->select(DB::raw('
            COUNT(mocup_products.id) as "mocup_products",
            users.name as "name",
            users.email as "email",
            users.role as "role",
            users.deleted_at as "deleted_at",
            products.User_id as "id"
            '
            ))
            ->groupBy('products.User_id')
            ->orderBy('products.User_id', 'DESC')
            ->get();
        $png = User::join('products', 'products.User_id', '=', 'users.id')
            ->join('product_png_details', 'product_png_details.product_id', '=', 'products.id')
            ->select(DB::raw('COUNT(product_png_details.id) as "product_png_details",
            users.name as "name",
            users.email as "email",
            users.role as "role",
            users.deleted_at as "deleted_at",
            products.User_id as "id"
            '
            ))
            ->groupBy('products.User_id')
            ->orderBy('products.User_id', 'DESC')
            ->get();
        // dd($mocup_products);
        return view('admin/dasboa/index'
            , [
                'shows' => $Idea,
                'designer' => $designer,
                'totalDesign' => $totalPNG + $totalMockup,
                'totalIdea' => $totalidea,
                'totaDay' => $totaDay,
                'totaSusecDay' => $totaSusecDay,
                'totalDayDesigner' => $totaldayPNG + $totaldayMockup,
                'totalIdeamember' => $totalIdeamember,
                'totalDesigner' => $totalDesigner,
                'pngs' => $png,
            ]
        );
    }
    public function DetailMember($id)
    {

        return view('admin/dasboa/chitiet',
        );
    }
}
