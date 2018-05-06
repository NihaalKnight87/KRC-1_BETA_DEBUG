<?php
/////////////////////////////////////////
//    Powered By : WindForce Studios   // 
/////////////////////////////////////////
@session_start();
if(@$_SESSION["loginGASADMIN"]){

include("../config.php");
include('../secureFunction.php');
if(@$_GET["newPassword"]){
	include("style/changepassword.html");
	
	
}else if(@$_GET["changePassword"]){
		
		$update_password = mysqli_query($link,"UPDATE users SET password='".md5(make_safe($_POST["newpassword"]))."' WHERE id='".make_safe($_GET["changePassword"])."'");
		if($update_password){
		 echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\"></p>"; 

		}

}else if(@$_GET["updateInformation"]){
	$getInformation = mysqli_query($link,"SELECT * FROM users WHERE id='".make_safe($_GET["updateInformation"])."'");
	$fetchInformation = mysqli_fetch_array($getInformation);
	include("style/updateaccount.html");
}

else if(@$_GET["changeInformation"]){
	
		$update_information = mysqli_query($link,"UPDATE users SET firstname='".make_safe($_POST["firstname"])."' , lastname='".make_safe($_POST["lastname"])."' , age='".make_safe($_POST["age"])."' , email='".make_safe($_POST["email"])."' , country='".make_safe($_POST["country"])."' WHERE id='".make_safe($_GET["changeInformation"])."'");
if($update_information){
		 echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\"></p>"; 
		}
	

}

}

?>