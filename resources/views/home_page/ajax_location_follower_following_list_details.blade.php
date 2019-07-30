
        <div class="row" style="margin-top: 10%;">
            <div class="row">
                <div class="col-md-2"></div>

                <div class="col-md-8">
                    <?php
                        echo"<pre>";
                            print_r($usersInfo);
                            exit();
                        foreach($usersInfo as $picture){
                    ?>
                    <div class="column">
                        <form action="{{url('picture-download')}}" method="post">
                            @csrf
                            <h1>{{$picture->media->taken_at}}</h1>
                            <!-- @if(isset($picture->media->video_versions2->candidates[0]->url))
                            <video style="display:block; height: 300px; width: 100%;" controls>
                                <source src="{{$picture->media->video_versions2->candidates[0]->url}}" type="video/mp4">

                                Your browser does not support the video tag.
                            </video>

                            @elseif(isset($picture->media->image_versions2->candidates[0]->url))
                            <img src="{{$$picture->media->image_versions2->candidates[0]->url}}" alt="Snow"style="display:block; height: 300px; width: 100%;">
                            @endif


                            @if(isset($picture->media->video_versions2->candidates[0]->url))
                            <input type="hidden" name="videoUrl" value="{{$picture->media->id}}">
                            @elseif(isset($picture->media->image_versions2->candidates[0]->url))
                            <input type="hidden" name="imageUrl" value="{{$picture->media->id}}">
                            @endif -->
                            <!--                                <input type="text"style="width: 50%; margin: 0;">-->
                            <button type="submit" class="btn btn-info" style="width:100%;">Download</button>
                        </form>

                    </div>
                    <?php
                        }
                    ?>

                </div>

                <div class="col-md-2"></div>
            </div>
            

        </div>
      