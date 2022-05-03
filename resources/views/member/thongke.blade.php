@extends('member.layout.app')
@section('content')
<div class="row mt-5 ml-5">
    <h3>Thống kê sản phẩm mua vào</h3>
</div>
<div class="row mt-5" style="border-bottom: 2px solid red; padding-bottom: 10px">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-5">Tổng chi theo tháng</h5>
                <h3 class="font-light">{{$tongthang}}đ</h3>
                <div class="m-t-20 text-center">
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title m-b-0">Tổng chi theo năm</h4>
                <h2 class="font-light">{{$tongnam}}đ</h2>
                <div class="m-t-30">
                    <div class="row text-center">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Chi tiết sản phẩm đã mua</h4>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="border-top-0">Tên sản phẩm</th>
                            <th class="border-top-0">Số lượng</th>
                            <th class="border-top-0">Tổng giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sanpham as $vl)
                            <tr>
                                <td>{{$vl->tensp}}</td>
                                <td>{{$vl->soluong}}</td>
                                <td>{{$vl->gia}}</td>
                            </tr>
                        @endforeach
                                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5 ml-5">
    <h3>Thống kê sản phẩm bán ra</h3>
</div>
<div class="row mt-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-5">Tổng chi theo tháng</h5>
                <h3 class="font-light">{{$tongbanthang}}đ</h3>
                <div class="m-t-20 text-center">
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title m-b-0">Tổng chi theo năm</h4>
                <h2 class="font-light">{{$tongbannam}}đ</h2>
                <div class="m-t-30">
                    <div class="row text-center">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Chi tiết sản phẩm đã mua</h4>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="border-top-0">Tên sản phẩm</th>
                            <th class="border-top-0">Số lượng</th>
                            <th class="border-top-0">Tổng giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sanphamban as $vl)
                            <tr>
                                <td>{{$vl->tensp}}</td>
                                <td>{{$vl->soluong}}</td>
                                <td>{{$vl->gia}}</td>
                            </tr>
                        @endforeach
                                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    
@endsection