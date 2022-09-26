<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'title' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric|lt:1000000000|gt:10000',
            'description' => 'max:500',
            'image' => 'required|image'
        ];
    }
    public function messages()
    {
            
        return [
            'title.required' => 'Tên sản phẩm không được để trống',
            'category_id.required' => 'Danh mục không được để trống',
            'brand_id.required' => 'Hãng sản xuất không được để trống',
            'price.required' => 'Giá sản phẩm không được để trống',
            'price.gt' => 'Giá sản phẩm phải lớn hơn 10.000đ',
            'price.lt' => 'Giá sản phẩm phải nhỏ hơn 1.000.000.000đ',
            'price.numeric' => 'Giá không được chứa chữ cái và kí tự khác',
            'description.max' => 'Mô tả không được quá 500 kí tự',
            'image.required' => 'Ảnh sản phẩm không được để trống',
            'image.image' => 'Không phải là hình ảnh'
        ];
    }
    
}
