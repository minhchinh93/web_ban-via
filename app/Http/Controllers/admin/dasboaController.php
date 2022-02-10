<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\bill;
use App\Models\customer;
use Illuminate\Support\Facades\DB;

class dasboaController extends Controller
{
    //
    public function showdasboa()
    {

        // $totalbill = bill::sum('total');
        // $totalbill_detaill = bill_detaill::sum('quantity');
        // $totalcustomer = customer::all()->count();
        // $totalCOD = bill::where('payment', 'COD')->count();
        // $totalATM = bill::where('payment', 'ATM')->count();

        // $tables = bill::join('bill_detaills', 'bill_detaills.id_bill', '=', 'bills.id')
        //     ->join('customers', 'bills.id_User', '=', 'users.id')
        //     ->select(DB::raw('SUM(bill_detaills.quantity) as "so_luong",
        //         users.name as "khach_hang",
        //         bills.total,bills.date_order,
        //         bills.payment,
        //         users.id,
        //         users.address,
        //         users.phone,
        //         users.note'
        //     ))
        //     ->groupBy('bills.id')
        //     ->get();

        return view('admin/dasboa/index'
            // , [
            //     'totalbill' => $totalbill,
            //     'totalbill_detaill' => $totalbill_detaill,
            //     'totalcustomer' => $totalcustomer,
            //     'totalCOD' => $totalCOD,
            //     'totalATM' => $totalATM,
            //     'tables' => $tables,
            // ]
        );
    }
    public function chitiet($id)
    {
        $customer = customer::find($id);
        $chitiet = bill::join('bill_detaills', 'bill_detaills.id_bill', '=', 'bills.id')
            ->join('products', 'bill_detaills.id_product', '=', 'products.id')
            ->join('users', 'bills.id_User', '=', 'users.id')
            ->select(DB::raw('bill_detaills.quantity,
        bills.date_order,
        users.name as "name",
        products.name as "name_product",
        bills.total,
        bill_detaills.unit_price,
        products.image
        '))
            ->where('users.id', $id)
            ->get();

        return view('admin/dasboa/chitiet', [
            'tables' => $chitiet,
            'customer' => $customer,
        ]);
    }
}
