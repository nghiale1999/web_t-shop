<?php

namespace App\Http\Form;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class validateSanpham
{
    /**
     * validate
     *
     * @param \Illuminate\Http\Request $request
     */
  
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tensp'=>['required'],
            'giasp'=>['required'],
            'soluong'=>['required'],
            'loaisp'=>['required'],
            'thuonghieu'=>['required'],
            'hinh'=>['required','image', 'mimes:png,jpg,jpeg,gif', 'max:2048'],
            'mota'=>['required'],
            
        ],[
            'tensp.required' => 'Tên sản phẩm không được bỏ trống',
            'giasp.required' => 'Giá sản phẩm không được bỏ trống',
            'soluong.required' => 'Số lượng không được bỏ trống',
            'loaisp.required' => 'Loại sản phẩm không được bỏ trống',
            'thuonghieu.required' => 'Thương hiệu sản phẩm không được bỏ trống',
            'hinh.required' => 'Hình ảnh không được bỏ trống',
            'hinh.mimes' => 'Hình ảnh không phù hợp png,jpg,jpeg,gif',
            'hinh.max' => 'Hình ảnh quá lớn',
            'hinh.image' => 'Hình ảnh không đúng định dạng',
            'mota.required' => 'Thiếu mô tả sản phẩm',

        ]);
        return $validator->validate();
    }
}