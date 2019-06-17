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
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="jumbotron text-center">
  <p>Serch User</p>
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <form action="{{URL::to('/search')}}" method="post">
            {{csrf_field()}}
            <input type="text" name="searchUser" class="form-control" placeholder="Search user by instagram user name">
            <button type="submit">Search</button>
        </form>

    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
    <a href="{{url('follower-and-following-list')}}">
      <div class="follower_upper">
        <p><i class="fa fa-instagram"></i>&nbsp;Tesla</p>
        <h2 class="text-center text-color"><span>2</span>.66M</h2>
      </div>
    </a>
    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Lorem ipsum dolor sit amet,consecuti..." data-caption="Comment : 100  Like : 200" data-image="{{asset('assets/img/tesla.jpg')}}" data-target="#image-gallery">
      <div class="follower_lists">
        <div class="row">
          <div class="col-sm-3">           
            <img src="{{asset('assets/img/tesla.jpg')}}" alt="" height="50" width="75">        
          </div>
          <div class="col-sm-9">
            <p>Lorem ipsum dolor sit amet,consecuti...</p>
            <p><i class="fa fa-comment"></i> 100 &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> 200 <span class="pull-right"><i class="fa fa-calendar"></i> 15-06-2019</span></p>
          </div>
        </div>
      </div>
      </a>
      <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Lorem ipsum dolor sit amet,consecuti..." data-caption="Comment : 300  Like : 500" data-image="{{asset('assets/img/tesla.jpg')}}" data-target="#image-gallery">
      <div class="follower_lists">
        <div class="row">
          <div class="col-sm-3">
            <img src="{{asset('assets/img/tesla.jpg')}}" alt="" height="50" width="75">
          </div>
          <div class="col-sm-9">
            <p>Lorem ipsum dolor sit amet,consecuti...</p>
            <p><i class="fa fa-comment"></i> 300 &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> 500 <span class="pull-right"><i class="fa fa-calendar"></i> 15-06-2019</span></p>
          </div>
        </div>
      </div>
    </a>
      <div class="follower_lists">
        <div class="row">
          <div class="col-sm-3">
            <img src="{{asset('assets/img/tesla.jpg')}}" alt="" height="50" width="75">
          </div>
          <div class="col-sm-9">
            <p>Lorem ipsum dolor sit amet,consecuti...</p>
            <p><i class="fa fa-comment"></i> 100 &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> 200 <span class="pull-right"><i class="fa fa-calendar"></i> 15-06-2019</span></p>
          </div>
        </div>
      </div>
      <div class="follower_lists">
        <div class="row">
          <div class="col-sm-3">
            <img src="{{asset('assets/img/tesla.jpg')}}" alt="" height="50" width="75">
          </div>
          <div class="col-sm-9">
            <p>Lorem ipsum dolor sit amet,consecuti...</p>
            <p><i class="fa fa-comment"></i> 100 &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> 200 <span class="pull-right"><i class="fa fa-calendar"></i> 15-06-2019</span></p>
          </div>
        </div>
      </div>
      <div class="follower_lists">
        <div class="row">
          <div class="col-sm-3">
            <img src="{{asset('assets/img/tesla.jpg')}}" alt="" height="50" width="75">
          </div>
          <div class="col-sm-9">
            <p>Lorem ipsum dolor sit amet,consecuti...</p>
            <p><i class="fa fa-comment"></i> 100 &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> 200 <span class="pull-right"><i class="fa fa-calendar"></i> 15-06-2019</span></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
    <a href="#">
      <div class="follower_upper">
        <p><i class="fa fa-instagram"></i>&nbsp;Ford</p>
        <h2 class="text-center text-color"><span>3</span>.99M</h2>
      </div>
    </a>
    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Lorem ipsum dolor sit amet,consecuti..." data-caption="Comment : 600  Like : 400" data-image="{{asset('assets/img/ford.jpg')}}" data-target="#image-gallery">
      <div class="follower_lists">
        <div class="row">
          <div class="col-sm-3">
            <img src="{{asset('assets/img/ford.jpg')}}" alt="" height="50" width="75">
          </div>
          <div class="col-sm-9">
            <p>Lorem ipsum dolor sit amet,consecuti...</p>
            <p><i class="fa fa-comment"></i> 600 &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> 400 <span class="pull-right"><i class="fa fa-calendar"></i> 15-06-2019</span></p>
          </div>
        </div>
      </div>
    </a>
    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Lorem ipsum dolor sit amet,consecuti..." data-caption="Comment : 450  Like : 200" data-image="{{asset('assets/img/ford.jpg')}}" data-target="#image-gallery">
      <div class="follower_lists">
        <div class="row">
          <div class="col-sm-3">
            <img src="{{asset('assets/img/ford.jpg')}}" alt="" height="50" width="75">
          </div>
          <div class="col-sm-9">
            <p>Lorem ipsum dolor sit amet,consecuti...</p>
            <p><i class="fa fa-comment"></i> 450 &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> 200 <span class="pull-right"><i class="fa fa-calendar"></i> 15-06-2019</span></p>
          </div>
        </div>
      </div>
    </a>
      <div class="follower_lists">
        <div class="row">
          <div class="col-sm-3">
            <img src="{{asset('assets/img/ford.jpg')}}" alt="" height="50" width="75">
          </div>
          <div class="col-sm-9">
            <p>Lorem ipsum dolor sit amet,consecuti...</p>
            <p><i class="fa fa-comment"></i> 500 &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> 300 <span class="pull-right"><i class="fa fa-calendar"></i> 15-06-2019</span></p>
          </div>
        </div>
      </div>
      <div class="follower_lists">
        <div class="row">
          <div class="col-sm-3">
            <img src="{{asset('assets/img/ford.jpg')}}" alt="" height="50" width="75">
          </div>
          <div class="col-sm-9">
            <p>Lorem ipsum dolor sit amet,consecuti...</p>
            <p><i class="fa fa-comment"></i> 500 &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> 300 <span class="pull-right"><i class="fa fa-calendar"></i> 15-06-2019</span></p>
          </div>
        </div>
      </div>
      <div class="follower_lists">
        <div class="row">
          <div class="col-sm-3">
            <img src="{{asset('assets/img/ford.jpg')}}" alt="" height="50" width="75">
          </div>
          <div class="col-sm-9">
            <p>Lorem ipsum dolor sit amet,consecuti...</p>
            <p><i class="fa fa-comment"></i> 500 &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> 300 <span class="pull-right"><i class="fa fa-calendar"></i> 15-06-2019</span></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
    <a href="#">
      <div class="follower_upper">
        <p><i class="fa fa-instagram"></i>&nbsp;Lambarghini</p>
        <h2 class="text-center text-color"><span>9</span>.25M</h2>
      </div>
    </a>
    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Lorem ipsum dolor sit amet,consecuti..." data-caption="Comment : 300  Like : 250" data-image="{{asset('assets/img/lamborghini.jpg')}}" data-target="#image-gallery">
      <div class="follower_lists">
        <div class="row">
          <div class="col-sm-3">
            <img src="{{asset('assets/img/lamborghini.jpg')}}" alt="" height="50" width="75">
          </div>
          <div class="col-sm-9">
            <p>Lorem ipsum dolor sit amet,consecuti...</p>
            <p><i class="fa fa-comment"></i> 300 &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> 250 <span class="pull-right"><i class="fa fa-calendar"></i> 15-06-2019</span></p>
          </div>
        </div>
      </div>
    </a>
    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Lorem ipsum dolor sit amet,consecuti..." data-caption="Comment : 800  Like : 550" data-image="{{asset('assets/img/lamborghini.jpg')}}" data-target="#image-gallery">
      <div class="follower_lists">
        <div class="row">
          <div class="col-sm-3">
            <img src="{{asset('assets/img/lamborghini.jpg')}}" alt="" height="50" width="75">
          </div>
          <div class="col-sm-9">
            <p>Lorem ipsum dolor sit amet,consecuti...</p>
            <p><i class="fa fa-comment"></i> 800 &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> 550 <span class="pull-right"><i class="fa fa-calendar"></i> 15-06-2019</span></p>
          </div>
        </div>
      </div>
    </a>
      <div class="follower_lists">
        <div class="row">
          <div class="col-sm-3">
            <img src="{{asset('assets/img/lamborghini.jpg')}}" alt="" height="50" width="75">
          </div>
          <div class="col-sm-9">
            <p>Lorem ipsum dolor sit amet,consecuti...</p>
            <p><i class="fa fa-comment"></i> 300 &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> 250 <span class="pull-right"><i class="fa fa-calendar"></i> 15-06-2019</span></p>
          </div>
        </div>
      </div>
      <div class="follower_lists">
        <div class="row">
          <div class="col-sm-3">
            <img src="{{asset('assets/img/lamborghini.jpg')}}" alt="" height="50" width="75">
          </div>
          <div class="col-sm-9">
            <p>Lorem ipsum dolor sit amet,consecuti...</p>
            <p><i class="fa fa-comment"></i> 300 &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> 250 <span class="pull-right"><i class="fa fa-calendar"></i> 15-06-2019</span></p>
          </div>
        </div>
      </div>
      <div class="follower_lists">
        <div class="row">
          <div class="col-sm-3">
            <img src="{{asset('assets/img/lamborghini.jpg')}}" alt="" height="50" width="75">
          </div>
          <div class="col-sm-9">
            <p>Lorem ipsum dolor sit amet,consecuti...</p>
            <p><i class="fa fa-comment"></i> 300 &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> 250 <span class="pull-right"><i class="fa fa-calendar"></i> 15-06-2019</span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="image-gallery-title"></h4>
            </div>
            <div class="modal-body">
                <img id="image-gallery-image" class="img-responsive" src="">
            </div>
            <div class="modal-footer">

                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" id="show-previous-image">Previous</button>
                </div>

                <div class="col-md-8 text-justify" id="image-gallery-caption">
                    This text will be overwritten by jQuery
                </div>

                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" id="show-next-image" class="btn btn-default">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>
<script type="text/javascript" src="{{asset('assets/js/style.js')}}"></script>