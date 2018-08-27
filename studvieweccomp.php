
<?php
if (isset ($_COOKIE['rollno']) ) {
  include("db.php");
  include("studnav.php");
  
    //echo "lab";
?>


<?php
session_start();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  case "add":
    if(!empty($_POST["quantity"])) {
      $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
      $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
      
      if(!empty($_SESSION["cart_item"])) {
        if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($productByCode[0]["code"] == $k) {
                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                  $_SESSION["cart_item"][$k]["quantity"] = 0;
                }
                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
              }
          }
        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }
      } else {
        $_SESSION["cart_item"] = $itemArray;
      }
    }
  break;
  case "remove":
    if(!empty($_SESSION["cart_item"])) {
      foreach($_SESSION["cart_item"] as $k => $v) {
          if($_GET["code"] == $k)
            unset($_SESSION["cart_item"][$k]);        
          if(empty($_SESSION["cart_item"]))
            unset($_SESSION["cart_item"]);
      }
    }
  break;
  case "empty":
    unset($_SESSION["cart_item"]);
  break;  
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> Electronic Components </title>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width" initial-scale=1>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</head>
<?php
$x=""; ?>
<body>

<table align="center" border="0" cellspacing="6px" cellpadding="6px">
  <div id="product-grid">
<br><br><br>
<?php
  $q="select * FROM spec_ec s,category_ec c WHERE s.CID=c.CID order by c.category;";
  echo "<br><br><br>";
  //echo $q;
  $result=mysqli_query($db,$q) ;
  
    
    echo"<tr>";
        
       
        for($i=0;$i<mysqli_num_rows($result);$i++)
        {
            $row1= mysqli_fetch_assoc($result);
            // $row2= mysqli_fetch_assoc($result);
          
          ?>
<div class="product-item">
          <form method="post" action="studvieweccomp.php?action=add&code=<?php echo $row1['SID']; ?>">

          <?php 
          echo "<tr><td><img src=".$row1['imgurl']." height='120px' width='120px'/></td>";
          if($row1['Quantity']<2)
            echo "<td   ><div class='product-image'><img src='images/oostock.jpg' height='70px' width='70px'></td></tr></div>";
          else
             echo "<td> <div class='product-image'><img src='images/stcka.jpg' height='70px' width='70px'></td></div>";


           /*echo "<td><img src=".$row2['imgurl']." height='120px' width='120px'/></td>";
          if($row2['Quantity']<2)
            echo "<td   ><img src='images/oostock.jpg' height='70px' width='70px'></td></tr>";
          else
             echo "<td><img src='images/stcka.jpg' height='70px' width='70px'></td></tr>";*/



          echo "<tr><td><font color='brown' >Category :</font> </td><td><font color='blue' >".$row1['Category']."</font></td>";
          // echo "<td><font color='brown' >Category :</font> </td><td><font color='blue' > ".$row2['Category']."</font></td><tr>";



           echo "<tr><td><font color='brown' >Specification :</font> </td><td> <font color='Green' >".$row1['Specification']."</font></td>";
            //echo "<td><font color='brown' >Specification : </font></td><td><font color='Green' >".$row2['Specification']."</font></td><tr>";
          

           echo "<tr><td><input type='text' name='quantity' value='1' size=2 /> </font><input type='submit' value='Add to cart' class='btnAddAction' /></td><td></td>";
           //echo "<td><input type='text' name='quantity' value='1' size=2 /> </font><input type='submit' value='Add to cart' class='btnAddAction' /></td><tr>";
            

            echo "<tr><td><br><br><br></td><td></td></tr><tr</tr>";

         

          

          
        }
               
               

   
    echo"</tr>";
  



?>


</table>




</form>

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