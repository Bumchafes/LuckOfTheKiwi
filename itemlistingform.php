<html>
	<head>
		<title> Lucky Kiwi </title> 
		<link rel="stylesheet" type="text/css" href="style.css" />
		<?php
		//checks wether user is logged in - else redirect to the login page
			session_start();
			if(!isset( $_SESSION['Account'] ))
			{
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
		<h2>Item Details</h2>
		<p><i><span style="color:red">Enter the details about the item you want to list.</span></i></p>
		<form class="inputs" action = "itemlistingform.php" method = "post" ></p>
			<p>Item name: <input required type="text" name="itemName"></p>
			
			
			<label>Item Description:</label>
			<!--Allows seller to input a description of an item-->
			<br><textarea required name="Desc" rows="8" cols="40"></textarea> 
			</p>

			<p>Item city: <input required type="text" name="itemCity"></p>
			
			Item Type:<br>
			<input type="radio" name="type" value= "Clothing" > Clothing</input>
			<input type="radio" name="type" value= "Gaming"> Gaming</input>
			<input type="radio" name="type" value= "Sports"> Sports</input>
			<input type="radio" name="type" value= "Electronics"> Electronics</input>
			<input type="radio" name="type" value= "Home & Living"> Home & Living </input>
			<br><input type="radio" name="type" value= "Books"> Books</input>
			<input type="radio" name="type" value= "Toys"> Toys</input>
			<input type="radio" name="type" value= "Jewellery"> Jewellery</input>
			<input type="radio" name="type" value= "Art"> Art</input>
			<input type="radio" name="type" value= "Movies & TV"> Movies & TV</input>
			<br>
			<br>
			
		<h2>Upload Image</h2>
			<p><i><span style="color:red">Add an image of your item to your listing.</span></i></p>
			<input type="file" name="image" id="fileToUpload"><br>
			
		
	</div>
		
		<h2>Ticket Details</h2>
	
			<p><i><span style="color:red">Enter asking price for your item and the preferred cost per ticket?</span></i></p>
			<label>Item Asking Price: $<input required type="text" name="totalPrice"></label>
			<p><label>Preferred cost per ticket: $<input required type="text" name="totalTicket"></label>
			<p id="targetDiv"></p>
			<p><input name="Cost" type="button" value="Calculate My Tickets" onClick="calculateTix(totalPrice.value, totalTicket.value)">
	
		<script>
			function calculateTix(itemValue, ticketCount){
				
					var ticketPrice = (itemValue/ticketCount);
			
					if(isNaN(itemValue) || isNaN(ticketCount)){	
						document.getElementById("targetDiv").innerHTML = "Error: Input must be of type Integer";
					}else if(ticketCount < 1){
						document.getElementById("targetDiv").innerHTML = "Error: Ticket cost must be atleast $1";
					}else if(ticketCount > (itemValue/2)){
						document.getElementById("targetDiv").innerHTML = "Error: Max cost for one tickets is: $"+(itemValue/2);
					}else if(itemValue % ticketCount != 0){
						do{
							ticketCount--;
						}while(itemValue % ticketCount != 0);
						document.getElementById("targetDiv").innerHTML = "$"+ticketCount+" per ticket for "+itemValue/ticketCount+" tickets.";
						
						document.getElementById("ticketPrice").value = ticketPrice;
						document.getElementById("ticketCount").value = ticketCount;
						document.getElementById("itemValue").value = itemValue;
						
						
					}else{
						document.getElementById("targetDiv").innerHTML = "$"+ticketCount+" per ticket for "+ticketPrice+" tickets.";
						
						document.getElementById("ticketPrice").value = ticketPrice;
						document.getElementById("ticketCount").value = ticketCount;
						document.getElementById("itemValue").value = itemValue;
					}
					
			}
			</script>
		<p>
			<input id="ticketPrice" hidden type="text" value="test1" name="tikPrice">
			<input id="ticketCount" hidden type="text" value="test2" name="tikCount">
			<input id="itemValue" hidden type="text" value="test3" name="itemValue">
		</p>
		
		<p>
		<input class = "button buttonHover" type="submit" value = "Submit"></input>
			<input class = "button buttonHover" type="reset" value = "Reset"></input>
			</br>
			<br>
			<a class = "button buttonHover" href="index.php">Return to Home Page</a>
			</br>
		</p>	
		</form>
		
		<?php
		//IF THE ITEM DETAILS ARE POSTED THEN CREATE ITEM WITH THEM
			if( isset( $_POST['itemCity'] )){
				$accID = $_SESSION['Account'];
				$city = $_POST["itemCity"];
				$value = $_POST["itemValue"];
				$ticketcost = $_POST["tikPrice"];
				$ticketcount = $_POST["tikCount"];
				$name = $_POST["itemName"];
				$desc = $_POST["Desc"];
				if( isset($_POST["type"]) )
				{
					$tag = $_POST["type"];
				}
				else
				{
					$tag = NULL;
				}
				$photo = $_POST["image"];
				
				include 'dbFunctions.php';
				ItmCreateItem($accID,$city,$value,$ticketcost,$ticketcount,$name,$desc,$tag);
				insertPhoto($accID,$name,$photo);
			}
		?>
		
		
	</body>
</html>
