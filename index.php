<?php
session_start();
/* include db connection file */
include("dbconn.php");
if (isset($_POST['submit'])) {
  /* capture values from HTML form */
  $username = $_POST['username'];
  $password = $_POST['password'];

  /* execute SQL command */
  $query = "SELECT * from customer where CustID ='$username' AND CustPass='$password'";
  $result = mysqli_query($con, $query) or die("Error: " . mysqli_error($dbconn));

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['CustID'] = $row['CustID'];
    $_SESSION['CustName'] = $row['CustName'];
    $_SESSION['CustEmail'] = $row['CustEmail'];
    $_SESSION['CustPass'] = $row['CustPass'];
    $_SESSION['CustAdd'] = $row['CustAdd'];
    $_SESSION['CustPhoneNo'] = $row['CustPhoneNo'];
    echo "<script>alert('Successfully Logged in!!!');</script>";
    header("Location:index.php?Message=" . "successfully logged in!!");
  } else {
    echo "<script>alert('Incorrect Username Or Password!!');</script>";
  }

  $sql_save_user = "INSERT INTO users (UserID,CustID,CustID,StatusUser)
  values (".$_SESSION['CustID'].",".$_SESSION['CustID'].",".$_SESSION['CustID'].",'customer')";
  $resultuser = mysqli_query($con, $sql_save_user);
  if ($resultuser) {
    echo "<script>alert('Sign In Process Success');
    window.location.href='LogIn_Page_E_Commerce.php';</script>";
  }
}
?>

<!DOCTYPE html>
<html>
<title>Danaz Online Commerce</title>

