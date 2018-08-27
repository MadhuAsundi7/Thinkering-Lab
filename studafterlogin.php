
<?php
if (isset ($_COOKIE['rollno']) ) {
  include("db.php");
  include("studnav.php");
  
    //echo "lab";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> Home </title>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width" initial-scale=1>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="stylesheet/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <style>


.body {
  
  
  width:100%; /* The width is 20%, by default */
}

/* Use a media query to add a break point at 800px: */
@media screen and (max-width:800px) {
  .left, .main, .right {
    width:100%; /* The width is 100%, when the viewport is 800px or smaller */
  }
}
</style>
</head>
<?php
$x=""; ?>
<body>

<?php
include 'footer.html';

?>
</body>
<html>
<?php
} else {

header('Location:index.php');
}
?>