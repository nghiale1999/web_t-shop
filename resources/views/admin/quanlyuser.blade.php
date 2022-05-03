@extends('admin.layout.app')
@section('content')
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
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">cấp độ</th>
                        <th scope="col">số điện thoại</th>
                        <th scope="col">địa chỉ</th>
                        <th scope="col">xóa</th>
                        <th scope="col">Khóa tài khoản</th>
                        <th scope="col">gửi cảnh báo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $value) 
                    <tr class="table-active">
                        <th scope="row">{{$value->id}}</th>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        @if ($value->capdo == 0)
                            <td>member</td>
                        @elseif ($value->capdo == 1)
                            <td>admin</td>
                        @else
                            <td>đã khóa</td>
                        @endif

                        
                        <td>{{$value->sdt}}</td>
                        <td>{{$value->diachi}}</td>
                        
                        <td  class="delete"><a  class=" delete" id="{{$value->id}}">Xóa</a></td>
                        @if ($value->capdo == 0)
                            <td  class="khoa"><a  class=" khoa" href="{{url('admin/khoa_user/'.$value->id)}}">khóa</a></td>
                        @elseif ($value->capdo == 1)
                            <td  class="khoa"><a  class=" khoa" href="{{url('admin/khoa_user/'.$value->id)}}">khóa</a></td>
                        @else
                            <td  class="khoa"><a  class=" khoa" href="{{url('admin/mokhoa_user/'.$value->id)}}">Mở khóa</a></td>
                        @endif
                        
                        <td><a  class="btn btn-danger" href="{{url('admin/quanlyuser/hotro/'.$value->id)}}">Hỗ Trợ</a></td>
                    </tr>
                    @endforeach 
                </tbody>
                
            </table>
            {{ $user->links() }}
        </div>
    </div>
</div>

@endsection

@section('script')
<script>

    $(document).ready(function(){
    
    
        $('a.delete').click(function(){
            
            var id = $(this).attr('id');
            
            
            $.ajax({
    
                method: "POST",
                url: '/admin/delete_user',
                data:{
                    _token: '{{csrf_token()}}',               
                    user_id: id,                               
                },
                success:function(data){
                    alert(data);
    
                }    
            });
    
            $(this).closest('td.delete').closest('tr').remove();
            
            
    
        })


    
    })
    
    
    </script>
@endsection