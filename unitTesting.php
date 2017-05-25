<head>
<meta http-equiv="content-type" content="text/php; charset=utf-8" />
<title>Unit Test</title>

<style>
p {
	margin: 0;
	margin-left: 10;
	padding: 0;
}
</style>

</head>
<body>

<?php

$unitTest = 0;
$connection = 0;
$included = 1;

/*===============================
	CONNECTION AND INCLUSIONS
===============================*/

//DATABASE FUNCTIONS
if( file_exists("C:\Users\Soulwrite\Google Drive\Lucky Kiwi\server\LuckyKiwi\dbFunctions.php") ){
	require 'C:\Users\Soulwrite\Google Drive\Lucky Kiwi\server\LuckyKiwi\dbFunctions.php';
	echo '<p style="color:green;">Database Functions Added</p><br>';
}else{
	$included = 0;
	echo '<p style="color:red;">Database Functions Not Added</p><br>';
}

//CONNECTION
if( $included == 1){
	$connection = dbConnect();
	echo '<p style="color:green;">Database Authetication Added</p><br>';
}
echo '<p>Database dbConnect test.</p>';
if($connection AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

/*===============================
	ACCOUNT
===============================*/

//CREATE NEW ACCOUNT
//Sequence username , firstname , lastname , dob , password
$included = 1;

echo '<p>Account AccCreateAccount test.</p>';
$nun = "".date("h:i:sa");
if($included == 1){
	$unitTest = AccCreateAccount( $nun ,'Jane','Doe','2017/04/15','girlgamer','brainSplatter42@deepThought.com' );
}
if($unitTest == 1 AND $included == 1){
		echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

//===============================
//GET ACCOUNT ID
$included = 1;

echo '<p>Account AccGetID test.</p>';
if($included == 1){
	$aID = AccGetID( $nun );
}
if($aID AND $included == 1){
    echo $aID;
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;


//===============================
//LOGIN
$included = 1;

echo '<p>Account verifyLogin test.</p>';
if($included == 1){
	$unitTest = verifyLogin( $nun , 'girlgamer' );
}
if($unitTest == 1 AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

//===============================

$included = 1;

echo '<p>Account verifyLogin : Rubbish Input to Fail</p>';
if($included == 1){
	$unitTest = verifyLogin( 'adsfga' , 'agfaddqg' );
}
if($unitTest == 1 AND $included == 1){
	echo '<p style="color:red;">Pass</p><br>';
}else{
	echo '<p style="color:green;">Fail</p><br>';
}
$unitTest = 0;

//===============================
//UPDATE ACCOUNT BALANCE
$included = 1;

echo '<p>Account AccBalanceUpdate test.</p>';
if($included == 1){
	$unitTest = AccBalanceUpdate( $aID , '42' );
}
if($unitTest AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

//===============================
//GET ACCOUNT BALANCE
echo '<p>Account AccGetBalance test.</p>';

if($included == 1){
	$unitTest = AccGetBalance( $aID );
}	
if($unitTest AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

//===============================
//GET ACCOUNT FIRST NAME
echo '<p>Account AccGetFirstNam test.</p>';

if($included == 1){
	$unitTest = AccGetFirstName( $aID );
}	
if($unitTest AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

//===============================

//UPDATE ACCOUNT FIRST NAME
$included = 1;

echo '<p>Account AccFirstNameUpdate test.</p>';
if($included == 1){
	$unitTest = AccFirstNameUpdate( $aID , 'Johnny' );
}
if($unitTest AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

//===============================
//GET ACCOUNT LAST NAME
echo '<p>Account AccGetLastName test.</p>';

if($included == 1){
	$unitTest = AccGetLastName( $aID );
}	
if($unitTest AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

//===============================
//UPDATE ACCOUNT LAST NAME
$included = 1;

echo '<p>Account AccLastNameUpdate test.</p>';
if($included == 1){
	$unitTest = AccLastNameUpdate( $aID , 'Test' );
}
if($unitTest AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{	
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

//===============================
//GET ACCOUNT PASSWORD
echo '<p>Account AccGetPassword test.</p>';

if($included == 1){
	$unitTest = AccGetPassword( $aID );
}	
if($unitTest AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

//===============================
//UPDATE ACCOUNT PASSWORD
$included = 1;

echo '<p>Account AccPasswordUpdate test.</p>';
if($included == 1){
	$unitTest = AccPasswordUpdate( $aID , md5('Test') );
}
if($unitTest AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

//===============================
//GET ACCOUNT USERNAME
echo '<p>Account AccGetUsername test.</p>';

if($included == 1){
	$unitTest = AccGetUsername( $aID );
}	
if($unitTest AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

//===============================
//UPDATE ACCOUNT USERNAME
$included = 1;

echo '<p>Account AccUsernameUpdate test.</p>';
if($included == 1){
	$unitTest = AccUsernameUpdate( $aID , "".date("h:i:sa") );
}
if($unitTest AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

/*===============================
	Items
===============================*/

//Create Itms
$included = 1;
//Call iCreateItem('78','Christchurch','New Zealand','10.2','5.0','7.5','2.5','100.0','5','20','Chicken Tendies','tags');
echo '<p>Account dbItmCreateItem.php test.</p>';
if($included == 1){
	$unitTest = ItmCreateItem(''.$aID,'Christchurch','100.0', '5', '20', 'Chicken Tendies','Delicious chicken morsel',' ');
}
if($unitTest == 1 AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

//===============================
//GetValue
echo '<p>Itm Get Value function test.</p>';

if($included == 1){
	$unitTest = ItmGetValue( $aID, 'Chicken Tendies' );
}	
if($unitTest AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

// ======================================
//UpdateValue
$included = 1;

echo '<p>Account Update Value test.</p>';
if($included == 1){
	$unitTest = ItmValueUpdate( $aID,'7', 'Chicken Tendies' );
}
if($unitTest == 1 && $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

// ======================================

//GetTicketCount
echo '<p>Itm Get TicketCount function test.</p>';

if($included == 1){
	$unitTest = ItmGetTicketCount( $aID, 'Chicken Tendies' );
}	
if($unitTest AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

//=======================================

//UpdateTicketCount
$included = 1;

echo '<p>Account Update TicketCount test.</p>';
if($included == 1){
	$unitTest = ItmTicketCountUpdate( $aID,'8', 'Chicken Tendies' );
}
if($unitTest == 1 && $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

//========================================

//GetTicketCost
echo '<p>Itm Get Ticket Cost function test.</p>';

if($included == 1){
	$unitTest = ItmGetTicketCost( $aID, 'Chicken Tendies' );
}	
if($unitTest AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

//=======================================

//UpdateTicketCost
$included = 1;

echo '<p>Account Update TicketCost test.</p>';
if($included == 1){
	$unitTest = ItmTicketCostUpdate( $aID,'2.5', 'Chicken Tendies' );
}
if($unitTest == 1 && $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

//=======================================

//GetCity
echo '<p>Itm Get City function test.</p>';

if($included == 1){
	$unitTest = ItmGetCity( $aID, 'Chicken Tendies' );
}	
if($unitTest AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

// ======================================

//UpdateCity
$included = 1;

echo '<p>Account Update City test.</p>';
if($included == 1){
	$unitTest = ItmCityUpdate($aID,'Christchurch', 'Chicken Tendies' );
}
if($unitTest == 1 && $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

// ======================================

//GetDescription
echo '<p>Itm Get Description function test.</p>';

if($included == 1){
	$unitTest = ItmGetDescription( $aID, 'Chicken Tendies' );
}	
if($unitTest AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

// ======================================

//UpdateCity
$included = 1;

echo '<p>Account Update Description test.</p>';
if($included == 1){
	$unitTest = ItmDescriptionUpdate($aID,'Firm phallic seat cushion.', 'Chicken Tendies' );
}
if($unitTest == 1 && $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

/*===============================
	Tickets
===============================*/

//TICKET PURCHASE

echo '<p>Tickets PurchaseTickets test.</p>';
if($included == 1){
	$unitTest = PurchaseTickets(''.$aID,$aID,'Chicken Tendies', '5');
}
if($unitTest == 1 AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

// SAMPLE ITEMS

echo '<p>Tickets Sample Items test.</p>';
if($included == 1){
	$unitTest = GetItemSampleArray();
}
if($unitTest AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;


// SAMPLE TAGS

echo '<p>Tickets Sample Tags test.</p>';
if($included == 1){
	$unitTest = GetTagsSampleArray();
}
if($unitTest AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;


/*===============================
	Registration
===============================*/

//FILE INCLUSTION
if( file_exists("registrationProcess.php") ){
	require 'C:\Users\Soulwrite\Google Drive\Lucky Kiwi\server\LuckyKiwi\registrationProcess.php';
	echo '<p style="color:green;">Registration Process Added</p><br>';
}else{
	$included = 0;
	echo '<p style="color:red;">Registration Process Not Added</p><br>';
}

//===============================
//REGISTRATION PROCESS

echo '<p>Registration registrationProcess test.</p>';
$nun = "".date("h:i:s");
if($included == 1){
	$unitTest = registrationProcess(''.$nun,'abc123','abc123', 'alpha', 'beta', 'fluffyBunnies69@meseeks.com', '1980/05/06');
}
if($unitTest == 1 AND $included == 1){
	echo '<p style="color:green;">Pass</p><br>';
}else{
	echo '<p style="color:red;">Fail</p><br>';
}
$unitTest = 0;

//===============================
//REGISTRATION PROCESS

echo '<p>Registration registrationProcess : Differing Passwords to Fail.</p>';
$nun2 = "".date("h:i:s");
if($included == 1){
	$unitTest = registrationProcess(''.$nun2,'abc123','xyz123', 'alpha', 'beta', 'fluffyBunnies69@meseeks.com', '1980/05/06');
}
if($unitTest == 1 AND $included == 1){
	echo '<p style="color:red;">Pass</p><br>';
}else{
	echo '<p style="color:green;">Fail</p><br>';
}
$unitTest = 0;

//===============================
//REGISTRATION PROCESS

echo '<p>Registration registrationProcess : Duplicate Username to Fail</p>';

if($included == 1){
	$unitTest = registrationProcess(''.$nun,'abc123','abc123', 'alpha', 'beta', 'fluffyBunnies69@meseeks.com', '1980/05/06');
}
if($unitTest == 1 AND $included == 1){
	echo '<p style="color:red;">Pass</p><br>';
}else{
	echo '<p style="color:green;">Fail</p><br>';
}
$unitTest = 0;


?>
<p><a href="index.php">Return Home Page </a></p>	


</body>