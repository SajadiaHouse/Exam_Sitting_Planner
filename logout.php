<?php 
session_start();
$_SESSION['userid']='';
session_unset();
header("location:index.php");
?>