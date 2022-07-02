<?php

namespace App\Exports;

use App\Helpers\SellerWix;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportSw implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        return User::select('name', 'email')->get();
    }
    public function sw()
    {
        $selerwix = new SellerWix;
        $token = $selerwix->getToken();
        $result = $selerwix->get_dataStore($token, '7e2b7f88-09de-4d6e-9a18-7a466ee9a9d9', '04-01', '05-01');
        if (count($result) < 2) {
            $datas = $result['data']['getPaginationOrders']['orders'];
        } else {
            $total = 0;
            $datas = null;
        }

        foreach ($datas as $data) {
            if (count($data['order_supplier']) > 0) {
                $result[] = [
                    $data['name'],
                    $data['order_from'],
                    $data['store']['name'],
                    $data['order_status'],
                    $data['order_supplier'][0]['fulfill_status'],
                    $data['order_supplier'][0]['total_price'],
                    $data['order_supplier'][0]['shipping_price'],
                    $data['order_supplier'][0]['total_price'] - $data['order_supplier'][0]['shipping_price'],
                    $data['order_supplier'][0]['discount_price'],
                ];
            }
        }
        // dd($result);
        return
            [
            'datas' => $result,
        ];

    }
}
