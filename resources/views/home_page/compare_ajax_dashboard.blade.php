
@if(!isset($searchResult1))
      <div class="row" style="margin-top: 10%;">
        <div class="container">
          <div class="text-center">
            <div class="col-sm-6 col-sm-offset-3 no_src_msg">
              At the very beginning here it will be shown instruction of this search works. When search find result will be shown; it will be gone. Every time this compare tab will be open this message box will be shown.
            </div>
          </div>
        </div>
      </div>
    @endif

    @if(isset($searchResult1) && isset($profile1))

    <div class="container" style="background: white;padding: 1em;">
      <div class="row">
      @if(isset($searchResult1) && isset($profile1))
        <div class="col-sm-4">
            <form action="avg-eng-ratio" method="post">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$profile1->user->pk}}">
                <button>submit</button>
            </form>
          <form action="javascript:void(0);" method="post">
                {{csrf_field()}}
                <meta type="hidden" name="csrf-token" content="{{csrf_token()}}">

        <a href="javascript:void(0);" class="compare_search_follow_list_1">
          <input type="hidden" name="compare_search_follow_1" id="compare_search_follow_1" value="{{$profile1->user->pk}}">
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
      </form>

            <?php
            $counter = 0;
            ?>

            @foreach($searchResult1->items as $searchResult1)
            <form action="{{URL::to('engagement-ratio')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="name" value="{{$profile1->user->username}}">
                <input type="hidden" name="media" value="{{$searchResult1->id}}">
                <button>submit</button>
            </form>

        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="@if(isset($searchResult1->caption->text)){{$searchResult1->caption->text}}@endif" data-caption="Like : {{$searchResult1->like_count}}  @if(isset($searchResult1->view_count))Views : {{$searchResult1->view_count}}@endif" data-image="@if(isset($searchResult1->image_versions2->candidates[0]->url)){{$searchResult1->image_versions2->candidates[0]->url}}@else{{asset('assets/img/no_image.jpg')}}@endif" data-target="#image-gallery">

            <div class="follower_lists">
            <div class="row">

              <div class="col-sm-3 col-xs-3">
                <img src="@if(isset($searchResult1->image_versions2->candidates[0]->url)){{$searchResult1->image_versions2->candidates[0]->url}}@else{{asset('assets/img/no_image.jpg')}}@endif" alt="" height="50" width="75">
              </div>
              <div class="col-sm-9 col-xs-9">
                <p>@if(isset($searchResult1->caption->text)){{str_limit($searchResult1->caption->text, $limit = 70, $end = '')}}@endif<span style="font-weight: bold;color: #19c5bd;">...</span></p>
                <p> @if(isset($searchResult1->view_count))<i class="fa fa-eye"></i>{{$searchResult1->view_count}}@endif &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> {{$searchResult1->like_count}} <span class="pull-right"><i class="fa fa-calendar"></i>{{ date("d-m-Y", $searchResult1->taken_at)}}</span></p>
                  <p> </p>
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

            <form action="javascript:void(0);" method="post">
                {{csrf_field()}}
                <meta type="hidden" name="csrf-token" content="{{csrf_token()}}">

              <a href="javascript:void(0);" class="compare_search_follow_list_2">
          <input type="hidden" name="compare_search_follow_2" id="compare_search_follow_2" value="{{$profile2->user->pk}}">

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
            </form>
              <?php
              $counter = 0;
              ?>
              @foreach($searchResult2->items as $searchResult2)

              <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="@if(isset($searchResult2->caption->text)){{$searchResult2->caption->text}}@endif" data-caption="Like : {{$searchResult2->like_count}}  @if(isset($searchResult2->view_count))Views : {{$searchResult2->view_count}}@endif" data-image="@if(isset($searchResult2->image_versions2->candidates[0]->url)){{$searchResult2->image_versions2->candidates[0]->url}}@else{{asset('assets/img/no_image.jpg')}}@endif" data-target="#image-gallery">

                  <div class="follower_lists">
                      <div class="row">
                          <div class="col-sm-3 col-xs-3">
                              <img src="@if(isset($searchResult2->image_versions2->candidates[0]->url)){{$searchResult2->image_versions2->candidates[0]->url}}@else{{asset('assets/img/no_image.jpg')}}@endif" alt="" height="50" width="75">
                          </div>
                          <div class="col-sm-9 col-xs-9">
                              <p>@if(isset($searchResult2->caption->text)){{str_limit($searchResult2->caption->text, $limit = 70, $end = '')}}@endif<span style="font-weight: bold;color: #19c5bd;">...</span></p>
                              <p> @if(isset($searchResult2->view_count))<i class="fa fa-eye"></i>{{$searchResult2->view_count}}@endif &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> {{$searchResult2->like_count}} <span class="pull-right"><i class="fa fa-calendar"></i>{{ date("d-m-Y", $searchResult2->taken_at)}}</span></p>
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

            <form action="javascript:void(0);" method="post">
                {{csrf_field()}}
                <meta type="hidden" name="csrf-token" content="{{csrf_token()}}">

              <a href="javascript:void(0);" class="compare_search_follow_list_3">
                  <input type="hidden" name="compare_search_follow_3" id="compare_search_follow_3" value="{{$profile3->user->pk}}">

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
            </form>
              <?php
              $counter = 0;
              ?>
              @foreach($searchResult3->items as $searchResult3)

              <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="@if(isset($searchResult3->caption->text)){{$searchResult3->caption->text}}@endif" data-caption="Like : {{$searchResult3->like_count}}  @if(isset($searchResult3->view_count))Views : {{$searchResult3->view_count}}@endif" data-image="@if(isset($searchResult3->image_versions2->candidates[0]->url)){{$searchResult3->image_versions2->candidates[0]->url}}@else{{asset('assets/img/no_image.jpg')}}@endif" data-target="#image-gallery">

                  <div class="follower_lists">
                      <div class="row">
                          <div class="col-sm-3 col-xs-3">
                              <img src="@if(isset($searchResult3->image_versions2->candidates[0]->url)){{$searchResult3->image_versions2->candidates[0]->url}}@else{{asset('assets/img/no_image.jpg')}}@endif" alt="" height="50" width="75">
                          </div>
                          <div class="col-sm-9 col-xs-9">
                              <p>@if(isset($searchResult3->caption->text)){{str_limit($searchResult3->caption->text, $limit = 50, $end = '')}}@endif<span style="font-weight: bold;color: #19c5bd;">...</span></p>
                              <p> @if(isset($searchResult3->view_count))<i class="fa fa-eye"></i>{{$searchResult3->view_count}}@endif &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> {{$searchResult3->like_count}} <span class="pull-right"><i class="fa fa-calendar"></i>{{ date("d-m-Y", $searchResult3->taken_at)}}</span></p>
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
    @endif

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

