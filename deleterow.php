<?php
include("dbconn.php");
$UserID = $_GET['UserID'];
$query = "DELETE FROM orders WHERE UserID = $UserID ";
$result = mysqli_query($con, $query);
if ($query) {
  $Message = 'Your Payment For Order Successful!!';

  echo "
    <SCRIPT>
      alert('$Message')      
      window.location.replace('index.php');
    </SCRIPT>
  ";
}
?>