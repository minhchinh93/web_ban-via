<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Oder_detail;
use App\Models\oder_Ebay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OderController extends Controller
{
    //
    public function OderAdmin(Request $request)
    {

        if ($request->keyword1 != '' or $request->keyword2 != '') {
            $keyword1 = $request->keyword1;
            $keyword2 = $request->keyword2;
        } else {
            $keyword1 = '';
            $keyword2 = '';
        }
        // dd($keyword1);
        $esty = Oder_detail::join('users', 'users.name', '=', 'oder_details.saller')
            ->select(DB::raw('
        users.name as "name",
        sum(oder_details.Number_Items) as "Number_Items",
        sum(oder_details.order_Total) as "order_Total"
        '
            ))
            ->distinct()
            ->groupBy("users.name")
            ->where('oder_details.Sale_Date', 'LIKE', '%' . $keyword1 . '%')
            ->get();
        // dd($esty);
        $ebay = oder_Ebay::join('users', 'users.name', '=', 'oder__ebays.saller')
            ->select(DB::raw('
    users.name as "name",
    sum(oder__ebays.Number_Items) as "Number_Items",
    sum(oder__ebays.order_Total) as "order_Total"
    '
            ))
            ->distinct()
            ->groupBy("users.name")
            ->where('oder__ebays.Sale_Date', 'LIKE', '%' . $keyword2 . '%')
            ->get();
        //total number
        $totalItemEsty = Oder_detail::all()->sum('Number_Items');
        $totalPriceEsty = Oder_detail::all()->sum('Order_Total');
        $totalItemEBay = oder_Ebay::all()->sum('Number_Items');
        $totalPriceEBay = oder_Ebay::all()->sum('Order_Total');
        $totalsicharEsty = Oder_detail::select(DB::raw('
        sum(oder_details.order_Total) as "order_Total"
        '
        ))
            ->groupBy('Sale_Date')
            ->paginate(30);
        foreach ($totalsicharEsty as $totalsichar) {
            $sicharEsty[] = $totalsichar->order_Total;
        }

        $StrsicharEsty = implode(",", $sicharEsty);
        $totalsicharEbay = oder_Ebay::select(DB::raw('
        sum(oder__ebays.order_Total) as "order_Total"
        '
        ))
            ->groupBy('Sale_Date')
            ->paginate(30);
        foreach ($totalsicharEbay as $totalsichar) {
            $sicharEbay[] = $totalsichar->order_Total;
        }
        $totolEsty = array_sum($sicharEsty);
        $totolEbay = array_sum($sicharEbay);

        $StrsicharEbay = implode(",", $sicharEbay);
        return view('admin.Oder.IndexOderadmin', [
            'estys' => $esty,
            'ebays' => $ebay,
            'totalItemEsty' => $totalItemEsty,
            'totalPriceEsty' => $totalPriceEsty,
            'totalItemEBay' => $totalItemEBay,
            'totalPriceEBay' => $totalPriceEBay,
            'StrsicharEsty' => $StrsicharEsty,
            'StrsicharEbay' => $StrsicharEbay,
            'totolEsty' => $totolEsty,
            'totolEbay' => $totolEbay,
        ]);

    }

}
