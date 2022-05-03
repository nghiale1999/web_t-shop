<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModelBaiviet;
use App\Http\Requests\RequestBaiviet;



class ControllerBaiviet extends Controller
{
    public function GetBaiviet(){
        $data = ModelBaiviet::paginate(5);
        return view('admin.baiviet',compact('data'));

    }
    public function GetXoabaiviet($id){
        if (ModelBaiviet::where('id',$id)->delete()) {
            return redirect()->back()->with('success','Xóa bài viết thành công');
        }else{
            return redirect()->back()->withErrors('Xóa bài viết thất bại');  
            

        }

    }
    public function GetThembaiviet(){
        return view('admin.thembaiviet');

    }
    public function PostThembaiviet(RequestBaiviet $request){
        $file = $request->file('file');  
        $hinh = $file->getClientOriginalName();
        $data = new ModelBaiviet;
        $data->tieude = $request->tieude;
        $data->hinh = $hinh;
        $data->noidung = $request->noidung;
        
        $data->save();
        if($data->save()){
            $file->move('upload', $file->getClientOriginalName());
            return redirect()->back()->with('success','thêm bài viết thành công');
        }else{
            return redirect()->back()->withErrors('thêm bài viết thất bại');
        }


    }
    public function GetSuabaiviet($id){
        $data = ModelBaiviet::where('id',$id)->get();
        
        return view('admin.suabaiviet',compact('data'));

    }
    public function PostSuabaiviet(RequestBaiviet $request,$id){
        $blog = ModelBaiviet::findOrFail($id);

        $file = $request->file('file');
        
        $data = $request->all();
        $data['hinh']=$file->getClientOriginalName();
       
        if($blog->update($data)){
            $file->move('upload', $file->getClientOriginalName());
            return redirect()->back()->with('success','sửa bài viết thành công');
        }else{
            return redirect()->back()->withErrors('sửa bài viết thất bại');
        }

    }


}