<script type="text/javascript">
  //follower js start //
$(document).ready(function(){

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current){
        $('#show-previous-image, #show-next-image').show();
        if(counter_max == counter_current){
            $('#show-next-image').hide();
        } else if (counter_current == 1){
            $('#show-previous-image').hide();
        }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr){
        var current_image,
            selector,
            counter = 0;

        $('#show-next-image, #show-previous-image').click(function(){
            if($(this).attr('id') == 'show-previous-image'){
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
        });

        function updateGallery(selector) {
            var $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-caption').text($sel.data('caption'));
            $('#image-gallery-title').text($sel.data('title'));
            $('#image-gallery-image').attr('src', $sel.data('image'));
            disableButtons(counter, $sel.data('image-id'));
        }

        if(setIDs == true){
            $('[data-image-id]').each(function(){
                counter++;
                $(this).attr('data-image-id',counter);
            });
        }
        $(setClickAttr).on('click',function(){
            updateGallery($(this));
        });
    }

// first search follower list start //
    $('.compare_search_follow_list_1').click(function(){

        var user_id = $('#compare_search_follow_1').val();
        $.ajax({
          url: "{{url('/follower-and-following-list-details')}}",
          type: "post",
          data: {"_token": "{{ csrf_token() }}","user_id": user_id},
          beforeSend: function(){
            console.log(user_id);
            $('#Load').show();
          },
          success: function(response){
            console.log(response.data);
            $('#compare_search_result_show').html(response);
          },
          complete: function(response){
            $('#Load').hide();
          }
        });

      });

    // first search follower list end //

    // second search follower list start //

    $('.compare_search_follow_list_2').click(function(){

        var user_id = $('#compare_search_follow_2').val();
        $.ajax({
          url: "{{url('/follower-and-following-list-details')}}",
          type: "post",
          data: {"_token": "{{ csrf_token() }}","user_id": user_id},
          beforeSend: function(){
            console.log(user_id);
            $('#Load').show();
          },
          success: function(response){
            console.log(response.data);
            $('#compare_search_result_show').html(response);
          },
          complete: function(response){
            $('#Load').hide();
          }
        });

      });

    // second search follower list end //

    // third search follower list start //

    $('.compare_search_follow_list_3').click(function(){

        var user_id = $('#compare_search_follow_3').val();
        $.ajax({
          url: "{{url('/follower-and-following-list-details')}}",
          type: "post",
          data: {"_token": "{{ csrf_token() }}","user_id": user_id},
          beforeSend: function(){
            console.log(user_id);
            $('#Load').show();
          },
          success: function(response){
            console.log(response.data);
            $('#compare_search_result_show').html(response);
          },
          complete: function(response){
            $('#Load').hide();
          }
        });

      });
// third search follower list end //

});
//follower js end //
</script>
