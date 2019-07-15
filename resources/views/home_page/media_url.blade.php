<!DOCTYPE html>
<html lang="en">
<head>
    <title>Desigram</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background: #eeeeee;">
<div class="text-center" style="padding: 0px;border-bottom: 2px solid #ffffff;">
    <div class="navbar-header">
        <a class="navbar-brand logo" href="#"><span>D-Gram</span></a>
        <!-- <a class="navbar-brand" href="#"><img src="{{asset('assets/img/pdf_logo.PNG')}}"></a> -->
    </div>
</div>
<div class="jumbotron text-center" style="left: 70%; top: 50%;">
    <form action="" method="post">
        {{csrf_field()}}
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4">
                <!-- <input type="submit"value="Find"  /> -->
                <!-- <div class="first-search-add" style="overflow: hidden; padding-right: .5em;">
                  <input type="text" name="searchUser1" class="form-control" placeholder="Search by instagram user name" style="height: 45px;">
                </div> -->

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
        <!-- <div style="margin-top: 15px;">
          <button class="btn btn-success btn-lg">Search</button>
        </div> -->
    </form>
</div>
</body>
</html>
<script type="text/javascript" src="{{asset('assets/js/style.js')}}"></script>
