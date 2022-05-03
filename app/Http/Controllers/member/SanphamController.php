<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Http\Form\AdminCustomValidator;
use App\ModelDgsao;
use Illuminate\Http\Request;
use App\ModelSanpham;
use Illuminate\Support\Facades\Auth;
use App\ModelLoaisp;
use App\ModelThuonghieu;

class SanphamController extends Controller
{
    public function __construct(AdminCustomValidator $form)
    {
        $this->form = $form;
    }
    public function sanPham(){
        $user = Auth::user()->id;
        $data = ModelSanpham::where('id_users', $user)->paginate(5);
        return view('member.sanpham', compact('data'));
    }


    public function xoaSanPham($id){
        if(ModelSanpham::where('id', $id)->delete()){
            return redirect()->back()->with('success','Xóa bài viết thành công');
        }else{
            return redirect()->back()->withErrors('Xóa bài viết thất bại');  
        }
    }

    public function themSanPham(Request $request){
        if($request->isMethod('post')){
            $this->form->validate($request, 'validateSanpham');
            $sanpham = new ModelSanpham;
            $sanpham->tensp = $request->tensp;
            $sanpham->giasp = $request->giasp;
            $sanpham->loaisp = $request->loaisp;
            $sanpham->soluong = $request->soluong;
            $sanpham->thuonghieu = $request->thuonghieu;
            $sanpham->mota = $request->mota;
            $user =  Auth::user()->id;
            $sanpham->id_users = $user;
            if($request->giamgia == 1){
                $sale = $request->sale;
            }else{
                $sale = 0;
            }
            $sanpham->giamgia = $sale;
            $sanpham->trangthaisp = $request->giamgia;

            $file = $request->file('hinh');
            $ngay = strtotime(date('Y-m-d H:i:s'));
            $anh = $user.$ngay.$file->getClientOriginalName();
            $sanpham->anh = $anh;
            if($sanpham->save()){
                $file->move('upload', $anh);
                return redirect()->back()->with('success','thêm sản phẩm thành công');
            }else{
                return redirect()->back()->withErrors('thêm sản phẩm thất bại');
            }
        }
        $loai = ModelLoaisp::all();
        $thuonghieu = ModelThuonghieu::all();
        return view('member.themsanpham', compact('loai','thuonghieu'));
    }


    public function suaSanPham(Request $request, $id){

        if($request->isMethod('post')){
            $this->form->validate($request, 'validateSanpham');
            $sanpham = ModelSanpham::findOrfail($id);
            $sanpham->tensp = $request->tensp;
            $sanpham->giasp = $request->giasp;
            $sanpham->loaisp = $request->loaisp;
            $sanpham->soluong = $request->soluong;
            $sanpham->thuonghieu = $request->thuonghieu;
            $sanpham->mota = $request->mota;
            $user =  Auth::user()->id;
            $sanpham->id_users = $user;
            if($request->giamgia == 1){
                $sale = $request->sale;
            }else{
                $sale = 0;
            }
            $sanpham->giamgia = $sale;
            $sanpham->trangthaisp = $request->giamgia;

            $file = $request->file('hinh');
            $ngay = strtotime(date('Y-m-d H:i:s'));
            $anh = $user.$ngay.$file->getClientOriginalName();
            $sanpham->anh = $anh;
            if($sanpham->save()){
                $file->move('upload', $anh);
                return redirect()->back()->with('success','sửa sản phẩm thành công');
            }else{
                return redirect()->back()->withErrors('Sửa sản phẩm thất bại');
            }
        }
        $loai = ModelLoaisp::all();
        $thuonghieu = ModelThuonghieu::all();
        $data = ModelSanpham::findOrfail($id);
        return view('member.suasanpham', compact('data', 'loai', 'thuonghieu'));
    }

    public function chiTietSanPham($id){
        $data = ModelSanpham::where('id', $id)->get();
        $datapre = ModelSanpham::where('id','<',$id)->max('id');
        $datanext = ModelSanpham::where('id','>',$id)->min('id');
        $rate = ModelDgsao::where('id_bv',$id)->get();
        $tbs = 0;
        if(!empty($rate)){
            $dem = 0.01;
            $tong = 0;
            foreach ($rate as $value) {
                $tong += $value->sosao;
                $dem++;
            }
            $tbs = round($tong/$dem);
        }
        return view('member.chitietsanpham', compact('data', 'datapre', 'datanext', 'tbs'));
    }

    public function danhGiaSao(Request $request){
        $id = $request->id_sp;
        $sosao = $request->sosao;
        $id_user = Auth::user()->id;
        $sao = ModelDgsao::all();
        // return $sao;
        foreach ($sao as  $value) {
            if($value->id_bv == $id && $value->id_users == $id_user){
                return 'bạn đã đánh giá sản phẩm này';
            }else{
                $data = new ModelDgsao();
                $data->id_bv = $id;
                $data->id_users = $id_user;
                $data->sosao = $sosao;
                $data->save(); 
                return 'Đánh giá sản phẩm Thành công';
            }
        }
 
         
    }
}
