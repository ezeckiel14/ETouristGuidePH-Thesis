<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'userdb';
//connect to database
$link = mysqli_connect($host,$user,$password,$database);
if(!$link){
	die ('unable to connect to the database' . mysqli_connect_error());
}

//get passwords
$username = $_SESSION['username'];
$oldPass = strip_tags($_POST['oldPassword']);
$oldPass = mysqli_real_escape_string($link, $oldPass);
$newPass = strip_tags($_POST['newPassword']);
$newPass = mysqli_real_escape_string($link, $newPass);
$NPCount = strlen($newPass);
$confirmPass = strip_tags($_POST['confirmPassword']);
$confirmPass = mysqli_real_escape_string($link, $confirmPass);
$OPCount = strlen($confirmPass);
//get query to match username and old pass
$query = "SELECT username,password FROM users WHERE username = '" .$username. "'";
$result = mysqli_query($link,$query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$unhashedPass = $row['password'];
$row_cnt = mysqli_num_rows($result);
mysqli_free_result($result);

//if everything is ok, update the database with the new password.

if(empty($newPass) || empty($confirmPass)){
	echo "<p style=\"color:red;\">Password fields must not be left empty.<p>";
}else if ($NPCount > 12){
	echo "<p style=\"color:red;\">Passwords must not be more than 12 and less than 6 characters.<p>";
}else if ($OPCount < 6){
	echo "<p style=\"color:red;\">Passwords must not be more than 12 and less than 6 characters.<p>";
}else if($row_cnt > 0 && $newPass == $confirmPass && (password_verify($oldPass,$unhashedPass)) == 1){
	
	$hashedPass = password_hash($newPass,PASSWORD_BCRYPT);
	$query = "UPDATE users SET password = '" .$hashedPass. "' WHERE username = '" .$username."'";
	mysqli_query($link, $query);
	echo "<p style=\"color:red;\">Your password has been changed.<p>";
		
	#if succesful
	//Send an email
	//Send email To:
	$to = "admin_jeishii@localhost.com "; // change this to $email if will be launched on a commercial server.
	//Subject of the Email
	$subject = "Change Password to our E-tourist Guide using GIS Technology PH Web-App";
	//Message content
	$message = "Hello " .$username.  "\n\n";
	$message .= "You have requested for a change password. You new password is now set.\n";
	$message .= "----------------------------------------------" . PHP_EOL;
	$message .= "Username: " .$username. PHP_EOL;
	$message .= "Password: " .$newPass. PHP_EOL;
	$message .= "----------------------------------------------" . PHP_EOL; 
	$message .= "\nPlease log-in to you account to change your pass.." . PHP_EOL;
	$message .= "http://localhost/www/MMD_Thesis/index.php" . PHP_EOL;
	$message .= "\nIf ever you have comments and suggestion, we would like to hear it from you. \nYou can email us at thisEmail@someDomain.com";
	$message .= "\n\nThank you. \n\nFrom,\nE-tourist Guide Admins";
	
	$headers = "From:postmaster@localhost.com" . "\r\n";	
	//Send mail using mail() function
	mail($to,$subject,$message,$headers);
	
}else{
	echo "<p style=\"color:red;\">Passwords does not match.<p>";
}

?>