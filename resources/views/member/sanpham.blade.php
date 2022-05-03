@extends('member.layout.app')
@section('content')
<div class="addproduct container mt-5">
    <div class="table col-sm-12">
        @if (session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
        @endif
        <table class="table table-condensed">
            <thead style="height: 50px;">
                <tr class="cart_menu" style="background: #3498db; color: rgb(255, 255, 255);">
                    <td class="id">ID</td>
                    <td class="description">Name</td>
                    <td class="price">Image</td>
                    <td class="total">Price</td>
                    <td class="Action">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $sp)
                    <tr>
                        <td class="cart_id"><p>{{$sp->id}}</p></td>
                        <td class="cart_name"><h4><a>{{$sp->tensp}}</a></h4></td>
                        <td class="cart_image">
                        <img class="media-object" src="{{asset('upload/'.$sp->anh)}}" style="width: 100px;height: 100px;"></td>
                        <td class="cart_price">
                            <p>{{$sp->giasp}}</p>
                        </td>
                        <td class="cart_action">
                            <a class="cart_quantity" href="{{url('member/suasanpham/'.$sp->id)}}" style="margin-right: 60px;">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="cart_quantity" href="{{url('member/xoasanpham/'.$sp->id)}}">
                                <i class="fa fa-times"></i>
                            </a>
                        </td>
                    </tr> 
                @endforeach
                
                    
                </tbody>
            </table>
                
        </div>
        {{ $data->links() }}
</div>
<a href="{{ url('member/themsanpham') }}"><button type="submit" name="submit" class="btn btn-default update">Thêm Sản Phẩm</button></a> 
@endsection