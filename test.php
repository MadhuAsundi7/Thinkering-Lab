<html>
<body>
<form action="test.php" method="get">
    <input type="text" name="txt" />
    <button onclick=<?php insert(); ?> value="insert">
    	
    </button> 
    <input type="button" name="select" value="select" onclick=<?php select(); ?> />
</form>
<?php
function select(){
   echo "The select function is called.";
}
function insert(){
   echo "The insert function is called.";
}
?>