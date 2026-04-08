<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="{{asset('atmin/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('atmin/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('atmin/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('atmin/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="v{{asset('atmin/endors/selectFX/css/cs-skin-elastic.css')}}">

    <link rel="stylesheet" href="{{asset('atmin/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
            <div class="login-logo">
    <a href="index.html">
        <img class="align-content" src="images/logo.png" alt="">
    </a>
</div>
<div class="login-form">
    <!-- Tambahkan pesan sukses/error di sini -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
                <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                    <label class="pull-right">
                        <a href="#">Forgotten Password?</a>
                    </label>
                </div>
                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Login</button>
            </form>
        </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('atmin/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('atmin/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('atmin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('atmin/js/main.js')}}"></script>


</body>

</html>
