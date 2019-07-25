<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- bootstrap css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
          id="bootstrap-css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Desigram</title>
</head>
<body class="login-page">
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
<div class="container-fluid">
    <div class="row">
        <div class="login-holder" style="left: 50%; top: 50%;">
            <a href="#">
                <form action="{{URL::to('/sms-page')}}" method="post">
                    @csrf
                    <input type="text" class="form-control" placeholder="Enter Verification Code" name="code">
<!--                    <input type="submit">-->
                    <br>
                    <button class="btn btn-info btn-lg" style="background-color: #06af94">Submit</button>
                </form>

            </a>
        </div>

    </div>
</div>
<!-- jquery core -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<!-- bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!-- custom js -->
<script src="{{asset('assets/js/main.js')}}"></script>

</body>
</html>

