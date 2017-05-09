<?php
	
	if(!isset($included)){
		$page = $_POST['page'];
	}
	
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