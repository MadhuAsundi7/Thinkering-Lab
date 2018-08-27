
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
$x="<div class='mx-auto text-info'>Enter all the details </div>";
?>



<?php


 if(isset($_POST['reg']))
      {


            

            if($_POST['osid']!=NULL)
            {
             
             $q="update spec_ec set quantity = quantity +".$_POST['qty']." where sid=".$_POST['osid'].";";
            
            // echo $q;
              $result=mysqli_query($db,$q);
              if($result)
              {
                 $x="<div class='mx-auto text-success'>Details Updated : Do not refresh/load the page </div>";
              }
              else
              {
               $x="<div class='mx-auto text-danger'>There's something went wrong</div>";
              }

            }
            if($_POST['nsid']!=NULL)
            {
             
              $q="insert into spec_ec (specification,CID,quantity) values ('".$_POST['nsid']."',".$_COOKIE['cid'].",".$_POST['qty'].");";
             echo $q;

              $result=mysqli_query($db,$q);
              if($result)
              $x="<div class='mx-auto text-success'> details Added </div>";
              else{
              $x="<div class='mx-auto text-danger'>Cannot Update at this time, try later! ERROR: ".mysqli_errno($db) . ": " . mysqli_error($db) . "";
              if(mysqli_errno($db)==1062)
              $x=$x. "<br><bold>Information has already been submitted</bold></div>"; 
                
              }
            }

            if($_POST['osid']==NULL&&$_POST['nsid']==NULL)
              $x="<div class='mx-auto text-danger'>Please provide the deatils</div>";



    
      }
?>
<center>
<h1>Add Resources</h1>
<br>
<br>
 <?php echo $x; ?> </div>
  <br><br>
    <td>
    <form action="addecresource.php" method="post" enctype="multipart/form-data">
   
    <table border=0 width="40%" cellpadding="7" cellspacing="7">
    
    
    
   <tr><td >Specification </td><td><select name="osid">
          <option value="">select specification </option>
    <?php
    $q="select distinct SID,specification from spec_ec;";
    echo $q;
    $result=mysqli_query($db,$q);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value=".@$row[0]." > " . @$row[1] . "</option>";
    }
    
    echo "</select></td></tr><tr><td>";
    echo "Specify if any other</td><td> <input type='text' name='nsid' ></td></tr>";
    ?>  
   
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