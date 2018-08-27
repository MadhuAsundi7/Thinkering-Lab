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
	<title> Add Division Information  </title>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width" initial-scale=1>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>

<body>

<?php

include 'db.php';
$x="<div class='mx-auto text-info'>Enter all the details</div>";
?>
<?php

	if(isset($_POST['submit']))
	{
		if($_POST['div']==NULL||$_POST['faculty']==NULL||$_POST['rem']==NULL)
		$x ="Please provide all the details";
	
		else
		{
		$q="insert into division (division,FID,Remarks) values ('".$_POST['div']."',".$_POST['faculty'].",'". $_POST['rem']."');";
		//echo $q;
		
			$result=mysqli_query($db,$q) ;
							if($result)
							$x="<div class='mx-auto text-success'> details Added </div>";
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
	<br><br><h1>Add Division Information</h1>
<form  action="adddiv.php" method="POST">
<table border=2 width="30%" height="40%" cellspacing="7" cellpadding="7">
	<tr>
		<td>Divsion</td><td>
	<div class="w-50  form-group">
	<input type="text" name="div" placeholder="Division" autofocus="" length="1"></td></tr><tr>
	<td>
	Faculty</td><td><select name="faculty">
				<?php
					$qs="select distinct ID,name from faculty;";
					$result=mysqli_query($db,$qs);
		//$i=0;
					while ($row = mysqli_fetch_array($result)) {
		
		
    				echo "<option value=".$row[0]."> " . $row[1] . "</option>";
    		//$i++;
					}?>
			</select></td></tr><tr>

	<td>Remarks  </td><td><select name="rem">
	
		
    		<option value="Division In charge"> Division In charge</option>
    		<option value="Course Instructor"> Course Instructor</option>
    		
			</select></td></tr>
	<td></td><td><div class="col-15">
        <input type="submit" class="btn btn-primary" name="submit">
    </div><br></td></tr></table>
   
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