<?php

namespace App\Http\Controllers\admin;

use App\Exports\ExportSw;
use App\Exports\SlwExport;
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
                if ($datas != []) {
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
                } else {
                    $total_price[] = 0;
                    $sw_prices[] = 0;
                    $shipping_price[] = 0;
                }

            } else {
                $total_price[] = 0;
                $sw_prices[] = 0;
                $shipping_price[] = 0;
            }
        } else {
            $total = 0;
            $datas = null;
            $total_price[] = 0;
            $sw_prices[] = 0;
            $shipping_price[] = 0;
        }

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
        $token = $selerwix->getToken();
        $time1 = $request->time1;
        $translations = $selerwix->transaction($token, $time1);
        if ($translations['data']['getTransactionHistory']['logs'] != []) {
            $total = count($translations['data']['getTransactionHistory']['logs']);
            $datas = $translations['data']['getTransactionHistory']['logs'];
            foreach ($datas as $data) {
                $amount = $data['amount'];
                $transaction_type = $data['transaction_type'];
                $description = $data['description'];
                $createdAt = $data['createdAt'];
                if ($transaction_type == "Cash") {
                    $pattern = '/.* order: (.*?) \(/m';
                } else {
                    $patterns = '/.* refund for order (.*?) \(/m';
                    if (preg_match($patterns, $description) == 0) {
                        $pattern = '/.* refund for order (.*?) because/';
                    } else {
                        $pattern = '/.* refund for order (.*?) \(/m';
                    }
                }

                preg_match($pattern, $description, $matches);

                $idNameStore = $selerwix->findNameStore($token, $matches[1]);

                $str = ($amount . ',' . $transaction_type . ',' . $createdAt . ',' . $matches[1] . ',' . $idNameStore);

                $response[] = explode(",", $str);

            }
        } else {
            $total = 0;
            $response = null;
        }

        return view('admin.Sellerwix.translation',
            ['total' => $total,
                'datas' => $response,
            ]);
    }

    public function exportUsers($id, $time1, $time2)
    {
        return Excel::download(new ExportSw($id, $time1, $time2), 'ExportSw1.xlsx');
    }public function exportslw($time1)
    {
        return Excel::download(new SlwExport($time1), "{$time1}.xlsx");
    }

}
