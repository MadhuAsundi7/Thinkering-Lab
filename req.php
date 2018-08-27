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
//include 'navb.html';
include 'db.php';
$x="";
?>

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


<?php
  
    
    $usname="";
    $pass="";
    $x="";
    if(isset($_POST['submit']))
    {
    
    
      $email=$_POST['email'];
      $password=$_POST['password'];
      
  
      $query="select rollno,email,password from student where email='".$email."' and password=SHA('".$password."');";
      echo $query;
      
      $result=mysql_query($query) or die(mysql_error());
      while ($row = mysql_fetch_array($result, MYSQL_NUM)) 
      {
         $rollno=$row[0];
         $email=$row[1];
         $password=$row[2];

        
        
      }

      if($email==NULL||$password==NULL)
      $x="Enter Valid Username and Password";
      else
      {

        if($result)
        {
          $uid=$rollno;
            
            setcookie('uid', $uid, time() + 14400, '/');
           // header:header('location:afterslogin.php');
            echo $query;
          exit();
          
          
        }
        else
        {
          $x= "Username or password is Invalid ";
        }
      }
    }
  
  
  ?>




<center>

	 <h5>New user? You must have account before requesting for components,  Register here! <span class="badge badge-light"><a href="studreg.php"> Create Account </a> </span></h5>
<form action="req.php" method="post">
  <?php echo $x; ?>
  <table border=0 width="40%" cellpadding="7" cellspacing="7">
    
    <tr><td align="right">Email</td><td><input type="text" name="email" placeholder="Email" class="form-control" required></tr>
    <tr><td align="right">Password</td><td><input type="text" name="password" placeholder="Password" class="form-control" required></tr>
    
   
   
    <tr height="5"><td> </td><td><input type="submit" name="submit" class="btn btn-primary" value="Login"></td></tr>
    
    
</table>
</form>

</center>

<?php
include 'footer.html';

?>
</body>
<html>