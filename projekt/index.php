<?php
header("Location: main.php");
session_start();
$_SESSION['added']="no";
$_SESSION['loged']="no";
$_SESSION['logged']="no";
$_SESSION['log']="no";
$_SESSION['addedd']="no";
$_SESSION['deleted']="no";
$_SESSION['welcome']="no";
setcookie("profile_viewer_uid", 1);
?>