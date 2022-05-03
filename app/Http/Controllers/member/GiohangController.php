<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Http\Form\AdminCustomValidator;
use App\ModelLichsu;
use App\ModelSanpham;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class GiohangController extends Controller
{
    public function __construct(AdminCustomValidator $form)
    {
        $this->form = $form;
    }

    public function themGioHang(Request $request){
        $id_sp = $request->id_sp;
        $SS = session()->has('cart') ? session()->get('cart') : [];
        if(!empty($SS)) {
            foreach($SS as $value){
                if(isset($SS[$id_sp])){
                    $SS[$id_sp]['soluong'] =  $SS[$id_sp]['soluong'] + 1;
                    session(['cart' => $SS]);
                    return 'thêm vào giỏ hàng thành công';
                 } 
                 else { 
                    $SS[$id_sp]['id_user'] = Auth::user()->id;
                    $SS[$id_sp]['soluong'] = 1;
                }
            }     
        }
         else {
            $SS[$id_sp]['id_user'] = Auth::user()->id;
            $SS[$id_sp]['soluong'] = 1;
        }
        session(['cart' => $SS]);           
        return 'thêm vào giỏ hàng thành công';
    }

    public function gioHang(){
       
        $data = [];
        $id = Auth::user()->id;
        if(session()->has('cart')) {
            $SS = session()->get('cart');
            foreach($SS as $key =>  $value){
                if($value['id_user'] == $id){
                    $data[] = ModelSanpham::find($key)->toArray();
                }
            }
            return view('member.giohang',compact('data','SS'));
        }else{
            return view('member.giohang');
        }
    }

    public function xoaGioHang(Request $request){
        $id_sp = $request->id_sp;
        $id = Auth::user()->id;
        $ss = [];
        if(session()->has('cart')){
            $ss = session()->get('cart');
            foreach ($ss as $key=>$value) {
                if($key == $id_sp && $value['id_user'] == $id){
                    $ss = Arr::except($ss, [$key]);
                    session(['cart' => $ss]);                   
                }
            }
            return 'xóa sản phẩm thàng công';
        }else{
            return 'xóa sản phẩm thất bại';
        }
    }


    public function giamGiohang(Request $request){
        $id_sp = $request->id_sp;
        $id = Auth::user()->id;
        $SS = [];
        if(session()->has('cart')){
            $SS = session()->get('cart');
            if(isset($SS[$id_sp]) &&  $SS[$id_sp]['id_user'] == $id) {
                $SS[$id_sp]['soluong'] = $SS[$id_sp]['soluong'] - 1;
                if($SS[$id_sp]['soluong'] <= 0){
                    $SS = Arr::except($SS, [$id_sp]);
                }  
            }
            session(['cart' => $SS]);
            return isset($SS[$id_sp]) ? $SS[$id_sp]['soluong'] : 0;
        }
    }



    public function tangGioHang(Request $request){
        $id_sp = $request->id_sp;
        $id = Auth::user()->id;
        if(session()->has('cart')){
            $SS = session()->get('cart');
            if(isset($SS[$id_sp]) &&  $SS[$id_sp]['id_user'] == $id) {
                $SS[$id_sp]['soluong'] = $SS[$id_sp]['soluong'] + 1; 
            }
            session(['cart' => $SS]);
            return isset($SS[$id_sp]) ? $SS[$id_sp]['soluong'] : 0;
        }
    }


    public function getThanhToan(){
        $tong = 0;
        $data = [];
        $giamoi = 0;
        $id = Auth::user()->id;
        if(session()->has('cart')){
            $SS = session()->get('cart');
            foreach($SS as $key => $value){
                if($value['id_user'] == $id){
                    $data[] = ModelSanpham::find($key)->toArray();
                    //dd($SS);
                    foreach ($data as $sp) {
                       if($sp['trangthaisp'] == 1) {
                        $giamoi = $sp['giasp']-($sp['giasp']*($sp['giamgia']/100));   
                       }else{
                           $giamoi = $sp['giasp'];
                       }
                    }
                }
                $tong = $tong + $value['soluong'] *  $giamoi;
            }  
        }
        return view('member.thanhtoan', compact('tong'));
    }


    public function postThanhToan(Request $request){
        $this->form->validate($request, 'validateThanhtoan');
        $data = [];
        $id = Auth::user()->id;
        if(session()->has('cart')){
            $SS = session()->get('cart');
            foreach ($SS as $key => $value) {
                if($value['id_user'] == $id){
                    $data = ModelSanpham::find($key)->toArray();
                    if($value['soluong'] < $data['soluong']){
                        // dd($data);
                        $ls = new ModelLichsu;
                        $ls->tensp = $data['tensp'];
                        $ls->soluong = $value['soluong'];
                        $ls->gia =  $value['soluong'] * $data['giasp'];
                        $ls->id_user = $id;
                        $ls->tennguoinhan = $request->ten;
                        $ls->diachi = $request->diachi;
                        $ls->email = $request->email;
                        $ls->sdt = $request->sdt;
                        $ls->id_sp = $key;
                        $ls->trangthai = 'Đợi';
                        $ls->save();
                        $a = $data['soluong'] - $value['soluong'];
                        DB::table('sanpham')->where('id', $key)->update(['soluong' => $a]);
                        $SS = Arr::except($SS, [$key]);                       
                    } else if($value['soluong'] == $data['soluong']){
                        $ls = new ModelLichsu;
                        $ls->tensp = $data['tensp'];
                        $ls->soluong = $value['soluong'];
                        $ls->gia =  $value['soluong'] * $data['giasp'];
                        $ls->id_user = $id;
                        $ls->tennguoinhan = $request->ten;
                        $ls->diachi = $request->diachi;
                        $ls->email = $request->email;
                        $ls->sdt = $request->sdt;
                        $ls->id_sp = $key;
                        $ls->trangthai = 'Đợi';
                        $ls->save();
                        DB::table('sanpham')->where('id', $key)->delete();
                        $SS = Arr::except($SS, [$key]);
                        
                    }else{
                        return redirect()->back()->with('success','Số lượng sản phẩm không đủ'); 
                    }
                }
            } 
            session(['cart' => $SS]);
            return redirect()->back()->with('success','Bạn đã thanh toán thành công'); 
        }
       
    }


    public function themGioHangct(Request $request){
        $id_sp = $request->id_sp;
        $soluong = $request->soluong;
        $SS = session()->has('cart') ? session()->get('cart') : [];
        if(!empty($SS)) {
            foreach($SS as $value){
                if(isset($SS[$id_sp])){
                    $SS[$id_sp]['soluong'] =  $SS[$id_sp]['soluong'] + $soluong;
                    session(['cart' => $SS]);
                    return 'thêm vào giỏ hàng thành công';
                 } 
                 else { 
                    $SS[$id_sp]['id_user'] = Auth::user()->id;
                    $SS[$id_sp]['soluong'] = $soluong;
                }
            }     
        }
         else {
            $SS[$id_sp]['id_user'] = Auth::user()->id;
            $SS[$id_sp]['soluong'] = $soluong;
        }
        session(['cart' => $SS]);           
        return 'thêm vào giỏ hàng thành công';
    }


    
}
