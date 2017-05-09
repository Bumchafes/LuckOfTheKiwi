<html>
	<head>
		<title> Lucky Kiwi </title> 
		<link rel="stylesheet" type="text/css" href="style.css" />
		<?php
		//IF THE USER IS NOT LOGGED IN THEN SEND THEM TO THE LOGIN FORM
			session_start();
			if(!isset( $_SESSION['Account'] )){
				?>
					<META http-equiv="refresh" content="0;URL=loginForm.php">
				<?php
			}
		?>
	</head> 
<h1><i>TheLuckyKiwi</i></h1>
<form action = "logoutProcess.php" method = "post">
	<input type="hidden" name="page" id="hiddenField" value="index.php">
	<p class="aLogins"><input class = "button buttonHover" type="submit" value="Logout"></p>
</form>
<br>
	<body> 
		<div>
			<form class="inputs" action = "itemlistingform.php" method = "post" ></p>
				<p>Item name: <input required type="text" name="itemName"></p>
				<p>Item Description: <input required type="text" name="Desc"></p>
				<p>Item city: <input required type="text" name="itemCity"></p>
				<p>Number of $1 Tickets to Sell: <input required type="text" name="Cost"></p>
				<br>Item Type:
				<input type="radio" name="type" value= "Clothing" > Clothing</input>
				<input type="radio" name="type" value= "Gaming"> Gaming</input>
				<input type="radio" name="type" value= "Sports"> Sports</input>
				<input type="radio" name="type" value= "Electronics"> Electronics</input>
				<input type="radio" name="type" value= "Home & Living"> Home & Living </input>
				<input type="radio" name="type" value= "Books"> Books</input>
				<input type="radio" name="type" value= "Toys"> Toys</input>
				<input type="radio" name="type" value= "Jewellery"> Jewellery</input>
				<input type="radio" name="type" value= "Art"> Art</input>
				<input type="radio" name="type" value= "Movies & TV"> Movies & TV</input>
				<br>
				<br>
				<input class = "button buttonHover" type="submit" value = "Submit"></input>
				<input class = "button buttonHover" type="reset" value = "Reset"></input>
				</br>
				<br>
				<a class = "button buttonHover" href="index.php">Return to Home Page</a>
				</br>
			</form>
		</div>
		<?php
		//IF THE ITEM DETAILS ARE POSTED THEN CREATE ITEM WITH THEM
			if( isset( $_POST['itemCity'] )){
				$accID = $_SESSION['Account'];
				$city = $_POST["itemCity"];
				$value = $_POST["Cost"];
				$ticketcost = 1;
				$ticketcount = $_POST["Cost"];
				$name = $_POST["itemName"];
				$desc = $_POST["Desc"];
				$tag = $_POST["type"];
				include 'dbFunctions.php';
				ItmCreateItem($accID,$city,$value,$ticketcost,$ticketcount,$name,$desc,$tag);
			}
		?>
	</body>
</html>