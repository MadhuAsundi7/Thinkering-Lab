<!DOCTYPE html>
<html lang="en">
<head>
	<title> Issue Components </title>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width" initial-scale=1>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="stylesheet/tlcss.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>

<body>
<?php
include 'navb.html';

?>
<center>

	 <h5>New user? You must have account before requesting for components,  Register here! <span class="badge badge-light"><a href="studreg.php"> Create Account </a> </span></h5>
<form action="issue.php">
  <div class="w-50  form-group">
    <label for=" email">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="w-50  form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  
  <div class="w-50  form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
 </div>
</form>

</center>

<?php
include 'footer.html';

?>
</body>
<html>