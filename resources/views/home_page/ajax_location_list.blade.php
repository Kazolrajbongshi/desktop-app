


	<div class="container-fluid">
	  <div class="row create_destination">
	    <div class="col-sm-12 main_content">

        <form action="javascript:void(0);" method="post">
              {{csrf_field()}}
              <meta type="hidden" name="csrf-token" content="{{csrf_token()}}">
              <div class="row">
                  <div class="col-sm-5 col-sm-offset-3">
                      <button type="button" class="btn btn-success btn-lg" id="location_search"
                              style="float: right;background-color: #ffffff;color: #000000;border-color: #ccc;border-left: 2px solid #10b3b3;">
                          Search
                      </button>
                      <div class="first-search-add" style="overflow: hidden; padding-right: 0px;">
                          <input type="text" name="location_value" id="location_value" class="form-control"
                                 placeholder="Enter location"
                                 style="height: 46px;">
                      </div>

                  </div>
              </div>
              <!-- <div style="margin-top: 15px;">
                <button class="btn btn-success btn-lg">Search</button>
              </div> -->
          </form>

			<div id="no_location">
			<!-- <div class='response'></div> -->
			<form action="javascript:void(0);" method="post">
			    {{csrf_field()}}
          <meta type="hidden" name="csrf-token" content="{{csrf_token()}}">
			    <div class="radio_list_area">
			    	@if(isset($results))
			        <div class="radio_label" style="text-align: center;border-bottom: 1px solid #c9cabd;">
			            <h2>Select List</h2>
			        </div>
              <hr>
			        <div class="radio_list">
			            <div class="single_radio radio1">
			        	<?php $i=0;?>
							@foreach($results as $result)
							@if($i < 9)
			              <label class="checkcontainer"> {{$result->location->name}}-> {{$result->location->pk}}
			                <input type="radio" id="location_list" name="location_list" value="{{$result->location->pk}}" ><br>
			                <span class="radiobtn"></span>
			              </label>
			            @endif
			            <?php $i++;?>
			            @endforeach

			            </div>

			        </div>
			    </div>

			    <div class="form_buttons">
			        <!-- <button class="btn_cancel p_btn">削除する</button> -->
			        <button type="submit" id="ajax_location_save" class="btn_done p_btn">Save</button>
			    </div>
			    @endif



			  </form>
      </div>
	   </div>

	</div>


</div>
<script type="text/javascript">

	/* hashtag list serach start*/

         $("#location_search").click(function(){
          var location = $('#location_value').val();

          $.ajax({
           url: "{{url('location-search')}}",
           type: "post",
           data: {"_token": "{{ csrf_token() }}","location":location},
           beforeSend: function(){
            // Show image container
            console.log(location);
            $("#Load").show();
           },
           success: function(response){
            console.log(response.data);
             if(response.data == 2){
              $('#no_location').html(response.no_location_err);
            }
            else{
              $('#location_search_div').html(response);
            }
           },
           complete:function(data){
            // Hide image container
            $("#Load").hide();
           }
          });

         });

        /* hashtag list serach end*/

        /* hashtag list user details start*/

         $("#ajax_location_save").click(function(){
          var location = $("input[name='location_list']:checked"). val();
          if(location == null){
            // alert('Please Select a Hashtag from the List');
            swal("Warning!","Please Select a Location from the List", "warning");
            return false;
          }

          $.ajax({
           url: "{{url('location-list-details')}}",
           type: "post",
           data: {"_token": "{{ csrf_token() }}","location":location},
           beforeSend: function(){
            // Show image container
            console.log(location);
            $("#Load").show();
           },
           success: function(response){
            console.log(response.data);

            if(response.value == 1){
              $('#no_location').html(response.msg);
            }
            else{

              $('#no_location').html(response);
            }

           },
           complete:function(data){
            // Hide image container
            $("#Load").hide();
           }
          });

         });
    // $("form").submit(function() {
    //     var submitme = true;
    //     $(':radio').each(function() {
    //         nam = $(this).attr('name');
    //         if (submitme && !$(':radio[name="'+nam+'"]:checked').length) {
    //             alert(' Please Select a Hashtag from the List');
    //             submitme = false;
    //         }
    //     });
    //     return submitme;
    // });

        /* hashtag list user details end*/

</script>
