<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'txtUser' =>'required|unique:users,name',
            'pass' =>'required|min:6|max:20',
            'email' =>'required|email',


        ];
    }

    public function  messages(){
        return [

            'txtUser.required' =>'Vui lòng nhập tên người dùng',
            'pass.required' => 'Vui lòng nhập mật khẩu',
            'email.required' =>'Vui lòng nhập email',
            'password.min'=>'Mật khẩu ít nhất 6 kí tự',
            'password.max'=>'Mật khẩu không quá 20 kí tự',
            'email.email'=>'Không đúng định dạng email',
            'txtUser.unique'=>'Tài khoản  đã có người sử dụng',


        ];
    }
}
