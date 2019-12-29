<?php
/////////////////////////////////////////
//    Powered By : WindForce Studios   // 
/////////////////////////////////////////


include('config.php');
include('secureFunction.php');
include("Key.php");
include("getip.php");

if(!empty($_GET['mac'])){
if($_GET['secureid'] != $SecureKey){
die("Secured! File");
}

$checkMAC = mysqli_query($link,"SELECT * FROM users WHERE macAddresses='".make_safe($_GET['mac'])."'");

$stuts = mysqli_num_rows($checkMAC);

if($stuts > 0 ){
	while($allUsers = mysqli_fetch_array($checkMAC)){
	if($allUsers["banned"]== 1){
die("2"); // if user is exist and he got banned
}
}
	echo "1"; // if user is exist and he not got banned

}else{
echo "3"; // optional this check if you want disable user have multi account 3 mean new user
}

}else if(@$_GET["ip"]){
	$checkMAC = mysqli_query($link,"SELECT * FROM users WHERE ip='".make_safe($real_ip_adress)."'");
$stuts = mysqli_num_rows($checkMAC);

if($stuts > 0 ){
	while($allUsers = mysqli_fetch_array($checkMAC)){
	if($allUsers["banned"]== 1){
die("2"); // if user is exist and he got banned
}
}
	echo "1"; // if user is exist and he not got banned

}else{
echo "3"; // optional this check if you want disable user have multi account 3 mean new user
}

	
}


else{
	echo "Empty";
}





?>