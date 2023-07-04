<?php
include("dbconn.php");
$OrderID = $_GET['OrderID'];
$UserID = $_GET['UserID'];
$query = "DELETE FROM orders WHERE OrderID = '$OrderID'";
$result = mysqli_query($con, $query);
if ($query) {
  $MessageSuccessful = 'Your Remove Selected Item Successful!!';
  
  echo "
    <SCRIPT>
      alert('$MessageSuccessful')      
      window.location.replace('index.php');
    </SCRIPT>
    ";
}
else {
  $MessageUnsuccessful = 'Your Remove Selected Item Unsuccessful!!';

  echo "
    <SCRIPT>
      alert('$MessageUnsuccessful')      
      window.location.replace('index.php');
    </SCRIPT>
  ";
}
