<?php

namespace App\Http\Controllers\admin;

use App\Helpers\SellerWix;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sellerwixController extends Controller
{
    //
    // public function index()
    // {
    //     return view('admin.sellerwix.index');
    // }

    //
    public function index(Request $request)
    {
        $selerwix = new SellerWix;
        $token = $selerwix->getToken();
        $result = $selerwix->get_dataStore($token, $request->Store_ID, $request->time1, $request->time2);
        // dump(count($result));
        if (count($result) < 2) {
            $total = $result['data']['getPaginationOrders']['pageInfo']['total'];
            $data = $result['data']['getPaginationOrders']['orders'];
        } else {
            $total = 0;
            $data = null;
        }
        // total=response['data']['getPaginationOrders']['orders']
        return view('admin.sellerwix.index',
            ['total' => $total,
                'datas' => $data,
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

        return view('admin.sellerwix.getIdStore',
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
        return view('admin.sellerwix.translation',
            ['total' => $total,
                'datas' => $data,
            ]);
    }

}
