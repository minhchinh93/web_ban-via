<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\type_product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    //

    public function home(Request $request)
    {

        $designer = User::get()->where('role', 1);
        $type_product = type_product::get();
        // dd($type_product[1]);
        $report = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->paginate(5);
        // dd($report[0]->type_product);
        $totalDone = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 5)->count();
        $totalPending = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 3)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 1)->count();
        return view('client.layout.home',
            ['designers' => $designer,
                'reports' => $report,
                'totalDone' => $totalDone,
                'totalPending' => $totalPending,
                'totalNotReceived' => $totalNotReceived,
                'type_products' => $type_product,
            ]);
    }
    public function done(Request $request)
    {
        $type_product = type_product::get();
        $designer = User::get()->where('role', 1);
        $report = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 5)->paginate(5);
        $totalDone = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 5)->count();
        return view('client.layout.home',
            ['designers' => $designer,
                'reports' => $report,
                'totalDone' => $totalDone,
                'type_products' => $type_product,
            ]);
    }
    public function Pending(Request $request)
    {
        $type_product = type_product::get();
        $designer = User::get()->where('role', 1);
        $report = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 3)->paginate(5);
        $totalPending = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 3)->count();
        return view('client.layout.home',
            ['designers' => $designer,
                'reports' => $report,
                'totalPending' => $totalPending,
                'type_products' => $type_product,
            ]);
    }
    public function NotReceived(Request $request)
    {
        $type_product = type_product::get();
        $designer = User::get()->where('role', 1);
        $report = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 1)->paginate(5);
        $totalNotReceived = Product::orderBy('id', 'desc')->where('id_idea', Auth::user()->id)->where('status', 1)->count();
        return view('client.layout.home',
            ['designers' => $designer,
                'reports' => $report,
                'totalNotReceived' => $totalNotReceived,
                'type_products' => $type_product,
            ]);
    }

    public function addIdea(Request $request)
    {
        $data = [
            'id_type' => $request->type_id,
            'User_id' => $request->User_id,
            'id_idea' => Auth::user()->id,
            'image' => $request->file('image')[0]->store('images'),
            'description' => $request->description,
            'title' => $request->title,
        ];
        $productDtail = Product::create($data);
        foreach ($request->file('image') as $image) {
            $dataImage = [
                'product_id' => $productDtail->id,
                'ImageDetail' => $image->store('images'),
            ];
            ProductDetails::create($dataImage);
        }
        return redirect()->route('home');
    }
    public function success($id)
    {
        Product::where('id', $id)->update(['status' => 5]);
        return redirect()->route('home');

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
        return redirect()->route('home');

    }
    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('home');

    }
    public function important($id)
    {
        Product::where('id', $id)->update(['action' => 2]);
        return redirect()->route('home');

    }
    public function showimage(Request $request)
    {
        dd($request->id);
        return redirect()->route('home');

    }
    public function EditShow($id)
    {
        $type_product = type_product::get();
        $designer = User::get()->where('role', 1);
        $show = Product::find($id);
        return view('client.dasboa.edit',
            [
                'type_products' => $type_product,
                'designers' => $designer,
                'show' => $show,
            ]);

    }
    public function Edit(Request $request, $id)
    {
        // dd($request->all());

        $data = [
            'id_type' => $request->type_id,
            'User_id' => $request->User_id,
            'id_idea' => Auth::user()->id,
            // 'image' => $request->file('image')[0]->store('images'),
            'description' => $request->description,
        ];
        Product::where('id', $id)->update($data);
        // foreach ($request->file('image') as $image) {
        //     $dataImage = [
        //         'product_id' => $id,
        //         'ImageDetail' => $image->store('images'),
        //     ];
        //     ProductDetails::where('product_id', $id)->update($dataImage);
        // }
        return redirect()->route('home');
    }
    public function comment(Request $request, $id)
    {
        $approval = $request->comment;
        $ids = Product::find($id);
        $description = $ids->description;
        $idr = $ids->id_idea;
        $name = User::find($idr)->name;
        Product::where('id', $id)->update(['description' => $description . "</br> <b style= 'color:black'> " . $name . "</b>:" . $approval]);
        return redirect()->route('home');

    }
}
