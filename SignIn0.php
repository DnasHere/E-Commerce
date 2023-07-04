<?php
session_start();
/* include db connection file */
include("dbconn.php");
if (isset($_POST['Submit'])) {
  /* capture values from HTML form */
  $name = $_POST['name'];
  $id = $_POST['id'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phonenum = $_POST['phonenum'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];

  /* data insert validation*/
  if (empty($name) or empty($id) or empty($email) or empty($address) or empty($phonenum) or empty($password) or empty($confirmpassword)) {
    die("<script>alert('There are missing or empty data, please fill the required data below');
    window.history.back();</script>");
  }

  /* data insert validation on confirmation password*/
  if ($password != $confirmpassword or $confirmpassword != $password) {
    die("<script>alert('There are error on your Password or Comfirmation Password, please confirm your password correctly below');
    window.history.back();</script>");
  }

  $query = "SELECT * from customer where CustID='$id'";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) == 0) {

    /* execute SQL command for storing inserted data into database at customer table */
    $sql_save_customer = "insert into customer
    (CustID,CustName,CustEmail,CustPass,CustAdd,CustPhoneNo)
    values 
    ('$id','$name','$email','$password','$address','$phonenum')";
    $sql_save_user = "insert into users
    (UserID,CustID,CustID,Status)
    values 
    ('$id','$id','$id','customer')";

    /* processing storing data into database with condition if */
    if (mysqli_query($con, $sql_save_customer, $sql_save_user)) {
      echo "<script>alert('Sign In Process Success');
      window.location.href='LogIn_Page_E_Commerce.php';</script>";
    } else {
      echo "<script>alert('Sign In Process Failed, Please Try Again');
      window.history.back();</script>";
    }
  } else {
    echo "<script>alert('Your Already Being Register With This ID, Please Try Log In Again Again');
      window.history.back();</script>";
  }
}

mysqli_close($con); 
?>
