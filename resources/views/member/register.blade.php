<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Register</title>
</head>
<body>
    <div class="login mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-login" src="{{asset('member/img/verified-account.png')}}" style="max-width: 100%; height: auto;">
                </div>
                <div class="col-md-8 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                            <h3><strong>Sign Up</strong></h3>
                            </div>
							@if (session('success'))
								<div class="alert alert-success">
									<p>{{ session('success') }}</p>
								</div>
							@endif
                            <form id="up" method="post" enctype="multipart/form-data">
								@csrf
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="up_username" name="name">
                                    <p class="username_error" style="color: red;"></p>
                                </div>
                                <div class="form-group first">
                                    <label for="username">Email</label>
                                    <input type="text" class="form-control" id="up_username" name="email">
                                    <p class="username_error" style="color: red;"></p>
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="up_pass" name="password">
                                    <p class="pass_error" style="color: red;"></p>
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="cpassword">Confirm Password</label>
                                    <input type="password" class="form-control" id="up_pass_confirm" name='passwordcf'>
                                    <p class="confirm_error" style="color: red;"></p>
                                </div>
                                <input class="mb-4" type="file" name="file">
								<ul class="alert text-danger">
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
                                <input type="submit" value="Register Now" class="btn text-white btn-block btn-primary mb-4" name="submit">
                                <p>Already have an Account? <a href="{{url('member/login')}}">Login Now</a></p>
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