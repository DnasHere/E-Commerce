<!DOCTYPE html>
<html>

<head>
  <title>Cart Page</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Lucida Sans, sans-serif;
      box-sizing: border-box;
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

    section {
      padding: px;
      margin: 20px;
      background-color: #fff;
      border: 1px solid #ccc;
    }

    .heads {
      background-color: #212121;
      color: #e8e8e8;
      padding: 10px;
      text-align: center;
      top: 0;
    }

    .heads .logo {
      font-size: 30px;
      font-weight: bold;
      color: #e8e8e8;
      text-align: center;
    }

    .cart {
      display: flex;
      background-color: #212121;
      justify-content: space-between;
      align-items: center;
      padding: 7px 10px;
      border-radius: 3px;
      width: 60px;
    }

    .fa-solid {
      color: rgb(159, 166, 177);
    }

    .cart p {
      height: 22px;
      width: 22px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 22px;
      background-color: rgb(159, 166, 177);
      color: white;
    }

    .container {
      display: flex;
      width: 100%;
      margin-bottom: 30px;

    }

    #root {
      width: 60%;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      grid-gap: 20px;
    }

    .sidebar {
      width: 40%;
      border-radius: 5px;
      background-color: #eee;
      margin-left: 20px;
      padding: 15px;
      text-align: center;
    }

    .head {
      background-color: rgb(40, 38, 35);
      border-radius: 3px;
      height: 40px;
      padding: 40px;
      margin-bottom: 20px;
      color: white;
      display: flex;
      align-items: center;
    }

    .foot {
      display: flex;
      color: #212121;
      justify-content: space-between;
      border-top: 1px solid #333;
    }

    .box {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-between;
      border: 1px solid black;
      border-radius: 5px;
      padding: 15px;
    }

    .img-box {
      width: 100%;
      height: 180px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .images {
      max-width: 90%;
      max-height: 90%;
      object-fit: cover;
      object-position: center;
    }

    .bottom {
      margin-top: 20px;
      width: 100%;
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-between;
      height: 110px;
    }

    h2 {
      font-size: 20px;
      color: black;
    }

    .cart-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px;
      background-color: white;
      border-bottom: 1px solid #aaa;
      border-radius: 3px;
      margin: 10px 10px;
    }

    .row-img {
      width: 50px;
      height: 50px;
      border-radius: 50px;
      border: 1px solid black;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .rowimg {
      max-width: 43px;
      max-height: 43px;
      border-radius: 50%;
    }

    .fa-trash:hover {
      cursor: pointer;
      color: #333;
    }

    footer {
      background-color: #333;
      color: #fff;
      padding: 10px;
      text-align: center;
    }

    img {
      max-width: 100%;
      height: auto;
      display: block;
      margin: 0 auto;
      border: 1px solid #ccc;
      padding: 10px;
      background-color: #f7f7f7;
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

    .col-6 {
      width: 60%;
      height: 27%;
    }

    .col-5 {
      width: 35%;
    }

    .col-full {
      align-items: center;
      width: 98%;
    }

    .menu ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    .menu li {
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 20px;
      background-color: #e8e8e8;
      color: #e8e8e8;
      font-weight: bold;
      -webkit-box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
      box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
      transition: transform 0.1s ease;
    }

    table,
    tr,
    td {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #212121;
    }
  </style>
</head>

<body>
  <header>
    <h1>Danaz Techs</h1>

    <nav>
      <?php
      include("dbconn.php");

      if (isset($_GET['UserID'])) {
        $UserID = $_GET['UserID'];

        $query = "SELECT * FROM customer WHERE CustID = $UserID";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['CustName'] = $row['CustName'];
          $UserID = $_GET['UserID'];

          echo '
        <a href="#"> Hello "' . $row['CustName'] . '"</a>
        <a href="Cart_Page_E_Commerce.php?UserID=' . $UserID . '"><button>Cart</button></a>
        <a href="index.php"><button>Menu</button></a>
        <a href="destroy.php"><button>Log Out</button></a>
        ';
        } else {

          echo '
        <a href="LogIn_Page_E_Commerce.php"><button>Log In</button></a>
        <a href="Sign in Page E Commerce.php"><button>Sign In</button></a>  
    ';
        }
      }
      ?>
    </nav>
  </header>

  <div class="heads">
    <h1>Cart</h1>
  </div>

  <div class="row">
    <div class="col-6 menu">
      <ul>
          <?php
          include("dbconn.php");
      
          $query = "SELECT OrderID FROM orders WHERE UserID = ".$_GET['UserID']."";
          $result = mysqli_query($con, $query);
          if (isset($result)) {

            $query = "SELECT * FROM product INNER JOIN orders ON product.ProdID=orders.ProdID WHERE UserID='$UserID'";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $query = "SELECT * FROM product INNER JOIN orders ON product.ProdID=orders.ProdID WHERE UserID='$UserID'";
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $ProdID=$row["ProdID"];
                    $UserID = $_GET['UserID'];
                    
                    $querylink = "SELECT OrderID FROM orders WHERE UserID = $UserID";
                    $resultremove = mysqli_query($con, $querylink);
                    $rowremove = mysqli_fetch_assoc($resultremove);
                    $OrderID = $rowremove['OrderID'];

                    echo "
                  <li>
                    <table>
                      <tr>
                        <td style='width: 20%'>
                        <img src='Poster/" . $row["ProdImage"] . "' >
                        </td>
                        <td style='width: 70%'>
                        <h2>" . $row["ProdName"] . "</h2>
                        <h2>RM " . $row["ProdPrice"] . "</h2>
                        </td>
                        <td style='width: 10%'>                          
                        <a href='delete_row_product.php?OrderID=".$OrderID."&UserID=".$UserID."'><button>Remove</button></a>
                        </td>
                      </tr>
                    </table>
                  </li>
                  ";
                  }
                }
              }
            }
          } else {
            echo "
                  <li>
                  <h2>Your Cart Is Empty</h2>                  
                  </li>
                ";
          }
          ?>
      </ul>
    </div>

    <div class="col-5 menu right">
      <ul>
        <li>
          <div class="heads" style="border-radius: 20px;">
            <h1>My Cart</h1>
          </div>
          <div>
            <table>
              <?php
              include("dbconn.php");
              $UserID = $_GET['UserID'];

              $query = "SELECT OrderID FROM orders WHERE UserID = $UserID";
              $result = mysqli_query($con, $query);
              if (isset($result)) {
                echo "
                    <tr>
                      <th style='width: 60%'>
                      <h2>Phone Name</h2>
                      </th>
                      <th></th>
                      <th style='width: 40%'>
                      <h2>Price</h2>
                      </th>
                    </tr>   
                ";

                $query = "SELECT * FROM product INNER JOIN orders ON product.ProdID=orders.ProdID WHERE UserID='$UserID'";
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <div class='foot'></div>
                    <tr>
                      <th style='width: 60%'>
                      <h3>" . $row["ProdName"] . "</h3>
                      </th>
                      <th></th>
                      <th style='width: 40%'>
                      <h3>RM " . $row["ProdPrice"] . "</h3>
                      </th>
                    </tr>                  
                    
                  ";
                  }
                }
              } else {
                echo "
                <tr>
                      <th>
                      <h2>Phone Name</h2>
                      </th>
                      <th>
                      <h2>Price</h2>
                      </th>
                    </tr>   
                ";
              }

              ?>

            </table>
          </div>
          <div class="foot"></div>
          <?php
          include("dbconn.php");
          $UserID = $_GET['UserID'];

          $query = "SELECT OrderID FROM orders WHERE UserID = $UserID";
          $result = mysqli_query($con, $query);
          if (isset($result)) {

            $query = "SELECT SUM(ProdPrice) AS total_sum FROM product INNER JOIN orders ON product.ProdID=orders.ProdID WHERE UserID='$UserID'";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result) ;
                $sum = $row['total_sum'];
                $UserID = $_GET['UserID'];

                echo "
                <table>
                <tr>
                  <th style='width: 74%'>
                    <h2>Total</h2>
                  </th>
                  <th style='width: 28%'>
                    <h2>RM " . $sum . "</h2>
                  </th>
                </tr>
                </table>
                </li>
                </ul>
                <a href='index.php'><button style='float:left; padding: 15px 30px;'>Continue Shopping</button></a>
                <a href='PaymentPage.php?UserID=" . $UserID . "&sum=" . $sum . "'><button style='float:right; padding: 15px 60px;'>Place Order</button></a>
            
              ";
              
            }
          } else {
            echo '
            <table>
              <tr>
                <th style="width: 73%">
                  <h2>Total</h2>
                </th>
                <th style="width: 28%">
                  <h2>RM " . $sum . "</h2>
                </th>
              </tr>
              </table>   
              </li>
              </ul>    
              <a href="index.php"><button style="float:left; padding: 15px 30px;">Continue Shopping</button></a>
              <a href="index.php"><button style="float:right; padding: 15px 60px;">Place Order</button></a>   
            ';
          }
          ?>

    </div>
  </div>
  <footer>
    <p>&copy; 2023 My Website. All rights reserved.</p>
  </footer>
</body>

</html>