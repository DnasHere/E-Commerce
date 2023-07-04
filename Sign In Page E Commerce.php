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
    $sql_save_customer = "INSERT INTO customer
    (CustID,CustName,CustEmail,CustPass,CustAdd,CustPhoneNo)
    values 
    ('$id','$name','$email','$password','$address','$phonenum')";
    $sql_save_user = "INSERT INTO users (UserID,AdminID,CustID,StatusUser)
		values ('$id','admin','$id','Customer')";

    $resultcustomer = mysqli_query($con, $sql_save_customer);
    $resultuser = mysqli_query($con, $sql_save_user);
    
    if ($resultcustomer && $resultuser) {
      echo "<script>alert('Sign In Process Success');
      window.location.href='LogIn_Page_E_Commerce.php';</script>";
    } else {
      echo "<script>alert('Sign In Process Failed, Please Try Again');
      window.history.back();</script>";
    }

  } else {
    echo "<script>alert('Your Already Being Sign In');
    window.location.href='Sign In Page E Commerce.php';</script>";
  }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Sign In Page</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Lucida Sans, sans-serif;
      background-color: #f1f1f1;
      max-width: 100%;
      min-height: 640px;
      text-align: center;
    }

    header {
      background-color: #e8e8e8;
      color: #212121;
      padding: 10px;
      text-align: center;
      position: sticky;
      top: 0;
    }

    menu {
      padding: 10px 20px;
      border: unset;
      border-radius: 15px;
      color: #212121;
      z-index: 1;
      background: #e8e8e8;
      position: relative;
      font-weight: 600;
      font-size: 17px;
      -webkit-box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
      box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
      transition: all 250ms;
      overflow: hidden;
    }

    menu::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 0;
      border-radius: 15px;
      background-color: #212121;
      z-index: -1;
      -webkit-box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
      box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
      transition: all 250ms
    }

    menu:hover {
      color: #e8e8e8;
    }

    menu:hover::before {
      width: 100%;
    }

    nav {
      background-color: #e8e8e8;
      padding: 10px;
      text-align: right;
    }

    nav a {
      display: inline-block;
      padding: 5px;
      color: #333;
      text-decoration: none;
      font-weight: bold;
    }

    div {
      padding: 20px;
      margin: 0 auto;
      background-color: #fff;
      border: 1px solid #ccc;
      text-align: center;
    }

    .form {
      text-align: center;
    }

    .feed-form {
      margin-top: 36px;
      margin: auto;
      display: flex;
      flex-direction: column;
      width: 320px;
    }

    .feed-form input {
      justify-content: center;
      height: 54px;
      border-radius: 5px;
      background: white;
      margin-bottom: 15px;
      border: none;
      padding: 0 20px;
      font-weight: 300;
      font-size: 14px;
      color: #4B4B4B;
    }

    .button_submit:hover,
    .feed-form input:hover {
      transform: scale(1.009);
      box-shadow: 0px 0px 3px 0px #212529;
    }

    .button_submit {
      width: 100%;
      height: 54px;
      font-size: 14px;
      color: #212121;
      background: #e8e8e8;
      border-radius: 5px;
      border: none;
      font-weight: 700;
      text-transform: uppercase;
    }
  </style>
</head>

<body>
  <header>
    <h1>Danaz Techs</h1>

    <nav>
      <a href="index.php">
        <menu>Back</menu>
      </a>
    </nav>
  </header>

  <div class="div_form">
    <h1>Sign In</h1>
    <form id="consultation-form" class="feed-form" method="post" action="Sign In Page E Commerce.php">
      <input name="name" required="" placeholder="Name">
      <input name="id" required="" placeholder="ID">
      <input name="email" required="" placeholder="Email" type="email">
      <input name="address" required="" placeholder="Address">
      <input name="phonenum" required="" placeholder="Phone Number">
      <input name="password" required="" placeholder="Password">
      <input name="confirmpassword" required="" placeholder="Confirm The Password">
      <button class="button_submit" type="submit" name="Submit">Sign In</button>
    </form>
  </div>
  <footer>
    <p>&copy; 2023 My Website. All rights reserved.</p>
  </footer>
</body>

</html>