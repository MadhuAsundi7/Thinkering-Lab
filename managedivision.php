

<?php
setcookie('div','', time() + 14400, '/');
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

<?php

if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  case "enterdiv":
  					setcookie('div', '', time() - 14400, '/');
  					
  					$div=$_GET['div'];

  					
  					?>

				<form method="post">

			      <a href="aprovedis.php" >Aprove/Disaprove</a>
			       <a href="#" >Add team</a>
			      </form>
				
<?php
  					
  					setcookie('div', $div, time() + 14400, '/');
  					if (isset ($_COOKIE['div'])){

  						echo $_COOKIE['div'];
  						header( "Location: managedivision.php" );
  					}

  break;
            
  
   
}
}
?>


<body>
<?php
$q="select DISTINCT d.did,d.division, d.Remarks  from division d, faculty f where d.fid=f.id and f.id=".$_COOKIE['fid']." order by division; ";
	$result=mysqli_query($db,$q);
			$row;
			while ($row = mysqli_fetch_assoc($result)) 
			{


				?>

				<form method="post" action="managedivision.php?action=enterdiv&div=<?php echo $row['did']; ?>">

			      <input type="submit" value='<?php echo $row['Remarks']." :    ".$row['division'] ;  ?>' class=" btn btn-primary " />
			      </form>
				
<?php

}

?>


</body>
</html>





<?php
} else {

header('Location:adminlogin.php');
}
?>