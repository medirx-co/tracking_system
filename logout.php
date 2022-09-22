<?php
ob_start();
session_start();
session_unset();
session_destroy();
if(isset($_REQUEST['xyiudyd'])) header('Location:manage/login.php');
else header('Location:login.php');
?>