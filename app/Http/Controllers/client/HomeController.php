<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\cornerstone;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\size;
use App\Models\type_product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    //
    public function home(Request $request)
    {
        Carbon::setLocale('vi');
        $designer = User::get()->where('role', 1);
        $type_product = type_product::get();
        $size = size::get();
        $keyword = $request->keyword;
        $showcornerstone = cornerstone::all();
        if ($request->type != null) {
            $report = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)
                ->Where('status', '<>', "5")
                ->Where('id_type', 'like', "%{$request->type}%")
                ->Where('title', 'like', "%{$keyword}%")
                ->paginate(10000);
        } else {
            $report = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)
                ->Where('status', '<>', "5")
                ->Where('title', 'like', "%{$keyword}%")
                ->paginate(10);
        }

        if ($report->total() != 0) {
            foreach ($report as $billdd) {
                $dt[] = Carbon::create($billdd->created_at);
            }

            foreach ($dt as $key) {
                $now = Carbon::now();
                $time[] = $key->diffForHumans($now);
            }
        } else {
            $time = '';

        }

        // $showList = $report->cornerstones;

        // dd(count($report[0]->mocups));

        $totalDone = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 5)->count();
        $totalPending = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 3)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 1)->count();
        $totalallidea = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->count();
        return view('client.layout.home',
            ['designers' => $designer,
                'reports' => $report,
                'totalDone' => $totalDone,
                'totalPending' => $totalPending,
                'totalNotReceived' => $totalNotReceived,
                'type_products' => $type_product,
                'totalallidea' => $totalallidea,
                'times' => $time,
                'sizes' => $size,
                'showcornerstones' => $showcornerstone,
            ]);
    }
    public function allidea(Request $request)
    {
        Carbon::setLocale('vi');
        $designer = User::get()->where('role', 1);
        $type_product = type_product::get();
        $size = size::get();
        $keyword = $request->keyword;
        // // dd($size[1]);
        // $report = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)
        //     ->Where('title', 'like', "%{$keyword}%")
        //     ->Where('id_type', 'like', "%{$request->type}%")
        // // ->orWhere('updated_at', 'like', "%{$keyword}%")
        //     ->paginate(10);
        if ($request->type != null) {
            $report = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)
                ->Where('id_type', 'like', "%{$request->type}%")
                ->Where('title', 'like', "%{$keyword}%")
                ->paginate(10000);
        } else {
            $report = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)
                ->Where('title', 'like', "%{$keyword}%")
                ->paginate(10);
        }
        if ($report->total() != 0) {
            foreach ($report as $billdd) {
                $dt[] = Carbon::create($billdd->created_at);
            }

            foreach ($dt as $key) {
                $now = Carbon::now();
                $time[] = $key->diffForHumans($now);
            }
        } else {
            $time = '';

        }
        // dd($report[0]->mocups);
        // dd(count($report[0]->mocups));
        $showcornerstone = cornerstone::all();
        $totalDone = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 5)->count();
        $totalPending = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 3)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 1)->count();
        $totalallidea = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->count();
        return view('client.layout.home',
            ['designers' => $designer,
                'reports' => $report,
                'totalDone' => $totalDone,
                'totalPending' => $totalPending,
                'totalallidea' => $totalallidea,
                'totalNotReceived' => $totalNotReceived,
                'type_products' => $type_product,
                'times' => $time,
                'sizes' => $size,
                'showcornerstones' => $showcornerstone,

            ]);
    }
    // public function find(Request $request)
    // {
    //     // dd($request->type);
    //     Carbon::setLocale('vi');
    //     $designer = User::get()->where('role', 1);
    //     $type_product = type_product::get();
    //     $size = size::get();
    //     $keyword = $request->keyword;
    //     // dd($size[1]);
    //     $report = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)
    //         ->Where('title', 'like', "%{$keyword}%")
    //         ->Where('id_type', $request->type)
    //         ->paginate(3);
    //     // dd($report);
    //     if ($report->total() != 0) {
    //         foreach ($report as $billdd) {
    //             $dt[] = Carbon::create($billdd->created_at);
    //         }

    //         foreach ($dt as $key) {
    //             $now = Carbon::now();
    //             $time[] = $key->diffForHumans($now);
    //         }
    //     } else {
    //         $time = '';
    //     }
    //     $showcornerstone = cornerstone::all();
    //     $totalDone = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 5)->count();
    //     $totalPending = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 3)->count();
    //     $totalNotReceived = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 1)->count();
    //     return view('client.layout.home',
    //         ['designers' => $designer,
    //             'reports' => $report,
    //             'totalDone' => $totalDone,
    //             'totalPending' => $totalPending,
    //             'totalNotReceived' => $totalNotReceived,
    //             'type_products' => $type_product,
    //             'times' => $time,
    //             'sizes' => $size,
    //             'showcornerstones' => $showcornerstone,

    //         ]);
    // }
    public function done(Request $request)
    {
        // dd($request->type);
        Carbon::setLocale('vi');
        $designer = User::get()->where('role', 1);
        $type_product = type_product::get();
        $size = size::get();
        $keyword = $request->keyword;
        $showcornerstone = cornerstone::all();
        $report = Product::orderBy('updated_at', 'desc')->Where('title', 'like', "%{$keyword}%")
            ->where('id_idea', Auth::user()->id)->where('status', 5)->paginate(10);
        // dd($report);

        if ($request->type != null) {
            $report = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)
                ->where('status', 5)
                ->Where('id_type', 'like', "%{$request->type}%")
                ->Where('title', 'like', "%{$keyword}%")
                ->paginate(10000);
        } else {
            $report = Product::orderBy('updated_at', 'desc')->Where('title', 'like', "%{$keyword}%")
                ->where('id_idea', Auth::user()->id)
                ->where('status', 5)
                ->paginate(10);
        }
        if ($report->total() != 0) {
            foreach ($report as $billdd) {
                $dt[] = Carbon::create($billdd->updated_at);
            }

            foreach ($dt as $key) {
                $now = Carbon::now();
                $time[] = $key->diffForHumans($now);
            }
        } else {
            $time = '';
        }
        $designer = User::get()->where('role', 1);
        $totalDone = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 5)->count();
        $totalPending = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 3)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 1)->count();
        $totalallidea = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->count();
        return view('client.layout.home',
            ['designers' => $designer,
                'reports' => $report,
                'totalDone' => $totalDone,
                'totalallidea' => $totalallidea,
                'totalPending' => $totalPending,
                'totalNotReceived' => $totalNotReceived,
                'type_products' => $type_product,
                'sizes' => $size,
                'times' => $time,
                'showcornerstones' => $showcornerstone,

            ]);
    }

    public function Pending(Request $request)
    {
        $showcornerstone = cornerstone::all();
        $keyword = $request->keyword;
        $size = size::get();
        $type_product = type_product::get();
        $designer = User::get()->where('role', 1);
        $report = Product::orderBy('id', 'desc')->Where('title', 'like', "%{$keyword}%")
            ->where('id_idea', Auth::user()->id)->where('status', 3)->paginate(5);
        $totalPending = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 3)->count();
        return view('client.layout.home',
            ['designers' => $designer,
                'reports' => $report,
                'totalPending' => $totalPending,
                'type_products' => $type_product,
                'sizes' => $size,
                'showcornerstones' => $showcornerstone,

            ]);
    }
    public function NotReceived(Request $request)
    {
        $keyword = $request->keyword;
        $showcornerstone = cornerstone::all();
        $size = size::get();
        $type_product = type_product::get();
        $designer = User::get()->where('role', 1);
        $report = Product::orderBy('id', 'desc')->Where('title', 'like', "%{$keyword}%")
            ->where('id_idea', Auth::user()->id)->where('status', 1)->paginate(5);
        $totalNotReceived = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 1)->count();
        return view('client.layout.home',
            ['designers' => $designer,
                'reports' => $report,
                'totalNotReceived' => $totalNotReceived,
                'type_products' => $type_product,
                'sizes' => $size,
                'showcornerstones' => $showcornerstone,

            ]);
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
                'image' => $images[0]->store('images'),
                'description' => $request->description,
                'title' => $request->title,
            ];
            // dd($request->id);
            $productDtail = Product::create($data);
            $id = $productDtail->id;
            $names = $productDtail->type_product->name;
            $name = substr($names, 0, 3);
            $sku = $name . $id;
            product::where('id', $id)->update([
                'Sku' => $sku,
            ]);
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
            $id = $productDtail->id;
            $names = $productDtail->type_product->name;
            $name = substr($names, 0, 3);
            $sku = $name . $id;
            product::where('id', $id)->update([
                'Sku' => $sku,
            ]);
        }

        return redirect()->back();
    }
    public function success($id)
    {
        Product::where('id', $id)->update(['status' => 5]);
        return redirect()->route('done');

    }
    public function approvalShow($id)
    {

        $ids = Product::find($id);
        return view('client.dasboa.approval', ['id' => $ids]);

    }
    public function approval(Request $request, $id)
    {
        $approval = $request->approval;
        $ids = Product::find($id);
        $description = $ids->description;
        $idr = $ids->id_idea;
        $name = User::find($idr)->name;
        Product::where('id', $id)->update(['description' => $description . "</br> <b style= 'color:black'> " . $name . "</b>:" . $approval, 'status' => 4]);
        return redirect()->back();

    }
    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->back();

    }
    public function important($id)
    {
        Product::where('id', $id)->update(['action' => 2]);
        return redirect()->back();

    }
    public function showimage(Request $request)
    {
        dd($request->id);
        return redirect()->back();

    }
    public function EditShow($id)
    {
        $type_product = type_product::get();
        $designer = User::get()->where('role', 1);
        $show = Product::find($id);
        $size = size::get();

        return view('client.dasboa.edit',
            [
                'type_products' => $type_product,
                'designers' => $designer,
                'show' => $show,
                'sizes' => $size,
            ]);

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
                'image' => $request->file('image')[0]->store('images'),
                'title' => $request->title,
                'size_id' => $size,
                'description' => $request->description,
            ];
            Product::where('id', $id)->update($data);
            ProductDetails::where('product_id', $id)->delete();
            foreach ($request->file('image') as $image) {
                $dataImage = [
                    'product_id' => $id,
                    'ImageDetail' => $image->store('images'),
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
    public function comment(Request $request, $id)
    {
        $approval = $request->comment;
        $ids = Product::find($id);
        $description = $ids->description;
        $idr = $ids->id_idea;
        $name = User::find($idr)->name;
        Product::where('id', $id)->update(['description' => $description . "</br> <b style= 'color:black'> " . $name . "</b>:" . $approval]);
        return redirect()->back();

    }

    public function ajax($id)
    {
        $sizes = size::where('id_types', $id)->get();
        // dd($sizes);
        foreach ($sizes as $size) {
            echo "<option value='" . $size->id . "'>" . $size->name . "</option>";

        }

    }
    public function EditShowajax($id)
    {
        $sizes = size::where('id_types', $id)->get();
        // dd($sizes);
        foreach ($sizes as $size) {
            echo "<option value='" . $size->id . "'>" . $size->name . "</option>";

        }

    }

    public function deleteImage($id)
    {

        ProductDetails::where('id', $id)->delete();
        return response()->json(null);

    }
    public function addImage(Request $request, $id)
    {

        foreach ($request->file('image') as $image) {
            $dataImage = [
                'product_id' => $id,
                'ImageDetail' => $image->store('images'),
            ];
            ProductDetails::where('id', $id)->create($dataImage);
        }
        return redirect()->back();

    }

    public function dasboa()
    {
        if (Auth::check()) {
            return view('client.idea.index');
        } else {
            return redirect()->route('login');
        }
    }
}
