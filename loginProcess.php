<?php
	
	if(!isset($included)){
		session_start();
	
		include 'dbFunctions.php';
		
		//retrieve input from "loginform"
		$userName=$_POST["user_name"];
		$pwd=$_POST["pswd"];
	}
	
	function loginProcess( $userName , $pwd ){
		//Hashing password
		$pwd=md5($pwd);
		if(!verifyLogin($userName , $pwd))
		{
			return 0;
		}
		else
		{
			$_SESSION['Account'] = AccGetID( $userName );
			return 1;
		}
	}
	
	if(!isset($included)){
		if( loginProcess( $userName , $pwd ) ){
		
			echo "<script>setTimeout(\"location.href = 'index.php';\",0);</script>";
		
		}else{
		
			echo "<script>setTimeout(\"location.href = 'loginForm.php';\",1500);</script>";
		}
	}
	
?>
