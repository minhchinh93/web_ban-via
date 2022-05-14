<?php
//app/Helpers/Envato/User.php
namespace App\Helpers;

class SellerWix
{
    /**
     * @param int $user_id User-id
     *
     * @return string
     */
    public function getToken()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.sellerwix.com/users/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"email":"haihotan290@gmail.com","password":"@@290Hohailong"}',
            CURLOPT_HTTPHEADER => array(
                'authority: api.sellerwix.com',
                'accept: application/json, text/plain, */*',
                'accept-language: en-US,en;q=0.9,vi;q=0.8',
                'content-type: application/json;charset=UTF-8',
                'origin: https://sellerwix.com',
                'referer: https://sellerwix.com/',
                'sec-ch-ua: " Not A;Brand";v="99", "Chromium";v="101", "Google Chrome";v="101"',
                'sec-ch-ua-mobile: ?0',
                'sec-ch-ua-platform: "Windows"',
                'sec-fetch-dest: empty',
                'sec-fetch-mode: cors',
                'sec-fetch-site: same-site',
                'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36',
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $array_selerwix = json_decode($response, true);
        return $array_selerwix['token'];

    }
    public static function get_dataStore($token, $store_id, $time1, $time2)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.sellerwix.com/graphql',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"operationName":"MainQuery","variables":{"pageIndex":0,"pageSize":100,"filters":[{"level":2,"index":0,"filters":[{"field":"Order.store_id","operator":"in","value":"' . $store_id . '","unit":null,"data_type":"FindLookup","isAmbiguous":false,"label":"PinkRain"}]},{"level":2,"index":1,"filters":[{"field":"Order.purchase_date","operator":"gte","value":"2022-05-01","unit":null,"data_type":"DateTime","isAmbiguous":false,"label":"2022-' . $time1 . '"}]},{"level":2,"index":2,"filters":[{"field":"Order.purchase_date","operator":"eq","value":"2022-' . $time2 . '","unit":null,"data_type":"DateTime","isAmbiguous":false,"label":"2022-05-13"}]}],"search_area":"Order"},"query":"query MainQuery($pageIndex: Int, $pageSize: Int, $store_id: String, $filters: [FilterGroup], $search_area: String, $sorted: [SortedInput]) {\\n  getPaginationOrders(pageIndex: $pageIndex, pageSize: $pageSize, store_id: $store_id, filters: $filters, search_area: $search_area, sorted: $sorted) {\\n    pageInfo {\\n      total\\n      pageIndex\\n      pageSize\\n    }\\n    orders {\\n      id\\n      name\\n      total_price_amount\\n      user_confirm\\n      currency_code\\n      buyer_email\\n      shipping_name\\n      shipping_address1\\n      shipping_address2\\n      shipping_city\\n      shipping_state\\n      shipping_country\\n      shiping_method\\n      shipping_phone\\n      order_status\\n      shipping_zip\\n      shipping_country_code\\n      order_from\\n      purchase_date\\n      order_id_channel\\n      system_order_status\\n      marketplace_id\\n      store_id\\n      createdAt\\n      ioss\\n      ioss_cost\\n      latest_ship_date\\n      shipping_notification\\n      gift_message\\n      send_gift_message\\n      store {\\n        name\\n        type\\n        is_connect\\n      }\\n      ext\\n      note\\n      updatedAt\\n      tracking_url\\n      tracking_status\\n      tracking_id\\n      order_supplier {\\n        id\\n        order_id\\n        tax\\n        supplier {\\n          id\\n          code\\n          name\\n        }\\n        total_price\\n        shipping_price\\n        discount_price\\n        supplier_status\\n        supplier_message\\n        tracking_id\\n        tracking_url\\n        carrier_code\\n        carrier_name\\n        fulfill_status\\n        fulfill_message\\n        supplier_channel_id\\n        submit_date\\n        createdAt\\n        updatedAt\\n        total_new_tracking\\n        lasted_tracking_supplier_name\\n        method_fulfill\\n        gift_fee\\n      }\\n      submit_date\\n      price_supplier\\n      order_item_channel {\\n        id\\n      }\\n      order_items {\\n        id\\n        parent_id\\n        item_supplier {\\n          id\\n          supplier_selected\\n        }\\n        is_custom_product_supplier\\n        order_supplier {\\n          supplier_status\\n        }\\n      }\\n    }\\n  }\\n}\\n"}',
            CURLOPT_HTTPHEADER => array(
                'authority: api.sellerwix.com',
                'accept: */*',
                'accept-language: en-US,en;q=0.9,vi;q=0.8',
                'authorization: ' . $token,
                'content-type: application/json',
                'origin: https://sellerwix.com',
                'referer: https://sellerwix.com/',
                'sec-ch-ua: " Not A;Brand";v="99", "Chromium";v="101", "Google Chrome";v="101"',
                'sec-ch-ua-mobile: ?0',
                'sec-ch-ua-platform: "Windows"',
                'sec-fetch-dest: empty',
                'sec-fetch-mode: cors',
                'sec-fetch-site: same-site',
                'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36',
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $array_selerwix = json_decode($response, true);

        return $array_selerwix;

    }
    public function findNameStore()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.sellerwix.com/graphql',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"operationName":"MainQuery","variables":{"pageIndex":0,"pageSize":100,"filters":[{"level":1,"index":0,"filters":[{"field":"name","operator":"like","value":"114-6215937-6144239","data_type":"String"},{"field":"shipping_name","operator":"like","value":"114-6215937-6144239","data_type":"String"},{"field":"shipping_phone","operator":"like","value":"114-6215937-6144239","data_type":"String"},{"field":"$order_supplier.tracking_id$","operator":"like","value":"114-6215937-6144239","data_type":"String"}]}],"search_area":"Order"},"query":"query MainQuery($pageIndex: Int, $pageSize: Int, $store_id: String, $filters: [FilterGroup], $search_area: String, $sorted: [SortedInput]) {\\n  getPaginationOrders(pageIndex: $pageIndex, pageSize: $pageSize, store_id: $store_id, filters: $filters, search_area: $search_area, sorted: $sorted) {\\n    pageInfo {\\n      total\\n      pageIndex\\n      pageSize\\n    }\\n    orders {\\n      id\\n      name\\n      total_price_amount\\n      user_confirm\\n      currency_code\\n      buyer_email\\n      shipping_name\\n      shipping_address1\\n      shipping_address2\\n      shipping_city\\n      shipping_state\\n      shipping_country\\n      shiping_method\\n      shipping_phone\\n      order_status\\n      shipping_zip\\n      shipping_country_code\\n      order_from\\n      purchase_date\\n      order_id_channel\\n      system_order_status\\n      marketplace_id\\n      store_id\\n      createdAt\\n      ioss\\n      ioss_cost\\n      latest_ship_date\\n      shipping_notification\\n      gift_message\\n      send_gift_message\\n      store {\\n        name\\n        type\\n        is_connect\\n      }\\n      ext\\n      note\\n      updatedAt\\n      tracking_url\\n      tracking_status\\n      tracking_id\\n      order_supplier {\\n        id\\n        order_id\\n        tax\\n        supplier {\\n          id\\n          code\\n          name\\n        }\\n        total_price\\n        shipping_price\\n        discount_price\\n        supplier_status\\n        supplier_message\\n        tracking_id\\n        tracking_url\\n        carrier_code\\n        carrier_name\\n        fulfill_status\\n        fulfill_message\\n        supplier_channel_id\\n        submit_date\\n        createdAt\\n        updatedAt\\n        total_new_tracking\\n        lasted_tracking_supplier_name\\n        method_fulfill\\n        gift_fee\\n      }\\n      submit_date\\n      price_supplier\\n      order_item_channel {\\n        id\\n      }\\n      order_items {\\n        id\\n        parent_id\\n        item_supplier {\\n          id\\n          supplier_selected\\n        }\\n        is_custom_product_supplier\\n        order_supplier {\\n          supplier_status\\n        }\\n      }\\n    }\\n  }\\n}\\n"}',
            CURLOPT_HTTPHEADER => array(
                'authority: api.sellerwix.com',
                'accept: */*',
                'accept-language: en-US,en;q=0.9,vi;q=0.8',
                'authorization: Bearer eyJraWQiOiJoR3hXbFVhYklkcjFiT3ppZUMwYlFGMFBWUk91M0h5cFJQRjB1OFVQZXlJPSIsImFsZyI6IlJTMjU2In0.eyJzdWIiOiIyZDU4MjNhMy1mNmEzLTQwOTctYjg1Zi1jOTI0MmI1MmY5MTciLCJjdXN0b206dXNlcmNvZGUiOiIwQUVEQkNFNUEiLCJpc3MiOiJodHRwczpcL1wvY29nbml0by1pZHAudXMtZWFzdC0xLmFtYXpvbmF3cy5jb21cL3VzLWVhc3QtMV9uRVlaZEw1c1ciLCJjb2duaXRvOnVzZXJuYW1lIjoiMmQ1ODIzYTMtZjZhMy00MDk3LWI4NWYtYzkyNDJiNTJmOTE3Iiwib3JpZ2luX2p0aSI6IjNjMTAzZDYzLTc4ZTEtNDQxZS04NmVkLWMxMjIxY2IzMjI2YyIsImF1ZCI6IjNtdmJyNGxtNTR2aHVzMXVtdGgwa2g4MTh2IiwiZXZlbnRfaWQiOiI2MTM0YmUxZS1mMTcwLTRmNmYtYjk0NS03NThhNjUyMmRmMTgiLCJjdXN0b206YXBwaWQiOiJhNjYyM2RhZi1jM2RlLTRhZDktYWVhMS02N2U3M2EzZjZlOTMiLCJ0b2tlbl91c2UiOiJpZCIsImF1dGhfdGltZSI6MTY1MjUwMjAwOSwiZXhwIjoxNjUyNTA5MjEyLCJpYXQiOjE2NTI1MDU2MTIsImp0aSI6IjA0NjNjODAyLTA5YTctNDU0Yy1hM2UwLTcwN2Q1MDg1YjdjMyJ9.T_tlm73I_kzkhYhSPV72NzLrAcCaEDNIb3KzFuDLKwPkf7TAzrCufBhl5j0PBK5ejIsoqpYPrE6f1SB5zGUx76OUx-Cg1pKB_s66SN-qi7xf5SH-HQG-1Fz-oeVnIb3_RRr1Vv6cr8otxpPMTFc6samsl0yYYUxTN02U0bUqMx-RZyFeCpjLsLpze9v-BfK1H0XLZS92NqiwUxrQ7n6oNeoQ6CLhEhMJdozq2qKk2ZCC5uX6sGmrqzDXsYvUpVRmvPn56b5beBUJdsrFYs-Lcb88LJmT-muMEybJf8yTSrf1y8Lns_VBa7kW1OZj5ssydQFkOb10k3MGfgBXYZo1_Q',
                'content-type: application/json',
                'origin: https://sellerwix.com',
                'referer: https://sellerwix.com/',
                'sec-ch-ua: " Not A;Brand";v="99", "Chromium";v="101", "Google Chrome";v="101"',
                'sec-ch-ua-mobile: ?0',
                'sec-ch-ua-platform: "Windows"',
                'sec-fetch-dest: empty',
                'sec-fetch-mode: cors',
                'sec-fetch-site: same-site',
                'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36',
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $array_storeNane = json_decode($response, true);
        $storeNane = $array_storeNane['data']['getPaginationOrders']['orders'][0]['store']['name'];

        return $storeNane;

    }
    public function transaction($token, $time1, $time2)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.sellerwix.com/graphql',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"operationName":"getTransactionHistory","variables":{"pageIndex":0,"pageSize":100,"filters":[{"level":2,"index":0,"filters":[{"field":"updatedAt","operator":"gte","value":"2022-' . $time1 . '","unit":"","data_type":"DateTime","isAmbiguous":false,"label":"2022-05-01"}]},{"level":2,"index":1,"filters":[{"field":"updatedAt","operator":"lte","value":"2022-' . $time2 . '","unit":"","data_type":"DateTime","isAmbiguous":false,"label":""}]}],"search_area":"TransactionHistory"},"query":"query getTransactionHistory($pageIndex: Int, $pageSize: Int, $sorted: [SortedInput], $filters: [FilterGroup!]!, $search_area: String) {\\n  getTransactionHistory(pageIndex: $pageIndex, pageSize: $pageSize, sorted: $sorted, filters: $filters, search_area: $search_area) {\\n    logs {\\n      id\\n      amount\\n      transaction_type\\n      description\\n      updatedAt\\n      createdAt\\n      approved\\n      invoice_number\\n      is_invoice\\n      objectType\\n    }\\n    pageInfo {\\n      pageIndex\\n      pageSize\\n      total\\n    }\\n  }\\n}\\n"}',
            CURLOPT_HTTPHEADER => array(
                'authority: api.sellerwix.com',
                'accept: */*',
                'accept-language: en-US,en;q=0.9,vi;q=0.8',
                'authorization: ' . $token,
                'content-type: application/json',
                'origin: https://sellerwix.com',
                'referer: https://sellerwix.com/',
                'sec-ch-ua: " Not A;Brand";v="99", "Chromium";v="101", "Google Chrome";v="101"',
                'sec-ch-ua-mobile: ?0',
                'sec-ch-ua-platform: "Windows"',
                'sec-fetch-dest: empty',
                'sec-fetch-mode: cors',
                'sec-fetch-site: same-site',
                'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $transaction = json_decode($response, true);

        return $transaction;

    }
    public function getIDStore($token)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.sellerwix.com/graphql',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"operationName":null,"variables":{"pageIndex":0,"pageSize":100},"query":"query ($pageIndex: Int, $pageSize: Int, $sorted: [SortedInput]) {\\n  stores(pageIndex: $pageIndex, pageSize: $pageSize, sorted: $sorted) {\\n    pageInfo {\\n      total\\n      pageIndex\\n      pageSize\\n    }\\n    stores {\\n      id\\n      name\\n      shop_status\\n      type\\n      expires_access_token\\n      refresh_token_expires_in\\n      domain\\n      is_template\\n      is_connect\\n      auto_get_order\\n      auto_sync_product\\n      auto_fulfill\\n      auto_tracking\\n      auto_update_product\\n      channel {\\n        name\\n        code\\n        is_customize\\n      }\\n      setting_stores {\\n        name\\n        value {\\n          setting_hour\\n          market_place\\n          status\\n          was_paid\\n          was_shipped\\n          send_bcc\\n        }\\n      }\\n      locations {\\n        id\\n        name\\n        is_active\\n        location_channel_id\\n      }\\n    }\\n  }\\n}\\n"}',
            CURLOPT_HTTPHEADER => array(
                'authority: api.sellerwix.com',
                'accept: */*',
                'accept-language: en-US,en;q=0.9,vi;q=0.8',
                'authorization: ' . $token,
                'content-type: application/json',
                'origin: https://sellerwix.com',
                'referer: https://sellerwix.com/',
                'sec-ch-ua: " Not A;Brand";v="99", "Chromium";v="101", "Google Chrome";v="101"',
                'sec-ch-ua-mobile: ?0',
                'sec-ch-ua-platform: "Windows"',
                'sec-fetch-dest: empty',
                'sec-fetch-mode: cors',
                'sec-fetch-site: same-site',
                'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $transaction = json_decode($response, true);

        return $transaction;

    }
}
