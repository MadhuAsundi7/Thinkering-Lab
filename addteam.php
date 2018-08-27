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
  <title> Add Teams  </title>
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
$x="<div class='mx-auto text-info'>Enter all the details</div>";
?>
<?php

  if(isset($_POST['reg']))
  {
    


    if($_POST['tno']==NULL||$_POST['div']==NULL||$_POST['guide']==NULL)
    $x ="<div class='mx-auto text-danger'>Please provide all the details";
  
    else
    {

         $q="insert into teams (DID,Teamno,Guide_FID) values (".$_POST['div'].",".$_POST['tno'].",".$_POST['guide'].");";
          //echo $q;
          
            $result=mysqli_query($db,$q) ;
                    if($result)
                    $x="<div class='mx-auto text-success'> Team Detail added. </div>";
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
<center> 
  <br><h3>Team detail</h3><br>
   <?php echo $x; ?> </div> <td>
    <form action="addteam.php" method="post">
   
    <table border=0 width="40%" cellpadding="7" cellspacing="7">
    
    

   <tr><td align="right">Team number   </td><td><select name="tno" required>
            
    <?php 

        for($i=1;$i<=17;$i++)
          echo "<option>".$i."</option>"
    ?>
            
          
            
        </select> </td></tr> </td></tr> 


    <tr><td align="right">Division </td><td>
      <select name="div" required>
        <?php
          $qs="select distinct DID,Division from division;";
          $result=mysqli_query($db,$qs);
    //$i=0;
          while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
    
    
            echo "<option value=".$row[0]."> " . $row[1] . "</option>";
        //$i++;
          }?>
      </select></td></tr>


               <tr><td align="right">Guide</td><td>
      <select name="guide">
        <?php
          $qs="select distinct ID,name from faculty;";
          $result=mysqli_query($db,$qs);
    //$i=0;
          while ($row = mysqli_fetch_array($result)) {
    
    
            echo "<option value=".$row[0]."> " . $row[1] . "</option>";
        //$i++;
          }?>
      </select></td></tr>      



   
    <tr height="5"><td> </td><td><input type="submit" name="reg" class="btn btn-primary" value="Add Team information"></td></tr>
    
    
</table>


</center> 


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