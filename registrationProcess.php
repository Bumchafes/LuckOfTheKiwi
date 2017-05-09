<?php
	
    if(!isset($included)){
		include 'dbFunctions.php';
		echo '<link rel = "stylesheet" href = "style.css">';
		//retrieve variables from "loginform.php"
		$username=$_POST['userName'];
		$pwd=$_POST['password'];
		$confpwd=$_POST['cfmpassword'];
		$fName=$_POST['firstName'];
		$lName=$_POST['lastName'];
		$email=$_POST['email'];
		$month=$_POST['DOBMonth'];
		$day=$_POST['DOBDay'];
		$year=$_POST['DOBYear'];
		//Change date into database date format.
		$dob = "".$year."/".$month."/".$day;
    }
	
function registrationProcess( $username, $pwd, $confpwd, $fName, $lName, $email, $dob){
	
		if($pwd == $confpwd)
		{	
			$result = @AccCreateAccount($username, $fName, $lName, $dob, md5($pwd), $email );
			
			if($result == 1){
					return 1;
			}else{
					return 0;
			}			
		
		}
		else
		{
				return 2;
		}
}
	
	if(!isset($included)){
	
		$R = registrationProcess( $username, $pwd, $confpwd, $fName, $lName, $email, $dob);
	
		if($R == 1){
			echo "<script>setTimeout(\"location.href = 'loginForm.php';\",0);</script>";
		}elseif($R == 2){
			echo '<p style="color:orange;">Passwords do not match</p>';
			echo "<script>setTimeout(\"location.href = 'registrationForm.php';\",2500);</script>";
		}else{
			echo '<p style="color:orange;">The Username is already in use</p>';
			echo "<script>setTimeout(\"location.href = 'loginForm.php';\",2500);</script>";
		}
		
	}
?>
