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
            CURLOPT_POSTFIELDS => '{"email":"haihotan290@gmail.com","password":"Haiholong290@@#!"}',
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
    // public static function get_dataStore($token, $store_id, $time1, $time2)
    // {

    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://api.sellerwix.com/graphql',
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_POSTFIELDS => '{"operationName":"MainQuery","variables":{"pageIndex":0,"pageSize":1000,"filters":[{"level":2,"index":0,"filters":[{"field":"Order.store_id","operator":"in","value":"' . $store_id . '","data_type":"FindLookup","isAmbiguous":false,"unit":null,"label":"SPYRAMID,PursueZX"}]},{"level":2,"index":1,"filters":[{"field":"Order.purchase_date","operator":"gte","value":"' . $time1 . '","unit":null,"data_type":"DateTime","isAmbiguous":false,"label":"' . $time1 . '"}]},{"level":2,"index":2,"filters":[{"field":"Order.purchase_date","operator":"lte","value":"' . $time2 . '","unit":null,"data_type":"DateTime","isAmbiguous":false,"label":"' . $time1 . '"}]}],"search_area":"Order"},"query":"query MainQuery($pageIndex: Int, $pageSize: Int, $store_id: String, $filters: [FilterGroup], $search_area: String, $sorted: [SortedInput]) {\\n  getPaginationOrders(pageIndex: $pageIndex, pageSize: $pageSize, store_id: $store_id, filters: $filters, search_area: $search_area, sorted: $sorted) {\\n    pageInfo {\\n      total\\n      pageIndex\\n      pageSize\\n    }\\n    orders {\\n      id\\n      is_request_review\\n      is_skip_request_review\\n      name\\n      total_price_amount\\n      currency_code\\n      shipping_name\\n      shipping_address1\\n      shipping_address2\\n      shipping_city\\n      shipping_state\\n      shiping_method\\n      shipping_phone\\n      order_status\\n      shipping_zip\\n      shipping_country_code\\n      order_from\\n      purchase_date\\n      system_order_status\\n      store_id\\n      is_clone\\n      createdAt\\n      latest_ship_date\\n      gift_message\\n      store {\\n        name\\n        type\\n        is_connect\\n      }\\n      ext\\n      note\\n      updatedAt\\n      tracking_url\\n      tracking_status\\n      tracking_id\\n      order_supplier {\\n        id\\n        order_id\\n        tax\\n        supplier {\\n          id\\n          code\\n          name\\n        }\\n        is_new_track\\n        order_items {\\n          availability\\n        }\\n        total_price\\n        shipping_price\\n        discount_price\\n        supplier_status\\n        supplier_message\\n        tracking_id\\n        tracking_url\\n        carrier_code\\n        carrier_name\\n        fulfill_status\\n        fulfill_message\\n        supplier_channel_id\\n        submit_date\\n        createdAt\\n        updatedAt\\n        method_fulfill\\n        gift_fee\\n      }\\n      submit_date\\n      price_supplier\\n      order_item_channel {\\n        id\\n      }\\n      order_items {\\n        id\\n        parent_id\\n        item_supplier {\\n          id\\n          supplier_selected\\n        }\\n        is_custom_product_supplier\\n        order_supplier {\\n          supplier_status\\n        }\\n      }\\n    }\\n  }\\n}\\n"}',
    //         CURLOPT_HTTPHEADER => array(
    //             'authority: api.sellerwix.com',
    //             'accept: */*',
    //             'accept-language: en-US,en;q=0.9,vi;q=0.8',
    //             'authorization: ' . $token,
    //             'content-type: application/json',
    //             'origin: https://sellerwix.com',
    //             'referer: https://sellerwix.com/',
    //             'sec-ch-ua: "Not?A_Brand";v="8", "Chromium";v="108", "Google Chrome";v="108"',
    //             'sec-ch-ua-mobile: ?0',
    //             'sec-ch-ua-platform: "Windows"',
    //             'sec-fetch-dest: empty',
    //             'sec-fetch-mode: cors',
    //             'sec-fetch-site: same-site',
    //             'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
    //         ),
    //     ));

    //     $response = curl_exec($curl);

    //     curl_close($curl);

    //     $array_selerwix = json_decode($response, true);

    //     return $array_selerwix;

    // }
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
            CURLOPT_POSTFIELDS => '{"operationName":"MainQuery","variables":{"pageIndex":0,"pageSize":10000,"filters":[{"level":2,"index":0,"filters":[{"field":"Order.store_id","operator":"in","value":"' . $store_id . '","unit":null,"data_type":"FindLookup","isAmbiguous":false,"label":"HBL Store"}]},{"level":2,"index":1,"filters":[{"field":"Order.purchase_date","operator":"gte","value":"2023-' . $time1 . '","unit":null,"data_type":"DateTime","isAmbiguous":false,"label":"2023-' . $time1 . '"}]},{"level":2,"index":2,"filters":[{"field":"Order.purchase_date","operator":"lte","value":"2023-' . $time2 . '","unit":null,"data_type":"DateTime","isAmbiguous":false,"label":"2023-' . $time2 . '"}]}],"search_area":"Order"},"query":"query MainQuery($pageIndex: Int, $pageSize: Int, $store_id: String, $filters: [FilterGroup], $search_area: String, $sorted: [SortedInput]) {\\n  getPaginationOrders(pageIndex: $pageIndex, pageSize: $pageSize, store_id: $store_id, filters: $filters, search_area: $search_area, sorted: $sorted) {\\n    pageInfo {\\n      total\\n      pageIndex\\n      pageSize\\n    }\\n    orders {\\n      id\\n      is_request_review\\n      is_skip_request_review\\n      name\\n      total_price_amount\\n      currency_code\\n      shipping_name\\n      shipping_address1\\n      shipping_address2\\n      shipping_city\\n      shipping_state\\n      shiping_method\\n      shipping_phone\\n      order_status\\n      shipping_zip\\n      shipping_country_code\\n      order_from\\n      purchase_date\\n      system_order_status\\n      store_id\\n      is_clone\\n      createdAt\\n      latest_ship_date\\n      gift_message\\n      store {\\n        name\\n        type\\n        is_connect\\n      }\\n      ext\\n      note\\n      updatedAt\\n      tracking_url\\n      tracking_status\\n      tracking_id\\n      order_supplier {\\n        id\\n        order_id\\n        tax\\n        supplier {\\n          id\\n          code\\n          name\\n        }\\n        status_from_supplier\\n        is_new_track\\n        order_items {\\n          availability\\n        }\\n        total_price\\n        shipping_price\\n        discount_price\\n        supplier_status\\n        supplier_message\\n        tracking_id\\n        tracking_url\\n        carrier_code\\n        carrier_name\\n        fulfill_status\\n        fulfill_message\\n        supplier_channel_id\\n        submit_date\\n        createdAt\\n        updatedAt\\n        method_fulfill\\n        gift_fee\\n      }\\n      submit_date\\n      price_supplier\\n      order_item_channel {\\n        id\\n      }\\n      order_items {\\n        id\\n        parent_id\\n        item_supplier {\\n          id\\n          supplier_selected\\n        }\\n        is_custom_product_supplier\\n        order_supplier {\\n          supplier_status\\n        }\\n      }\\n    }\\n  }\\n}\\n"}',
            CURLOPT_HTTPHEADER => array(
                'authority: api.sellerwix.com',
                'accept: */*',
                'accept-language: en-US,en;q=0.9,vi;q=0.8',
                'authorization: ' . $token,
                'content-type: application/json',
                'origin: https://app.sellerwix.com',
                'referer: https://app.sellerwix.com/',
                'sec-ch-ua: "Chromium";v="112", "Google Chrome";v="112", "Not:A-Brand";v="99"',
                'sec-ch-ua-mobile: ?0',
                'sec-ch-ua-platform: "Windows"',
                'sec-fetch-dest: empty',
                'sec-fetch-mode: cors',
                'sec-fetch-site: same-site',
                'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $tracking_id = json_decode($response, true);
        // if ($tracking_id['tracking_id'] != null) {
        //     dd($tracking_id['tracking_id']);
        //     if ($tracking_id['trackDetails'][0]['errorCode'] != '504') {
        //         $progressBarType = $tracking_id['trackDetails'][0]['progressBarType'];
        //     } else {
        //         $progressBarType = 'tracking khac';
        //     }
        // } else {
        //     $progressBarType = 'n0 fullfill';
        // }
        // dd($tracking_id);
        return $tracking_id;
    }
    public function gettrackDhl($id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.dhlecs.com/webtrack/v4/tracking',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"trackedValue":"' . $id . '","offset":0,"locale":"en-US","googleRecaptchaResponse":"03AEkXODCIYe1-8rI1ZQKe5AAU8fWT4zqHVNYRBsRd04PdAXvaJE15ZwVJ3nwvJCUO34r3yECbLshrHCszPtf_8eUbLbj4K5BkEvs5IcDQ5P4rG6q8cQgUPsb1tZku2vDb-r5ynlUNqd3sE01mtJ8mAPBELmtErbR8-BFGOz-QE2ZGi7zhH7cHegRynBP61K4Zl7AX5A-cGetBOuIAm6YAPcRZtCszEFtkkvfX6Z7KSPRzEZqJI1wv6wjqlfjNrhnAyCFjjR61CwBq4LIF0X81gAUs30pIvRtgZp-iQAHni7xmZqOIIlE799QSadvFVPvflk_Z_H57GXOmcjQp6yrKm0huMEYjRAzjELPsbi8dCmVyl5xn7xNvEJ_Qj7uTYm7zDZPTZftbtQ7XZ13lM1c2jvWeNH2EAkR6u-xJykoQMeryo3YfzUDPJ1fJOxVjPT3xGQCTnhj5oHjkkNMXjfO2YQFNCnQqWuVQ7hOzO4NJx5CoJl0N3UNgMg18P_aLZGcH6xjRlB18sn5HWoGvst2NTaqXdYJvKKjBrg"}',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Accept-Language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
                'Connection: keep-alive',
                'Content-Type: application/json',
                'Origin: https://webtrack.dhlglobalmail.com',
                'Referer: https://webtrack.dhlglobalmail.com/',
                'Sec-Fetch-Dest: empty',
                'Sec-Fetch-Mode: cors',
                'Sec-Fetch-Site: cross-site',
                'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
                'sec-ch-ua: "Google Chrome";v="107", "Chromium";v="107", "Not=A?Brand";v="24"',
                'sec-ch-ua-mobile: ?0',
                'sec-ch-ua-platform: "Windows"',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $tracking_id = json_decode($response, true);
        if ($tracking_id['total'] == 1) {
            if ($tracking_id['packages'] != '') {
                $progressBarType = $tracking_id['packages'][0]['status'];
            } else {
                $progressBarType = 'tracking khac';
            }
        } else {
            $progressBarType = 'n0 fullfill';
        }
        return $progressBarType;
    }
}
