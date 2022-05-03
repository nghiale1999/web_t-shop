<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\ModelSanpham;
use Illuminate\Http\Request;

class ContronllerKhuyenmai extends Controller
{
    public function khuyenMai(Request $request){
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'theo'=>['required'],
                'sophantram'=>['required'],
            ],[    
                'theo.required' => 'Khuyến mãi theo',
                'sophantram.required' => 'Mời nhập số phần trăm khuyến mãi',
            ]);
            $search = $request->theo;
            $data = ModelSanpham::where('tensp', 'like', "%{$search}%")->paginate(10);
            if($data != null){
               foreach ($data as $key => $value) {
                   $sp = ModelSanpham::findOrfail($value->id);
                   $sp->trangthaisp = 1;
                   $sp->giamgia = $value->giamgia + $request->sophantram;
                   $sp->save();
               } 
                return view('admin.khuyenmai', compact('data'));
            }else{
                $data = ModelSanpham::where('thuonghieu', 'like', "%{$search}%")->paginate(10);
                return view('admin.khuyenmai', compact('data'));
            }
            
        }
        $data = ModelSanpham::where('trangthaisp', 1)->paginate(10);
        return view('admin.khuyenmai', compact('data'));
    }

    public function boKhuyenMai($id){
        $sp = ModelSanpham::findOrfail($id);
        $sp->trangthaisp = 0;
        $sp->giamgia = 0;
        if($sp->save()){
            return redirect()->back()->with('success','Hủy khuyến mãi thành công');
        }else{
            return redirect()->back()->withErrors('Hủy khuyến mãi thất bại');  
        }
    }
}
