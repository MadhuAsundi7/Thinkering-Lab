
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
	<title> View Faculty  </title>
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
$x="";
?>
<div class="main">

<br>
<br>
<center> <?php echo $x; ?> </div>
	<br><br><h3>Faculty</h3>

	<?php


	$fq="Select ID,name,role,email,contact from faculty order by name;";
	$result=mysqli_query($db,$fq);
	$count=mysqli_field_count($db);
//echo $count;
/*$sql = "SHOW COLUMNS FROM faculty";
$result = mysqli_query($db,$sql);
echo "<table>";
	echo "<tr>";
while($row = mysqli_fetch_array($result)){
	
    echo "<td>".$row['Field']."</td>";

}
echo "</tr>";*/

//echo "<table cellspacing='4' cellpadding='4' border='0' width='10%''> ";
	//echo "<tr><th>ID</th><th>Name</th><th>Role</th><th>Emial ID</th><th>Contact</th></tr>";
while ($row = mysqli_fetch_array($result,MYSQL_NUM)) {
	
			for($i=0;$i<5;$i++)
			{	
				echo"<br><br>";
				echo "<table cellspacing='4' cellpadding='4' border='2' width='60%' align='center'> ";
				if($i=0)	
				{echo "<tr><th>ID</th><td>";echo $row[$i];
    				echo "</td></tr>";}

				if($i=1)	
				{echo "<tr><th>Name</th><td>";echo $row[$i];
    				echo "</td></tr>";}

				if($i=2)	
				{echo "<tr><th>Role</th><td>";echo $row[$i];
    				echo "</td></tr>";}

				if($i=3)	
				{echo "<tr><th>Emial ID</th><td>";echo $row[$i];
    				echo "</td></tr>";}

				if($i=4)	
				{echo "<tr><th>Contact</th><td>";
    				echo $row[$i];
    				echo "</td></tr>";}


    				echo "</tr>";}echo "</table>";
    		//$i++;
					}
		

	?>
<form  action="facultyadd.php" method="POST">

	
</form></center> 

</div>
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