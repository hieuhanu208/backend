<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;
use Validator;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {
        $rules = [
            'email'=> 'required|email',
            'password'=>'required|min:6'
        ];

        $message = [
            'email.required' => 'Bạn phải nhập vào email',
            'email.email' => 'Email chưa đúng định dạng',
            'password.required' =>'Bạn phải nhập mật khẩu',
            'password.min' => 'Độ dài tối thiểu phải là 6 ký tự',
        ];

        $validator = Validator::make($request->all(), $rules,$message);
        if ( $validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        } else
            {
                $email = $request->input('email');
                $password = $request->input('password');

                if(Auth::attempt(['email' => $email ,'password' => $password])){
                    if(Auth::user()->level ==1 || Auth::user()->level == 2){
                        return redirect()->intended('admin/index');
                    }else{
                        $errors = new MessageBag(['errorLogin'=>'Bạn không có quyền đăng nhập vào đây ']);
                        return redirect()->back()->withInput()->withErrors($errors);
                    }

                }else{
                    $errors = new MessageBag(['errorLogin'=>'Email hoặc mật khẩu không đúng ']);
                    return redirect()->back()->withInput()->withErrors($errors);
                }
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
