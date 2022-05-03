<?php

namespace App\Http\Form;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class validateThongtincanhan
{
    /**
     * validate
     *
     * @param \Illuminate\Http\Request $request
     */
  
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:5', 'max:255'],
            'sdt' => ['required'],
            'diachi' => ['required'],
            'file'=> ['required','image', 'mimes:png,jpg,jpeg,gif', 'max:2048']
        ],[
            'name.required' => 'Tên khách hàng không được bỏ trống',
            'name.min' => 'Tên khách hàng ít nhất 5 ký tự',
            'name.max' => 'Tên khách hàng không quá 255 ký tự',
            'sdt.required' => 'Số điện thoại không được bỏ trống',
            'diachi.required' => 'Địa chỉ không được bỏ trống',
            'file.required' => 'Hình ảnh không được bỏ trống',
            'file.mimes' => 'Hình ảnh không phù hợp png,jpg,jpeg,gif',
            'file.max' => 'Hình ảnh quá lớn',
            'file.image' => 'Hình ảnh không đúng định dạng',
        ]);
        return $validator->validate();
    }
}