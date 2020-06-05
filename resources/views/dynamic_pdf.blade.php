<!DOCTYPE html>
<html>
 <head>
  <title>PDF</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">User Report</h3><br />
   
   <div class="row">
    <div class="col-md-7" align="right">
     <h4>Users Data</h4>
    </div>
    <div class="col-md-5" align="right">
     <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Convert into PDF</a>
    </div>
   </div>
   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <thead>
      <tr>
       <th>Name</th>
       <th>Email</th>
       <th>Phone</th>
       <th>City</th>
       <th>State</th>
      </tr>
     </thead>
     <tbody>
     @foreach($users as $user)
      <tr>
       <td>{{ $user->name }}</td>
       <td>{{ $user->email }}</td>
       <td>{{ $user->phone }}</td>
       <td>{{ $user->city }}</td>
       <td>{{ $user->state }}</td>
      </tr>
     @endforeach
     </tbody>
    </table>
   </div>
  </div>
 </body>
</html>
