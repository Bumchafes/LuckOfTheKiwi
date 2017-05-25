<?php
session_start();

include 'dbFunctions.php';

//record the ticket purchase 
$purchase = PurchaseTickets($_SESSION['Account'] , $_POST['ownerID'] , $_POST['itemName'] , $_POST['ticket']);

echo '<form id="subReturn" action="ticketForm.php" method="POST">';
if( $purchase ){
	echo '<input type="hidden" name="transaction" value="1">';
}else{
	echo '<input type="hidden" name="transaction" value="0">';
}
		
	echo '<input type="hidden" name="ownerID" value="'.$_POST['ownerID'].'">';
	echo '<input type="hidden" name="itemName" value="'.$_POST['itemName'].'">';
	echo '</form>';
	echo $purchase.'<br>';
	echo $_SESSION['Account'].'<br>';
	echo $_POST['ownerID'].'<br>';
	echo $_POST['itemName'].'<br>';
	echo $_POST['ticket'].'<br>';
	//echo '<script type="text/javascript">'.'document.getElementById( \'subReturn\' ).submit();'.'</script>';
		
		
?>
		
