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
                                <a href="{{ url('member/home') }}">Home</a>
                            </li>
                            <li class="active">Shopping Cart</li>
                        </ol>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="table-responsive cart_info">
                                <table class="table table-condensed">
                                    <thead style="background-color: #3498db;">
                                        <tr class="cart_menu text-center">
                                            <td class="image">Mặt Hàng</td>
                                            <td class="description"></td>
                                            <td class="price">Đơn Giá</td>
                                            <td class="quantity">Số lượng</td>
                                            <td class="total">Thành Tiền</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @if (session()->has('cart'))
                                            @foreach ($data as $sp)
                                                
                                            <tr id="{{$sp['id']}}">
                                                <td class="cart_product">
                                                    <a>
                                                        <img src="{{asset('upload/'.$sp['anh'])}}" alt="" style="width: 100px; height: 100px;">
                                                    </a>
                                                </td>
                                                <td class="cart_description">
                                                    <h4>
                                                        <a>{{$sp['tensp']}}</a>
                                                    </h4>
                                                    <p>sản phẩm id: {{$sp['id']}}</p>
                                                </td>
                                                <td class="cart_price">
                                                    @if ($sp['trangthaisp'] == 1)
                                                        @php
                                                            $giamoi = $sp['giasp']-($sp['giasp']*($sp['giamgia']/100));
                                                        @endphp
                                                        
                                                    @else 
                                                    @php
                                                    $giamoi = $sp['giasp'];
                                                @endphp
                                                    @endif
                                                    <p>{{$giamoi}}đ</p>
                                                    
                                                </td>
                                                <td class="cart_quantity">
                                                    <div class="cart_quantity_button">
                                                        <a class="cart_quantity_up" id="" name=""> + </a>
                                                        @foreach ($SS as $key => $ss)
                                                            @if ($sp['id'] == $key)
                                                                <input class="cart_quantity_input text-center" type="text" name="quantity" value="{{$ss['soluong']}}" autocomplete="off" size="2">
                                                                
                                                                @php
                                                                    $tong = $ss['soluong'] * $giamoi;
                                                                    $total = $total + $ss['soluong'] * $giamoi;
                                                                @endphp
                                                                
                                                            @endif
                                                        @endforeach	
                                                        <a class="cart_quantity_down" id="" name=""> - </a>
                                                    </div>
                                                </td>
                                                <td class="cart_total">
                                                    <p class="cart_total_price">{{$tong}}đ</p>
                                                </td>
                                                <td class="cart_delete">
                                                    <a class="cart_quantity_delete"  name="" >
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <div class="col-md-3">
                                <div class="total_area">
                                    <h4 class="text-center text-uppercase">Cart Total</h4>
                                    <ul>
                                        
                                        <li>Total 
                                            <span class="mr-4" id="total"> {{$total}} đ</span>
                                        </li>
                                    </ul>
                                    <a href="{{ url('member/thanhtoan') }}" class="btn btn-default update">Mua Hàng</a>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
    </div>
</section>
    
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('a.cart_quantity_delete').click(function(){
            var id = $(this).closest('tr').attr('id');
            
            var xacnhan = confirm('bạn muốn xóa sản phẩm ?');
            if( xacnhan == true){
                $.ajax({
                    method: "POST",
                    url: "/member/xoagiohang",
                    data: {
                            _token: '{{csrf_token()}}',
                            id_sp: id,                               
                        },
                    success: function (data){
                            alert(data);
                        }    
                });
                $(this).closest('td.cart_delete').closest('tr').remove();
            }    
        });


        $('a.cart_quantity_down').click(function(){				
			var id = $(this).closest('tr').attr('id');		
            var b = $(this).closest('tr#'+id).find('.cart_price').find('p').text();
			var gia = b.replace('đ','');
            var a = $('span#total').text();
            var total = a.replace('đ','');
            $('span#total').text(parseInt(total)-parseInt(gia)+'đ');	
			$.ajax({
                method: "POST",
                url: '/member/giamgiohang',
                data:{
                        _token: '{{csrf_token()}}',
                        id_sp: id,                               
                    },
                success:function(data){
					$('tr#'+id).find('.cart_quantity_input').attr('value',data);
					$('tr#'+id).find('.cart_total_price').text(gia*data+'đ');
					if(data == 0){
						$('tr#'+id).hide();
					}
                }
            });								
		});

        var tong = 0;
        $('a.cart_quantity_up').click(function(){				
			var id = $(this).closest('tr').attr('id');
			var b = $(this).closest('tr#'+id).find('.cart_price').find('p').text();
			var gia = b.replace('đ','');
            var a = $('span#total').text();
            var total = a.replace('đ','');
            $('span#total').text(parseInt(total) + parseInt(gia)+'đ')								
			$.ajax({
                method: "POST",
                url: '/member/tanggiohang',
                data:{
                    _token: '{{csrf_token()}}',
                    id_sp: id,                               
                },
                success:function(data){
					tong = gia*data;
					$('tr#'+id).find('.cart_quantity_input').attr('value',data);
					$('tr#'+id).find('.cart_total_price').text(tong+'đ');													
                }    
            });									
		})

    })
</script>
    
@endsection

    