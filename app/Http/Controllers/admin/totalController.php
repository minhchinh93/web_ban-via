<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\size;
use App\Models\type_product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class totalController extends Controller
{
    //
    public function totalDesigner()
    {
        Carbon::setLocale('vi');
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $time = $dt->toDateString();
        $report = Product::orderBy('updated_at', 'desc')->where('updated_at', 'LIKE', '%' . $time . '%')->paginate(20);
        $totalPending = Product::orderBy('id', 'desc')->where('updated_at', 'LIKE', '%' . $time . '%')->where('status', 4)->count();
        $totalDone = Product::orderBy('id', 'desc')->where('updated_at', 'LIKE', '%' . $time . '%')->where('status', 5)->count();
        $totalNotSeen = Product::orderBy('id', 'desc')->where('updated_at', 'LIKE', '%' . $time . '%')->where('status', 1)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('updated_at', 'LIKE', '%' . $time . '%')->where('action', 2)->where('status', '<>', 5)->count();
        $totalPendingDS = Product::orderBy('id', 'desc')->where('updated_at', 'LIKE', '%' . $time . '%')->where('status', 3)->count();
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
        // dd($report[0]->User->name);
        return view('admin.total.totalDesigner',
            ['reports' => $report,
                'totalPending' => $totalPending,
                'totalDone' => $totalDone,
                'totalNotSeen' => $totalNotSeen,
                'totalprioritize' => $totalNotReceived,
                'totalPendingDS' => $totalPendingDS,
            ]);
    }

    public function totalidea(Request $request)
    {

        Carbon::setLocale('vi');
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $times = $now->toDateString();
        $designer = User::get()->where('role', 2);
        $type_product = type_product::get();
        $size = size::get();
        $keyword = $request->keyword;
        // dd($size[1]);
        $report = Product::orderBy('id', 'desc')->where('created_at', 'LIKE', '%' . $times . '%')
            ->Where('title', 'like', "%{$keyword}%")
        // ->Where('description', 'like', "%{$keyword}%")
        // ->orWhere('updated_at', 'like', "%{$keyword}%")
            ->paginate(20);
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
        if ($report->total() != 0) {
            foreach ($report as $billdd) {
                $dt[] = Carbon::create($billdd->created_at);
            }

            foreach ($dt as $key) {
                $now = Carbon::now('Asia/Ho_Chi_Minh');
                $time[] = $key->diffForHumans($now);
            }
        } else {
            $time = '';

        }
        // dd($time[4]);
        // dd(count($report[0]->mocups));

        $totalDone = Product::orderBy('id', 'desc')->where('created_at', 'LIKE', '%' . $times . '%')->where('status', 5)->count();
        $totalPending = Product::orderBy('id', 'desc')->where('created_at', 'LIKE', '%' . $times . '%')->where('status', 3)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('created_at', 'LIKE', '%' . $times . '%')->where('status', 1)->count();
        $totalallidea = Product::orderBy('id', 'desc')->where('created_at', 'LIKE', '%' . $times . '%')->count();
        return view('admin.total.totalidea',
            ['designers' => $designer,
                'reports' => $report,
                'totalDone' => $totalDone,
                'totalPending' => $totalPending,
                'totalNotReceived' => $totalNotReceived,
                'type_products' => $type_product,
                'totalallidea' => $totalallidea,
                'times' => $time,
                'sizes' => $size,
                'name' => $name,

            ]);
    }

}
