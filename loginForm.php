<html>
<head>
	<!--this is a basic login form that takes in a username and password.-->
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
	<h1><i>The<span style="color:#00E700">Lucky</span>Kiwi</i></h1>
<body>
<br><br><br>
	
	
		<form class="inputs" action = "loginProcess.php" method = "post">
		<div class="inputs">
			<p>*username=alpha : password=abc</p>
			<p>User Name: <input required type="text" name="user_name"><br>
			Password: <input required type="password" name="pswd">
			<p>
				<input class = "button buttonHover" type="submit" value="Login">
				<input class = "button buttonHover" type="reset" value="Reset">
				<a class = "button buttonHover" href="registrationForm.php">Register</a>
			</p>
			</div>
		</form>
		<p><a class = "button buttonHover" href="index.php">Return Home Page </a></p>
	
</body>
</html>
