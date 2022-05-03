@extends('admin.layout.app')
@section('content')
<div class="row">
    
    <div class="col-3"></div>
    <div class="col-9">
    <div class="card">
        
        <div class="table-responsive">
            @if (session('success'))
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Quốc Gia</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value) 
                    <tr class="table-active">
                        <th scope="row">{{$value->id}}</th>
                        <td>{{$value->tenth}}</td>
                        <td><a  class="btn btn-primary" href="{{url('admin/thuong-hieu/xoa/'.$value->id)}}">Xóa</a></td>
                    </tr>
                    @endforeach 
                    
                </tbody>
            </table>
            <button><a  class="btn btn-info" href="{{url('admin/thuong-hieu/themth')}}">Thêm Thương Hiệu</a></button>
        </div>
        {{ $data->links() }}
    </div>
</div>
</div>
@endsection