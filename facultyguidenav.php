<?php

include("db.php");
$q="select * from faculty where email='".$_COOKIE['email']."';";
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
   <li  ><a href="managedivision.php">Manage Division</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Settings</a>
    <div class="dropdown-content">
      <a href="#">Profile </a>
      <a href="#">Change password</a>
    
    </div>
  </li>
  <li class="right" ><a href="logoutstaff.php">Log out</a></li>
  <li class="right" ><a href="#home"><?php echo "Hello!  ";
echo $row[1]. " ";?> </a></li>

</ul>

<br><br><br><br>