<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Validator;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

//    public function getLogin(){
//        return view('admin.login');
//    }
//
//    public function getSignin(){
//        return view('page.dangki');
//    }
//
//    public function postSignin(RegisterRequest $request){
//
//        $user = new User();
//        $user->user_name = $request->fullname;
//        $user->email = $request->email;
//        $user->password = Hash::make($request->password);
//
//        if ($user->save()) {
//
//            return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
//        } else {
//
//             return redirect()->back()->with(['flag'=>'danger','message'=>'Lỗi không thể tạo tài khoản']);
//        }
//    }
//
//    public function postLogin(LoginRequest $request){
//
//        $login = [
//            'email' => $request->get('email'),
//            'password' => $request->get('password'),
//        ];
//
//        if(Auth::attempt($login, true))
//        {
//            if(Auth::user()->level == 2)
//            {
//                return redirect()->route('admin.index');
//
//            }
//
//            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
//
//        }
//        else{
//            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
//        }
//
//    }
//
//    public function postLogout(){
//        Auth::logout();
//        return redirect()->route('trang-chu');
//    }

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
