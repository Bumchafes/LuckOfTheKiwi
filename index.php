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
				<div><a class = "button buttonHover" href="unitTesting.php">Unit Testing </a></div>
				<div><a class = "button buttonHover" href="itemlistingform.php">List an item </a></div>
			<br>

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
		<br>
		<form action = "searchItems.php" method = "post">
			<p>
				<input class = "button buttonHover" type="submit" value="Search"> 
				<input type="text/feild" name="query" id="hiddenField" value="'.$row['a_ID'].'">
			</p>
		</form>
		<br>
		<?php if( isset($searchResult) ){
			echo '<h3>Results</h3>'.
			'<table class="listings bottom">'.
			'<thead>'.
				'<tr>'.
					'<th class="name left">Name</th>'.
					'<th class="desc" >Description</th>'.
					'<th>Tickets Left</th>'.
					'<th>Ticket Price</th>'.
					'<th class="right">Purchase</th>'.
				'</tr>'.
			'</thead>';
			while( $row = $searchResult->fetch_array() ){
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

		 } ?>
	</div>
	</div>
</body>
</html>
