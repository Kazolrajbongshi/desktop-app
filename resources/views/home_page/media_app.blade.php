<!DOCTYPE html>
<html>
<head>
    <title>Desigram</title>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('assets/js/papaparse.min.js')}}"></script>
    <style type="text/css">


        .load__none {
            display: none;
            color:#fff;
        }

        .load__animation{
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
            align-items:center;
            justify-content: center;
            z-index: 999;
        }
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .btn1 {
            position: absolute;
            /*top: 107%;*/
            left: 80%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            background-color: #555;
            color: white;
            font-size: 16px;
            /*padding: 12px 24px;*/
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
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
        @media (max-width: 768px) {
            btn1{
                /*position: absolute;*/
                /*top: 107%;*/
                left: 75%;
            }
        }
        @media screen and (max-width: 500px) {
            .column {
                width: 100%;
            }
        @media (min-width: 769px) and (max-width: 992px) {
            btn1{
                padding:4px 9px;
                font-size:90%;
                line-height: 1.2;
            }
        }
        .load__container {
            position: relative;
        }
        .img-responsive{
            margin:0 auto;
        }
        @keyframes turn {
            from {transform: rotate(0deg)}
            to {transform: rotate(360deg)}
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
    </style>


</head>
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
<body style="background: #eeeeee;">
<div class="tab-pane active" id="mediasearch" role="tabpanel" aria-labelledby="contact-tab">

    <div class="tab-pane" id="mediasearch" role="tabpanel" aria-labelledby="contact-tab">
        <div class="jumbotron text-center" id="media_search_div" style="padding-top: 0px;padding-bottom: 5px;margin-bottom: 15px;">
            <form action="{{url('/media-app-image')}}" method="post">
                {{csrf_field()}}
                <div class="row">

                    <div class="col-sm-4 col-sm-offset-4" style="margin-top: 5%;">
                        <button type="submit" class="btn btn-success btn-lg "
                                style="float: right;background-color: #ffffff;color: #000000;border-color: #ccc;border-left: 2px solid #10b3b3;">
                            Search
                        </button>
                        <div class="first-search-add" style="overflow: hidden; padding-right: 0px;">
                            <input type="text" name="pictureSearch" class="form-control"
                                   placeholder="Enter Username"
                                   style="height: 46px;">
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <div class="jumbotron text-center" id="media_search_div" style="padding-top: 0px;padding-bottom: 5px;margin-bottom: 15px;">
            <form action="{{URL::to('app-url-download')}}" method="post">
                {{csrf_field()}}
                <div class="row">

                    <div class="col-sm-4 col-sm-offset-4">
                        <button type="submit" class="btn btn-success btn-lg "
                                style="float: right;background-color: #ffffff;color: #000000;border-color: #ccc;border-left: 2px solid #10b3b3;">
                            Download
                        </button>
                        <div class="first-search-add" style="overflow: hidden; padding-right: 0px;">

                            <input type="text" name="appImageUrl" class="form-control"
                                   placeholder="Enter your Image or Video URL for Download"

                                   style="height: 46px;">
                        </div>

                    </div>
                </div>
            </form>
        </div>
        @if(isset($pictures))
        <div class="row">
            <div class="row">
                <div class="col-md-2"></div>

                <div class="col-md-8">
                    @foreach($pictures->items as $picture)
                    <!--                    --><?php
                    //                    print_r($picture->image_versions2->candidates[0]->url);
                    //                    exit();
                    //                    ?>
                    <div class="column">
                        <form action="{{url('picture-download')}}" method="post">
                            @csrf

                            @if(isset($picture->video_versions[0]->url))
                            <video style="display:block; height: 300px; width: 100%;" controls>
                                <source src="{{$picture->video_versions[0]->url}}" type="video/mp4">

                                Your browser does not support the video tag.
                            </video>

                            @elseif(isset($picture->image_versions2->candidates[0]->url))
                            <img src="{{$picture->image_versions2->candidates[0]->url}}" alt="Snow"style="display:block; height: 300px; width: 100%;">
                            @endif
                            @if(isset($picture->video_versions[0]->url))
                            <input type="hidden" name="videoUrl" value="{{$picture->id}}">
                            @elseif(isset($picture->image_versions2->candidates[0]->url))
                            <input type="hidden" name="imageUrl" value="{{$picture->image_versions2->candidates[0]->url}}">
                            @endif
                            <!--                                <input type="text"style="width: 50%; margin: 0;">-->
<!--                            <button type="submit" class="btn btn-info" style="width:100%;">Download</button>-->
                            <br>
                            <button type="submit" class="btn"><i class="fa fa-download"></i></button>
                            <br>
                        </form>

                    </div>
                    @endforeach

                </div>

                <div class="col-md-2"></div>
            </div>
        </div>
        @endif
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

