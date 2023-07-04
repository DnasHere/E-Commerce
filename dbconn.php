<?php
/* php& mysqldb connection file */
$user = "root"; //mysqlusername
$pass = ""; //mysqlpassword
$host = "localhost"; //server name or ipaddress
$dbname= "electronic_e-commerce"; //your db name

$con = mysqli_connect($host,$user,$pass,$dbname);
$db=mysqli_select_db($con,$dbname); 

if(!$con)
{
  die("connection failed: ".mysqli_connect_error());
}
if(!$db)
{
  die("connection failed: ".mysqli_connect_error());
}

?>
