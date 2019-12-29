<?php
/////////////////////////////////////////
//    Powered By : WindForce Studios   // 
/////////////////////////////////////////
$db_host        =  'localhost';
$db_user        =  'id2265743_nihaaldb';
$db_password    =  'password1234567890';
$db_name        =  'id2265743_admin';  

$link    = mysqli_connect($db_host,$db_user,$db_password) or die(mysqli_error());
$select  = mysqli_select_db($link,$db_name) or die(mysqli_error());  
mysqli_query($link,"set character_set_server='utf8'");
mysqli_query($link,"set names 'utf8'");
?>