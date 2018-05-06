<?php

/////////////////////////////////////////
//    Powered By : WindForce Studios   // 
/////////////////////////////////////////


include("config.php");
include('secureFunction.php');
include("Key.php");

if($SecureKey == @$_GET['secure']){
if(@$_GET["code"] && @$_GET["password"]){
	$CheckCode = mysqli_query($link,"SELECT userid FROM forget_passwords WHERE code='".make_safe($_GET["code"])."'");
	$isExist = mysqli_num_rows($CheckCode);
	if($isExist > 0){
		$getAccountInformation = mysqli_fetch_array($CheckCode);
		$updatePassword = mysqli_query($link,"UPDATE users SET password='".md5(make_safe($_GET["password"]))."' WHERE id='".make_safe($getAccountInformation["userid"])."'");
		if($updatePassword){
					$deleteRecord = mysqli_query($link,"DELETE FROM forget_passwords WHERE userid='".$getAccountInformation["userid"]."'");

			if($deleteRecord){
		
		echo "1";
		}else{
			echo "Try Again Later ! Error in DB";
		}
		}else{
			echo "Try Again Later ! Error in DB";
		}
	}else{
		
		die("Invalid Code!");
	}
	
	
}else{
	die("Please Fill All Fields");
}
}else{
	echo "Invalid SecureKey";
}
?>