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
  
<div class="container">
  <div class="row">
    <h3>Follower Following List Details:</h3>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
      <table class="table table-hover table-bordered" id="home-table" data-toggle="table">
        <thead>
          <tr>
            <td scope="col"></td>
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
            <td scope="row"><input type="checkbox" name="" id="inp-chkbox1"></td>
            <td><input type="checkbox" name=""></td>
            <td><input type="checkbox" name=""></td>
            <td><input type="checkbox" name=""></td>
            <td><input type="checkbox" name=""></td>
            <td><input type="checkbox" name=""></td>
            <td><input type="checkbox" name=""></td>
            <td><input type="checkbox" name=""></td>
          </tr>
          <tr>
            <td scope="row"><input type="checkbox" name="" class="inpchk1"></td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Otto</td>
          </tr>
          <tr>
            <td scope="row"><input type="checkbox" name="" class="inpchk1"></td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>Thornton</td>
          </tr>
          <tr>
            <td scope="row"><input type="checkbox" name="" class="inpchk1"></td>
            <td >Larry the Bird</td>
            <td>@twitter</td>
            <td >Larry the Bird</td>
            <td>@twitter</td>
            <td >Larry the Bird</td>
            <td>@twitter</td>
            <td >Larry the Bird</td>
          </tr>
          <tr>
            <td scope="row"><input type="checkbox" name="" class="inpchk1"></td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Otto</td>
          </tr>
          <tr>
            <td scope="row"><input type="checkbox" name="" class="inpchk1"></td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>Thornton</td>
          </tr>
          <tr>
            <td scope="row"><input type="checkbox" name="" class="inpchk1"></td>
            <td >Larry the Bird</td>
            <td>@twitter</td>
            <td >Larry the Bird</td>
            <td>@twitter</td>
            <td >Larry the Bird</td>
            <td>@twitter</td>
            <td >Larry the Bird</td>
          </tr>
          <tr>
            <td scope="row"><input type="checkbox" name="" class="inpchk1"></td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Otto</td>
          </tr>
          <tr>
            <td scope="row"><input type="checkbox" name="" class="inpchk1"></td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>Thornton</td>
          </tr>
          <tr>
            <td scope="row"><input type="checkbox" name="" class="inpchk1"></td>
            <td >Larry the Bird</td>
            <td>@twitter</td>
            <td >Larry the Bird</td>
            <td>@twitter</td>
            <td >Larry the Bird</td>
            <td>@twitter</td>
            <td >Larry the Bird</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div style="text-align:center;">
    <a href="#" class="btn btn-primary" id="down"><span style="color: black;">Export as</span>&nbsp;&nbsp;CSV</a>
    <!-- <button type="submit" class="btn btn-primary"><span style="color: black;">Export as</span>&nbsp;&nbsp;CSV</button> -->
  </div>
</div>
</body>
</html>
<script src="https://rawgit.com/wenzhixin/bootstrap-table/master/src/bootstrap-table.js"></script>
<script type="text/javascript" src="{{asset('assets/js/style.js')}}"></script>