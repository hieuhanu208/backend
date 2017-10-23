<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class loginController extends Controller
{
    public function login(){
        return view ('main.login');
    }

    public function postLogin(Request $rq){
$arr = [
    		'email' => $rq->email,
    		'password' => $rq->password
    	];
        if($rq->remember == 'Remember Me'){
            $remember = true;
        }
        else{
            $remember = false;
        }
    	if(Auth::attempt($arr, $remember)){
    		return redirect('/hello');
    	}
    	else{
    		return back()->with('error', 'Tài khoản hoặc mật khẩu không tồn tại');
    	}
    }
}
