
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


<br>
<br><form  action="editfaculty.php" method="POST">

<center> <?php echo $x; ?> </div>
	<br><br><h3>Faculty</h3>

<?php

if (isset($_POST['edit'])) {
$id=substr($_POST['edit'],5,50);
//echo '<br />The ' . $id . ' submit button was pressed<br />';
$name=$_POST['1'];
$email=$_POST['3'];
$contact=$_POST['4'];

$uq="update Faculty set name='".$name."', email='".$email."',contact='".$contact."' where id=".$id.";";
//echo $uq;
$result=mysqli_query($db,$uq);
if($result)
echo "<div class='mx-auto text-success'> Faculty :".$name ." Details  Updated. </div>";
else echo "<div class='mx-auto text-danger'>Cannot Update at this time, try later! ERROR: ".mysqli_errno($db) . ": " . mysqli_error($db) . "";


}

?>


<?php
if (isset($_POST['submit'])) {
   // echo '<br />The ' . $_POST['submit'] . ' submit button was pressed<br />';

$fq="Select ID,name,role,email,contact from faculty where ID=".$_POST['submit'].";";
	$result=mysqli_query($db,$fq);
	$count=mysqli_field_count($db);


echo "<table cellspacing='4' cellpadding='4' border='2'> ";
	echo "<tr><th>ID</th><th>Name</th><th>Role</th><th>Emial ID</th><th>Contact</th><th>Click to Edit</th></tr>";
while ($row = mysqli_fetch_array($result,MYSQL_NUM)) {
	echo "<tr>";
			for($i=0;$i<5;$i++)
			{		echo "<td>";
					echo "<input type='text' value='".$row[$i]."' name='".$i."'";
    				echo $row[$i];
    				echo "</td>";
    		//$i++;
					}
    				echo"<td><input type='submit' class='btn btn-primary' name='edit' value='Edit ".$row[0]."'></td>";

		echo "</tr>";}echo "</table>";}

	

	


?>






<br><br><br>






	<?php


	$fq="Select ID,name,role,email,contact from faculty;";
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

echo "<table cellspacing='4' cellpadding='4' border='2'> ";
	echo "<tr><th>ID</th><th>Name</th><th>Role</th><th>Emial ID</th><th>Contact</th><th>Click to Edit</th></tr>";
while ($row = mysqli_fetch_array($result,MYSQL_NUM)) {
	echo "<tr>";
			for($i=0;$i<5;$i++)
			{		echo "<td>";
    				echo $row[$i];
    				echo "</td>";
    		//$i++;
					}
    				echo"<td><input type='submit' class='btn btn-primary' name='submit' value='".$row[0]."'></td>";

		echo "</tr>";}echo "</table>";

	?>

	
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