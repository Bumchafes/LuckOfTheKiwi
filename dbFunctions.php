<?php

	/*================================================
						CONNECTION
	================================================*/
	
	/*------------------------------------------------
	CONNECTION
	------------------------------------------------*/
	
function dbConnect(){
		
	if( file_exists("C:\Users\Soulwrite\Google Drive\Lucky Kiwi\databaseAuthentication.php") ){
		require 'C:\Users\Soulwrite\Google Drive\Lucky Kiwi\databaseAuthentication.php';
	}else{
		echo '<p style="color:red;">Database Authetication Not Added</p><br>';
		return 0;
	}
		
	return mysqli_connect( $db_host , $db_user , $db_pswd , $db_dbnm);

}
	
	/*================================================
					ACCOUNT FUNCTIONS
	================================================*/
	
	/*------------------------------------------------
	ACCOUNT CREATION
	------------------------------------------------*/
function AccCreateAccount( $aUser,$aFName,$aLName,$aDoB,$aPass,$aEmail ){
		
	$connection = dbConnect();
		
	if($connection){
			
		$query = 'CALL aCreateAccount( \''.$aUser.'\',\''.$aFName.'\',\''.$aLName.'\',\''.$aDoB.'\',\''.$aPass.'\',\''.$aEmail.'\' );';
		$result = mysqli_query($connection, $query);
		@mysql_close();
		//echo $query;
		if(!$result){ 
			$queryError = '<p>The Query couldn\'t be completed to. '
				.'Please check the Database and Query then try again.</p>';
		
			return 0;
		}else{ 
			return 1;
		}
			
		}else{
			echo $connectionError;
			return 0;
		}
	}
	
	/*------------------------------------------------
	LOGIN VERIFICATION
	------------------------------------------------*/
	function verifyLogin($AccountID , $HashedPswd){
		
		$connection = dbConnect();
		
			if($connection){
				
				$query = 'SELECT a_ID FROM accounts WHERE a_Username = \''.$AccountID.'\' AND a_Password = \''.$HashedPswd.'\';';
				$result = mysqli_query($connection, $query);
				@mysql_close();

				if(!$result || !mysqli_num_rows($result)){
					return 0; 
				}else{ 
					return 1;

				}
				
			}else{
				
				return 0;
			}
			
	}
	
	/*------------------------------------------------
	ACCOUNT ID
	------------------------------------------------*/
	//GET
	function AccGetID($Username){
		
		$connection = dbConnect();
		
			if($connection){
				
				$query = 'SELECT a_ID FROM accounts WHERE a_Username = (\''.$Username.'\');';
				$result = mysqli_query($connection, $query);
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					if( $row = mysqli_fetch_assoc($result) ){
						
						return $row["a_ID"];
						
					}
				}
				
			}else{
				return 0;
			}
			
	}

	/*------------------------------------------------
	FIRST NAME
	------------------------------------------------*/
	//GET
	function AccGetFirstName($AccountID){
		
		$connection = dbConnect();
		
		if($connection){
				
				$query = 'SELECT a_FirstName FROM accounts WHERE a_ID = \''.$AccountID.'\';';
				$result = mysqli_query($connection, $query);
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					if( $row = mysqli_fetch_assoc($result) ){
						
						return $row["a_FirstName"];
						
					}
				
				}
				
			}else{
				return 0;
			}
		
	}
	
	//SET
	function AccFirstNameUpdate($AccountID , $NewFirstName){
		
		$connection = dbConnect();
		
			if($connection){

				$query = 'CALL aUpdateFirstName(\''.$AccountID.'\',\''.$NewFirstName.'\');';
				$result = mysqli_query($connection, $query);
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					return 1;
				}
				
			}else{
				return 0;
			}
			
	}
	
	/*------------------------------------------------
	LAST NAME
	------------------------------------------------*/
	//GET
	function AccGetLastName($AccountID){
		
		$connection = dbConnect();
		
		if($connection){
				
				$query = 'SELECT a_LastName FROM accounts WHERE a_ID = \''.$AccountID.'\';';
				$result = mysqli_query($connection, $query);
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					if( $row = mysqli_fetch_assoc($result) ){
						
						return $row["a_LastName"];
						
					}
				
				}
				
			}else{
				return 0;
			}
		
	}
	
	//SET
	function AccLastNameUpdate($AccountID , $NewLastName){
		
		$connection = dbConnect();
		
			if($connection){
				
				$query = 'CALL aUpdateLastName(\''.$AccountID.'\',\''.$NewLastName.'\');';
				$result = mysqli_query($connection, $query);
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					return 1;
				}
				
			}else{
				return 0;
			}
			
	}
	
	/*------------------------------------------------
	USERNAME
	------------------------------------------------*/
	//GET
	function AccGetUsername($AccountID){
		
		$connection = dbConnect();
		
		if($connection){
				
				$query = 'SELECT a_Username FROM accounts WHERE a_ID = \''.$AccountID.'\';';
				$result = mysqli_query($connection, $query);
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					if( $row = mysqli_fetch_assoc($result) ){
						
						return $row["a_Username"];
						
					}
				
				}
				
			}else{
				return 0;
			}
		
	}
	
	//SET
	function AccUsernameUpdate($AccountID , $NewUsername){
		
		$connection = dbConnect();
		
			if($connection){
				
				$query = 'CALL aUpdateUsername(\''.$AccountID.'\',\''.$NewUsername.'\');';
				$result = mysqli_query($connection, $query);
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					return 1;
				}
				
			}else{
				return 0;
			}
			
	}
	
	/*------------------------------------------------
	PASSWORD
	------------------------------------------------*/
	//GET
	function AccGetPassword($AccountID){
		
		$connection = dbConnect();
		
		if($connection){
				
				$query = 'SELECT a_Password FROM accounts WHERE a_ID = \''.$AccountID.'\';';
				$result = mysqli_query($connection, $query);
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					if( $row = mysqli_fetch_assoc($result) ){
						
						return $row["a_Password"];
						
					}
				
				}
				
			}else{
				return 0;
			}
		
	}
	
	//SET
	function AccPasswordUpdate($AccountID , $NewPassword){
		
		$connection = dbConnect();
		
			if($connection){
				//Todo.
				$query = 'CALL aUpdatePassword(\''.$AccountID.'\',\''.$NewPassword.'\');';
				$result = mysqli_query($connection, $query);
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					return 1;
				}
				
			}else{
				return 0;
			}
			
	}
	
	/*------------------------------------------------
	BALANCE
	------------------------------------------------*/
	//GET
	function AccGetBalance($AccountID){
		
		$connection = dbConnect();
		
		if($connection){
				
				$query = 'SELECT a_Balance FROM accounts WHERE a_ID = \''.$AccountID.'\';';
				$result = mysqli_query($connection, $query);
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					if( $row = mysqli_fetch_assoc($result) ){
						
						return $row["a_Balance"];
						
					}
				
				}
				
			}else{
				return 0;
			}
		
	}
	
	//SET
	function AccBalanceUpdate($AccountID , $AddedBalance){
		
		$connection = dbConnect();
		
			if($connection){

				$query = 'CALL aUpdateBalance(\''.$AccountID.'\',\''.$AddedBalance.'\');';
				$result = mysqli_query($connection, $query);
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					return 1;
				}
				
			}else{
				return 0;
			}
			
	}
	
	/*================================================
					ITEM FUNCTIONS
	================================================*/
	
	/*------------------------------------------------
	ITEM CREATION
	------------------------------------------------*/
	//SET
	function ItmCreateItem($AccID, $City , $Value , $Cost , $Count , $Name, $Desc , $tag){
		
		$connection = dbConnect();
		
		if($connection){
			
			$query = 'Call iCreateItem(\''.$AccID.'\',\''.$City.'\',\''.$Value.'\',\''.$Cost.'\',\''.$Count.'\',\''.$Name.'\',\''.$Desc.'\',\''.$tag.'\');';
			$result = mysqli_query($connection, $query);
			@mysql_close();
			
			echo $query;
			if (!$result){
				return 0;
			}else{
				return 1;
			}
		}
		else{
			return 0;
		}
	}
	
	/*------------------------------------------------
	CITY
	------------------------------------------------*/
	//GET
	function ItmGetCity($AccountID,$ItemName){
		
		$connection = dbConnect();
		
		if($connection){
				
				$query = 'SELECT i_City FROM items WHERE a_ID = \''.$AccountID.'\' AND i_Name = \''.$ItemName.'\';';
				$result = mysqli_query($connection, $query);
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					if( $row = mysqli_fetch_assoc($result) ){
						
						return $row["i_City"];
						
					}
				
				}
				
			}else{
				return 0;
			}
		
	}
	
	//SET
	function ItmCityUpdate($ItemID, $NewCity, $ItemName){
		
		$connection = dbConnect();
		
		if($connection){
			
			$query = 'Call iUpdateCity(\''.$ItemID.'\',\''.$NewCity.'\',\''.$ItemName.'\');';
			$result = mysqli_query($connection, $query);
			@mysql_close();
			if (!$result){
				return 0;
			}else{
				return 1;
			}
		}
		else{
			return 0;
		}
	}
		
	/*------------------------------------------------
	TICKET COST
	------------------------------------------------*/
	//GET
	function ItmGetTicketCost($AccountID,$ItemName){
		
		$connection = dbConnect();
		
		if($connection){
				
				$query = 'SELECT i_TicketCost FROM items WHERE a_ID = \''.$AccountID.'\' AND i_Name = \''.$ItemName.'\';';
				$result = mysqli_query($connection, $query);
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					if( $row = mysqli_fetch_assoc($result) ){
						
						return $row["i_TicketCost"];
						
					}
				
				}
				
			}else{
				return 0;
			}
	}
	
	//SET
	function ItmTicketCostUpdate($ItemID, $NewTicketCost, $ItemName){
		
		$connection = dbConnect();
		
		if($connection){
			
			$query = 'Call iUpdateTicketCost(\''.$ItemID.'\',\''.$NewTicketCost.'\',\''.$ItemName.'\');';
			$result = mysqli_query($connection, $query);
			@mysql_close();
			if (!$result){
				return 0;
			}else{
				return 1;
			}
		}
		else{
			return 0;
		}
	}
	
	/*------------------------------------------------
	TICKET COUNT
	------------------------------------------------*/
	//GET
	function ItmGetTicketCount($AccountID,$ItemName){
		
		$connection = dbConnect();
		
		if($connection){
				
				$query = 'SELECT i_TicketCount FROM items WHERE a_ID = \''.$AccountID.'\' AND i_Name = \''.$ItemName.'\';';
				$result = mysqli_query($connection, $query);
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					if( $row = mysqli_fetch_assoc($result) ){
						
						return $row["i_TicketCount"];
						
					}
				
				}
				
			}else{
				return 0;
			}
	}
	
	//SET
	function ItmTicketCountUpdate($ItemID, $NewTicketCount, $ItemName){
		
		$connection = dbConnect();
		
		if($connection){
			
			$query = 'Call iUpdateTicketCount(\''.$ItemID.'\', \''.$NewTicketCount.'\',\''.$ItemName.'\');';
			$result = mysqli_query($connection, $query);
			@mysql_close();
			if (!$result){
				return 0;
			}else{
				return 1;
			}
		}
		else{
			return 0;
		}
	}
	
	/*------------------------------------------------
	VALUE
	------------------------------------------------*/
	//GET
	function ItmGetValue($AccountID,$ItemName){
		
		$connection = dbConnect();
		
		if($connection){
				
				$query = 'SELECT i_Value FROM items WHERE a_ID = \''.$AccountID.'\' AND i_Name = \''.$ItemName.'\';';
				$result = mysqli_query($connection, $query);
				@mysql_close();

				if(!$result){ 
					return 0; 
				}else{ 
					if( $row = mysqli_fetch_assoc($result) ){
						
						return $row["i_Value"];
						
					}
				
				}
				
			}else{
				return 0;
			}
	}
	
	//SET
	function ItmValueUpdate($ItemID, $NewValue, $ItemName){
		
		$connection = dbConnect();
		
		if($connection){
			
			$query = 'Call iUpdateValue(\''.$ItemID.'\',\''.$NewValue.'\',\''.$ItemName.'\');';
			$result = mysqli_query($connection, $query);
			@mysql_close();

			if (!$result){
				return 0;
			}else{
				return 1;
			}
		}
		else{
			return 0;
		}
	}
	
	/*------------------------------------------------
	DECRIPTION
	------------------------------------------------*/
	//GET
	function ItmGetDescription($AccountID,$ItemName){
		
		$connection = dbConnect();
		
		if($connection){
				
				$query = 'SELECT i_Desc FROM items WHERE a_ID = \''.$AccountID.'\' AND i_Name = \''.$ItemName.'\';';
				$result = mysqli_query($connection, $query);
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					if( $row = mysqli_fetch_assoc($result) ){
						
						return $row["i_Desc"];
						
					}
				
				}
				
			}else{
				return 0;
			}
	}
	
	//SET
	function ItmDescriptionUpdate($ItemID, $NewDesc, $ItemName){
		
		$connection = dbConnect();
		
		if($connection){
			
			$query = 'Call iUpdateDescription(\''.$NewDesc.'\',\''.$ItemID.'\',\''.$ItemName.'\');';
			$result = mysqli_query($connection, $query);
			@mysql_close();
			//echo $query;
			if (!$result){
				return 0;
			}else{
				return 1;
			}
		}
		else{
			return 0;
		}
	}
	
	/*================================================
					TICKET FUNCTIONS
	================================================*/
	
	/*------------------------------------------------
	PURCHASE TTICKET
	------------------------------------------------*/
	//SET
	function PurchaseTickets($buyersID , $sellerID , $itemName , $quantity){
		
		$connection = dbConnect();
		
			if($connection){
				//Todo.
				$query = 'CALL itTicketBuy(\''.$buyersID.'\',\''.$itemName.'\',\''.$sellerID.'\',\''.$quantity.'\');';
				$result = mysqli_query($connection, $query);
				echo $query;
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					return 1;
				}
				
			}else{
				return 0;
			}
			
	}
	
	/*================================================
					TICKET FUNCTIONS
	================================================*/
	
	function GetItemSampleArray(){
		
		$connection = dbConnect();
		
		if($connection){
				//Todo.
				$query = 'SELECT * FROM items WHERE i_TicketCount >= 0 LIMIT 6;';
				$result = mysqli_query($connection, $query);
				//echo $query;
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					
					return $result;

				}
				
			}else{
				return 0;
			}
	}
	
	function GetTagsSampleArray(){
		
		$connection = dbConnect();
		
		if($connection){
				//Todo.
				$query = 'SELECT * FROM item_tags WHERE tag_ID >= 0 LIMIT 6;';
				$result = mysqli_query($connection, $query);
				//echo $query;
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					
					return $result;

				}
				
			}else{
				return 0;
			}
	}



