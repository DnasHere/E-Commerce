<!DOCTYPE html>
<html>

<head>
  <title>Payment Page</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      max-width: 100%;
      min-height: 640px;
    }

    header {
      background-color: #e8e8e8;
      color: #212121;
      padding: 10px;
      text-align: center;
      position: sticky;
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

    .radio-inputs {
      position: relative;
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      border-radius: 0.5rem;
      background-color: #EEE;
      box-sizing: border-box;
      box-shadow: 0 0 0px 1px rgba(0, 0, 0, 0.06);
      padding: 0.25rem;
      width: 100%;
      height: 70px;
      font-size: 18px;
    }

    .radio-inputs .radio {
      flex: 1 1 auto;
      text-align: center;
    }

    .radio-inputs .radio input {
      display: none;
      height: 70px;
    }

    .radio-inputs .radio .name {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      cursor: pointer;
      align-items: center;
      justify-content: center;
      border-radius: 0.5rem;
      font-weight: bold;
      height: 50px;
      border: none;
      padding: .5rem 0;
      color: rgba(51, 65, 85, 1);
      transition: all .15s ease-in-out;
    }

    .radio-inputs .radio input:checked+.name {
      background-color: #212121;
      color: #e8e8e8;
      font-weight: 600;
    }

    section {
      padding: 20px;
      margin: 20px;
      background-color: #fff;
      border: 1px solid #ccc;
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

    h2 {
      color: #212121;
    }

    .col-5 {
      width: 35%;
    }
  </style>
</head>

<body>
  <header>
    <h1> Danaz Techs </h1>
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

  <section>

    <header>
      <h1> Payment Option </h1>
    </header>


    <div class="radio-inputs">
      <label class="radio">
        <input type="radio" name="radio" checked="">
        <span class="name">Online Banking</span>
      </label>
      <label class="radio">
        <input type="radio" name="radio">
        <span class="name">E-Wallet</span>
      </label>
      <label class="radio">
        <input type="radio" name="radio">
        <span class="name">Credit / Debit Card</span>
      </label>
    </div>

    <div class="menu">
      <ul>
        <?php
        include("dbconn.php");
        $UserID = $_GET['UserID'];
        $sum = $_GET['sum'];

        echo "
                  <li>
                  <table>
                    <tr>
                      <td style='width: 70%'>   
                                         
                      
                      </td>
                      <td style='width: 30%'>
                      <h2>Total Payment</h2>
                      <h2>RM " . $sum . "</h2>
                      </td>
                      <td>
                      <a href='deleterow.php?UserID= ".$UserID."'><button>Confirm</button></a>
                      </td>
                    </tr>
                  </table>
                  </li>
                ";
        ?>
      </ul>
    </div>
  </section>

  <footer>
    <p>&copy; 2023 My Website. All rights reserved.</p>
  </footer>
</body>

</html>