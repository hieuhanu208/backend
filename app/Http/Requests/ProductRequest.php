<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' =>'required',
            'cate_id' =>'required',
            'description' =>'required',
            'unit_price' =>'required|numeric',
            'promotion_price' =>'numeric',
            
        ];
    }

    public function  messages(){
        return [

            'name.required' =>'Nhap vao ten san pham',
            'cate_id.required' =>'Chon danh muc san pham',
            'description.required' =>'Nhap vao mo ta san pham',
            'unit_price.required' =>'Nhap vao  gia san pham',
            'unit_price.numeric' =>'Gia san pham o dinh dang so',
            'promotion_price.numeric' =>'Gia san pham o dinh dang so',
            

        ];
    }
}
