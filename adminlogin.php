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
include("db.php");
	$x="";
		
		$usname="";
		$pass="";
		$x="";
		if(isset($_POST['submit']))
		{
		
		
			$username=$_POST['email'];
			$password=$_POST['pwd'];
			$email="";
			 $pass="";
	
			$query="select ID,email,password,role from faculty where email='$username' and password=SHA1('$password');";
			//echo $query;
			
			$result=mysqli_query($db,$query);
			$row;
			while ($row = mysqli_fetch_array($result, MYSQL_NUM)) 
			{
				 $fid=$row[0];
				 $email=$row[1];
				 $pass=$row[2];
				 $role=$row[3];
				 
				
			}

			if($username==NULL||$password==NULL||$email==NULL||$pass==NULL)
			$x="<div class='mx-auto text-danger'>Enter Valid Username and Password</div>";
			else
			{
				
				if($email==$username && $pass==sha1($password))
				{
					//$fid=$sno; 
						session_start();
						$_SESSION['facultyid']=$fid;
						
						setcookie('fid', $fid, time() + 14400, '/');
						setcookie('email', $email, time() + 14400, '/');
						setcookie('role', $role, time() + 14400, '/');

						header:header('location:afterlogin.php');
						
					exit();
					
					
				}
				else
				{
					$x= "<div class='mx-auto text-danger'>Username or password is Invalid </div>";
				}
			}
		}
	
	
	?>
<body>

<nav class="navbar navbar-expand-sm bg-primary  justify-content-left navbar-dark">
  <ul class="navbar nav">
  <!--  <li class="nav-item active">
      <a class="nav-link" href="index.php"><font color="white"> Home</font></a>
    </li>-->
    <li class="nav-item">
      <a class="nav-link" > <font color="white"><br></font></a>
    </li>
    <!--<li class="nav-item">
      <a class="nav-link" href="#"> <font color="white">Help</font> </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"><font color="white"> Contact</font></a>
    </li>-->
  </ul>
</nav>


<center>

	 <h5><span class="badge badge-light"> Login</a> </span></h5>
<form action="adminlogin.php" method="post">

<div class="w-50  form-group">
    <label for="pwd"><?php  echo $x; ?></label>

  <div class="w-50  form-group">
    <label for=" email">Email address:</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="w-50  form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pwd">
  </div>
  
  <div class="w-50  form-group">
        <input type="submit" name="submit" class="btn btn-primary" value="Login">
    </div>
 </div>
</form>

</center>

<?php
include 'footer.html';

?>
</body>
<html>