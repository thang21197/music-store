<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Repository\UserRepositoryInterface;
use App\Models\Users;

class RegisterController extends Controller
{
	public function PostRegister(RegisterRequest $r){
 	    $user=new Users();
        $user->name = $r->your_name;
        $user->phone = $r->telephone;
        $user->email = $r->email;
        $user->address = $r->address;
        $user->type = 2;
        $user->password = bcrypt($r->password);
        $user->save();
      return redirect()->route('register')->with('Notice', 'Register successfully!');
    }
    function GetRegister(){
    	return view('frontend.user.account');
    }
}
