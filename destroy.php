<?php
session_start();
unset($_SESSION['CustID']);
session_destroy();
header("location: index.php?Message=" . "successfully logged out!!");
?>

