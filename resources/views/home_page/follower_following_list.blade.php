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
        <tr>
          <th scope="row"><input type="checkbox" name=""></th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>Otto</td>
        </tr>
        <tr>
          <th scope="row"><input type="checkbox" name=""></th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
          <td>Thornton</td>
        </tr>
        <tr>
          <th scope="row"><input type="checkbox" name=""></th>
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
  <div>
    <button type="submit">CSV</button>
  </div>
</div>
</body>
</html>
<script type="text/javascript" src="{{asset('assets/js/style.js')}}"></script>