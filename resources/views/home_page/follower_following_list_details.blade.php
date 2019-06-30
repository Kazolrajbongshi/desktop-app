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

<div class="jumbotron text-center" style="padding-top: 10px;padding-bottom: 5px;margin-bottom: 15px;">
  <p>Serch User</p>
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4"> 
      <input type="text" name="search_user" class="form-control" placeholder="Search user by instagram user name">
    </div>
  </div>
  <div style="margin-top: 15px;">
    <button class="btn btn-success">Search</button>
  </div>
</div>
  
<!-- <div class="container"> -->
  <!-- <div class="row"> -->
    <h3>Follower Following List Details:</h3>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
      <table id="demo" class="countries-tiny table table-hover table-bordered" data-toggle="table">
        <thead>
          <tr>
            <td scope="col"><input type="checkbox" name="" id="inp-chkbox1"></td>
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
          @if(isset($usersInfo))
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
  <div style="text-align:center;">
    <a href="#" class="btn btn-primary" id="down"><span style="color: black;">Export as</span>&nbsp;&nbsp;CSV</a>
    <!-- <button type="submit" class="btn btn-primary"><span style="color: black;">Export as</span>&nbsp;&nbsp;CSV</button> -->
  </div>
<!-- </div> -->
</body>
</html>
<script src="https://rawgit.com/wenzhixin/bootstrap-table/master/src/bootstrap-table.js"></script>
<script type="text/javascript" src="{{asset('assets/js/tablefilter.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/style.js')}}"></script>