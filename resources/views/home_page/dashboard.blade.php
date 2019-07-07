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
<body style="background: #eeeeee;">

<!-- <div class="jumbotron text-center" style="padding-top: 0px;padding-bottom: 5px;margin-bottom: 15px;"> -->
<div class="text-center" style="padding: 0px;border-bottom: 2px solid #ffffff;">
  <div class="navbar-header">
    <a class="navbar-brand logo" href="#"><span>D-Gram</span></a>
      <!-- <a class="navbar-brand" href="#"><img src="{{asset('assets/img/pdf_logo.PNG')}}"></a> -->
  </div>
  <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-left: 35%;border-bottom: #ffffff;">
    @if(isset($deafult_active))
    <li class="nav-item active" style="border-right: 1px solid #10b3b3;">
      <a class="nav-link" id="home-tab" data-toggle="tab" href="#defaultsearch" role="tab" aria-controls="home" aria-selected="true">Default Search</a>
    </li>
    @else
    <li class="nav-item" style="border-right: 1px solid #10b3b3;">
      <a class="nav-link" id="home-tab" data-toggle="tab" href="#defaultsearch" role="tab" aria-controls="home" aria-selected="true">Default Search</a>
    </li>
    @endif
    @if(isset($active))
    <li class="nav-item active" style="border-right: 1px solid #10b3b3;">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#comparesearch" role="tab" aria-controls="profile" aria-selected="false">Comapare Search</a>
    </li>
    @else
    <li class="nav-item" style="border-right: 1px solid #10b3b3;">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#comparesearch" role="tab" aria-controls="profile" aria-selected="false">Comapare Search</a>
    </li>
    @endif
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#mediasearch" role="tab" aria-controls="contact" aria-selected="false">Media Search</a>
    </li>
  </ul>
