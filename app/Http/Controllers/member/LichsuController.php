<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Http\Form\AdminCustomValidator;
use App\ModelLichsu;
use App\ModelSanpham;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LichsuController extends Controller
{
    public function __construct(AdminCustomValidator $form)
    {
        $this->form = $form;
    }

    public function lichSu(){
        $id = Auth::user()->id;
        $data = ModelLichsu::where('id_user', $id)->get();
        return view('member.lichsu', compact('data'));
    }

    public function chiTietLichSu($id){
        $data = ModelLichsu::where('id', $id)->get();

        return view('member.chitiet-lichsu', compact('data'));
    }
    public function xoaLichSu($id){
       if(ModelLichsu::where('id', $id)->delete()){
        return redirect()->back()->with('success', 'Xóa thành công');
        }else{
            return redirect()->back()->with('success', 'Xóa thành công');
        }
    }

    public function donHang (Request $request){
        $data = ModelLichsu::select(
            "lichsu.id", 
            "lichsu.tensp", 
            "lichsu.gia", 
            "lichsu.soluong", 
            "lichsu.trangthai", 
            "lichsu.tennguoinhan", 
            "lichsu.email", 
            "lichsu.sdt", 
            "lichsu.diachi", 
        )
            ->join('sanpham', 'sanpham.id', '=', 'lichsu.id_sp')
            ->join('users', 'users.id', '=', 'sanpham.id_users')
            ->where('sanpham.id_users', '=', Auth::user()->id)
            ->get();
   
        return view('member.quanlydonhang',compact('data'));
    }

    public function guiHang(Request $request){
        $id = $request->id_ls;
        $ls = ModelLichsu::findOrfail($id);
        $ls->trangthai = 'Đã gửi';
        if($ls->save()){
            return 'Đơn hàng của bạn đã được gửi đi';
        }else{
            return 'đơn hàng bị lỗi hk thể gửi';
        }
    }
    public function nhanHang(Request $request){
        $id = $request->id_ls;
        $ls = ModelLichsu::findOrfail($id);
        $ls->trangthai = 'Đã nhận';
        if($ls->save()){
            return 'Xác nhận đã nhận đơn hàng';
        }else{
            return 'đơn hàng bị lỗi không thể nhận';
        }
    }

    public function thongKe(){
        //sản phẩm mua vào
        $dtt = Carbon::now('Asia/Ho_Chi_Minh');
       $dt = $dtt->subMonth();
       $sanphamt = ModelLichsu::where('created_at', '>', $dt)->where('id_user', Auth::user()->id)->get();
       $tongthang = 0;
       foreach ($sanphamt as $key => $value) {
           $tongthang = $tongthang + $value->gia;
       }

       $dtt = Carbon::now('Asia/Ho_Chi_Minh');
       $dtn = $dtt->subYear();
       $sanphamn = ModelLichsu::where('created_at', '>', $dtn)->where('id_user', Auth::user()->id)->get();
       $tongnam = 0;
       foreach ($sanphamn as $key => $value) {
           $tongnam = $tongnam + $value->gia;
       }
        $sanpham = ModelLichsu::where('id_user', Auth::user()->id)->get();

        //sản phẩm bán ra
        $dtt = Carbon::now('Asia/Ho_Chi_Minh');
        $tkn = $dtt->subYear();
        $data = ModelLichsu::select( 
            "lichsu.gia", 
        )
            ->join('sanpham', 'sanpham.id', '=', 'lichsu.id_sp')
            ->where('sanpham.id_users', '=', Auth::user()->id, 'and','created_at', '>', $dtn)
            ->get();
        $tongbannam = 0;
        foreach ($data as $key => $value) {
            $tongbannam = $tongbannam + $value->gia;
        }


        $dtt = Carbon::now('Asia/Ho_Chi_Minh');
        $tkt = $dtt->subMonth();
        $data = ModelLichsu::select( 
            "lichsu.gia", 
        )
            ->join('sanpham', 'sanpham.id', '=', 'lichsu.id_sp')
            ->where('sanpham.id_users', '=', Auth::user()->id, 'and','created_at', '>', $tkt)
            ->get();
        $tongbanthang = 0;
        foreach ($data as $key => $value) {
            $tongbanthang = $tongbanthang + $value->gia;
        }
        $sanphamban = ModelLichsu::select( 
            "lichsu.tensp",
            "lichsu.soluong", 
            "lichsu.gia", 
        )
            ->join('sanpham', 'sanpham.id', '=', 'lichsu.id_sp')
            ->where('sanpham.id_users', '=', Auth::user()->id, 'and','created_at', '>', $tkt)
            ->get();
        
        return view('member.thongke', compact('tongthang', 'tongnam', 'sanpham', 'tongbannam', 'tongbanthang', 'sanphamban'));
    }
}
