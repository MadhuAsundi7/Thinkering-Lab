<?php
setcookie('rollno', '', time() - 86400, '/');

session_destroy();
header('Location:index.php');
?>

