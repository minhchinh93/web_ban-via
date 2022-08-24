<?php

namespace App\Http\Controllers\S3;

use App\Http\Controllers\Controller;
use App\Models\mocupProduct;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\ProductPngDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class s3Controller extends Controller
{
    //D:\laragon\www\hệt hông test\public\storage\images\0d2t3q0fsvOdLA6yVr6xjsBj2xeUlTTcuybyZxZk.jpg

    public function shows3()
    {
        return view('client.layout.showimage  ');
    }
    public function postUpload(Request $request)
    {

        //

        // $path = Storage::disk('s3')->put('images/originals', $request->file, 'public');
        $path = Storage::disk('s3')->put('images', $request->file('image'));

        $request->merge([
            'product_id' => 1,
            'ImageDetail' => $path,
        ]);
        ProductDetails::create($request->only('ImageDetail', 'product_id'));
        // $this->image->create($request->only('path', 'title', 'size'));
        if (Storage::exists('$images\0d2t3q0fsvOdLA6yVr6xjsBj2xeUlTTcuybyZxZk.jpg') == 1) {
            return '<th><img src="https://hblmedia.s3.ap-southeast-1.amazonaws.com/images\0d2t3q0fsvOdLA6yVr6xjsBj2xeUlTTcuybyZxZk.jpg"></th>';
        }
        return '<th><img src="http://127.0.0.1:8000/storage/images\0d2t3q0fsvOdLA6yVr6xjsBj2xeUlTTcuybyZxZk.jpg"></th>';
    }

    public function addImage(Request $request, $id)
    {

        foreach ($request->file('image') as $image) {
            $dataImage = [
                'product_id' => $id,
                'ImageDetail' => Storage::disk('s3')->put('images', $image),
            ];
            ProductDetails::where('id', $id)->create($dataImage);
        }
        return redirect()->back();

    }

    public function addPngDetailsIdea(Request $request, $id)
    {

        // dd($request->file('image'));
        $file = $request->file('image');

        foreach ($file as $image) {
            $str = $image->getClientOriginalName();
            $filename = str_replace(' ', '-', $str);
            $dataImage = [
                'product_id' => $id,
                'ImagePngDetail' => Storage::disk('s3')->put('images', $image),
            ];
            $datapng = ProductPngDetails::where('id', $id)->create($dataImage);
            $idPNG = $datapng->id;
            $name = strtoupper(Str::random(4));
            $sku = $name . "-" . $idPNG;

            ProductPngDetails::where('id', $idPNG)->update([
                'Sku' => $sku,
            ]);
        }
        Product::where('id', $id)->update(['status' => 5]);
        return redirect()->back();

    }
    public function deleteImage($id)
    {
        $imageName = ProductDetails::find($id)->ImageDetail; // this returns the file name stored in the DB
        Storage::disk('s3')->delete($imageName);
        ProductDetails::where('id', $id)->delete();
        return response()->json(null);

    }
    // làm lại
    public function delete($id)
    {
        $ProductPngDetails = ProductPngDetails::where('product_id', $id)->get();
        foreach ($ProductPngDetails as $imageName) {
            $image = $imageName->ImagePngDetail;
            Storage::disk('s3')->delete($image);
        }
        $mocupProduct = mocupProduct::where('product_id', $id)->get();
        foreach ($mocupProduct as $imageName) {
            $image = $imageName->mocup;
            Storage::disk('s3')->delete($image);
        }
        Product::where('id', $id)->delete();
        return redirect()->back();

    }
    public function Edit(Request $request, $id)
    {
        if ($request->size != "") {
            $size = $request->size;
        } else {
            $size = null;
        }
        $images = "";
        if ($request->image) {
            $images = $request->file('image');
            $data = [
                'id_type' => $request->type_id,
                'User_id' => $request->User_id,
                'id_idea' => Auth::user()->id,
                'image' => Storage::disk('s3')->put('images', $request->file('image')[0]),
                'title' => $request->title,
                'size_id' => $size,
                'description' => $request->description,
            ];
            Product::where('id', $id)->update($data);
            ProductDetails::where('product_id', $id)->delete();
            foreach ($request->file('image') as $image) {
                $dataImage = [
                    'product_id' => $id,
                    'ImageDetail' => Storage::disk('s3')->put('images', $image),
                ];
                ProductDetails::create($dataImage);
            }
        } else {
            $data = [
                'id_type' => $request->type_id,
                'User_id' => $request->User_id,
                'id_idea' => Auth::user()->id,
                // 'image' => $request->file('image')[0]->store('images'),
                'title' => $request->title,
                'size_id' => $size,
                'description' => $request->description,
            ];
            Product::where('id', $id)->update($data);
        }
        return redirect()->back();
    }
    public function addIdea(Request $request)
    {

        if ($request->size != "") {
            $size = $request->size;
        } else {
            $size = null;
        }
        $images = "";
        if ($request->image) {
            $images = $request->file('image');
            // if ($request->type_id == "chon") {
            //     dd('ok');
            //     $id_type = 0;
            // }
            // $id_type = $request->type_id;
            $data = [
                'id_type' => $request->type_id,
                'User_id' => $request->User_id,
                'id_idea' => Auth::user()->id,
                'size_id' => $size,
                'image' => Storage::disk('s3')->put('images', $images[0]),
                'description' => $request->description,
                'title' => $request->title,
            ];
            // dd($request->id);
            $productDtail = Product::create($data);
            // $id = $productDtail->id;
            // $names = $productDtail->type_product->name;
            // $name = substr($names, 0, 3);
            // $sku = $name . $id;
            // product::where('id', $id)->update([
            //     'Sku' => $sku,
            // ]);
            foreach ($request->file('image') as $image) {
                $dataImage = [
                    'product_id' => $productDtail->id,
                    'ImageDetail' => $image->store('images'),
                ];
                ProductDetails::create($dataImage);
            }
        } else {
            $data = [
                'id_type' => $request->type_id,
                'User_id' => $request->User_id,
                'id_idea' => Auth::user()->id,
                'size_id' => $size,
                // 'image' => $images[0]->store('images'),
                'description' => $request->description,
                'title' => $request->title,

            ];

            $productDtail = Product::create($data);
            // $id = $productDtail->id;
            // $names = $productDtail->type_product->name;
            // $name = substr($names, 0, 3);
            // $sku = $name . $id;
            // product::where('id', $id)->update([
            //     'Sku' => $sku,
            // ]);
        }

        return redirect()->back();
    }
}
