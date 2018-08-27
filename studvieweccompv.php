
<?php
if (isset ($_COOKIE['rollno']) ) {
  include("db.php");
  include("studnav.php");
  
    //echo "lab";
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title> Electronic Components </title>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link href="styles.css" type="text/css" rel="stylesheet" />
<style >
  #product-grid {margin-bottom:100px;}
.product-item { float:left; background: #ffffff;margin:15px 10px; padding:5px;border:#CCC 1px solid;border-radius:4px;}
.product-item div{text-align:center;  margin:60px;}
.product-price {    
  color: #005dbb;
    font-weight: 600;
}
.product-image {background-color:#FFF;}
.clear-float{clear:both;}
.demo-input-box{border-radius:2px;border:#CCC 1px solid;padding:2px 1px;}




</style>

 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</head>
<body  >
<?php

if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  case "add":
            if($_POST['quantity']>0)
              {
                  $compid=$_GET['code'];
                  $q="select * FROM spec_ec s,category_ec c WHERE s.CID=c.CID and SID=".$compid.";";
                  
                  $result=mysqli_query($db,$q) ;
                  if($row= mysqli_fetch_assoc($result))
                  {
                      if($row['Quantity']>$_POST['quantity'])
                      {

                                $qcart="insert into cart (rollno,CID,SID,quantity) values (".$_COOKIE['rollno'].",".$row['CID'].",'".$row['SID']."',".$_POST['quantity'].");";
                                                     // echo $qcart;
                      $r=mysqli_query($db,$qcart);
                        if($r)
             echo " 
    <center><div class='mx-auto text-success'> Component Addedto cart! </div></center>";
              else{
              $x="<center><div class='mx-auto text-danger'>Cannot Update at this time, try later! ERROR: ".mysqli_errno($db) . ": " . mysqli_error($db) . "</center>";
              if(mysqli_errno($db)==1062)
              echo"<center><div class='mx-auto text-danger'><bold>Component Already present in the Cart, to modify the quantity delete the component in the cart</bold></div></center>";
                
              }

                       }
                       else
                        echo"<center><div class='mx-auto text-danger'><bold>Specified quantity not available </bold></div></center>";
                

                  }


              }
              else
                echo "<div class='mx-auto text-danger'>Component Not Available</div>";
    

  break;
  
  case "empty":
    unset($_SESSION["cart_item"]);
  break;  
}
}
?>


<?php
$x=""; ?>

  <div id="product-grid">

<br><br><br>
<?php
  $q="select * FROM spec_ec s,category_ec c WHERE s.CID=c.CID order by c.category;";
  echo "<br><br><br>";
  //echo $q;
  $result=mysqli_query($db,$q) ;
  
    
    
       
        for($i=0;$i<mysqli_num_rows($result);$i++)
        {
            $row1= mysqli_fetch_assoc($result);
            // $row2= mysqli_fetch_assoc($result);
          
          ?>
<div class="product-item">
          <form method="post" action="studvieweccompv.php?action=add&code=<?php echo $row1['SID']; ?>">
      <div class="product-image"><img src="<?php echo $row1['imgurl']; ?>" height="100px" width="100px" ></div>
      <div><strong><?php echo $row1['Category']." - ".$row1['Specification']; ?></strong>
     
     <?php if($row1['Quantity']<5){ echo "<font color='red' size='2pt'><b><i> : Out of Stock!!</b></font></i>";} ?></div>

      <div><input type="text" name="quantity" value="1" size="2" />&nbsp;&nbsp;<input type="submit" value="Add to cart" class=" btn btn-primary " /></div>
      </form>
    </div>
          <?php 
         /* echo "<tr><td><img src=".$row1['imgurl']." height='120px' width='120px'/></td>";
          if($row1['Quantity']<2)
            echo "<div class='product-image'><img src='images/oostock.jpg' height='70px' width='70px'></div>";
          else
             echo " <div class='product-image'><img src='images/stcka.jpg' height='70px' width='70px'></div>";


           /*echo "<td><img src=".$row2['imgurl']." height='120px' width='120px'/></td>";
          if($row2['Quantity']<2)
            echo "<td   ><img src='images/oostock.jpg' height='70px' width='70px'></td></tr>";
          else
             echo "<td><img src='images/stcka.jpg' height='70px' width='70px'></td></tr>";*/



        /*  echo "<font color='brown' >Category :</font> </td><td><font color='blue' >".$row1['Category']."</font>";
          // echo "<td><font color='brown' >Category :</font> </td><td><font color='blue' > ".$row2['Category']."</font></td><tr>";



           echo "<font color='brown' >Specification :</font> </td><td> <font color='Green' >".$row1['Specification']."</font>";
            //echo "<td><font color='brown' >Specification : </font></td><td><font color='Green' >".$row2['Specification']."</font></td><tr>";
          

           echo "<input type='text' name='quantity' value='1' size=2 /> </font><input type='submit' value='Add to cart' class='btnAddAction' />";
           //echo "<td><input type='text' name='quantity' value='1' size=2 /> </font><input type='submit' value='Add to cart' class='btnAddAction' /></td><tr>";
            

            echo "";

         
*/
          

          
        }
               
               

   
  
  



?>








</div>
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