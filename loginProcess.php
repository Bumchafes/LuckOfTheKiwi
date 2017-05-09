<!--This file is used to process data submitted from 'loginform.php'
<?php
	if(!isset($included)){
		session_start();		
		include 'dbFunctions.php';		
		//retrieve input from "loginform" to be used
		$userName=$_POST["user_name"];
		$pwd=$_POST["pswd"];
	}
	//'loginProcess()' function hashes the password and verifies username against password
	function loginProcess( $userName , $pwd ){
		//Hashing password
		$pwd=md5($pwd);
		if(!verifyLogin($userName , $pwd))
		{
			return 0;
		}
		else
		{	
			//update the session variable 'Account'
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