</div>
<!-- Tab start -->
<div class="tab-content">

  <!-- Default search start-->
  @if(isset($deafult_active))
  <div class="tab-pane active" id="defaultsearch" role="tabpanel" aria-labelledby="home-tab">
  @else
  <div class="tab-pane" id="defaultsearch" role="tabpanel" aria-labelledby="home-tab">
  @endif
    <div class="jumbotron text-center" style="padding-top: 0px;padding-bottom: 5px;margin-bottom: 15px;">
    <p>Serch User</p>
    <form action="#" method="post">
                {{csrf_field()}}
      <div class="row">

        <div class="col-sm-4 col-sm-offset-4">
          <!-- <input type="submit"value="Find"  /> -->
          <!-- <div class="first-search-add" style="overflow: hidden; padding-right: .5em;">
            <input type="text" name="searchUser1" class="form-control" placeholder="Search by instagram user name" style="height: 45px;">
          </div> -->

          <button type="button" class="btn btn-success btn-lg first-search-add-btn" style="float: right;background-color: #ffffff;color: #000000;border-color: #ccc;border-left: 2px solid #10b3b3;">Search</button>
            <div class="first-search-add" style="overflow: hidden; padding-right: 0px;">
              <input type="text" name="searchUser1" class="form-control" placeholder="" style="height: 46px;">
            </div>

        </div>
      </div>
      <!-- <div style="margin-top: 15px;">
        <button class="btn btn-success btn-lg">Search</button>
      </div> -->
    </form>
  </div>


  <div class="row" style="margin-top: 10%;">
      <div class="container">
        <div class="text-center">
          <div class="col-sm-6 col-sm-offset-3 no_src_msg">
            At the very beginning here it will be shown instruction of this search works. When search find result will be shown; it will be gone. Every time this compare tab will be open this message box will be shown.
          </div>
        </div>
      </div>    
    </div>


  </div>
  <!-- Default search end-->

  <!-- Compare search start -->
  @if(isset($active))
  <div class="tab-pane active" id="comparesearch" role="tabpanel" aria-labelledby="profile-tab">
  @else
  <div class="tab-pane" id="comparesearch" role="tabpanel" aria-labelledby="profile-tab">
  @endif
     <div class="jumbotron text-center" style="padding-top: 20px;padding-bottom: 5px;margin-bottom: 15px;">
       <!-- <p>Serch User</p> -->
       <form action="{{URL::to('/search')}}" method="post">
                  {{csrf_field()}}
        <div class="row">
          <div class="col-sm-4 ">
            <!-- <input type="submit"value="Find"  /> -->
            <button type="button" class="btn btn-success btn-lg first-search-add-btn" style="float: right;background-color: #10b3b3;"><i class="fa fa-plus"></i></button>
            <div class="first-search-add" style="overflow: hidden; padding-right: 0px;">
              <input type="text" name="searchUser1" class="form-control" placeholder="First compare instagram user name" style="height: 45px;">
            </div>

          </div>
          <div class="col-sm-4 ">
            <button type="button" class="btn btn-danger btn-lg second-search-remove-btn" style="float: right;display: none;"><i class="fa fa-minus"></i></button><button type="button" class="btn btn-success btn-lg second-search-add-btn" style="float: right;display: none; margin-right: 5px;background-color: #10b3b3;""><i class="fa fa-plus"></i></button>
            <div class="second-search-add" style="overflow: hidden; padding-right: 0px;display: none;">
              <input type="text" name="searchUser2" id="searchUser2" class="form-control" placeholder="Second compare instagram user name" style="height: 45px;">
            </div>

          </div>
          <div class="col-sm-4 ">
            <button type="button" class="btn btn-success btn-lg third-search-add-btn" style="float: right;display: none;background-color: #10b3b3;""><i class="fa fa-plus"></i></button><button type="button" class="btn btn-danger btn-lg third-search-remove-btn" style="float: right;display: none;"><i class="fa fa-minus"></i></button>
            <div class="third-search-add" style="overflow: hidden; padding-right: 0px;display: none;">
              <input type="text" name="searchUser3" id="searchUser3" class="form-control" placeholder="Third compare instagram user name" style="height: 45px;">
            </div>
          </div>
        </div>
        <div style="margin-top: 15px;">
          <button class="btn btn-default btn-lg" style="border: 2px solid #10b3b3;">Search</button>
        </div>
      </form>
    </div>

    <div class="row" style="margin-top: 10%;">
      <div class="container">
        <div class="text-center">
          <div class="col-sm-6 col-sm-offset-3 no_src_msg">
            At the very beginning here it will be shown instruction of this search works. When search find result will be shown; it will be gone. Every time this compare tab will be open this message box will be shown.
          </div>
        </div>
      </div>    
    </div>

    <div class="container">
      <div class="row">
      @if(isset($searchResult1) && isset($profile1))
        <div class="col-sm-4">

        <a href="{{url('follower-and-following-list-details/'.$profile1->user->pk)}}">
          <div class="follower_upper">
            <p><i class="fa fa-instagram"></i>&nbsp;{{$profile1->user->username}}</p>
            <?php
               $n = (0+str_replace(",", "", $profile1->user->follower_count));

                if (!is_numeric($n)) return false;

                // now filter it;
                if ($n > 1000000000000) {
                  $n = round(($n/1000000000000), 2).' T';
                }
                elseif ($n > 1000000000){
                  $n = round(($n/1000000000), 2).' B';
                } 
                elseif ($n > 1000000){
                  $n = round(($n/1000000), 2).' M';
                } 
                elseif ($n > 1000){
                   $n = round(($n/1000), 2).' K';
                }else{
                  $n = $n;
                }
            ?>
            <h2 class="text-center text-color">{{$n}}</h2>
          </div>
        </a>
            <?php
            $counter = 0;
            ?>
            @foreach($searchResult1->items as $searchResult1)

        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="@if(isset($searchResult1->caption->text)){{$searchResult1->caption->text}}@endif" data-caption="Like : {{$searchResult1->like_count}}  @if(isset($searchResult1->view_count))Views : {{$searchResult1->view_count}}@endif" data-image="@if(isset($searchResult1->image_versions2->candidates[0]->url)){{$searchResult1->image_versions2->candidates[0]->url}}@else{{asset('assets/img/no_image.jpg')}}@endif" data-target="#image-gallery">

            <div class="follower_lists">
            <div class="row">
              <div class="col-sm-3">
                <img src="@if(isset($searchResult1->image_versions2->candidates[0]->url)){{$searchResult1->image_versions2->candidates[0]->url}}@else{{asset('assets/img/no_image.jpg')}}@endif" alt="" height="50" width="75">
              </div>
              <div class="col-sm-9">
                <p>@if(isset($searchResult1->caption->text)){{str_limit($searchResult1->caption->text, $limit = 70, $end = '..')}}@endif</p>
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

              <a href="{{url('follower-and-following-list-details/'.$profile2->user->pk)}}">
                  <div class="follower_upper">
                      <p><i class="fa fa-instagram"></i>&nbsp;{{$profile2->user->username}}</p>
                      <?php
                         $n = (0+str_replace(",", "", $profile2->user->follower_count));

                          if (!is_numeric($n)) return false;

                          // now filter it;
                          if ($n > 1000000000000) {
                            $n = round(($n/1000000000000), 2).' T';
                          }
                          elseif ($n > 1000000000){
                            $n = round(($n/1000000000), 2).' B';
                          } 
                          elseif ($n > 1000000){
                            $n = round(($n/1000000), 2).' M';
                          } 
                          elseif ($n > 1000){
                             $n = round(($n/1000), 2).' K';
                          }else{
                            $n = $n;
                          }
                      ?>
                      <h2 class="text-center text-color">{{$n}}</h2>
                  </div>
              </a>
              <?php
              $counter = 0;
              ?>
              @foreach($searchResult2->items as $searchResult2)

              <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="@if(isset($searchResult2->caption->text)){{$searchResult2->caption->text}}@endif" data-caption="Like : {{$searchResult2->like_count}}  @if(isset($searchResult2->view_count))Views : {{$searchResult2->view_count}}@endif" data-image="@if(isset($searchResult2->image_versions2->candidates[0]->url)){{$searchResult2->image_versions2->candidates[0]->url}}@else{{asset('assets/img/no_image.jpg')}}@endif" data-target="#image-gallery">

                  <div class="follower_lists">
                      <div class="row">
                          <div class="col-sm-3">
                              <img src="@if(isset($searchResult2->image_versions2->candidates[0]->url)){{$searchResult2->image_versions2->candidates[0]->url}}@else{{asset('assets/img/no_image.jpg')}}@endif" alt="" height="50" width="75">
                          </div>
                          <div class="col-sm-9">
                              <p>@if(isset($searchResult2->caption->text)){{str_limit($searchResult2->caption->text, $limit = 70, $end = '..')}}@endif</p>
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

              <a href="{{url('follower-and-following-list-details/'.$profile3->user->pk)}}">
                  <div class="follower_upper">
                      <p><i class="fa fa-instagram"></i>&nbsp;{{$profile3->user->username}}</p>
                      <?php
                         $n = (0+str_replace(",", "", $profile3->user->follower_count));

                          if (!is_numeric($n)) return false;

                          // now filter it;
                          if ($n > 1000000000000) {
                            $n = round(($n/1000000000000), 2).' T';
                          }
                          elseif ($n > 1000000000){
                            $n = round(($n/1000000000), 2).' B';
                          } 
                          elseif ($n > 1000000){
                            $n = round(($n/1000000), 2).' M';
                          } 
                          elseif ($n > 1000){
                             $n = round(($n/1000), 2).' K';
                          }else{
                            $n = $n;
                          }
                      ?>
                      <h2 class="text-center text-color">{{$n}}</h2>
                  </div>
              </a>
              <?php
              $counter = 0;
              ?>
              @foreach($searchResult3->items as $searchResult3)

              <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="@if(isset($searchResult3->caption->text)){{$searchResult3->caption->text}}@endif" data-caption="Like : {{$searchResult3->like_count}}  @if(isset($searchResult3->view_count))Views : {{$searchResult3->view_count}}@endif" data-image="@if(isset($searchResult3->image_versions2->candidates[0]->url)){{$searchResult3->image_versions2->candidates[0]->url}}@else{{asset('assets/img/no_image.jpg')}}@endif" data-target="#image-gallery">

                  <div class="follower_lists">
                      <div class="row">
                          <div class="col-sm-3">
                              <img src="@if(isset($searchResult3->image_versions2->candidates[0]->url)){{$searchResult3->image_versions2->candidates[0]->url}}@else{{asset('assets/img/no_image.jpg')}}@endif" alt="" height="50" width="75">
                          </div>
                          <div class="col-sm-9">
                              <p>@if(isset($searchResult3->caption->text)){{str_limit($searchResult3->caption->text, $limit = 70, $end = '..')}}@endif</p>
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
  </div>
  <!-- Compare search end -->

  <div class="tab-pane" id="mediasearch" role="tabpanel" aria-labelledby="contact-tab">No Content</div>
</div>
<!-- Tab end -->

  





<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="image-gallery-title"></h4>
            </div>
            <div class="modal-body">
                <img id="image-gallery-image" class="img-responsive" src="" style="height: 400px;width: 100%;">
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
