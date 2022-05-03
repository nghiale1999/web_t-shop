<?php

namespace App\Http\Form;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class validateRegister
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
            'email'=>['required', 'email','unique:users,email'],
            'password'=>['required', 'min:8', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
            'passwordcf' => ['required', 'same:password', 'min:8'],
            'file'=> ['required','image', 'mimes:png,jpg,jpeg,gif', 'max:2048']
        ],[
            'name.required' => 'Tên khách hàng không được bỏ trống',
            'name.min' => 'Tên khách hàng ít nhất 5 ký tự',
            'name.max' => 'Tên khách hàng không quá 255 ký tự',
            'email.required' => 'Email khách hàng không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã được đăng ký',
            'password.required' => 'Mật khẩu khách hàng không được bỏ trống',
            'password.min' => 'Mật khẩu khách hàng ít nhất 8 ký tự',
            'password.regex' => 'Mật khẩu khách hàng không đúng định dạng',
            'passwordcf.required' => 'Mật khẩu xác nhận không được bỏ trống',
            'passwordcf.same' => 'Mật khẩu xác nhận không đúng',
            'file.required' => 'Hình ảnh không được bỏ trống',
            'file.image' => 'Hình ảnh không đúng định dạng',
            'file.mimes' => 'Hình ảnh không phù hợp png,jpg,jpeg,gif',
            'file.max' => 'Hình ảnh quá lớn',

        ]);
        return $validator->validate();
    }
}