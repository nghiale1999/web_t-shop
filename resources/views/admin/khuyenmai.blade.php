@extends('admin.layout.app')
@section('content')
@if (session('success'))
<div class="alert alert-success">
    <p>{{ session('success') }}</p>
</div>
@endif
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
    <div class="card">
        
        @if (session('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="table-responsive">
            <form action="" method="post">
                @csrf
                <b>Khuyến mãi theo :</b>
                <input type="text" name="theo" placeholder="áo sơ mi nam">
                <br><br>
                <b>Số phần trăm: </b><input type="text" name="sophantram" placeholder="20%">
                <br><br>
                <button type="submit" name="submit" class="btn btn-default update">Áp dụng</button>
            </form>
            <ul class="alert text-danger">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá </th>
                        <th scope="col">Loại</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hủy bỏ</th>

                    </tr>
                </thead>
                <tbody>
                    
                        @isset($data)
                            @foreach ($data as $vl)
                                <tr class="table-active">
                                    <td>{{$vl->id}}</td>
                                    <td>{{$vl->tensp}}</td>
                                    <td>{{$vl->giasp}}</td>
                                    <td>{{$vl->loaisp}}</td>
                                    <td>{{$vl->soluong}}</td>
                                    @if ($vl->trangthaisp == 0)
                                        <td>New</td>
                                    @else
                                        <td>Sale</td>
                                    @endif
                                    <td><a  class="btn btn-primary" href="{{url('admin/bokhuyenmai/'.$vl->id)}}">Bỏ khuyến mãi</a></td>
                                </tr>  
                            @endforeach
                        @endisset  
                </tbody>
                
            </table>
             
        </div>
    </div>
</div>

@endsection