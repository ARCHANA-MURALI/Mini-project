<?php
session_start();
$_SESSION['role']="";
echo "<script>window.location.assign('../index.php');</script>";
?>