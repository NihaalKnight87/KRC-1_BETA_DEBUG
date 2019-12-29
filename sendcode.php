<?php
/////////////////////////////////////////
//    Powered By : WindForce Studios   // 
/////////////////////////////////////////

include("config.php");
include('secureFunction.php');
include("Key.php");

if(@$SecureKey == @$_GET['secure']){
if(@$_GET["email"] ){
if(@$_GET["email"]){
	if (!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
    die( "This email not vaild!");
}
$checkmail = mysqli_query($link,"SELECT * FROM users WHERE email='".$_GET['email']."'");
$checkRecord = mysqli_num_rows($checkmail);
if($checkRecord > 0){
	$getuserInformation = mysqli_fetch_array($checkmail);
	$checkForgetRecordForUser = mysqli_query($link,"SELECT * FROM forget_passwords where userid='".make_safe($getuserInformation["id"])."'");
			$getInformation = mysqli_fetch_array($checkForgetRecordForUser);

	$checkRecordForUser = mysqli_num_rows($checkForgetRecordForUser);
		$code = rand(0000000000000000,9999999999999999);
	if($checkRecordForUser > 0){
		
	
	$updateCode = mysqli_query($link,"UPDATE forget_passwords SET code='".$code."' WHERE userid='".make_safe($getInformation["userid"])."'");


	}else{
		$insertRecord = mysqli_query($link,"INSERT INTO forget_passwords VALUES('".make_safe($getuserInformation["id"])."','".make_safe($code)."')");
		
	}
	$sendMail = mail($_GET["email"], 'Reset the Password', $code);
	if($sendMail){
echo "1";

}else{
	echo "Error in Mail Server! Try Again Later";
}
}else{
	echo "This Email is not registerd!!";

}
}
}else{
	echo "Please Fill All Fields";
}
}else{
	echo "Invalid SecureKey";
}
?>