<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class dasboaController extends Controller
{
    //
    public function showdasboa()
    {

        // $totalbill = bill::sum('total');
        // $totalbill_detaill = bill_detaill::sum('quantity');
        // $totalcustomer = customer::all()->count();
        // $totalidea = Product::where('description', '<>', null)->count();
        // $totalDesign = Product::where('description', '<>', null)->count();
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
            ->groupBy('products.id_idea')
            ->withTrashed()
            ->get();

        // SELECT
        // COUNT(product_png_details.id) as product_png_details,
        // COUNT(mocup_products.id) as mocup_products, users.name, users.role
        // FROM users
        // INNER JOIN products ON products.User_id = users.id
        // INNER JOIN product_png_details ON products.id = product_png_details.product_id
        // INNER JOIN mocup_products ON products.id = mocup_products.product_id
        // GROUP BY products.User_id;

        $designer = User::join('products', 'products.User_id', '=', 'users.id')
            ->join('product_png_details', 'product_png_details.product_id', '=', 'products.id')
            ->join('mocup_products', 'mocup_products.product_id', '=', 'products.id')
            ->select(DB::raw('COUNT(product_png_details.id) as "product_png_details",
            COUNT(mocup_products.id) as "mocup_products",
            users.name as "name",
            users.email as "email",
            users.role as "role",
            users.deleted_at as "deleted_at",
            products.User_id as "id"
            '
            ))
            ->groupBy('products.User_id')
            ->withTrashed()
            ->get();
        // dd($designer);
        // $shows = User::where('name', 'like', "%{$keyword}%")->withTrashed()->paginate(10);

        // $shows = User::withTrashed()->paginate(100);
        // dd($shows[4]->user->role);

        return view('admin/dasboa/index'
            , [
                'shows' => $Idea,
                'designer' => $designer,
                //     'totalbill_detaill' => $totalbill_detaill,
                //     'totalcustomer' => $totalcustomer,
                //     'totalCOD' => $totalCOD,
                //     'totalATM' => $totalATM,
                //     'tables' => $tables,
            ]
        );
    }
    public function DetailMember($id)
    {
        // $customer = customer::find($id);
        // $chitiet = bill::join('bill_detaills', 'bill_detaills.id_bill', '=', 'bills.id')
        //     ->join('products', 'bill_detaills.id_product', '=', 'products.id')
        //     ->join('users', 'bills.id_User', '=', 'users.id')
        //     ->select(DB::raw('bill_detaills.quantity,
        // bills.date_order,
        // users.name as "name",
        // products.name as "name_product",
        // bills.total,
        // bill_detaills.unit_price,
        // products.image
        // '))
        //     ->where('users.id', $id)
        //     ->get();

        return view('admin/dasboa/chitiet',
            // [
            //     'tables' => $chitiet,
            //     'customer' => $customer,
            // ]
        );
    }
}
