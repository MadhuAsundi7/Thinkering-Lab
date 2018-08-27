<!DOCTYPE html>
<html lang="en">
<head>
  <title> Student Registration  </title>
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
$x="<div class='mx-auto text-info'>Enter all the details</div>";
?>
<?php

  if(isset($_POST['reg']))
  {
    $rno=$_POST['rno'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $pass1=$_POST['password'];;
    $pass2=$_POST['pass'];
    $tno=$_POST['tno'];
    $div=$_POST['div'];
    $mob=$_POST['mob'];


    if($rno==NULL||$fname==NULL||$mname==NULL||$lname==NULL||$email==NULL||$pass1==NULL||$pass2==NULL||$tno==NULL||$div==NULL||$mob==NULL)
    $x ="<div class='mx-auto text-danger'>Please provide all the details";
  
    else
    {

     if($pass1==$pass2) 
     {
            $q="insert into student  values ($rno,'$fname','$mname','$lname',$tno,$div,'$email',SHA('$pass1'),'$mob');";
          //echo $q;
          
            $result=mysqli_query($db,$q) ;
                    if($result)
                    $x="<div class='mx-auto text-success'> Registration completed, Now you can login and start requesting components. <span class='badge badge-light'><a href='index.php'> Login </a> </span></h5></div>";
                    else{
                    $x="<div class='mx-auto text-danger'>Cannot Update at this time, try later! ERROR: ".mysqli_errno($db) . ": " . mysqli_error($db) . "";
                    if(mysqli_errno($db)==1062)
                    $x=$x. "<br><bold>Information has already been submitted</bold></div>"; 
                      
                    }
      }
      else
        $x="<div class='mx-auto text-danger'> Password Missmatch! Go back to edit";
    }
  }
?>

<br>
<br>
<center> <?php echo $x; ?> </div>
  <br><br>
    <td>
    <form action="studreg.php" method="post">
   
    <table border=0 width="70%" cellpadding="7" cellspacing="7">
    
    
    <tr><td align="right">Roll Number</td><td><input type="text" name="rno" placeholder="Roll Number" class="form-control" required></tr>
    <tr><td align="right">First name</td><td><input type="text" name="fname" placeholder="First name" class="form-control" required></tr>
    <tr><td align="right" >middle name</td><td><input type="text" name="mname" placeholder="Middle  name" class="form-control" ></tr>
    <tr><td align="right">Last name  </td><td><input type="text" name="lname" placeholder="Last name" class="form-control" required></td></tr>
    <tr><td align="right">Email  </td><td><input type="email" name="email" class="form-control" placeholder="Email ID" class="form-control" required ></td></tr>
    <tr><td align="right">Password  </td><td><input type="password" name="password" placeholder="password" class="form-control" required></td></tr>
    <tr><td align="right">Confirm password  </td><td><input type="password" name="pass" placeholder="password" class="form-control" required></td></tr>


   <tr><td align="right">Team number   </td><td><select name="tno" required>
            
    <?php 

        for($i=1;$i<=17;$i++)
          echo "<option>".$i."</option>"
    ?>
            
          
            
        </select> </td></tr> </td></tr> 


    <tr><td align="right">Div</td><td>
      <select name="div" required>
        <?php
          $qs="select distinct DID,Division from division;";
          $result=mysqli_query($db,$qs);
    //$i=0;
          while ($row = mysqli_fetch_array($result,MYSQL_NUM)) {
    
    
            echo "<option value=".$row[0]."> " . $row[1] . "</option>";
        //$i++;
          }?>
      </select></td></tr>


                     



    <tr><td align="right">mobile</td> </td><td><input type="text" name="mob" placeholder="Mobile Number" class="form-control" required></td></tr>
   
    <tr height="5"><td> </td><td><input type="submit" name="reg" class="btn btn-primary" value="Sign Up"></td></tr>
    
    
</table>


</center> 


<?php
include 'footer.html';

?>
</body>
<html>