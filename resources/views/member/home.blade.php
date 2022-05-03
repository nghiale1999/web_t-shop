@extends('member.layout.app')

@section('content')
<div class="banner-wrap">
    <div class="container banner">
        <div class="slideshow">
            <div class="mySlides fade">
              <img src="./img/banner2.png" style="width:100%">
            </div>
            <div class="mySlides fade">
              <img src="./img/banner2.png" style="width:100%">
            </div>
            
            <div class="mySlides fade">
              <img src="./img/banner3.png" style="width:100%">
            </div>
            <div class="banner-dot">
                <span class="dot"></span> 
                <span class="dot"></span> 
                <span class="dot"></span> 
            </div>  
        </div>
        <div class="img-banner">
            <img src="img/banner1.png" alt="">
            <img src="img/banner2.png" alt="">
        </div>
        
    </div>
</div>
<h2 class="container">DANH MỤC</h2>
<div class="container position-relative pt-3 pt-lg-0 pb-5 mt-lg-n10">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card border-0 shadow-lg">
                <div class="card-body px-3 pt-grid-gutter pb-0">
                    <div class="row g-0 ps-1">
                        <div class="col-sm-2 px-2 mb-grid-gutter">
                            <a class="d-block text-center text-decoration-none me-1" href="">
                                <img class="d-block rounded mb-3" src="./img/men.jpg" alt="Men">
                                <p class="fs-base pt-1 mb-0">Men</p>
                            </a>
                        </div>
                        <div class="col-sm-2 px-2 mb-grid-gutter">
                            <a class="d-block text-center text-decoration-none me-1" href="">
                                <img class="d-block rounded mb-3" src="./img/cat-lg02.jpg" alt="Women">
                                <p class="fs-base pt-1 mb-0">Women</p>
                            </a>
                        </div>
                        <div class="col-sm-2 px-2 mb-grid-gutter">
                            <a class="d-block text-center text-decoration-none me-1" href="">
                                <img class="d-block rounded mb-3" src="./img/kid.jpg" alt="Kids">
                                <p class="fs-base pt-1 mb-0">Kids</p>
                            </a>
                        </div>
                        <div class="col-sm-2 px-2 mb-grid-gutter">
                            <a class="d-block text-center text-decoration-none me-1" href="">
                                <img class="d-block rounded mb-3" src="./img/tbdt.png" alt="Men">
                                <p class="fs-base pt-1 mb-0">Thiết Bị Điện Tử</p>
                            </a>
                        </div>
                        <div class="col-sm-2 px-2 mb-grid-gutter">
                            <a class="d-block text-center text-decoration-none me-1" href="">
                                <img class="d-block rounded mb-3" src="./img/dgd.png" alt="Men">
                                <p class="fs-base pt-1 mb-0">Đồ Gia Dụng</p>
                            </a>
                        </div>
                        <div class="col-sm-2 px-2 mb-grid-gutter">
                            <a class="d-block text-center text-decoration-none me-1" href="">
                                <img class="d-block rounded mb-3" src="./img/sach.png" alt="Men">
                                <p class="fs-base pt-1 mb-0">Sách</p>
                            </a>
                        </div>
                        <div class="col-sm-2 px-2 mb-grid-gutter">
                            <a class="d-block text-center text-decoration-none me-1" href="">
                                <img class="d-block rounded mb-3" src="./img/sk.png" alt="Men">
                                <p class="fs-base pt-1 mb-0">Sức Khỏe</p>
                            </a>
                        </div>
                        <div class="col-sm-2 px-2 mb-grid-gutter">
                            <a class="d-block text-center text-decoration-none me-1" href="">
                                <img class="d-block rounded mb-3" src="./img/sd.png" alt="Men">
                                <p class="fs-base pt-1 mb-0">Mỹ Phẩm</p>
                            </a>
                        </div>
                        <div class="col-sm-2 px-2 mb-grid-gutter">
                            <a class="d-block text-center text-decoration-none me-1" href="">
                                <img class="d-block rounded mb-3" src="./img/lt.png" alt="Men">
                                <p class="fs-base pt-1 mb-0">Máy Tính & Laptop</p>
                            </a>
                        </div>
                        <div class="col-sm-2 px-2 mb-grid-gutter">
                            <a class="d-block text-center text-decoration-none me-1" href="">
                                <img class="d-block rounded mb-3" src="./img/tbdt.png" alt="Men">
                                <p class="fs-base pt-1 mb-0">Thiết Bị Điện Tử</p>
                            </a>
                        </div>
                        <div class="col-sm-2 px-2 mb-grid-gutter">
                            <a class="d-block text-center text-decoration-none me-1" href="">
                                <img class="d-block rounded mb-3" src="./img/dgd.png" alt="Men">
                                <p class="fs-base pt-1 mb-0">Đồ Gia Dụng</p>
                            </a>
                        </div>
                        <div class="col-sm-2 px-2 mb-grid-gutter">
                            <a class="d-block text-center text-decoration-none me-1" href="">
                                <img class="d-block rounded mb-3" src="./img/sach.png" alt="Men">
                                <p class="fs-base pt-1 mb-0">Sách</p>
                            </a>
                        </div>
                      </div>                            
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fl container shadow-lg">
    <div class="flash-sale">
        <span class="fl-header"><img src="./img/fl.png" style="width: 110px; height: 30px;"></span>
            <p id="demo"></p>
    </div>
    <div id="wp-slider">
        <div class="owl-carousel owl-theme">
            @foreach ($data as $sp)
                @if ($sp->trangthaisp == 1)
                @php
                $giamoi = $sp->giasp-($sp->giasp*($sp->giamgia/100));
                @endphp
                <div class="item">
                    <img src="{{asset('upload/'.$sp->anh)}}" alt="">
                    <div class="wp-price">
                            <span class="gia">{{$sp->tensp}}</span><br>
                            <p>Giá mới: {{$giamoi}}đ</p>
                            <div class="bar-fl">
                                <span class="daban">Giá gốc: {{$sp->giasp}}đ</span>
                            </div>
                    </div>
                </div>
                @endif
            @endforeach
            
          
     
           
        </div>
    </div>
