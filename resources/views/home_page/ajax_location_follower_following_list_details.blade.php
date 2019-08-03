
        

                        <form action="{{url('picture-download')}}" method="post">
                            @csrf
                            @foreach($usersInfo as $picture1)
                            @if(isset($picture1->media->image_versions2->candidates[0]->url))
                            <img src="{{$picture1->media->image_versions2->candidates[0]->url}}" style="width: 100px;height: 100px;">

                            @elseif(isset($picture1->media->carousel_media[0]->image_versions2->candidates[0]->url))
                            <img src="{{$picture1->media->carousel_media[0]->image_versions2->candidates[0]->url}}" style="width: 100px;height: 100px;">

                            @else
                            <img src="" alt="no image">
                            @endif
                            
                           
                            
                           
                            @endforeach
                            

                        
                        </form>

                    