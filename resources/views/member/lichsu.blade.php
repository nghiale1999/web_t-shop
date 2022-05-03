@extends('member.layout.app')
@section('content')
<div class="lsmuahang">
    @if (session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif
    <table class="order container">
        <h4 class="text-center">Lịch Sử Mua Hàng</h4>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ngày Mua</th>
                <th>Trạng Thái</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $ls)
                <tr>
                    <td>{{$ls->id}}</td>
                    <td>{{$ls->created_at}}</td>
                    <td><span class="success">{{$ls->trangthai}}</span></td>
                    <td>
                        <a href="{{ url('member/chitiet-lichsu/'.$ls->id)}}" class="view">Chi Tiết</a>
                        <span class="ml-1 mr-1">/</span>
                        <a class="view" href="{{ url('member/xoa-lichsu/'.$ls->id)}}">xóa</a>
                    </td>

                </tr>
                
            @endforeach
          
        
            
        </tbody>
    </table>

</div>
    
@endsection