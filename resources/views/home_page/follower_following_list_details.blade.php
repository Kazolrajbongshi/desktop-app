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
  <p>Serch User</p>
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4">
      <input type="text" name="search_user" class="form-control" placeholder="Search user by instagram user name">
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <h3>Follower Following List Details:</h3>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col">Checkbox</th>
            <th scope="col">Username</th>
            <th scope="col">Biography</th>
            <th scope="col">Follower count</th>
            <th scope="col">Following count</th>
            <th scope="col">photo</th>
            <th scope="col">Post</th>
            <th scope="col">Is_private</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row"><input type="checkbox" name="">Select All</th>
            <td><input type="checkbox" name=""></td>
            <td><input type="checkbox" name=""></td>
            <td><input type="checkbox" name=""></td>
            <td><input type="checkbox" name=""></td>
            <td><input type="checkbox" name=""></td>
            <td><input type="checkbox" name=""></td>
            <td><input type="checkbox" name=""></td>
          </tr>
          <?php
          print_r($usersInfo[0]['username']) ;
//          exit();
          ?>
          @if(isset($usersInfo))
          @foreach($usersInfo as $userInfo)
          <tr>
            <th scope="row"><input type="checkbox" name=""></th>

            <td>{{$userInfo['username']}}</td>
            <td>{{$userInfo['biography']}}</td>
            <td>{{$userInfo['followerCount']}}</td>
            <td>{{$userInfo['followingCount']}}</td>
            <td> <img src="{{$userInfo['photo']}}"></td>
            <td>{{$userInfo['post']}}</td>
            <td>@if($userInfo['private'] == null)
                No
                @else
                Yes
                @endif
            </td>

          </tr>
          @endforeach
        @endif
        </tbody>
      </table>
    </div>
  </div>
  <div style="text-align:center;">
    <button type="submit" class="btn btn-primary"><span style="color: black;">Export as</span>&nbsp;&nbsp;CSV</button>
  </div>
</div>
</body>
</html>
<script type="text/javascript" src="{{asset('assets/js/style.js')}}"></script>
