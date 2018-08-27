
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
  <title> Add Resources  </title>
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
    


    if($_POST['item']==NULL||$_POST['Spec']==NULL||$_POST['qty']==NULL)
    $x ="<div class='mx-auto text-danger'>Please provide all the details";
  
    else
    {

         $q="insert into resource (Item,Specification,qty) values ('".$_POST['item']."','".$_POST['Spec']."',".$_POST['qty'].");";
          //echo $q;
          
            $result=mysql_query($q) ;
                    if($result)
                    $x="<div class='mx-auto text-success'> Resource Detail added. </div>";
                    else{
                    $x="<div class='mx-auto text-danger'>Cannot Update at this time, try later! ERROR: ".mysql_errno($db) . ": " . mysql_error($db) . "";
                    if(mysql_errno($db)==1062)
                    $x=$x. "<br><bold>Information has already been submitted</bold></div>"; 
                      
                    }
      
    }
  }
?>
<center>
<h1>Add Resources</h1>
<br>
<br>
 <?php echo $x; ?> </div>
  <br><br>
    <td>
    <form action="addresource.php" method="post">
   
    <table border=0 width="40%" cellpadding="7" cellspacing="7">
    
    <tr><td align="right">Item</td><td><input type="text" name="item" placeholder="Item" class="form-control" required></tr>
    <tr><td align="right">Specification</td><td><input type="text" name="Spec" placeholder="Specification" class="form-control" required></tr>
    <tr><td align="right" >Quantity</td><td><input type="text" name="qty" placeholder="Quantity" class="form-control" required></tr>

   
   
    <tr height="5"><td> </td><td><input type="submit" name="reg" class="btn btn-primary" value="Add Resource information"></td></tr>
    
    
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