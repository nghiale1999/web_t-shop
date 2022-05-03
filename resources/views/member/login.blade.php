<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('./member/css/login.cs')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="login.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="login mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-login" src="{{asset('./member/img/verified-account.png')}}" style="max-width: 100%; height: auto;">
                </div>
                <div class="col-md-8 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                            <h3><strong>Sign In</strong></h3>
                            </div>
                            <form id="in" method="post">
                              @csrf
                              @if (session('success'))
                                <div class="alert alert-success">
                                  <p>{{ session('success') }}</p>
                                </div>
                              @endif

                              
                   @php if(isset($_COOKIE['login_email']) && isset($_COOKIE['login_pass']))
                   {
                      $login_email = $_COOKIE['login_email'];
                      $login_pass  = $_COOKIE['login_pass'];
                      $is_remember = "checked='checked'";
                   }
                   else{
                      $login_email ='';
                      $login_pass = '';
                      $is_remember = "";
                    }
                   @endphp
                                <div class="form-group first">
                                    <label for="username">Email</label>
                                    <input type="text" class="form-control" id="username" name="email" placeholder="abc@gmail.com" value="{{$login_email}}">
                                    <p class="enter_username" style="color: red;"></p>
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value="{{$login_pass}}" placeholder="password">
                                    <p class="enter_pass" style="color: red;"></p>
                                </div>
                                <div class="d-flex mb-5 align-items-center">
                               
                                    <input type="checkbox" name="remember" {{$is_remember}}>
                                    Remember me </label>
                                <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="{{ url('member/fogot-password') }}" class="forgot-pass">Forgot Password</a></span>
                                </div>
                                <ul class="alert text-danger">
                                  @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                  @endforeach
                                </ul>
                                <input type="submit" value="Log In" class="btn text-white btn-block btn-primary">
                                <span class="d-block text-left my-4 text-muted"> or sign in with</span>
                                <div class="social-login">
                                <a href="#" class="facebook">
                                <img src="{{asset('./member/img/facebook.png')}}" style="width: 40px; height: 40px;">
                                </a>
                                <a href="#" class="google">
                                    <img src="{{asset('./member/img/324123.png')}}" style="width: 40px; height: 40px; margin-left: 5px;">
                                </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>