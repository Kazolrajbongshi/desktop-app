<div class="row">
    <div class="col-md-6">
        <h3>Follower List Details:</h3>
    </div>
    
    <div class="col-md-6" style="text-align: right;">
        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Use the filters above each column to filter and limit table data. Advanced searches can be performed by using the following operators:<, <=, >, >=, =, *, !, {, }, ||,&&, [empty], [nonempty], rgx:" style="padding-right: 5px;font-size: 2rem;"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
        <a href="#" class="btn btn-primary" style="background-color:#06af94;" id="down"><span style="color: black;">Export as</span>&nbsp;&nbsp;CSV</a>
    </div>

    <!-- <button type="submit" class="btn btn-primary"><span style="color: black;">Export as</span>&nbsp;&nbsp;CSV</button> -->
</div>
<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive-sm">
    <table id="demo" class="countries-tiny table table-hover table-bordered w-auto" data-toggle="table">
        <thead>
        <tr>
            <td scope="col"><input type="checkbox" name="" id="inp-chkbox1"></td>
            <th scope="col">Username</th>
            <th scope="col">photo</th>
            <th scope="col">Biography</th>
            <th scope="col">Follower</th>
            <th scope="col">Following</th>
            <th scope="col">Post</th>
            <th scope="col">Is_private</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($usersInfo))
        @foreach($usersInfo as $userInfo)
        <tr>
            <td scope="row"><input type="checkbox" name="" class="inpchk1"></td>
            <td>{{$userInfo['username']}}</td>
            <td><span style="display: none;">{{$userInfo['photo']}}</span> <img src="{{$userInfo['photo']}}" height="50" width="75"></td>
            <td>{{$userInfo['biography']}}</td>
            <td>{{$userInfo['followerCount']}}</td>
            <td>{{$userInfo['followingCount']}}</td>
            <td>{{$userInfo['post']}}</td>
            @if($userInfo['private'] == null)
            <td>No</td>
            @else
            <td>Yes</td>
            @endif
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>
    <!-- <table class="table table-hover table-bordered" id="home-table" data-toggle="table">
      <thead>
        <tr>
          <td scope="col"><input type="checkbox" name="" id="inp-chkbox1"></td>
          <th scope="col">Username</th>
          <th scope="col">Biography</th>
          <th scope="col">Follower count</th>
          <th scope="col">Following count</th>
          <th scope="col">photo</th>
          <th scope="col">Post</th>
          <th scope="col">Is_private</th>
        </tr>
      </thead>
      <tbody> -->
    <!-- <tr>
      <td scope="row"><input type="checkbox" name="" id="inp-chkbox1"></td>
      <td><input type="checkbox" name=""></td>
      <td><input type="checkbox" name=""></td>
      <td><input type="checkbox" name=""></td>
      <td><input type="checkbox" name=""></td>
      <td><input type="checkbox" name=""></td>
      <td><input type="checkbox" name=""></td>
      <td><input type="checkbox" name=""></td>
    </tr> -->
    <!-- @if(isset($usersInfo))
      @foreach($usersInfo as $userInfo)
      <tr>
        <td scope="row"><input type="checkbox" name="" class="inpchk1"></td>
        <td>{{$userInfo['username']}}</td>
        <td>{{$userInfo['biography']}}</td>
        <td>{{$userInfo['followerCount']}}</td>
        <td>{{$userInfo['followingCount']}}</td>
        <td><span style="display: none;">{{$userInfo['photo']}}</span> <img src="{{$userInfo['photo']}}" height="50" width="75"></td>
        <td>{{$userInfo['post']}}</td>
        @if($userInfo['private'] == null)
        <td>No</td>
        @else
        <td>Yes</td>
        @endif
      </tr>
    @endforeach
  @endif
  </tbody>
</table> -->
</div>
<!-- </div> -->




<!-- <h3>Following List Details:</h3>
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table id="following_list_csv" class="countries-tiny table table-hover table-bordered" data-toggle="table">
        <thead>
        <tr>
            <td scope="col"><input type="checkbox" name="" id="inp-chkbox1-following"></td>
            <th scope="col">Username</th>
            <th scope="col">Biography</th>
            <th scope="col">Follower</th>
            <th scope="col">Following</th>
            <th scope="col">photo</th>
            <th scope="col">Post</th>
            <th scope="col">Is_private</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($usersInfoFollowing))
        @foreach($usersInfoFollowing as $userInfo_following)
        <tr>
            <td scope="row"><input type="checkbox" name="" class="inpchk1_following"></td>
            <td>{{$userInfo_following['username']}}</td>
            <td>{{$userInfo_following['biography']}}</td>
            <td>{{$userInfo_following['followerCount']}}</td>
            <td>{{$userInfo_following['followingCount']}}</td>
            <td><span style="display: none;">{{$userInfo_following['photo']}}</span> <img src="{{$userInfo_following['photo']}}" height="50" width="75"></td>
            <td>{{$userInfo_following['post']}}</td>
            @if($userInfo_following['private'] == null)
            <td>No</td>
            @else
            <td>Yes</td>
            @endif
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>
</div>
<!-- </div> -->
<!-- <div style="text-align:center;">
    <a href="#" class="btn btn-primary" id="down_following"><span style="color: black;">Export as</span>&nbsp;&nbsp;CSV</a>
</div>  -->

<style type="text/css">
  #demo span>.reset{
    display: none;
  }
</style>
<script src="https://rawgit.com/wenzhixin/bootstrap-table/master/src/bootstrap-table.js"></script>
<script type="text/javascript" src="{{asset('assets/js/tablefilter.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/style.js')}}"></script>
