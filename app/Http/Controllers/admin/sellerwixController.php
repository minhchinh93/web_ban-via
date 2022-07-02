<?php

namespace App\Http\Controllers\admin;

use App\Exports\ExportSw;
use App\Helpers\SellerWix;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class sellerwixController extends Controller
{

    public function index(Request $request)
    {
        $selerwix = new SellerWix;
        $token = $selerwix->getToken();
        $result = $selerwix->get_dataStore($token, $request->Store_ID, $request->time1, $request->time2);
        if (count($result) < 2) {
            $total = $result['data']['getPaginationOrders']['pageInfo']['total'];
            $datas = $result['data']['getPaginationOrders']['orders'];
            foreach ($datas as $data) {
                if (count($data['order_supplier']) > 0) {
                    $total_price[] = $data['order_supplier'][0]['total_price'];
                    $sw_prices[] = $data['order_supplier'][0]['total_price'] - $data['order_supplier'][0]['shipping_price'];
                    $shipping_price[] = $data['order_supplier'][0]['shipping_price'];
                }
            }
        } else {
            $total = 0;
            $datas = null;
        }

        return view('admin.Sellerwix.index',
            ['total' => $total,
                'datas' => $datas,
                'id' => $request->id,
                'totalpPrice' => array_sum($total_price),
                'swPrices' => array_sum($sw_prices),
                'shippingPrice' => array_sum($shipping_price),
            ]);

    }
    public function getIdStore()
    {
        $selerwix = new SellerWix;
        $token = $selerwix->getToken();
        $result = $selerwix->getIDStore($token);
        if ($result['data']) {
            $data = $result['data']['stores']['stores'];
            $total = count($result['data']['stores']['stores']);
        } else {
            $total = 0;
            $data = null;
        }

        return view('admin.Sellerwix.getIdStore',
            ['total' => $total,
                'datas' => $data,
            ]);
    }
    public function transactions(Request $request)
    {

        $selerwix = new SellerWix;
        // $idNameStore = $translation->findNameStore();
        $token = $selerwix->getToken();
        $translation = $selerwix->transaction($token, $request->time1, $request->time2);

        if ($translation['data']) {
            $total = count($translation['data']['getTransactionHistory']['logs']);
            $data = $translation['data']['getTransactionHistory']['logs'];

        } else {
            $total = 0;
            $data = null;
        }
        // dd('ok');
        return view('admin.Sellerwix.translation',
            ['total' => $total,
                'datas' => $data,
            ]);
    }

    public function exportUsers(Request $request)
    {
        $database = new ExportSw;
        return Excel::download($database->sw(), 'ExportSw1.xlsx');
    }

}
