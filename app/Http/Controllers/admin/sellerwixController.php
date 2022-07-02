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
        if ($request->time1 != null) {
            $result = $selerwix->get_dataStore($token, $request->Store_ID, $request->time1, $request->time2);
            if (count($result) < 2) {
                $total = $result['data']['getPaginationOrders']['pageInfo']['total'];
                $datas = $result['data']['getPaginationOrders']['orders'];
                foreach ($datas as $data) {
                    if (count($data['order_supplier']) > 0) {
                        $total_price[] = $data['order_supplier'][0]['total_price'];
                        $sw_prices[] = $data['order_supplier'][0]['total_price'] - $data['order_supplier'][0]['shipping_price'];
                        $shipping_price[] = $data['order_supplier'][0]['shipping_price'];
                    } else {
                        $total_price[] = 0;
                        $sw_prices[] = 0;
                        $shipping_price[] = 0;
                    }
                }
            }
        } else {
            $total = 0;
            $datas = null;
            $total_price[] = 0;
            $sw_prices[] = 0;
            $shipping_price[] = 0;
        }
        // dump(array_sum($total_price));
        return view('admin.Sellerwix.index',
            ['total' => $total,
                'datas' => $datas,
                'id' => $request->id,
                'total_price' => array_sum($total_price),
                'sw_prices' => array_sum($sw_prices),
                'shipping_price' => array_sum($shipping_price),
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

    public function exportUsers($id, $time1, $time2)
    {
        return Excel::download(new ExportSw($id, $time1, $time2), 'ExportSw1.xlsx');
    }

}
