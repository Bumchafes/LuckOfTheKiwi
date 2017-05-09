<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
	<h1><i>TheLuckyKiwi</i></h1>

<body>
<br><br><br>
	<div>
	<p>username=alpha : password=abc</p>
		<form class="inputs" action = "loginProcess.php" method = "post">
			User Name: <input required type="text" name="user_name">
			Password: <input required type="password" name="pswd">
			<p>
				<input class = "button buttonHover" type="submit" value="Login">
				<input class = "button buttonHover" type="reset" value="Reset">
				<a class = "button buttonHover" href="registrationForm.php">Register</a>
			</p>
		</form>
		<p><a class = "button buttonHover" href="index.php">Return Home Page </a></p>
	</div>
</body>
</html>