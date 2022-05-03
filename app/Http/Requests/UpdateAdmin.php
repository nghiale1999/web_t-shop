<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdmin extends FormRequest
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
            'name'=>'required',
            'anh'=>'required|image|mimes:png,jpg,jpeg,gif|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Mời bạn điền thông tin name',
            'anh.required'=>'Mời bạn nhập hình ảnh',
            'anh.mimes'=>'Ảnh đại điện bị lỗi',
            'anh.max'=>'Dung lượng ảnh quá lớn'  
        ];
    }
}
