<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductPngDetails;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    //
    public function dasboa()
    {
        if (Auth::check()) {
            {
                Carbon::setLocale('vi');
                $yes = Carbon::yesterday('Asia/Ho_Chi_Minh');
                $timess = $yes->toDateString();
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

                $designer = User::join('products', 'products.User_id', '=', 'users.id')
                    ->join('product_png_details', 'product_png_details.product_id', '=', 'products.id')
                    ->select(DB::raw('COUNT(product_png_details.id) as "product_png_details",
                    users.name as "name",
                    users.email as "email",
                    users.role as "role",
                    users.id as "idUser",
                    users.deleted_at as "deleted_at",
                    products.User_id as "id"
                    '))
                    ->groupBy('idUser')
                    ->orderBy('idUser', 'DESC')
                    ->get();
                $mocup = User::join('products', 'products.User_id', '=', 'users.id')
                    ->join('mocup_products', 'mocup_products.product_id', '=', 'products.id')
                    ->select(DB::raw('
                    COUNT(mocup_products.id) as "mocup_products",
                    users.name as "name",
                    users.email as "email",
                    users.role as "role",
                    users.id as "idUser",
                    users.deleted_at as "deleted_at",
                    products.User_id as "id"
                    '
                    ))
                    ->groupBy('idUser')
                    ->orderBy('idUser', 'DESC')
                    ->get();

                $day = Carbon::now()->subDay(10);

                $totalidea = Product::where('created_at', '>=', $day)
                    ->groupBy('date')
                    ->orderBy('date', 'ASC')
                    ->get([
                        DB::raw('Date(created_at) as date'),
                        DB::raw('COUNT(*) as value'),
                    ]);
                foreach ($totalidea as $idea) {
                    $strs[] = $idea->value;
                }
                $str = implode(", ", $strs);
                // dd($str);
                $totalPNG = ProductPngDetails::where('created_at', '>=', $day)
                    ->groupBy('date')
                    ->orderBy('date', 'ASC')
                    ->get([
                        DB::raw('Date(created_at) as date'),
                        DB::raw('COUNT(*) as value'),
                    ]);
                foreach ($totalPNG as $png) {
                    $strss[] = $png->value;
                }
                $strpng = implode(", ", $strss);
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
                return view('client/idea/index',
                    [
                        'shows' => $report,
                        'users' => $user,
                        'Idea' => $Idea,
                        'designer' => $designer,
                        'totalidea' => $totalidea,
                        'str' => $str,
                        'strpng' => $strpng,
                        'mocup' => $mocup,
                        // 'totalIdeamember' => $totalIdeamember,
                        // 'totalDesigner' => $totalDesigner,
                        'time' => $time,
                        'timess' => $timess,

                    ]);
            }
        } else {
            return redirect()->route('login');
        }
    }
}
