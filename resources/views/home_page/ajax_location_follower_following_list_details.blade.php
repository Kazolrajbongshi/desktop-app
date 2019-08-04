 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
<style type="text/css">
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
    .btn2{
        transform: translate(-9%, -50%);
    }

}
</style>

<h3 style="text-align: center;">Location Post list</h3><hr>
@if(isset($media_url))
        <div class="row">
            <div class="row">
                <div class="col-md-2"></div>

                <div class="col-md-8">
                    @foreach($media_url as $picture)

                    <div class="column">
                        <form action="{{url('picture-download')}}" method="post">
                            @csrf

                            

                            @if($picture['type'] == 1)
                            <img src="{{$picture['image_url']}}" alt="Snow" style="display:block; height: 300px; width: 100%;">
                            @elseif($picture['type'] == 2)
                            <video style="display:block; height: 300px; width: 100%;" controls>
                                <source src="{{$picture['image_url']}}" type="video/mp4">

                                Your browser does not support the video tag.
                            </video>
                            @endif


                            @if($picture['type'] == 1)
                            <input type="hidden" name="imageUrl" value="{{$picture['image_url']}}">
                            @elseif($picture['type'] == 2)
                            <input type="hidden" name="videoUrl" value="{{$picture['image_url']}}">
                            @endif
                            <!--                                <input type="text"style="width: 50%; margin: 0;">-->
                            <button type="submit" class="btn btn-info" style="width:100%;">Download</button>
                        </form>

                    </div>
                    @endforeach

                </div>

                <div class="col-md-2"></div>
            </div>
            @if(isset($next_id))
            <div class="text-center">
                <form action="javascript:void(0);" method="post">
                    {{csrf_field()}}
                    <meta type="hidden" name="csrf-token" content="{{csrf_token()}}">
                    <button type="submit" id="location_pagination" class="btn btn-info btn-lg ">
                        Next
                    </button>

                    <input type="hidden" name="location_list" id="location_list" value="{{$location_id}}" class="form-control">
                    <input type="hidden" name="maxId" id="maxId" value="{{$next_id}}">

                </form>
            </div>
            @endif

        </div>
      @endif
    </div>
    <script type="text/javascript">
        $("#location_pagination").click(function(){
          var location_list = $("#location_list"). val();
          var maxId = $("#maxId"). val();

          $.ajax({
           url: "{{url('location-list-details')}}",
           type: "post",
           data: {"_token": "{{ csrf_token() }}","location_list":location_list,"maxId":maxId},
           beforeSend: function(){
            // Show image container
            console.log(location_list);
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
    </script>