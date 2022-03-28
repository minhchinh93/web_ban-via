<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\mocupProduct;
use App\Models\Product;
use App\Models\ProductPngDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class DesignerController extends Controller
{
    //
    public function Dashboard(Request $request)
    {
        $keyword = $request->keyword;
        $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->Where('title', 'like', "%{$keyword}%")->paginate(10);
        $totalPending = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 4)->count();
        $totalDone = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 5)->count();
        $totalNotSeen = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 1)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('action', 2)->where('status', '<>', 5)->count();
        $totalPendingDS = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 3)->count();

        if ($report->total() > 0) {
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
                'totalPendingDS' => $totalPendingDS,
                'name' => $name,
            ]);
    }
    public function complete(Request $request)
    {
        $keyword = $request->keyword;
        $designer = User::get()->where('role', 1);
        $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->Where('title', 'like', "%{$keyword}%")->where('status', 5)->paginate(5);
        $totalDone = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 5)->count();
        $totalPending = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 4)->count();
        $totalNotSeen = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 1)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('action', 2)->where('status', '<>', 5)->count();
        $totalPendingDS = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 3)->count();
        if ($report->total() > 0) {
            foreach ($report as $rep) {
                $userIdeas[] = User::where('id', $rep->id_idea)->get();
            }
            foreach ($userIdeas as $userIdea) {
                $name[] = $userIdea;
            }

        } else {
            $name = "";
        }
        return view('client.dasboa.index',
            ['designers' => $designer,
                'reports' => $report,
                'totalPending' => $totalPending,
                'totalDone' => $totalDone,
                'totalNotSeen' => $totalNotSeen,
                'totalprioritize' => $totalNotReceived,
                'totalPendingDS' => $totalPendingDS,
                'name' => $name,
            ]);
    }
    public function replay(Request $request)
    {
        $keyword = $request->keyword;
        $designer = User::get()->where('role', 1);
        $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->Where('title', 'like', "%{$keyword}%")->where('status', 4)->paginate(5);
        $totalDone = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 5)->count();
        $totalPending = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 4)->count();
        $totalNotSeen = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 1)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('action', 2)->where('status', '<>', 5)->count();
        $totalPendingDS = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 3)->count();
        if ($report->total() > 0) {
            foreach ($report as $rep) {
                $userIdeas[] = User::where('id', $rep->id_idea)->get();
            }
            foreach ($userIdeas as $userIdea) {
                $name[] = $userIdea;
            }

        } else {
            $name = "";
        }
        return view('client.dasboa.index',
            ['designers' => $designer,
                'reports' => $report,
                'totalPending' => $totalPending,
                'totalDone' => $totalDone,
                'totalNotSeen' => $totalNotSeen,
                'totalprioritize' => $totalNotReceived,
                'totalPendingDS' => $totalPendingDS,
                'name' => $name,

            ]);
    }
    public function NotSeen(Request $request)
    {
        $keyword = $request->keyword;
        $designer = User::get()->where('role', 1);
        $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->Where('title', 'like', "%{$keyword}%")->where('status', 1)->paginate(5);
        $totalDone = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 5)->count();
        $totalPending = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 4)->count();
        $totalNotSeen = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 1)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('action', 2)->where('status', '<>', 5)->count();
        $totalPendingDS = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 3)->count();
        if ($report->total() > 0) {
            foreach ($report as $rep) {
                $userIdeas[] = User::where('id', $rep->id_idea)->get();
            }
            foreach ($userIdeas as $userIdea) {
                $name[] = $userIdea;
            }

        } else {
            $name = "";
        }
        return view('client.dasboa.index',
            ['designers' => $designer,
                'reports' => $report,
                'totalPending' => $totalPending,
                'totalDone' => $totalDone,
                'totalNotSeen' => $totalNotSeen,
                'totalprioritize' => $totalNotReceived,
                'totalPendingDS' => $totalPendingDS,
                'name' => $name,
            ]);
    }
    public function prioritize(Request $request)
    {
        $keyword = $request->keyword;
        $designer = User::get()->where('role', 1);
        $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->Where('title', 'like', "%{$keyword}%")->where('action', 2)->where('status', '<>', 5)->paginate(5);
        $totalDone = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 5)->count();
        $totalPending = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 4)->count();
        $totalNotSeen = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 1)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('action', 2)->where('status', '<>', 5)->count();
        $totalPendingDS = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 3)->count();
        if ($report->total() > 0) {
            foreach ($report as $rep) {
                $userIdeas[] = User::where('id', $rep->id_idea)->get();
            }
            foreach ($userIdeas as $userIdea) {
                $name[] = $userIdea;
            }

        } else {
            $name = "";
        }
        return view('client.dasboa.index',
            ['designers' => $designer,
                'reports' => $report,
                'totalPending' => $totalPending,
                'totalDone' => $totalDone,
                'totalNotSeen' => $totalNotSeen,
                'totalprioritize' => $totalNotReceived,
                'totalPendingDS' => $totalPendingDS,
                'name' => $name,
            ]);
    }
    public function PendingDS(Request $request)
    {
        $keyword = $request->keyword;
        $designer = User::get()->where('role', 1);
        $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->Where('title', 'like', "%{$keyword}%")->where('status', 3)->paginate(10);
        $totalDone = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 5)->count();
        $totalPending = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 4)->count();
        $totalNotSeen = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 1)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('action', 2)->where('status', '<>', 5)->count();
        $totalPendingDS = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 3)->count();
        if ($report->total() > 0) {
            foreach ($report as $rep) {
                $userIdeas[] = User::where('id', $rep->id_idea)->get();
            }
            foreach ($userIdeas as $userIdea) {
                $name[] = $userIdea;
            }

        } else {
            $name = "";
        }
        return view('client.dasboa.index',
            ['designers' => $designer,
                'reports' => $report,
                'totalPending' => $totalPending,
                'totalDone' => $totalDone,
                'totalNotSeen' => $totalNotSeen,
                'totalprioritize' => $totalNotReceived,
                'totalPendingDS' => $totalPendingDS,
                'name' => $name,
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
        mocupProduct::where('product_id', $id)->delete();
        foreach ($request->file('mocup') as $mocup) {

            $mocup = [
                'product_id' => $id,
                'mocup' => $mocup->store('images'),
            ];
            mocupProduct::create($mocup);
        }
        ProductPngDetails::where('product_id', $id)->delete();
        foreach ($request->file('ImagePNG') as $image) {
            $dataImage = [
                'product_id' => $id,
                'ImagePngDetail' => $image->store('images'),
            ];

            $datapng = ProductPngDetails::create($dataImage);
            $id = $datapng->id;
            $name = strtoupper(Str::random(4));
            $sku = $name . "-" . $id;

            ProductPngDetails::where('id', $id)->update([
                'Sku' => $sku,
            ]);
        }
        return redirect()->route('Dashboard');
    }
    public function accept($id)
    {
        Product::where('id', $id)->update(['status' => 2]);
        $image = Product::find($id);
        return redirect()->route('Dashboard');
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
    public function deleteProductPngDetails($id)
    {

        ProductPngDetails::where('id', $id)->delete();
        return response()->json(null);

    }
    public function deletemocups($id)
    {

        mocupProduct::where('id', $id)->delete();
        return response()->json(null);

    }
    public function addPngDetails(Request $request, $id)
    {

        // dd($request->file('image'));
        $file = $request->file('image');

        foreach ($file as $image) {
            $str = $image->getClientOriginalName();
            $filename = str_replace(' ', '-', $str);
            $dataImage = [
                'product_id' => $id,
                'ImagePngDetail' => $image->storeas('images', time() . $filename),
            ];
            $datapng = ProductPngDetails::where('id', $id)->create($dataImage);
            $idPNG = $datapng->id;
            $name = strtoupper(Str::random(4));
            $sku = $name . "-" . $idPNG;

            ProductPngDetails::where('id', $idPNG)->update([
                'Sku' => $sku,
            ]);

        }
        Product::where('id', $id)->update(['status' => 3]);
        return redirect()->route('PendingDS');

    }
    public function addmocups(Request $request, $id)
    {
        $file = $request->file('image');

        foreach ($request->file('image') as $image) {
            $str = $image->getClientOriginalName();
            $filename = str_replace(' ', '-', $str);
            $dataImage = [
                'product_id' => $id,
                'mocup' => $image->storeAs('images', time() . $filename),
            ];
            mocupProduct::where('id', $id)->create($dataImage);
        }
        Product::where('id', $id)->update(['status' => 3]);
        return redirect()->route('PendingDS');

    }
    public function deleteMocupAll(Request $request, $id)
    {
        mocupProduct::where('product_id', $id)->delete();
        return redirect()->route('Dashboard');

    }
    public function deletePngAll(Request $request, $id)
    {
        ProductPngDetails::where('product_id', $id)->delete();
        return redirect()->route('Dashboard');

    }
    public function dasboa()
    {
        return view('client.idea.index');
    }
    public function deleteds($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('Dashboard');

    }
}
