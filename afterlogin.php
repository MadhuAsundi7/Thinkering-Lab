<?php
if (isset ($_COOKIE['fid']) && $_COOKIE['fid']) {
	$facid=$_COOKIE['fid'];
	$role=$_COOKIE['role'];
	$email=$_COOKIE['email'];
	//echo $role;

	if(strtolower($role)==='administrator')
	{//echo "admin";
		include("adminnav.html");}
	else if(strtolower($role)==='guide/instructor')
		include("facultyguidenav.php");
		//echo"Guide/Instructor";
	else if(strtolower($role)==='lab instructor')
		include("labnav.html");
		//echo "lab";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title> Admin/ Faculty/ Lab Instructor </title>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width" initial-scale=1>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="stylesheet/tlcss.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>



<body>

</body>
</html>





<?php
} else {

header('Location:adminlogin.php');
}
?>