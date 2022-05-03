@extends('member.layout.app')
@section('content')
<section>
    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
    @endif	
    <div class="container mt-4">
            <section id="cart_items">
                <div class="container">
                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                            <li>
                                <a class="h" href="{{ url('member/home') }}">Home</a>
                            </li>
                            <li>
                                <a class="sp" href="{{ url('member/giohang') }}">Shopping Cart</a>
                            </li>
                            <li class="active">Checkout</li>
                        </ol>
                    </div>
                    <div class="cupon_area mb-4">
                        <div class="check_title">
                            <h2> Bạn có mã giảm giá?
                            <a href="#">Nhấp vào đây để lấy mã của bạn</a>
                            </h2>
                        </div>
                        <input type="text" placeholder="Enter coupon code">
                        <a class="btn-cp" href="#">Xác Nhận Mã Giảm Giá</a>
                    </div>
                    <div class="billing_details">
                        <div class="row">
                            <form class="row contact_form" method="post" novalidate="">
                                @csrf
                                <div class="col-lg-9">
                                    <h3>Billing Details</h3>
                                
                                    <div class="col-md-6 form-group p_star">
                                        <input type="text" class="form-control" id="first" name="ho" placeholder="Họ">
                                      
                                    </div>
                                    <div class="col-md-6 form-group p_star">
                                        <input type="text" class="form-control" id="last" name="ten" placeholder="Tên">
                                        
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" id="company" name="company" placeholder="Company name">
                                    </div>
                                    <div class="col-md-6 form-group p_star">
                                        <input type="text" class="form-control" id="number" name="sdt" placeholder="Số Điện Thoại">
                                    </div>
                                    <div class="col-md-6 form-group p_star">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                       
                                    </div>
                                    
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="add1" name="diachi" placeholder="Địa Chỉ">
                                        
                                    </div>
                                    
                                    
                                
                                </div>
                                <div class="col-lg-3">
                                    <div class="total_area">
                                    <h4 class="text-center text-uppercase" style="border-bottom: 1px solid #000;">Your Order</h4>
                                    <ul>
                                        
                                        
                                        <li >Sub Total 
                                            <span>{{$tong}}đ</span>
                                        </li>
                                        <li>Phí Ship 
                                            <span>35000đ</span>
                                        </li>
                                        <li >Total 
                                            <span>{{$tong + 35000}}đ</span>
                                        </li>
                                    </ul>
                                    <input type="submit" class="btn btn-default update" name="" id="" value="Đặt Hàng">
                                    
                                    </div>
                                </div>
                            </form>
                        </div>
                        <ul class="alert text-danger">
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
    </div>
</section>
    
@endsection