<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Orders,OrderDetail};
use Cart;
use App\User;

class CheckoutController extends Controller
{
//    function GetCheckout(){
//    	return view('frontend.cart.checkout',$data);
//    }
    function CheckLogin(){
    	if (Auth::check()==false) {
    		return 1;
    	}
        if (Cart::count()<=0) {
           return 2;
        }
    } 
    function PostCheckout(Request $r){
        // dd((int)Cart::total()/10);
        // dd((float)$r->total);
            $data['cart']             = Cart::content();
            $data['total']            = $r->total;
            $data['discount']         = 0;
            $data['voucher']          = 0;
            $user                     = User::find(Auth::id());
            $order                    = new Orders;
            $order->user_id           = Auth::id();
            $order->status            = 0;
            $user->point              = $user->point + $r->total/10;
            if ($r->voucher == 1 ) {
                $order->discount          = 1;
                $data['discount']         = ($r->total*90)/100;
                $data['voucher']          = $r->voucher;
                $user->point              = $user->point-200;
            }else{
                $order->discount          = 0;
                $data['voucher']          = 0;
            }
            $user->save();
            $order->save();
            $order->code              = 'ORDER-'.$order->id;
            $order->save();
            foreach(Cart::content() as $row){
                $order_detail             = new OrderDetail;
                $order_detail->product_id = $row->id;
                $order_detail->order_id   = $order->id;
                $order_detail->quantity   = $row->qty;
                $order_detail->cost       = round($row->price*$row->qty,0);
                $order_detail->save();
            }
            Cart::destroy();
            return view('frontend.cart.checkout',$data);
            }
    
}
