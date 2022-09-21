<?php
ob_start();
session_start();
session_unset();
session_destroy();
if($_REQUEST['xyiudyd']) header('Location:manage/login.php');
header('Location:login.php');
?>