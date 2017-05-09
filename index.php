<!--this is the first page displayed when 'luckykiwi.us.to/luckykiwi' is acccessed-->
<?php
//starts session for this page
session_start();
//checks to verify wether session variable has been set
if(!isset( $_SESSION['Account'] )){
	?>
	<META http-equiv="refresh" content="0;URL=loginForm.php">
	<?php
}
?> 
<html>
<head>
	<meta http-equiv="content-type" content="text/php; charset=utf-8" />
	<title>Login</title> 
	<!--stylesheet header-->
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
	<h1><i>TheLuckyKiwi</i></h1>
	<?php
	//check if user is logged in - else redirect to login page
	if(!isset( $_SESSION['Account'])){
		?>
		<p class="aLogins"><a class = "button buttonHover" href="loginForm.php">Login </a>
		<a class = "button buttonHover" href="registrationForm.php">Register </a></p>
		<br>
		<?php
	}else{
	    //includes page that holds database functions to be called
		include 'dbFunctions.php';
		$balance = AccGetBalance( $_SESSION['Account'] );
		$items = GetItemSampleArray();
		?>
		<!--displays users balance
		<div class="balance">Account Balance : $<?php echo $balance ?></div>
			<form action = "logoutProcess.php" method = "post">
			<input type="hidden" name="page" id="hiddenField" value="index.php">
			<p class="aLogins"><input class = "button buttonHover" type="submit" value="Logout"></p>
			</form>
			<br>
		<?php
	}
	?>
<body>
	<div>
		<div class="inputs">
				<!--<div><a href="loginForm.php">Login </a></div>
				<div><a href="registrationForm.php">Register </a></div>
				<div><a href="ticketform.php">Ticket Sale </a></div>-->
				<div><a class = "button buttonHover" href="unitTesting.php">Unit Testing </a></div>
				<div><a class = "button buttonHover" href="itemlistingform.php">List an item </a></div>
			<br>
			<!--<div><a href="feedbackForm.php">Feedback </a></div>
			<div><a href="loginprocess.php">Login Process </a></div>
			<div><a href="paymentfrom.php">paymentform </a></div>
			<div><a href="registrationForm.php">registration </a></div>
			<div><a href="registerprocess.php">regoprocess </a></div>
			<div><a href="ticketform.php">ticketform </a></div>-->

	<?php if( isset($items) ){ ?>
		<h3> Hot Items </h3>
		<table class="listings bottom">
			<thead>
				<tr>
					<th class="name left">Name</th>
					<th class="desc" >Description</th>
					<th>Tickets Left</th>
					<th>Ticket Price</th>
					<th class="right">Purchase</th>
				</tr>
			</thead>
			<?php
				while( $row = $items->fetch_array() ){
					$rows[] = $row;
				}
				foreach( $rows as $row ){
					echo '<tr>'.
							'<td class="left right" >'.
								$row['i_Name'].
							'</td><td class="right">'.
								$row['i_Desc'].
							'</td><td class="right center">'.
								$row['i_TicketCount'].
							'</td><td class="right center">$'.
								$row['i_TicketCost'].
							'</td><td class="center right">'.
								'<form action = "ticketForm.php" method = "post">'.
								'<input type="hidden" name="ownerID" id="hiddenField" value="'.$row['a_ID'].'">'.
								'<input type="hidden" name="itemName" id="hiddenField" value="'.$row['i_Name'].'">'.
								'<input class = "button buttonHover" type="submit" value="Buy">'.
								'</form>'.
							'</td>'.
						'</tr>';		
				}
			?>
		</table>
	<?php } ?>
	</div>
	</div>
</body>
</html>
