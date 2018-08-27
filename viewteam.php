
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
  <title> View Team  </title>
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
<br>
<center> <?php echo $x; ?> </div>
  <br><br><h3>Team</h3>

  <?php


  $fq="Select distinct t.tid,d.division,t.teamno,f.name  from teams t, division d, faculty f where t.did=d.did and t.guide_fid=f.id order by d.division,t.teamno,f.name";
  //echo $fq;
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
  echo "<tr><th>Team ID</th><th>Division</th><th>Team Number</th><th>Guide</th></tr>";
while ($row = mysqli_fetch_array($result,MYSQL_NUM)) {
  echo "<tr>";
      for($i=0;$i<4;$i++)
      {   echo "<td>";
            echo $row[$i];
            echo "</td>";
        //$i++;
          }
    echo "</tr>";}echo "</table>";

  ?>
<form  action="facultyadd.php" method="POST">

  
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