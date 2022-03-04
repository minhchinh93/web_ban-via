<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class adminHomeController extends Controller
{
    //
    public function home()
    {
        Carbon::setLocale('vi');
        $report = Product::orderBy('id', 'desc')
            ->paginate(5);
        $user = User::all();
        $Idea = User::join('products', 'products.id_idea', '=', 'users.id')
            ->select(DB::raw('COUNT(products.id_idea) as "sum",
        users.name as "name",
        users.email as "email",
        users.role as "role",
        users.deleted_at as "deleted_at",
        products.id_idea as "id"
        '
            ))
            ->orderBy('sum', 'DESC')
            ->groupBy('products.id_idea')
            ->get();

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
        // dd($report);
        return view('admin/home/index',
            [
                'shows' => $report,
                'users' => $user,
                // 'totalDesign' => $totalPNG,
                // 'totalIdea' => $totalidea,
                // 'totaDay' => $totaDay,
                // 'totaSusecDay' => $totaSusecDay,
                // 'totalDayDesigner' => $totaldayPNG,
                // 'totalIdeamember' => $totalIdeamember,
                // 'totalDesigner' => $totalDesigner,
                'time' => $time,

            ]);
    }
}
