<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'header' =>'required',
            'short_description' =>'required',
            'content' =>'required',
            'email'=>'required',
            'user_id'=>'required',
            
        ];
    }

    public function  messages(){
        return [

            'header.required' =>'Nhập vào tên tin tức',
            'short_description.required' =>'Nhập vào mô tả tin tức',
            'content.required' =>'Nhập vào nội dung tin tức',
            'email.required' =>'Nhập vào email',
            'user_id.required' =>'Mời chọn thành viên',
            

        ];
    }
}
