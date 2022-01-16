<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductPngDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DesignerController extends Controller
{
    //
    public function Dashboard()
    {
        $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->paginate(5);
        $totalPending = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 4)->count();
        $totalDone = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 5)->count();
        $totalNotSeen = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 1)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('action', 2)->where('status', '<>', 5)->count();
        if ($report) {
            foreach ($report as $rep) {
                $userIdeas[] = User::where('id', $rep->id_idea)->get();
            }
            foreach ($userIdeas as $userIdea) {
                $name[] = $userIdea;
            }

        } else {
            $name = "";
        }
        // dd($name[1][0]->name);
        return view('client.dasboa.index',
            ['reports' => $report,
                'totalPending' => $totalPending,
                'totalDone' => $totalDone,
                'totalNotSeen' => $totalNotSeen,
                'totalprioritize' => $totalNotReceived,
                'name' => $name,
            ]);
    }
    public function complete(Request $request)
    {

        $designer = User::get()->where('role', 1);
        $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 5)->paginate(5);
        $totalDone = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 5)->count();

        return view('client.dasboa.index',
            ['designers' => $designer,
                'reports' => $report,
                'totalDone' => $totalDone,
            ]);
    }
    public function replay(Request $request)
    {
        $designer = User::get()->where('role', 1);
        $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 4)->paginate(5);
        $totalPending = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 4)->count();
        return view('client.dasboa.index',
            ['designers' => $designer,
                'reports' => $report,
                'totalPending' => $totalPending,

            ]);
    }
    public function NotSeen(Request $request)
    {
        $designer = User::get()->where('role', 1);
        $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 1)->paginate(5);
        $totalNotSeen = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 1)->count();
        return view('client.dasboa.index',
            ['designers' => $designer,
                'reports' => $report,
                'totalNotSeen' => $totalNotSeen,
            ]);
    }
    public function prioritize(Request $request)
    {

        $designer = User::get()->where('role', 1);
        $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('action', 2)->where('status', '<>', 5)->paginate(5);
        $totalNotReceived = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('action', 2)->where('status', '<>', 5)->count();
        return view('client.dasboa.index',
            ['designers' => $designer,
                'reports' => $report,
                'totalprioritize' => $totalNotReceived,
            ]);
    }
    public function Detail($id)
    {
        // dd($id);
        $ids = Product::find($id);
        return view('client.dasboa.Detail', ['id' => $ids]);
    }
    public function acceptDetail(Request $request, $id)
    {
        // dd($request->all());
        $image = "";
        if ($request->ImagePNG) {
            $image = $request->file('ImagePNG')[0];
        } else {
            $image = Product::find($id)->ImagePNG;
        }
        $approval = $request->approval;
        $ids = Product::find($id);
        $description = $ids->description;
        $name = $ids->user->name;
        Product::where('id', $id)->update([
            'ImagePNG' => $image->store('images'),
            'status' => 3,
            'description' => $description . "</br> <b style= 'color:blue'>" . $name . "</b>:" . $approval,
        ]);

        foreach ($request->file('ImagePNG') as $image) {
            $dataImage = [
                'product_id' => $id,
                'ImagePngDetail' => $image->store('images'),
            ];
            ProductPngDetails::create($dataImage);
        }
        return redirect()->route('Dashboard');
    }
    public function accept($id)
    {
        Product::where('id', $id)->update(['status' => 2]);
        $image = Product::find($id);
        return Redirect::to('/storage/' . $image->image);
    }
    public function componentDesigner(Request $request, $id)
    {
        $approval = $request->comment;
        $ids = Product::find($id);
        $description = $ids->description;
        $name = $ids->user->name;
        Product::find($id)->update(['description' => $description . "</br> <b style= 'color:blue'>" . $name . "</b>:" . $approval,
        ]);
        return redirect()->route('Dashboard');

    }
}
