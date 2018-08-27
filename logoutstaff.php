
<?php
setcookie('fid', '', time() - 86400, '/');
setcookie('email', '', time() - 86400, '/');
setcookie('role', '', time() - 86400, '/');
setcookie('div', '', time() - 86400, '/');
session_destroy();
header('Location:adminlogin.php');
?>


