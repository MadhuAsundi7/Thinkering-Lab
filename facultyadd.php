
<?php
if (isset ($_COOKIE['fid']) && $_COOKIE['fid']) {
	$facid=$_COOKIE['fid'];
	$role=$_COOKIE['role'];
	$email=$_COOKIE['email'];
	//echo $role;

	if($role=='administrator')
	{//echo "admin";
		include("adminnav.html");}
	else if($role=='Guide/Instructor')
		include("facultyguidenav.html");
		//echo"Guide/Instructor";
	else if($role=='Lab Instructor')
		include("labnav.html");
		//echo "lab";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> Add Faculty  </title>
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
include 'db.php';
$x="";
?>
<?php

	if(isset($_POST['submit']))
	{
		if($_POST['name']==NULL||$_POST['Email']==NULL||$_POST['contact']==NULL||$_POST['role']==NULL)
		$x ="Please provide all the details";
	
		else
		{
		$q="insert into faculty (role, name,email,contact) values ('".  $_POST['role']."' , '".$_POST['name']."','".$_POST['Email']."',". $_POST['contact'].");";
		//echo $q;
		
			$result=mysqli_query($db,$q)  ;
							
							if($result)
							$x="<div class='mx-auto text-success'> Faculty Details added. </div>";
                    else{
                    $x="<div class='mx-auto text-danger'>Cannot Update at this time, try later! ERROR: ".mysqli_errno($db) . ": " . mysqli_error($db) . "";
                    if(mysqli_errno($db)==1062)
                    $x=$x. "<br><bold>Information has already been submitted</bold></div>"; 
                      
                    }
		}
	}
?>

<br>
<br>
<center> <?php echo $x; ?> </div>
	<br><br><h1>Add Faculty</h1>
<form  action="facultyadd.php" method="POST">

	<div class="w-50  form-group">
	<input type="text" name="name" placeholder="Name" autofocus=""><br><br>
	
	<input type="Email" name="Email" placeholder="Email address"><br><br>
	<input type="text" name="contact" placeholder="Contact"></body><br><br>
	Role &nbsp;&nbsp;&nbsp;&nbsp;</lable><select name="role"> 
		<option value="guide/Instructor"> Guide/Instructor </option>
		<option value="Lab Instrcutor">Lab Instructor</option>
		<option value="Administrator">Administrator</option></select><br><br>
	<div class="col-15">
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </div><br>
   
</div>
</form></center> 


<?php
include 'footer.html';

?>
</body>
<html>
<?php
} else {

header('Location:adminlogin.php');
}
?>