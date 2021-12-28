<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\customer;
use Illuminate\Http\Request;
use App\Models\slide;
use App\Models\product;
use App\Models\bill;
use App\Models\bill_detaill;
use App\Models\type_product;
use Gloudemans\Shoppingcart\Facades\cart;
use App\Jobs\oldJob;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function home(Request $request) {
       $shows= type_product::paginate(6);
        return view('client.layout.home',['shows'=>$shows]);
        // $shows=  product::where('name','like', "%{$keyword}%");
        // dd( $shows);
}


public function dasboa($id){

    $cart= type_product::find($id);

    Cart::destroy();
    Cart::add([
        'id' => $id,
        'name' => $cart->name,
        'qty' => 1,
        'price' => $cart->price,
    ]);
    $carts= cart::content();

        return view('client.dasboa.index',[
    'carts'=>$carts]);
}
    public function AccountHistory(){
        return view('client.AccountHistory.index');
    }
    public function RechargeHistory(){
        return view('client.RechargeHistory.index');
    }

    public function postcheckout(Request $request){

         $price=$request->price;
         $qty=$request->qty;
         $total=$price*$qty;
        //  $type=$request->i


       $bill= bill::create([
            'id_User'=>7,
            'date_order'=> date('Y-m-d H:i:s'),
            'total'=> $total,
            'note'=>$request->note
        ]);

        foreach (Cart::content() as $bill_detaill) {
            $bill_detaill=  bill_detaill::create([
            'id_bill'=> $bill->id,
            'id_product'=>$bill_detaill->id,
            'quantity'=>$bill_detaill->qty,
            'price'=>$bill_detaill->price,
        ]);
    }
        
           return redirect()->back()->with('messeger','đã bạn đã đặt hàng thành công');
       }
}