/*================================================
					FEEDBACK FUNCTIONS
	================================================*/
	
	/*------------------------------------------------
	GIVE FEEDBACK
	------------------------------------------------*/


function FbGiveFeedback($RecieverID, $GiverID, $FeedbackDesc, $FeedbackRating){
		
		$connection = dbConnect();
		
		if($connection){
				
				$query = 'CALL fbInsertFeedback('$RecieverID', '$GiverID', '$FeedbackDesc', '$FeedBackRating')';
				$result = mysqli_query($connection, $query);
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					return 1;
				}
				
			}else{
				return 0;
			}
	}

/*------------------------------------------------
	GET FEEDBACK FOR ACCOUNT
	------------------------------------------------*/
function FbGiveFeedback($AccountID){
		
		$connection = dbConnect();
		
		if($connection){
				
				$query = 'CALL fbFeedbackSearch('$AccountID')';
				$result = mysqli_query($connection, $query);
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					if( $row = mysqli_fetch_assoc($result) ){
						
						return $row["i_Desc"];
						
					}
				}
				
			}else{
				return 0;
			}
	}

/*------------------------------------------------
	GET AVERAGE RATING FOR ACCOUNT
	------------------------------------------------*/
function FbGiveFeedback($AccountID){
		
		$connection = dbConnect();
		
		if($connection){
				
				$query = 'CALL fbAverage('$AccountID')';
				$result = mysqli_query($connection, $query);
				@mysql_close();
				if(!$result){ 
					return 0; 
				}else{ 
					return $result;
				}
				
			}else{
				return 0;
			}
	}

?>
