<?php
session_start();
if(!isset( $_SESSION['Account'] )){
	echo '<META http-equiv="refresh" content="0;URL=loginForm.php">';
}
?> 
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Ticket</title> 
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
	<h1><i>The<span style="color:#00E700">Lucky</span>Kiwi</i></h1>
	<form action = "logoutProcess.php" method = "post">
		<input type="hidden" name="page" id="hiddenField" value="index.php">
		<p class="aLogins"><input class = "button buttonHover" type="submit" value="Logout"></p>
	</form>
	<br>

<body>
	<?php
		//check the maximum tickets for user to purchase according to their account balance
		include 'dbFunctions.php';
		$ownerID = $_POST['ownerID'];
		$itemName = $_POST['itemName'];
		$max = (int)( AccGetBalance( $_SESSION['Account'] ) / ItmGetTicketCost( $ownerID , $itemName ) );
		if( $max > ItmGetTicketCount( $ownerID , $itemName )){
			$max = ItmGetTicketCount( $ownerID , $itemName );
		}
	?>
<div>
	<?php 
		//Display the message about purchase sucess or fail
		if( isset($_POST['transaction'])){
			if( $_POST['transaction']){
				echo '<h3 style="color:green;">Purchase Complete</h3><br>';
			}else{
				echo '<h3 style="color:orange;">Purchase Incomplete : Something went wrong, please try again later.</h3><br>';
			}
		}
	?>

	
<form class="inputs" action ="ticketprocess.php" method = "post"  >
	<?php 
		echo "<p><b>".$itemName."</b></p>";
		//Ask user to input the number of ticket they want to purchase
		if( $max > 0 ){ 
		
		if($itemName == "Fruit Bursts"){
		$photoFB = getPhotos("Fruit Bursts","1034");
		echo "<img src=\"".$photoFB."\" height=\"350\" width=\"450\"> ";
		}else{
		echo "<img src=\"noimage.png\" height=\"350\" width=\"450\"> ";
		}
	?>
	    <p>Seller Details</p>
	    <p>Username: <?php echo AccGetUsername($ownerID); ?></p>
	    <p>Rating: <?php echo FbGetFeedback($ownerID); ?></p><br>
	    
		<p>How many tickets do you want to buy for this item.</p>
		<p><label>Ticket: <input type="text" max="<?php echo $max;?>" min="1"	name="ticket"> Max:<?php echo $max;?></label></p>
		<br>
		<input type="hidden" name="ownerID" id="hiddenField" value="<?php echo $ownerID; ?>">
		<input type="hidden" name="itemName" id="hiddenField" value="<?php echo $itemName; ?>">
		<p><input class = "button buttonHover" type="submit" value="Submit"></p>
	
	<?php 
				
		}elseif( ItmGetTicketCount( $ownerID , $itemName ) == 0 ){
			echo '<p> All tickets are sold. The auction will be underway shortly. </p>';
		}else{
			echo '<p> You do not have enough money in your account to afford this item right now. </p>';
		} 
	
	?>
</form>
		<p><a class = "button buttonHover" href="index.php">Return Home Page </a></p>
</div>

</body>
</html>
