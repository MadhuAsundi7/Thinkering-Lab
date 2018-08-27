
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
  <link rel="stylesheet" href="stylesheet/style.css">


  <link rel="stylesheet" href="stylesheet/bootstrap.css">
    <link rel="stylesheet" href="stylesheet/animate.css">
    <link rel="stylesheet" href="stylesheet/owl.carousel.min.css">
<link rel="stylesheet" href="stylesheet/magnific-popup.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<?php
$x=""; ?>
<body>
<center>
<h1>Add Resources</h1>
<br>
<br>
 <?php echo $x; ?> </div>
  <br><br>
    <td>
  <?php
include 'db.php';
$x="<div class='mx-auto text-info'>Enter all the details</div>";
?>
<?php


     if(isset($_POST['reg']))
      {
            if($_POST['ocid']!=NULL)
            {
              setcookie('cid', $_POST['ocid'], time() + 14400, '/');
              header:header('location:addecresource.php');
              exit();
            }
            if($_POST['ncid']!=NULL)
            { 


                          $target_dir = "uploads/";
                          $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
                                      



                            $uploadOk = 1;
                          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                          // Check if image file is a actual image or fake image
                          if(isset($_POST["reg"])) 
                              $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                              if($check !== false) {
                                  $x="<div class='mx-auto text-danger'>File is an image - " . $check["mime"] . ".</div>";
                                  $uploadOk = 1;
                              } else {
                                  $x="<div class='mx-auto text-danger'>File is not an image.</div>";
                                  $uploadOk = 0;
                              }
                              if (file_exists($target_file)) {
                              $x="<div class='mx-auto text-danger'>Sorry, Image already exists.</div>";
                              $uploadOk = 0;
                          }
                          // Check file size
                          if ($_FILES["fileToUpload"]["size"] > 500000) {
                              echo "Sorry, your file is too large.";
                              $uploadOk = 0;exit();
                          }
                          // Allow certain file formats
                          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                          && $imageFileType != "gif" ) {
                             $x= "<div class='mx-auto text-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
                              $uploadOk = 0;exit();
                          }
                          // Check if $uploadOk is set to 0 by an error
                          if ($uploadOk == 0) {
                              $x= "<div class='mx-auto text-danger'>Sorry, your file was not uploaded.</div>";
                          // if everything is ok, try to upload file
                          } else {
                              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                  $x= "The image ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                              } else {
                                  $x= "<div class='mx-auto text-danger'>Sorry, there was an error uploading your file.</div>";exit();
                                    }
                              }
                            






              $q="insert into category_ec (category,imgurl) values ('".$_POST['ncid']."','".$target_file."');";
             // echo $q;

              $result=mysqli_query($db,$q);
              if($result)
              {

                  $getcid="select cid from category_ec where category='".$_POST['ncid']."';";
          // echo $getcid;
            $result=mysqli_query($db,$getcid);
            $row=mysqli_fetch_array($result);
            $cid=$row[0];
            //echo $cid;
                  setcookie('cid',$cid, time() + 14400, '/');
                  
                 $url='/tlab/addecresource.php';
                  echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
                  exit();
              }
              else
              {
               $x="<div class='mx-auto text-danger'>There's something went wrong</div>";
              }
            }

            if($_POST['ocid']==NULL&&$_POST['ncid']==NULL)
              $x="<div class='mx-auto text-danger'>Please provide the deatils</div>";



    
      }
  
?>
  <div class="container">
    <form action="eccat.php" method="post" enctype="multipart/form-data">

<table border=0 width="40%" cellpadding="7" cellspacing="7">
    
    
    <tr><td >Category </td><td><select name="ocid">
          <option value="">select Category </option>
    <?php
    $q="select distinct CID,Category from category_ec;";
    $result=mysqli_query($db,$q);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value=".@$row[0]."> " . @$row[1] . "</option>";
    }

     echo "</select></td></tr><tr><td>";
    echo "Specify if any other</td><td> <input type='text' name='ncid' ></td></tr>";
    
    ?>
    </td></tr>
     <tr><td >Upload Image</td><td>
    <input type="file" multiple   name="fileToUpload"  />
    <tr height="5"><td> </td><td><input type="submit" name="reg" class="btn btn-primary" value="Next>>"></td></tr>
    
</table>


</center> 

</form></div>

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