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
                        <td>{{$value->tenqg}}</td>
                        <td><a  class="btn btn-primary" href="{{url('admin/quocgia/xoa/'.$value->id)}}">Xóa</a></td>
                    </tr>
                    @endforeach 
                    
                </tbody>
            </table>
            <button><a  class="btn btn-info" href="{{url('admin/quocgia/themquocgia')}}">Thêm Quốc Gia</a></button>
        </div>
        {{ $data->links() }}
    </div>
</div>
</div>
@endsection