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
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#defaultsearch" role="tab" aria-controls="home" aria-selected="true">Default Search</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#comparesearch" role="tab" aria-controls="profile" aria-selected="false">Comapare Search</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#mediasearch" role="tab" aria-controls="contact" aria-selected="false">Media Search</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade active" id="defaultsearch" role="tabpanel" aria-labelledby="home-tab">...</div>
  <div class="tab-pane fade" id="comparesearch" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane fade" id="mediasearch" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>
  <p>Serch User</p>
  <div class="row">
    <form action="{{URL::to('/search')}}" method="post">
            {{csrf_field()}}

    <div class="col-sm-4 ">
      <!-- <input type="submit"value="Find"  /> -->
      <button type="button" class="btn btn-success first-search-add-btn" style="float: right">Add</button>
      <div class="first-search-add" style="overflow: hidden; padding-right: .5em;">
        <input type="text" name="searchUser1" class="form-control" placeholder="First compare instagram user name">
      </div>

    </div>
    <div class="col-sm-4 ">
      <button type="button" class="btn btn-danger second-search-remove-btn" style="float: right;display: none;">Remove</button><button type="button" class="btn btn-success second-search-add-btn" style="float: right;display: none; margin-right: 5px;">Add</button>
      <div class="second-search-add" style="overflow: hidden; padding-right: .5em;display: none;">
        <input type="text" name="searchUser2" id="searchUser2" class="form-control" placeholder="Second compare instagram user name">
      </div>

    </div>
    <div class="col-sm-4 ">
      <button type="button" class="btn btn-success third-search-add-btn" style="float: right;display: none;">Add</button><button type="button" class="btn btn-danger third-search-remove-btn" style="float: right;display: none;">Remove</button>
      <div class="third-search-add" style="overflow: hidden; padding-right: .5em;display: none;">
        <input type="text" name="searchUser3" id="searchUser3" class="form-control" placeholder="Third compare instagram user name">
      </div>
    </div>
  </div>
  <div style="margin-top: 20px;">
    <button class="btn btn-success">Search</button>
  </div>
  </form>
</div>

<div class="container">
  <div class="row">
      @if(isset($searchResult1) && isset($profile1))
    <div class="col-sm-4">

    <a href="{{url('follower-and-following-list/'.$profile1->user->pk)}}">
      <div class="follower_upper">
        <p><i class="fa fa-instagram"></i>&nbsp;{{$profile1->user->username}}</p>
        <h2 class="text-center text-color">{{$profile1->user->follower_count}}</h2>
      </div>
    </a>
        <?php
        $counter = 0;
        ?>
        @foreach($searchResult1->items as $searchResult1)

    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="@if(isset($searchResult1->caption->text)){{$searchResult1->caption->text}}@endif" data-caption="Like : {{$searchResult1->like_count}}  @if(isset($searchResult1->view_count))Views : {{$searchResult1->view_count}}@endif" data-image="{{$searchResult1->image_versions2->candidates[0]->url}}" data-target="#image-gallery">

        <div class="follower_lists">
        <div class="row">
          <div class="col-sm-3">
            <img src="{{$searchResult1->image_versions2->candidates[0]->url}}" alt="" height="50" width="75">
          </div>
          <div class="col-sm-9">
            <p>@if(isset($searchResult1->caption->text)){{$searchResult1->caption->text}}@endif</p>
            <p> @if(isset($searchResult1->view_count))<i class="fa fa-comment"></i>{{$searchResult1->view_count}}@endif &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> {{$searchResult1->like_count}} <span class="pull-right"><i class="fa fa-calendar"></i>{{ date("d-m-Y", $searchResult1->taken_at)}}</span></p>
          </div>
        </div>
      </div>
      </a>
        <?php

        if($counter == 4){
            break;
        }
        $counter++;
        ?>
        @endforeach
    </div>
      @endif
<!--      second modal-->
      @if(isset($searchResult2) && isset($profile2))
      <div class="col-sm-4">

          <a href="{{url('follower-and-following-list/'.$profile2->user->pk)}}">
              <div class="follower_upper">
                  <p><i class="fa fa-instagram"></i>&nbsp;{{$profile2->user->username}}</p>
                  <h2 class="text-center text-color">{{$profile2->user->follower_count}}</h2>
              </div>
          </a>
          <?php
          $counter = 0;
          ?>
          @foreach($searchResult2->items as $searchResult2)

          <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="{{$searchResult2->caption->text}}" data-caption="Like : {{$searchResult2->like_count}}  @if(isset($searchResult2->view_count))Views : {{$searchResult2->view_count}}@endif" data-image="{{$searchResult2->image_versions2->candidates[0]->url}}" data-target="#image-gallery">

              <div class="follower_lists">
                  <div class="row">
                      <div class="col-sm-3">
                          <img src="{{$searchResult2->image_versions2->candidates[0]->url}}" alt="" height="50" width="75">
                      </div>
                      <div class="col-sm-9">
                          <p>{{$searchResult2->caption->text}}</p>
                          <p> @if(isset($searchResult2->view_count))<i class="fa fa-comment"></i>{{$searchResult2->view_count}}@endif &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> {{$searchResult2->like_count}} <span class="pull-right"><i class="fa fa-calendar"></i>{{ date("d-m-Y", $searchResult2->taken_at)}}</span></p>
                      </div>
                  </div>
              </div>
          </a>
          <?php

          if($counter == 4){
              break;
          }
          $counter++;
          ?>
          @endforeach
      </div>
      @endif

<!--      third modal-->

      @if(isset($searchResult3) && isset($profile3))
      <div class="col-sm-4">

          <a href="{{url('follower-and-following-list/'.$profile3->user->pk)}}">
              <div class="follower_upper">
                  <p><i class="fa fa-instagram"></i>&nbsp;{{$profile3->user->username}}</p>
                  <h2 class="text-center text-color">{{$profile3->user->follower_count}}</h2>
              </div>
          </a>
          <?php
          $counter = 0;
          ?>
          @foreach($searchResult3->items as $searchResult3)

          <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="{{$searchResult3->caption->text}}" data-caption="Like : {{$searchResult3->like_count}}  @if(isset($searchResult3->view_count))Views : {{$searchResult3->view_count}}@endif" data-image="{{$searchResult3->image_versions2->candidates[0]->url}}" data-target="#image-gallery">

              <div class="follower_lists">
                  <div class="row">
                      <div class="col-sm-3">
                          <img src="{{$searchResult3->image_versions2->candidates[0]->url}}" alt="" height="50" width="75">
                      </div>
                      <div class="col-sm-9">
                          <p>{{$searchResult3->caption->text}}</p>
                          <p> @if(isset($searchResult3->view_count))<i class="fa fa-comment"></i>{{$searchResult3->view_count}}@endif &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> {{$searchResult3->like_count}} <span class="pull-right"><i class="fa fa-calendar"></i>{{ date("d-m-Y", $searchResult3->taken_at)}}</span></p>
                      </div>
                  </div>
              </div>
          </a>
          <?php

          if($counter == 4){
              break;
          }
          $counter++;
          ?>
          @endforeach
      </div>
      @endif
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
