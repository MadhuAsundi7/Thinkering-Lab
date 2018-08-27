
<!--


<nav class="navbar navbar-expand-sm bg-primary justify-content-left navbar-dark navbar-fixed-top">


	<ul class="navbar nav">
	
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      <font color="white"> Add items to BoM </font>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#"><?php// echo "Mechanical components" ?> </a>
        <a class="dropdown-item" href="studvieweccomp.php">Electonic component</a>
      
        

      </div>
    </li>-->
		<!--<li class="nav-item">
			<a class="nav-link" href="#"> <font color="white">Help</font> </a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#"><font color="white"> Contact</font></a>
		</li>-->
<!--
      <li class="nav-item active">
      <a class="nav-link" href="viewcart.php"><font color="white"> View cart</font></a>
          </li>


          <li class="nav-item active">
      <a class="nav-link" href="#"><font color="white"> Request Issue</font></a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      <font color="white"> Settings </font>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Profile </a>
        <a class="dropdown-item" href="#">Change password</a>
      
        

      </div>
    </li>

   
		<li class="nav-item active">
			<a class="nav-link" href="logout.php"><font color="white"> Log Out</font></a>
		</li>
	</ul>


</nav>-->
<?php


$q="select * from student where Rollno=".$_COOKIE['rollno'].";";
$result=mysqli_query($db,$q);
$row=mysqli_fetch_row($result);


?>




<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #0099ff;
     position: fixed;
      width:100%;

}

li {
    float: left;
}

li.right
{
  float:right;
}
li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color:  #f9f9f9;
     color: black;
     text-decoration: none;
    
}


li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: fixed;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color:#0099ff; color: #fffff; }

.dropdown:hover .dropdown-content {
    display: block;
}
</style>


<ul>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Add Items to BoM</a>
    <div class="dropdown-content">
      <a href="#">Mechanical Component</a>
      <a href="studvieweccompv.php">Electronic Component</a>
      
    </div>
  </li>
  <li><a href="viewcart.php">View Cart</a></li>
  <li><a href="#news">Request Issue</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Settings</a>
    <div class="dropdown-content">
      <a href="#">Profile </a>
      <a href="#">Change password</a>
    
    </div>
  </li>
  <li class="right" ><a href="studlogout.php">Log out</a></li>
  <li class="right" ><a href="#home"><?php echo "Hello!  ";
echo $row[1]. " ". $row[2];?> </a></li>

</ul>

<br><br><br><br>