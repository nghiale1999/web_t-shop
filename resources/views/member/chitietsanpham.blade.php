@extends('member.layout.app')
@section('content')
<section class="product-details spad">
    <div class="container">
        @foreach ($data as $sp)
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" id="mainImage" src="{{asset('upload/'.$sp->anh)}}">
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$sp->tensp}}</h3>
                        <span>
                            
                        </span>
                        <div class="product__details__rating">
                            @for ($i = 1; $i <= 5; ++$i)
                                @if($i <= $tbs)
                                    <i class="fa fa-star"></i>
                                @else
                                    <i class="fa fa-star-o"></i>
                                @endif
                            @endfor
                            
                        </div>
                        <div class="product__details__price">{{$sp->giasp}}đ</div>
                        <p>{{$sp->mota}}</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <a class="dec qtybtn">-</a>
                                    <input class="value" type="text" value="1">
                                    <a class="inc qtybtn">+</a>
                                </div>
                            </div>
                        </div>
                        <a id="{{$sp->id}}" class="add-to-cart primary-btn">ADD TO CARD</a>
                        
                        @if (!empty($datapre))
                            <li><a class="btn btn-default back" href="{{URL::to('member/chitiet-sanpham/'.$datapre)}}">Pre</a></li>
                        @endif
                        @if (!empty($datanext))
                            <li><a class="btn btn-default back" href="{{URL::to('member/chitiet-sanpham/'.$datanext)}}">next</a></li>
                        @endif
                        <ul>
                            <li><b>Tình Trạng</b> <span>Số lượng còn lại {{$sp->soluong}}</span></li>
                            
                            <div class="product__details__rating">
                                <span><b>Đánh giá : </b></span>
                                <i id="{{$sp->id}}" class="fa fa-star"><input value="1" type="hidden"></i>
                                <i id="{{$sp->id}}" class="fa fa-star"><input value="2" type="hidden"></i>
                                <i id="{{$sp->id}}" class="fa fa-star"><input value="3" type="hidden"></i>
                                <i id="{{$sp->id}}" class="fa fa-star"><input value="4" type="hidden"></i>
                                <i id="{{$sp->id}}" class="fa fa-star"><input value="5" type="hidden"></i>
                            </div>
                        </ul>
                    </div>
                    <a class="btn btn-default back" href="{{url('member/home')}}">Quay Về</a>
                   
                </div>
            </div>
        @endforeach
        
    
    </div>
</section>
    
@endsection

@section('script')
<script>
   
    $(document).ready(function(){

        $('a.dec').click(function () { 
            var sl = $(this).closest('div.pro-qty').find('input.value').val();
            var a = parseInt(sl) - 1;
            $('input.value').attr('value', a);
            console.log(sl);
        });
        $('a.inc').click(function () { 
            var sl = $(this).closest('div.pro-qty').find('input.value').val();
            var a = parseInt(sl) + 1;
            $('input.value').attr('value', a);
        });

        $('a.add-to-cart').click(function(){
            var id = $(this).attr('id');
            var sl = $('input.value').val();
            var xacnhan = confirm('thêm sản phẩm vào giỏ hàng ?')
            if( xacnhan==true ){
         
                 $.ajax({
                     method: "POST",
                     url: '/member/themgiohangct',
                     data:{
                             _token: '{{csrf_token()}}', 
                             id_sp: id,
                             soluong: sl,                               
                             },
                     success:function(data){
                         alert(data);

                     }    
                 });
            }
            
        })

        $('.fa-star').click(function(){
            var sosao = $(this).find('input').val();
            var id = $(this).attr('id');
            
            $.ajax({
                method: "POST",
                url: '/member/danhgiasao',
                data:{
                    _token: '{{csrf_token()}}', 
                    id_sp: id,
                    sosao: sosao,                               
                },
                success:function(data){
                    alert(data);
                }    
            });

        })




    })

</script>
    
@endsection