<head>
  <meta name="viewport" content="width=device-width">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Lucida Sans, sans-serif;
      background-color: #f1f1f1;
      max-width: 100%;
      min-height: 640px;
    }

    * {
      box-sizing: border-box;
    }

    .row {
      height: 100%;
      width: 100%;

    }

    .row::after {
      content: "";
      clear: both;
      display: block;
    }

    [class*="col-"] {
      float: left;
      padding: 15px;
    }

    header {
      background-color: #e8e8e8;
      color: #212121;
      padding: 10px;
      text-align: center;
      top: 0;
    }

    button {
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

    button::before {
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

    button:hover {
      color: #e8e8e8;
    }

    button:hover::before {
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

    .menu ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    .menu li {
      aspect-ratio: 3/2;
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 20px;
      background-color: #e8e8e8;
      color: #e8e8e8;
      font-weight: bold;
      text-shadow: 2px 2px 5px #212121;
      -webkit-box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
      box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
      transition: transform 0.1s ease;
    }

    .menu li:hover {
      background-color: #d8d8d8;
      transform: translateY(-0.33em);
    }

    .footer {
      background-color: #0099cc;
      color: #ffffff;
      text-align: center;
      font-size: 12px;
      padding: 15px;
    }

    .font_invert {
      font-weight: bold;
      filter: invert(100%);
    }

    /* For desktop: */
    .col-1 {
      width: 8.33%;
    }

    .col-2 {
      width: 16.66%;
    }

    .col-3 {
      width: 25%;
    }

    .col-4 {
      width: 33.33%;
    }

    .col-5 {
      width: 41.66%;
    }

    .col-6 {
      width: 24%;
      height: 13%;
    }

    .col-7 {
      width: 50.33%;
    }

    .col-8 {
      width: 66.66%;
    }

    .col-9 {
      width: 75%;
    }

    .col-10 {
      width: 83.33%;
    }

    .col-11 {
      width: 91.66%;
    }

    .col-12 {
      width: 100%;
    }

    @media only screen and (max-width: 768px) {

      /* For mobile phones: */
      [class*="col-"] {
        width: 100%;
      }
    }

    footer {
      background-color: #333;
      color: #fff;
      padding: 10px;
      text-align: center;
    }

    .a {
      background: url("Image/Xiaomi_13_pro_1.jpg");
      background-size: 100% 100%;
      object-fit: cover;
    }

    .b {
      background: url('Image/230509-poco-f5-pro-malaysia-01.jpg');
      background-size: 100% 100%;
      object-fit: cover;
    }

    .c {
      background: url('Image/hero_combo__fcqcc3hbzjyy_large.jpg');
      background-size: 100% 100%;
      object-fit: cover;
      display: block;
    }

    .d {
      background: url('Image/Untitled-design-2023-02-03T145353.055.jpg');
      background-size: 100% 100%;
      object-fit: cover;
    }

    .e {
      background: url('Image/AirPods-3.webp');
      background-size: 100% 100%;
      object-fit: cover;
    }

    .f {
      background: url('Image/hero__cj6i78tzkp8i_large.jpg');
      background-size: 100% 100%;
      object-fit: cover;
    }

    .g {
      background: url('Image/Galaxy-S10e_S10_S10-combo1.jpg');
      background-size: 100% 100%;
      object-fit: cover;
    }

    .h {
      background: url('Image/Mi-pad-2.png');
      background-size: 100% 100%;
      object-fit: cover;
    }

    img {
      background-size: 100%;
      object-fit: cover;
    }

    .center_bottom {
      margin-bottom: 80%;
    }

    .input-wrapper input {
      background-color: #eee;
      border: none;
      padding: 1rem;
      font-size: 1rem;
      color: #212121;
      box-shadow: 0 0.4rem #dfd9d9;
      cursor: pointer;
      max-width: 190px;
      height: 44px;
      background-color: #05060f0a;
      border-radius: 20px;
      padding: 0 1rem;
      border: 2px solid transparent;
      transition: border-color .3s cubic-bezier(.25, .01, .25, 1) 0s, color .3s cubic-bezier(.25, .01, .25, 1) 0s,
        background .2s cubic-bezier(.25, .01, .25, 1) 0s;
      -webkit-box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
      box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
    }

    .input-wrapper input:hover,
    .input:focus,
    .input-group:hover .input {
      outline: none;
      border-color: #05060f;
    }

    .menu tr {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    .menu td {
      aspect-ratio: 3/2;
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 20px;
      background-color: #e8e8e8;
      color: #e8e8e8;
      font-weight: bold;
      text-shadow: 2px 2px 5px #212121;
      -webkit-box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
      box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
      transition: transform 0.1s ease;
    }

    .menu td:hover {
      background-color: #d8d8d8;
      transform: translateY(-0.33em);
    }

    /* Set the video as the background */
    #video-background {
      position: fixed;
      right: 0;
      bottom: 0;
      min-width: 100%;
      min-height: 100%;
      z-index: -1;
    }

    /* Adjust other content styles */
    #content {
      position: relative;
      z-index: 1;
      padding: 20px;
      color: #ffffff;
    }
  </style>
</head>

<body>
  <video autoplay muted loop id="video-background">
    <source src="WhatsApp Video 2023-06-16 at 13.10.45.mp4" type="video/mp4">
  </video>

  <header>
    <h1>Danaz Techs</h1>
    <nav>
      <?php
      if (!isset($_SESSION['CustID'])) {
        echo '
        <a href="Group Member Information.php"><button>Group Member</button></a>
        <a href="LogIn_Page_E_Commerce.php"><button>Log In</button></a>
        <a href="Sign in Page E Commerce.php"><button>Sign In</button></a>  
    ';
      } else {
        $userid = $_SESSION['CustID'];
        echo '
        <a href="#"> Hello "' . $_SESSION['CustName'] . '"</a>
        <a href="Group Member Information.php"><button>Group Member</button></a>
        <a href="Cart_Page_E_Commerce.php?UserID=' . $userid . '"><button>Cart</button></a>
        <a href="index.php"><button>Menu</button></a>
        <a href="destroy.php"><button>Log Out</button></a>
    ';
      }
      if (isset($_SESSION['CustID'])) {
        $userid = $_SESSION['CustID'];
        echo '  
      </nav>
      </header>
      
      <div class="row" >
        <div class="col-6 menu">
          <ul>
            <li class="a"><br><a href="Product_Search_Page_E_Commerce.php?UserID=' . $userid . '&product_id=xiaomi0001"><button type="submit" ;>Buy Now</button></a></li>
            <li class="b"><br><a href="Product_Search_Page_E_Commerce.php?UserID=' . $userid . '&product_id=xiaomi0002"><button type="submit" ;>Buy Now</button></a></li>
          </ul>
        </div>
        <div class="col-6 menu right">
          <ul>
            <li class="c"><br><a href="Product_Search_Page_E_Commerce.php?UserID=' . $userid . '&product_id=apple0001"><button type="submit" $ID_Phone="">Buy Now</button></a></li>
            <li class="d"><br><a href="Product_Search_Page_E_Commerce.php?UserID=' . $userid . '&product_id=samsung0001"><button type="submit" $ID_Phone="samsung0001" ;>Buy Now</button></a></li>
          </ul>
        </div>
        <div class="col-6 menu right">
          <ul>
            <li class="e"><br><a href="Product_Search_Page_E_Commerce.php?UserID=' . $userid . '&product_id=apple0002"><button type="submit" $ID_Phone="apple0002" ;>Buy Now</button></a></li>
            <li class="f"><br><a href="Product_Search_Page_E_Commerce.php?UserID=' . $userid . '&product_id=apple0003"><button type="submit" $ID_Phone="apple0003" ;>Buy Now</button></a></li>
          </ul>
        </div>
        <div class="col-6 menu right">
          <ul>
            <li class="g"><br><a href="Product_Search_Page_E_Commerce.php?UserID=' . $userid . '&product_id=samsung0002"><button type="submit" $ID_Phone="samsung0002" ;>Buy Now</button></a></li>
            <li class="h"><br><a href="Product_Search_Page_E_Commerce.php?UserID=' . $userid . '&product_id=xiaomi0003"><button type="submit" $ID_Phone="xiaomi0003" ;>Buy Now</button></a></li>
          </ul>
        </div>
      </div>
      ';
      } else {
        echo '  
      </nav>
      </header>
      
      <div class="row" >
        <div class="col-6 menu">
          <ul>
            <li class="a"><br><a href="Product_Search_Page_E_Commerce.php?product_id=xiaomi0001"><button type="submit" ;>Buy Now</button></a></li>
            <li class="b"><br><a href="Product_Search_Page_E_Commerce.php?product_id=xiaomi0002"><button type="submit" ;>Buy Now</button></a></li>
          </ul>
        </div>
        <div class="col-6 menu right">
          <ul>
            <li class="c"><br><a href="Product_Search_Page_E_Commerce.php?product_id=apple0001"><button type="submit" $ID_Phone="">Buy Now</button></a></li>
            <li class="d"><br><a href="Product_Search_Page_E_Commerce.php?product_id=samsung0001"><button type="submit" $ID_Phone="samsung0001" ;>Buy Now</button></a></li>
          </ul>
        </div>
        <div class="col-6 menu right">
          <ul>
            <li class="e"><br><a href="Product_Search_Page_E_Commerce.php?product_id=apple0002"><button type="submit" $ID_Phone="apple0002" ;>Buy Now</button></a></li>
            <li class="f"><br><a href="Product_Search_Page_E_Commerce.php?product_id=apple0003"><button type="submit" $ID_Phone="apple0003" ;>Buy Now</button></a></li>
          </ul>
        </div>
        <div class="col-6 menu right">
          <ul>
            <li class="g"><br><a href="Product_Search_Page_E_Commerce.php?product_id=samsung0002"><button type="submit" $ID_Phone="samsung0002" ;>Buy Now</button></a></li>
            <li class="h"><br><a href="Product_Search_Page_E_Commerce.php?product_id=xiaomi0003"&product_id=xiaomi0003"><button type="submit" $ID_Phone="xiaomi0003" ;>Buy Now</button></a></li>
          </ul>
        </div>
      </div>
      ';
      }

      ?>



      <footer>
        <p>&copy; Copyright By Danaz Tech 2023 &copy;</p>
      </footer>

</body>

</html>