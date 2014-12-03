<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'userdb';
#connect to the db
$link = mysqli_connect($host,$username,$password,$db);
if(!$link){
	die('connection error ' . mysqli_connect_error());
}

if(isset($_GET['email'])&& !empty($_GET['email']) && isset($_GET['hash']) && !empty($_GET['hash'])){
	#avoiding sql injections
	$email = mysqli_escape_string($link, $_GET['email']);
	$validationHash = mysqli_escape_string($link, $_GET['hash']);
	
	#search the database with the above informations
	$query = "SELECT email,validationHash,username FROM users WHERE email = '" .$email. "' AND validationHash = '" .$validationHash."' AND isValidated = '" .'0'. "'";
	$result = mysqli_query($link,$query);
	$row = mysqli_fetch_array($result,MYSQL_ASSOC);
	$username = $row['username'];
	$row_cnt = mysqli_num_rows($result);
	mysqli_free_result($result);
	$turnTrue = 1;
	if ($row_cnt > 0){
		$query2 = "UPDATE users SET isValidated = '".$turnTrue."' WHERE email = '".$email."' AND validationHash = '" .$validationHash."'";
		mysqli_query($link,$query2);
		echo "<div class=\"userPane\">".$username.", your account is now validated </br><a href=\"./index.php\">Return to log-in</a></div>";
	}else{
		echo "<div class=\"userPane\">".$username. ", your account is already validated </br><a href=\"./index.php\">Return to log-in</a></div>";
	}	
}else{
	echo "Use the link found in your email to validate it.";
}

//close connection
mysqli_close($link);

?>