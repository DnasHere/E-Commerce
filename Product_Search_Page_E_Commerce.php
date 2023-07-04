<!DOCTYPE html>
<html>

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
      width: 30%;
    }

    .col-2 {
      width: 70%;
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

    .center_bottom {
      margin-bottom: 80%;
    }

    p1 {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-weight: 700;
      font-size: 30px;
    }

    p2 {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-weight: 700;
      font-size: 20px;
    }

    img {
      width: 100%;
      height: 100%;
    }
  </style>
</head>

<body>

  <header>
    <h1>Danaz Techs</h1>
    <nav>
      <?php
      include("dbconn.php");
      $prodid = $_GET['product_id'];

      if (isset($prodid) && isset($_GET['UserID'])) {
        $UserID = $_GET['UserID'];
        $query = "SELECT * FROM customer WHERE CustID = $UserID";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['CustName'] = $row['CustName'];

          echo '
        <a href="#"> Hello "' . $_SESSION['CustName'] . '"</a>
        <a href="Group Member Information.php"><button>Group Member</button></a>
        <a href="Cart_Page_E_Commerce.php?UserID=' . $UserID . '"><button>Cart</button></a>
        <a href="index.php"><button>Menu</button></a>
        <a href="destroy.php"><button>Log Out</button></a>
        ';
        } else {

          echo '
          <a href="Group Member Information.php"><button>Group Member</button></a>
        <a href="LogIn_Page_E_Commerce.php"><button>Log In</button></a>
        <a href="Sign in Page E Commerce.php"><button>Sign In</button></a> 
    ';
        }
      }
      ?>
    </nav>
  </header>

  <div class="row">
    <div class="col-1">
      <ul>

        <?php
        include("dbconn.php");
        $ProdID = $_GET['product_id'];
        $query = "SELECT * FROM product WHERE ProdID = '$ProdID'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<img src='Poster/" . $row["ProdImage"] . "' >";
          }
        }
        ?>
      </ul>
    </div>
    <div class="col-2  right">
      <ul>
        <?php
        include("dbconn.php");
        $ProdID = $_GET['product_id'];
        $UserID = $_GET['UserID'];
        $OrderID = $ProdID . '' . $UserID;
        $count = 1;

        $query = "SELECT * FROM product WHERE ProdID = '$ProdID'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {

          $ProdID = $row["ProdID"];
          echo '
              <p1>' . $row["ProdName"] . '</p1><br><br>
              <p1>Rating : ' . $row["Rating"] . '/ 5</p1><br><br>
              <p1>Price : RM ' . $row["ProdPrice"] . '</p1><br><br>
              <p1>Description :</p1><br><br>
              <p2>' . $row["ProdDesc"] . '</p2><br><br>              
              ';

          if (isset($prodid) && isset($_GET['UserID'])) {
            $ProdID = $_GET['product_id'];
            $UserID = $_GET['UserID'];

            echo ' 
                <a href="save_order.php?ProdID=' . $_GET['product_id'] . '&UserID=' . $_GET['UserID'] . '"><button>Buy Now</button></a>
                ';
          } else {

            echo '
                <a href="index.php?ProdID=' . $ProdID . '"><button>Buy Now</button></a>
                ';
          }
        }
        ?>

      </ul>
    </div>
  </div>

  <footer>
    <p>&copy; Copyright By Danaz Tech 2023 &copy;</p>
  </footer>

</body>

</html>