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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    

    <title>Login</title>
</head>
<body style="background: #eeeeee;">
<!-- top header -->
<div style="padding: 0px;border-bottom: 2px solid #ffffff;">
  <div class="navbar-header">
    <a class="navbar-brand logo" href="#" style="    height: 50px;padding: 5px 15px;line-height: 40px;font-size: 2rem !important;font-style: italic;"><span>D-Gram</span></a>
      <!-- <a class="navbar-brand" href="#"><img src="{{asset('assets/img/pdf_logo.PNG')}}"></a> -->
  </div>

</div>
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
                <form role="form" method="POST" action="{{url('/loginSubmit')}}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="email">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="username" value="{{ old('username') }}"  required="">
                        @if ($errors->has('username'))
                        <span class="help-block">
                              <strong>{{ $errors->first('username') }}</strong>
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
@if(session('user_pass_err'))
<script type="text/javascript">
    $(document).ready(function(){
       swal("Error!","Username or password not found", "error");
   });
</script>
@endif
</body>
</html>
