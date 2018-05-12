

<?php
session_start();

$db_host        =  'localhost';
$db_user        =  'id2265743_nihaaldb';
$db_password    =  'password1234567890';
$db_name        =  'id2265743_admin';

//

//$username = $_POST['user'];
//$password = $_POST['pass'];

//new

$db = new mysqli($db_host , $db_user , $db_password , $db_name) or die("Unable to connect");

echo"done";

if(isset($_POST['login_btn']))
{
	//session_start();
	$username = mysql_real_escape_string($_POST['user']);
	$password = mysql_real_escape_string($_POST['pass']);
	
	echo"nice";
	
	$password = md5($password); 
	
	$sql = ("SELECT * FROM  user WHERE username = '$username' AND password = '$Spassword'");
	$result = mysqli_query($db, $sql);
	
	echo"nice";
	
	//$result = mysqli_query($db, $sql);
	
	if(mysqli_num_rows($result) == 1)
	{
		$_SESSION['message'] = "You are now logged in";
		$_SESSION['username'] = $username;
		header("location: home.php");
		
	}
	else
	{
		$_SESSION['message'] = "Username/password combination incorrect";
	}
	
	
}

?>


/*

//
//$username = stripslashes($username);
//$password = stripslashes($password);
//$username = mysql_real_escape_string($username);
//$password = mysql_real_escape_string($password);

mysql_connect($db_host , $db_user , $db_password);
mysql_select_db($db_name);

$result = mysql_query("select * from users where username = '$username' and password = '$password'") or die("Failed to query database ".mysql_error()); 

//$db = new mysqli($db_host , $db_user , $db_password , $db_name) or die("Unable to connect");

echo"great work!!!";

$row = mysql_fetch_array($result);
if ($row['username'] == $username && $row['password'] == $password )
{
	echo "Login success!!! Welcome ".$row['username'];
}
else
{
	echo "Failed to login!";
}


*/


//?>