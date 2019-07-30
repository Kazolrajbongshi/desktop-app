


	<div class="container-fluid">
	  <div class="row create_destination">
	    <div class="col-sm-12 main_content">

        <form action="javascript:void(0);" method="post">
              {{csrf_field()}}
              <meta type="hidden" name="csrf-token" content="{{csrf_token()}}">
              <div class="row">
                  <div class="col-sm-5 col-sm-offset-3">
                      <button type="button" class="btn btn-success btn-lg" id="hashtag_search"
                              style="float: right;background-color: #ffffff;color: #000000;border-color: #ccc;border-left: 2px solid #10b3b3;">
                          Search
                      </button>
                      <div class="first-search-add" style="overflow: hidden; padding-right: 0px;">
                          <input type="text" name="hashtag_value" id="hashtag_value" class="form-control"
                                 placeholder="Enter hasgtag"
                                 style="height: 46px;">
                      </div>

                  </div>
              </div>
              <!-- <div style="margin-top: 15px;">
                <button class="btn btn-success btn-lg">Search</button>
              </div> -->
          </form>

			<div id="no_hashtag">
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
			              <label class="checkcontainer"> {{$result->name}}-> {{$result->search_result_subtitle}}
			                <input type="radio" id="hashtag_list" name="hashtag_list" value="{{$result->name}}" ><br>
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
			        <button type="submit" id="ajax_hashtag_save" class="btn_done p_btn">Save</button>
			    </div>
			    @endif



			  </form>
      </div>
	   </div>

	</div>


</div>
<script type="text/javascript">

	/* hashtag list serach start*/

         $("#hashtag_search").click(function(){
          var hashtag = $('#hashtag_value').val();

          $.ajax({
           url: "{{url('hashtag-search')}}",
           type: "post",
           data: {"_token": "{{ csrf_token() }}","hashtag":hashtag},
           beforeSend: function(){
            // Show image container
            console.log(hashtag);
            $("#Load").show();
           },
           success: function(response){
            console.log(response.data);
             if(response.data == 2){
              swal("Error","No hashtag found","error");
              return false;
              // $('#no_hashtag').html(response.no_hashtag_err);
            }
            else{
              $('#hashtag_search_div').html(response);
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

         $("#ajax_hashtag_save").click(function(){
          var hashtag = $("input[name='hashtag_list']:checked"). val();
          if(hashtag == null){
            // alert('Please Select a Hashtag from the List');
            swal("Warning!","Please Select a Hashtag from the List", "warning");
            return false;
          }

          $.ajax({
           url: "{{url('hashtag-list-details')}}",
           type: "post",
           data: {"_token": "{{ csrf_token() }}","hashtag":hashtag},
           beforeSend: function(){
            // Show image container
            console.log(hashtag);
            $("#Load").show();
           },
           success: function(response){
            console.log(response.data);

            if(response.data == 1){
              // $('#no_hashtag').html(response.msg);
              swal("Error!","Something went wrong", "error");
              return false;
            }
            else{

              $('#no_hashtag').html(response);
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