</div>
<div class="banner-duoi shadow-lg container mt-4">
    <img src="img/bn1.webp" alt="">
    <img src="img/bn2.webp" alt="">
    <img src="img/bn3.webp" alt="">
</div>
<ul class="status-bar shadow-lg container mt-4">
    <li class="goiy">
        <span>gợi ý hôm nay</span>
   </li>
    <li></li>
</ul>
<div class="box-container container">

    
    @foreach ($data as $sp)
        

    <div class="box">
        <a href="{{ url('member/chitiet-sanpham/'.$sp->id)}}" class="fas fa-heart"></a>
        <a href="{{ url('member/chitiet-sanpham/'.$sp->id)}}" class="fas fa-eye"></a>
        <a href="{{ url('member/chitiet-sanpham/'.$sp->id)}}"><img src="{{asset('upload/'.$sp->anh)}}" alt=""></a>
        <p>{{$sp->tensp}}</p>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
        </div>
        @if ($sp->trangthaisp == 1)
            @php
                $giamoi = $sp->giasp-($sp->giasp*($sp->giamgia/100));
            @endphp
            <p>Giá củ: {{$sp->giasp}}đ</p>
            <p>Giá mới: {{$giamoi}}đ</p>    
        @else   
            <br>
            <p class="mt-3">Giá: {{$sp->giasp}}đ</p>
        @endif
        <a  id="{{$sp->id}}" class="add-to-cart">Add to cart</a>
    </div>
    @endforeach
</div>

{{ $data->links() }}

@endsection

@section('script')
<script type="text/javascript">

    //Thay doi slide
    let slideIndex = 0;
    showSlides();
    
    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }

    //Countdown time
    var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();
    var x = setInterval(function() {
    var now = new Date().getTime();
    var distance = countDownDate - now;
    // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("demo").innerHTML = hours + "h "
    + minutes + "m " + seconds + "s ";

    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
    }, 1000);

    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })


    </script>
   
  

   <script>
   
           $(document).ready(function(){
   
               $('a.add-to-cart').click(function(){
                   var id = $(this).attr('id');
                   if({{Auth::check() && Auth::user()->capdo == 0}}){
                        var xacnhan = confirm('thêm sản phẩm vào giỏ hàng ?')
                        if( xacnhan==true ){
                    
                            $.ajax({
                                method: "POST",
                                url: '/member/themgiohang',
                                data:{
                                        _token: '{{csrf_token()}}',
                                        id_sp: id,                               
                                        },
                                success:function(data){
                                    alert(data);
        
                                }    
                            });
                        }
                        
                   }
                   
               })
           })
   
   </script>
@endsection

   