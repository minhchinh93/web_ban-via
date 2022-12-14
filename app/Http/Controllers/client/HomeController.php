<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\bill;
use App\Models\bill_detaill;
use App\Models\product;
use App\Models\Purchased;
use App\Models\type_product;
use App\Models\User;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function home(Request $request)
    {
        Carbon::setLocale('vi');
        foreach (bill::orderBy('date_order', 'DESC')->paginate(5) as $billdd) {
            $dt[] = Carbon::create($billdd->date_order);
            $infos[] = $billdd;
        };
        foreach ($infos as $key) {
            $info[] = $key;
        }
        foreach ($dt as $key) {
            $now = Carbon::now();
            $time[] = $key->diffForHumans($now);
        }
        $shows = type_product::paginate(6);
        $topProduct = type_product::orderBy('Views', 'DESC')->paginate(3);
        for ($i = 0; $i <= 6; $i++) {
            $totalProducts[] = product::where('status', 'null')->where('id_type', $i)->get();
        };
        if (Auth::check()) {
            $User = User::find(Auth::user()->id)->payment;
            $userProduct = Purchased::where('id_User', Auth::user()->id)->get();
        } else {
            $User = 0;
            $userProduct = [];
        }

        return view('client.layout.home', [
            'shows' => $shows,
            'times' => $time,
            'infos' => $info,
            'totalProducts' => $totalProducts,
            'topProducts' => $topProduct,
            'Users' => $User,
            'userProduct' => $userProduct,
        ]);
    }
    public function dasboa($id)
    {
        if ($id) {
            $cart = type_product::find($id);
            $view = $cart->Views;
            type_product::find($id)->update(['Views' => $view + 1]);
            Cart::destroy();
            Cart::add([
                'id' => $id,
                'name' => $cart->name,
                'qty' => 1,
                'price' => $cart->price,
            ]);
            $carts = cart::content();

            return view('client.dasboa.index', [
                'carts' => $carts]);
        } else {
            return redirect()->back();
        }

    }

    public function AccountHistory()
    {
        return view('client.AccountHistory.index');
    }
    public function RechargeHistory()
    {
        return view('client.RechargeHistory.index');
    }

    public function postcheckout(Request $request, $id)
    {

        if ($id) {
            $price = $request->price;
            $qty = $request->qty;
            $total = $price * $qty;
            $products = product::where('id_type', $id)
                ->orderByRaw('status is null')
                ->Limit($qty)
                ->get();
            $totalPayment = User::find(Auth::user()->id)->payment - $total;
            // dd(User::find(Auth::user()->id));
            if ($totalPayment > 0) {
                foreach ($products as $product) {
                    product::where('id', $product->id)->update(['status' => date("Y-m-d H:i:s")]);
                    Purchased::create(['id_User' => Auth::user()->id, 'id_product' => $product->id]);
                }

                $bill = bill::create([
                    'id_User' => Auth::user()->id,
                    'date_order' => date('Y-m-d H:i:s'),
                    'total' => $total,
                ]);
                // dd('ok');
                foreach (Cart::content() as $bill_detaill) {
                    $bill_detaill = bill_detaill::create([
                        'id_bill' => $bill->id,
                        'id_type_products' => $bill_detaill->id,
                        'quantity' => $request->qty,
                        'price' => $bill_detaill->price,
                    ]);
                }
                User::find(Auth::user()->id)->update(["payment" => $totalPayment]);
                return redirect()->route('AccountHistory')->with('messeger', 'đã bạn đã đặt hàng thành công');
            } else {
                return redirect()->back();

            }
        } else {

            return redirect()->back();
        }

    }
}
