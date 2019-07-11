<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style1.css')}}">
    <!-- bootstrap css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>管理者ログイン</title>
</head>
<body class="auth_page @if(isset($sign_in_page)){{$sign_in_page}} @elseif(isset($success_page)) {{$success_page}}@endif" >
<!-- top header -->

<header>
    <div class="container-fluid">
        <div class="row top_fixed">
            <div class="navbar-header">
                <a class="navbar-brand logo" href="#"><span>D-Gram</span></a>

            </div>
        </div>

    </div>

</header>

<div class="container u_main_content">
    <div class="row">
        <div class="wizard">

            <div class="sign_in_form">
                <div class="form_title">
                    <h3>Login</h3>
                    @if(session('login_err'))
                    <div class="alert alert-danger">
                        {{ session('login_err') }}
                    </div>
                    @endif
                </div>
                <form role="form" method="POST" action="{{ URL::to('admin-login-check') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email</label>
                        <input type="name" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}"  required="">
                        @if ($errors->has('email'))
                        <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="">
                        @if ($errors->has('password'))
                        <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
                    </div>

                    <div class="button_holder">
                        <button type="submit" class="btn registration_btn">Login</button>
                        <!-- <div class="form-group">
                          <a href="#">Help for regitering #Likes is here</a>
                        </div> -->
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- jquery core -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<!-- bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!-- custom js -->
<script src="{{asset('assets/js/main.js')}}"></script>

</body>
</html>
