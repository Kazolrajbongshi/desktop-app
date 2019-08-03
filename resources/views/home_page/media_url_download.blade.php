<!DOCTYPE html>
<html lang="en">
<head>
    <title>Desigram</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" media="mediatype and|not|only (expressions)" href="print.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('assets/js/papaparse.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style type="text/css">


        .load__none {
            display: none;
            color: #fff;
        }

        .load__animation {
            border: 5px solid #06af94;
            border-top-color: #e50914;
            border-top-style: groove;
            height: 100px;
            width: 100px;
            border-radius: 100%;
            position: relative;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1000;
            margin: auto;
            -webkit-animation: turn 1.5s linear infinite;
            -o-animation: turn 1.5s linear infinite;
            animation: turn 1.5s linear infinite;
        }

        .load {
            position: fixed;
            /*background: url('assets/img/preloader.png') no-repeat 50% fixed / cover;);*/
            background: black;
            width: 100%;
            height: 100vh;
            top: 0px;
            left: 0px;
            right: 0px;
            opacity: 0.8;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 999;
        }

        .load__container {
            position: relative;
        }

        @keyframes turn {
            from {
                transform: rotate(0deg)
            }
            to {
                transform: rotate(360deg)
            }
        }

        .load__title {
            color: #fff;
            font-size: 2rem;
        }


        @keyframes loadPage {
            0% {
                opacity: 1;
            }
            50% {
                opacity: .5;
            }
            100% {
                opacity: 1;
            }

        }

        .column {
            float: left;
            width: 33.33%;
            padding: 5px;
        }

        /* Clearfix (clear floats) */
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        @media screen and (max-width: 500px) {
            .column {
                width: 100%;
            }

            .btn2 {
                transform: translate(-9%, -50%);
            }

        }

    </style>
</head>
<body style="background: #eeeeee;">

<!-- <div class="jumbotron text-center" style="padding-top: 0px;padding-bottom: 5px;margin-bottom: 15px;"> -->
<nav class="navbar navbar-default" style="padding: 0;background-color: #10b3b3;">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand logo" href="#"><span>D-Gram</span></a>
            <!-- <a class="navbar-brand" href="#"><img src="{{asset('assets/img/pdf_logo.PNG')}}"></a> -->
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" id="myTab" role="tablist"
                style="border-bottom: #ffffff;    float: right;margin: 0 auto;display: table;table-layout: fixed">
                @if(isset($home_active))
                <li class="nav-item active" style="border-right: 1px solid #10b3b3;">
                    <a class="nav-link" aria-controls="home" aria-selected="true">Home</a>
                </li>
                @else
                <li class="nav-item" style="border-right: 1px solid #10b3b3;">
                    <a class="nav-link" role="tab" aria-controls="home" aria-selected="true">Home</a>
                </li>
                @endif
                @if(isset($about_active))
                <li class="nav-item active" style="border-right: 1px solid #10b3b3;">
                    <a class="nav-link" aria-controls="profile" aria-selected="false">About Us</a>
                </li>
                @else
                <li class="nav-item" style="border-right: 1px solid #10b3b3;">
                    <a class="nav-link" aria-controls="profile" aria-selected="false">About Us</a>
                </li>
                @endif
                @if(isset($contact_active))
                <li class="nav-item active">
                    <a class="nav-link" aria-controls="contact" aria-selected="false">Contact Us</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" aria-controls="contact" aria-selected="false">Contact Us</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="tab-pane" id="mediasearch" role="tabpanel" aria-labelledby="contact-tab">
    <div class="jumbotron text-center" id="media_search_div"
         style="padding-top: 0px;padding-bottom: 5px;margin-bottom: 15px;">
        <form action="{{URL::to('media-url-display')}}" method="post">
            {{csrf_field()}}
            <div class="row">

                <div class="col-sm-4 col-sm-offset-4">

                    <div class="first-search-add" style="overflow: hidden; padding-right: 0px; margin-top: 20%;">

                        <input type="text" name="appImageUrl" class="form-control"
                               placeholder="Enter your Image or Video URL"

                               style="height: 46px;  padding: 10px;border-radius: 10px; border: solid 1px orange; color: slategrey;">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success btn-lg "
                            style="float:center; background-color: #ffffff;color: #000000;border-color: #ccc;">
                        Submit
                    </button>

                </div>
            </div>
        </form>
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
