<!--Process form for logging out of 'LuckyKiwi
<?php
	
	if(!isset($included)){
		$page = $_POST['page'];
	}
	//'logoutProcess()' terminates the session - logging a user out of the system
	function logoutProcess(){
		session_start();
		session_destroy();
		session_start();
		
		if( isset( $_SESSION['Account'] ) ){
			return 0;
		}else{
			return 1;
		}
		
	}
	
	if(!isset($included)){
		logoutProcess();
		echo "<script>setTimeout(\"location.href = '".$page."';\",0);</script>";
	}
	
?>
