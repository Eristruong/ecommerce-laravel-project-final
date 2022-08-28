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
            'productName'=>'required',
            'listPrice'=>'required|numeric',
            'discountPercent'=>'numeric',
            'productImage'=>'image'
        ];
    }
    public function messages()
    {
        return [
            'productName.required'=>'vui lòng nhập tên sản phẩm !',
            'listPrice.required'=>'vui lòng nhập giá sản phẩm !',
            'listPrice.numeric'=>'Gía sản phẩm phải là kiểu số !',
            'discountPercent.numeric'=>'Phần trăm khấu trừ sản phẩm phải kiểu số !',
            'productImage.image'=>'Không phải là file ảnh !',
        ];
    }
}
