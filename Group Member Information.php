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
      
        <a href="index.php"><button>Menu</button></a>
    
    </nav>
  </header>

  <div class="heads">
    <h1>Group Member Information</h1>
  </div>

  <div class="row">
    <div class="col-6 menu">
      <ul>
        <li>
          <table>
            <tr>
              <td style='width: 30%'>
              <img src='Formal/Formal Picture Anas.png'>
              </td>
              <td style='width: 70%'>
                <h2>MUHAMMAD ANAS BIN MOHD MAZNI</h2>
                <h2>2021863306</h2>
                <h2>CS110 - DIPLOMA IN COMPUTER SCIENCE</h2>
                <h2>2021863306@student.uitm.edu.my</h2>
              </td>
            </tr>
          </table>
        </li>
        <li>
          <table>
            <tr>
              <td style='width: 30%'>
                <img src='Formal/daniel.jpg'>
              </td>
              <td style='width: 70%'>
                <h2>MUHAMMAD DANIAL BIN ABDULLAH</h2>
                <h2>2021605314</h2>
                <h2>CS110 - DIPLOMA IN COMPUTER SCIENCE</h2>
                <h2>2021605314@student.uitm.edu.my</h2>
              </td>
            </tr>
          </table>
        </li>
        <li>
          <table>
            <tr>
              <td style='width: 30%'>
              <img src='Formal/WhatsApp Image 2023-06-16 at 15.25.16.jpg'>
              </td>
              <td style='width: 70%'>
                <h2>NURUL NABILA NADIA BINTI KHAIRUL NIZAL</h2>
                <h2>2021894118></h2>
                <h2>CS110 - DIPLOMA IN COMPUTER SCIENCE</h2>
                <h2>2021894118@student.uitm.edu.my</h2>
              </td>
            </tr>
          </table>
        </li>
        <li>
          <table>
            <tr>
              <td style='width: 30%'>
              <img src='Formal/WhatsApp Image 2023-06-16 at 15.24.47.jpg'>
              </td>
              <td style='width: 70%'>
                <h2>SHAFIQA AQMAR BINTI KAMARUDDIN</h2>
                <h2>2021209524></h2>
                <h2>CS110 - DIPLOMA IN COMPUTER SCIENCE</h2>
                <h2>2021209524@student.uitm.edu.my</h2>
              </td>
            </tr>
          </table>
        </li>
        <li>
          <table>
            <tr>
              <td style='width: 30%'>
              <img src='Formal/zamir.jpg'>
              </td>
              <td style='width: 70%'>
                <h2>MUHAMMAD ZAMIR HARITH BIN GHADZALI</h2>
                <h2>2021449246></h2>
                <h2>CS110 - DIPLOMA IN COMPUTER SCIENCE</h2>
                <h2>2021449246@student.uitm.edu.my</h2>
              </td>
            </tr>
          </table>
        </li>
    </div>
  </div>
  <footer>
    <p>&copy; 2023 My Website. All rights reserved.</p>
  </footer>
</body>

</html>