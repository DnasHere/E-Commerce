<?php
session_start();
/* include db connection file */
include("dbconn.php");
include("classswaf.php");
if (isset($_POST['submit'])) {
	/* capture values from HTML form */
	$username = ($_POST['username']);
	$password = ($_POST['password']);

	$sanitized_username = mysqli_real_escape_string($db, $username);
	$sanitized_password = mysqli_real_escape_string($db, $password);

	/* execute SQL command */
	$query = "SELECT * from customer where CustID ='$sanitized_username' AND CustPass='$sanitized_password'";
	$result = mysqli_query($con, $query) or die("Error: " . mysqli_error($dbconn));

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['CustID'] = $row['CustID'];
		$_SESSION['CustName'] = $row['CustName'];
		$_SESSION['CustEmail'] = $row['CustEmail'];
		$_SESSION['CustPass'] = $row['CustPass'];
		$_SESSION['CustAdd'] = $row['CustAdd'];
		$_SESSION['CustPhoneNo'] = $row['CustPhoneNo'];

		$UserID = $_SESSION['CustID'];
		$query="SELECT UserID From users WHERE UserID='$UserID'";
		
		if(mysqli_num_rows($resultuser) > 0) {
			echo "<script>alert('Successfully Logged in!!!');</script>";
		header("Location:index.php?Message=" . "successfully logged in!!");
		}		
	} else {
		echo "<script>alert('Incorrect Username Or Password!!');</script>";
		header("Location:LogIn_Page_E_Commerce.php?Message=" . "successfully logged in!!");
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Log In Page</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: "Poppins", sans-serif;
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
		<h1>Log In Page</h1>
		<nav>
			<a href="index.php">
				<menu>Back</menu>
			</a>
		</nav>
	</header>

	<div class="div_form">
		<h1>Login</h1>
		<form name="form" id="consultation-form" class="feed-form" method="post" action="index.php">
			<input name="username" type="text" required="" placeholder="User ID" id="username">
			<input name="password" type="password" required="" placeholder="Password" id="password">
			<button class="button_submit" type="submit" name="submit">Log In</button>
		</form>
	</div>
	<footer>
		<p>&copy; 2023 My Website. All rights reserved.</p>
	</footer>
</body>

</html>