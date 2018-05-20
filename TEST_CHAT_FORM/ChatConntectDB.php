

<?php
//session_start();

$db_host        =  'localhost';
//$db_user      =  'id2265743_nihaaldb';
$db_user  		= 'root';
$db_password    =  "";
$db_name        =  'id2265743_admin';

//



//new

$db = mysqli_connect($db_host, $db_user , $db_password , $db_name) or die("Unable to connect");
//$db = mysqli_connect("localhost", "root", "", "id2265743_admin");

echo"done";

if(isset($_POST['login_btn']))
{
	$username = $_POST['user'];
	$password= $_POST['pass'];
	//session_start();
	$username = mysqli_real_escape_string($db, $username);
	$password = mysqli_real_escape_string($db, $password);
	
	//echo"OKEY";
	
	//$password = md5($password); 
	
	$sql = ("SELECT * FROM  users WHERE username= '$username' AND password= '$password'");
	$result = mysqli_query($db, $sql);
	
	//echo"Nice";
	
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
		header("location: index.html");
	}
	
	
}

?>

