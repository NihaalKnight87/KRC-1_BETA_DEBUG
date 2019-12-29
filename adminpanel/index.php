<?php
/////////////////////////////////////////
//    Powered By : WindForce Studios   // 
/////////////////////////////////////////
@session_start();

include('../config.php');
include('../secureFunction.php');


if(@$_SESSION["loginGASADMIN"]){
	if(@$_GET["banned"]){
		$getuser = mysqli_query($link,"SELECT * from users where id='".$_GET["banned"]."'");
		$fetchUSER = mysqli_fetch_array($getuser);
		$getAllusersinDevice = mysqli_query($link,"SELECT * FROM USERS WHERE macAddresses='".make_safe($fetchUSER["macAddresses"])."'");
		while($bannedUser = mysqli_fetch_array($getAllusersinDevice)){
		$banUser = mysqli_query($link,"UPDATE users SET banned=1 WHERE id='".make_safe($bannedUser["id"])."'");
		}
			
 echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\"></p>";

		
	}else if(@$_GET["unbanned"]){
				$getuser = mysqli_query($link,"SELECT * from users where id='".$_GET["unbanned"]."'");
		$fetchUSER = mysqli_fetch_array($getuser);
		$getAllusersinDevice = mysqli_query($link,"SELECT * FROM USERS WHERE macAddresses='".make_safe($fetchUSER["macAddresses"])."'");
				while($unbannedUser = mysqli_fetch_array($getAllusersinDevice)){

		$unbanUser = mysqli_query($link,"UPDATE users SET banned=0 WHERE id='".make_safe($unbannedUser["id"])."'");
		}
			
 echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\"></p>";

		
	
	
	
	}elseif(@$_GET["BannedFromIP"]){
				$getuser = mysqli_query($link,"SELECT * from users where id='".$_GET["BannedFromIP"]."'");
		$fetchUSER = mysqli_fetch_array($getuser);
		$getAllusersinDevice = mysqli_query($link,"SELECT * FROM USERS WHERE ip='".make_safe($fetchUSER["ip"])."'");
		while($bannedUser = mysqli_fetch_array($getAllusersinDevice)){
		$banUser = mysqli_query($link,"UPDATE users SET banned=1 WHERE id='".make_safe($bannedUser["id"])."'");
		}
			
 echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\"></p>";
		
		
	}else if(@$_GET["unBannedFromIP"]){
				$getuser = mysqli_query($link,"SELECT * from users where id='".$_GET["unBannedFromIP"]."'");
		$fetchUSER = mysqli_fetch_array($getuser);
		$getAllusersinDevice = mysqli_query($link,"SELECT * FROM USERS WHERE ip='".make_safe($fetchUSER["ip"])."'");
				while($unbannedUser = mysqli_fetch_array($getAllusersinDevice)){

		$unbanUser = mysqli_query($link,"UPDATE users SET banned=0 WHERE id='".make_safe($unbannedUser["id"])."'");
		}
			
 echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\"></p>";

		
	
	
	
	}
	
	elseif(@$_GET["delete"]){
		$DeleteUser = mysqli_query($link,"DELETE from users WHERE id='".make_safe($_GET["delete"])."'");
		if($DeleteUser){
			 echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\"></p>";

			
		}
		
	}elseif(@$_GET['logout']){
unset($_SESSION['loginGASADMIN']);

if(!isset($_SESSION['loginGASADMIN'])){
 echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\"></p>";  
}
}
	
	else{
	$getRecords = mysqli_query($link,"SELECT * FROM users WHERE id");
		include('style/main.html');
}

}else{
 echo "<meta http-equiv=\"refresh\" content=\"0;url=login.php\"></p>";

}






?>