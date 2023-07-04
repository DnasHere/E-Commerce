<?php
include("dbconn.php");
$UserID = $_GET['UserID'];
$ProdID = $_GET['ProdID'];
$count = 1;

$queryorders = "SELECT * FROM orders WHERE ProdID = '$ProdID' AND UserID = '$UserID' ";
$result = mysqli_query($con, $queryorders);
$row = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) == 0) {
  $ProdID = $_GET['ProdID'];
  $UserID = $_GET['UserID'];
  $OrderID = $ProdID . '' . $UserID;
  $count = 1;
  $query = "INSERT INTO orders(OrderID,UserID,ProdID,OrderQty,PayMethod) VALUE ('$OrderID','$UserID','$ProdID','$count++','0')";
  $result = mysqli_query($con, $query);
  echo "<script>alert('Your Selected Item Has Been Put Into Cart');
      window.location.href='Cart_Page_E_Commerce.php?UserID=".$UserID."';</script>  
  ";

} else {
  $ProdID = $_GET['ProdID'];
  $UserID = $_GET['UserID'];
  $OrderID = $ProdID . '' . $UserID;
  $query = "UPDATE orders SET OrderQty = '$count++' WHERE OrderID = '$OrderID'";
  $result = mysqli_query($con, $query);

  echo "<script>alert('Your Selected Item Has Been Put Into Cart');
      window.location.href='Cart_Page_E_Commerce.php?UserID=".$UserID."';</script>  
  ";
}
?>
