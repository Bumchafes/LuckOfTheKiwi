<?php
	session_start();
	
	if( !isset( $_SESSION['Account']) )
	{
		echo '<META http-equiv="refresh" content="0;URL=loginForm.php">';		
	}
	
	echo '<head>';
	
	if( __FILE__ == "index.php" )
	{
		echo '<title>Lucky Kiwi Homepage</title>';
	}
	else
	{
		echo '<title>Navigation Page</title>';
	}
	
	echo '<link rel="stylesheet" type="text/css" href="style.css"/>';
	echo '</head>';
	echo '<h1><i>The Lucky Kiwi</i><h1>';
	
	include 'dbFuctions.php';
	$balance = AccGetBalance( $_SESSION['Account'] );
	$pending = AccGetPending( $_SESSION['Account'] );
	$hotItems = getHotItems();
	
	echo '<div class="balance">Account Balance: $'.$balance
		.'<br>Pending Transactions: $'.$pending.'</div>';
	echo '<form action="logoutProcess.php" method="POST">'
			.'<input type="hidden" name="page" id="hiddenField" value="'.__FILE__.'">'
			.'<p class="aLogins"><input clas="button buttonHover" type="submit" value="Logout"></p>'
			.'</form>';
?>
