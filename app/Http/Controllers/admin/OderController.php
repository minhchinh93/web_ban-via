<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Oder_detail;
use App\Models\oder_Ebay;
use Illuminate\Support\Facades\DB;

class OderController extends Controller
{
    //
    public function OderAdmin()
    {
        $esty = Oder_detail::join('users', 'users.name', '=', 'oder_details.saller')
            ->select(DB::raw('
        users.name as "name",
        sum(oder_details.Number_Items) as "Number_Items",
        sum(oder_details.order_Total) as "order_Total"
        '
            ))
            ->distinct()
        // ->where('oder_details.Sale_Date', '2/22/2022')
            ->groupBy("users.name")
            ->get();
        $ebay = oder_Ebay::join('users', 'users.name', '=', 'oder__ebays.saller')
            ->select(DB::raw('
    users.name as "name",
    sum(oder__ebays.Number_Items) as "Number_Items",
    sum(oder__ebays.order_Total) as "order_Total"
    '
            ))
            ->distinct()
            ->groupBy("users.name")
            ->get();

        return view('admin.Oder.IndexOderadmin', [
            'estys' => $esty,
            'ebays' => $ebay,
        ]);

    }

}
// products.title as "title",
// product_png_details.ImagePngDetail as "ImagePngDetail",
// oder_details.Number_Items as "Number_Items",
// oder_details.order_Total as "Order_Total",
// oder_details.Sale_Date as "Sale_Date",
// oder_details.Date_Shipped as "Date_Shipped",
// oder_details.saller as "saller"
