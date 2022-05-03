<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('./member/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('./member/dist/assets/owl.theme.default.min.css')}}">
    <script src="{{asset('./member/dist/owl.carousel.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('./member/css/home.css')}}">
    <link rel="stylesheet" href="{{asset('./member/css/slider.css')}}">
    <title>T-Shop</title>

</head>
<body>
    <div class="home">
        <!-- header -->
        @include('member.layout.header')
        <!-- header -->
        
        @yield('content')
        <!-- Footer -->
        @include('member.layout.footer')
        <!-- Footer -->        
    </div>
   
   
   
</body>
</html>

 @yield('script')