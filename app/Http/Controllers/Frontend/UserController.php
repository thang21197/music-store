<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Users,OrderDetail,Orders};
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AccountUser;
use App\Http\Requests\{EditUserRequest,ChangePasswordRequest};
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function GetAccount(){
    	$data['user']=Auth::user();	
        $data['order'] = DB::table('orders')->select('user_id','code','order_id','discount','status',DB::raw('SUM(cost) as total'))
            ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
            ->groupBy('order_id')
            ->where('user_id','=',Auth::id())
            ->orderBy('status')
            ->get();
        // dd($data['order']);
    	return view('frontend.user.info',$data);
    }
    function GetEditUser(){
    	$data['user']=Auth::user();	
    	return view('frontend.user.edit',$data);
    }
    function PostEditUser(EditUserRequest $r){
    	$user=Users::find(Auth::id());
    	$user->name=$r->your_name;
    	$user->phone=$r->telephone;
    	$user->address=$r->address;
    	$user->save();
    	return redirect()->route('profileUser')->with('Notice','Edit Profie succsessfully!');
    }
     function GetChangePassword(){
    	return view('frontend.user.change');
    }
    function PostChangePassword(ChangePasswordRequest $r){
        $user=Auth::user();
        if (Hash::check($r->password, $user->password)) {
           $user->password=bcrypt($r->new_password);
           $user->save();
           return redirect()->route('profileUser')->with('Notice','Change Password succsessfully!'); 
        }else
          return redirect()->route('ChangePassword')->with('Notice','Your old password is not correct!'); 
        dd($user);
    }

    function GetOrderDetail($order_id){    
        // $order_detail=DB::table('order_detail')
        //     ->leftJoin('orders', 'order_detail.order_id', '=', 'orders.id')
        //     ->groupBy('order_id')
        //     ->get();
        $data['product']=DB::table('order_detail')
        ->Join('products', 'products.id', '=', 'order_detail.product_id')
        ->Join('orders', 'orders.id', '=', 'order_detail.order_id')
        ->where('order_id','=',$order_id)
        ->get();
         $data['total']=OrderDetail::where('order_id','=',$order_id)->sum('cost');
         $data['discount']=OrderDetail::where('order_id','=',$order_id)->sum('cost')*90/100;
        // dd( $data['product']);
        return view('frontend.user.order',$data) ;
    }
    function GetCancelDetail($order_id){
      $order=Orders::find($order_id);
      $order->status=2;
      $order->save();
      // dd($order);
      return redirect()->back();
    }
}
