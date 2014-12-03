<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "userdb";
#connect to the database
$connect = mysqli_connect($host,$username,$password,$database);
if(!$connect){
	die ("connection failed: " . mysqli_connect_error());
}
#get form inputs escape sql entries to avoid sql injection
$username = strip_tags($_POST['username']);
$username = mysqli_real_escape_string($connect, $username);
$email = $_POST['email'];
$email = mysqli_real_escape_string($connect, $email);


#check database if username is already existing
$query = "SELECT username,email FROM users WHERE username = '" .$username."' AND email = '" .$email."'";
$result = mysqli_query($connect,$query);
$row_cnt = mysqli_num_rows($result);
mysqli_free_result($result);

if ($row_cnt > 0){
 	//select the range of characters to randomize
	$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
 	//set empty string placeholder for the results
 	$string = '';
	//set length of string to generate
	$random_string_length = 8;
 	for ($i = 0; $i < $random_string_length; $i++) {
  	    $string .= $characters[rand(0, strlen($characters) - 1)];
	 }
	//hash the password
	$hashedPassword = password_hash($string,PASSWORD_BCRYPT);
	// After generating the string update the database
	$query4 = "UPDATE users SET password = '" .$hashedPassword. "' WHERE username = '" .$username. "'";
	mysqli_query($connect,$query4);
	
	#if succesful
	//Send an email
	//Send email To:
	$to = "admin_jeishii@localhost.com "; // change this to $email if will be launched on a commercial server.
	//Subject of the Email
	$subject = "Forgot Password to our E-tourist Guide using GIS Technology PH Web-App";
	//Message content
	$message = "Hello " .$username.  "\n\n";
	$message .= "You have requested for a forget password. You new temporary password is now generated. You can change this temporary password.\n";
	$message .= "on your acoount page. Below is your username and new password:\n\n";
	$message .= "----------------------------------------------" . PHP_EOL;
	$message .= "Username: " .$username. PHP_EOL;
	$message .= "Password: " .$string. PHP_EOL;
	$message .= "----------------------------------------------" . PHP_EOL; 
	$message .= "\nPlease log-in to you account to change your pass.." . PHP_EOL;
	$message .= "http://localhost/www/MMD_Thesis/index.php" . PHP_EOL;
	$message .= "\nIf ever you have comments and suggestion, we would like to hear it from you. \nYou can email us at thisEmail@someDomain.com";
	$message .= "\n\nThank you. \n\nFrom,\nE-tourist Guide Admins";
	
	$headers = "From:postmaster@localhost.com" . "\r\n";	
	//Send mail using mail() function
	mail($to,$subject,$message,$headers);
	
	echo "<p style=\"color:red;\">New password has been sent on your e-mail<p>";
}else{
	echo "<p style=\"color:red;\">Invalid username or E-mail<p>";;
}
#close sql connection
mysqli_close($connect);
?>