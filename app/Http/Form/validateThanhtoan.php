<?php

namespace App\Http\Form;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class validateThanhtoan
{
    /**
     * validate
     *
     * @param \Illuminate\Http\Request $request
     */
  
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>['required', 'email'],
            'ten'=>['required'],
            'ho'=>['required'],
            'sdt'=>['required'],
            'diachi'=>['required'],
 
        ],[
            'email.required' => 'Email khách hàng không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'ten.required' => 'Tên khách hàng không được bỏ trống',
            'ho.required' => 'Họ không được bỏ trống',
            'sdt.required' => 'Số điện thoại không được bỏ trống',
            'diachi.required' => 'Địa chỉ không được bỏ trống',
        ]);
        return $validator->validate();
    }
}