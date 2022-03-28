<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Oder_detail;
use App\Models\ProductPngDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class csvController extends Controller
{
    //
    public function importCsv()
    {
        $show = ProductPngDetails::join('products', 'product_png_details.product_id', '=', 'products.id')
        // INNER JOIN users ON products.id_idea = users.id
            ->join('users', 'products.id_idea', '=', 'users.id')
            ->join('Oder_details', 'Oder_details.oder_sku', '=', 'product_png_details.Sku')
            ->select(DB::raw('
            users.name as "name",
            products.title as "title",
            product_png_details.ImagePngDetail as "ImagePngDetail",
            Oder_details.Number_Items as "Number_Items",
            Oder_details.Order_Total as "Order_Total",
            Oder_details.Sale_Date as "Sale_Date"

            '
            ))
        // ->groupBy('')
        // ->Where('product_png_details.Sku', 'like', "%{$keyword}%")
        // ->orWhere('title', 'like', "%{$keyword}%")
            ->paginate(33);

        return view('client.checkOder.indexOder', ['shows' => $show]);
    }
    public function postCsv(Request $request)
    {

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        $location = 'uploads';
        $file->move($location, $filename);
        $filepath = public_path($location . "/" . $filename);
        // Reading file
        $file = fopen($filepath, "r");

        $filedata = fgetcsv($file, 1000, ',');

        $importData_arr = [];
        $i = 0;

        while (($filedata = fgetcsv($file, 1000, ",")) !== false) {
            $num = count($filedata);
            for ($c = 0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata[$c];
            }
            $i++;
        }
        fclose($file);

        foreach ($importData_arr as $importData) {
            $insertData = [
                "Number-Items" => $importData[6],
                "Sale_Date" => $importData[0],
                "Order_Total" => $importData[23],
                "Date_Shipped" => $importData[8],
                "oder_sku" => $importData[35],
            ];
            Oder_detail::create($insertData);
        }
        return redirect()->back();
    }
}
