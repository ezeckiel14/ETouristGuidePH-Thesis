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
$password = $_POST['password'];
$passCount = strlen($password);
$password = mysqli_real_escape_string($connect, $password);
$confirmPassword = $_POST['confirmpassword'];
$passCCount = strlen($password);
$confirmPassword = mysqli_real_escape_string($connect, $confirmPassword);
$email = strip_tags($_POST['email']);
$email = mysqli_real_escape_string($connect, $email);
$lastname = strip_tags($_POST['lastName']);
$lastname = mysqli_real_escape_string($connect, $lastname);
$firstname = strip_tags($_POST['firstName']);
$firstname = mysqli_real_escape_string($connect, $firstname);
$birthday = $_POST['birthyear']." ".$_POST['birthmonth'].$_POST['birthday'];
$country = $_POST['country'];
$dateReg = date('Y-m-d');
$validationHash = md5(rand(0,1000));
$isValidated = 0;
#check database if username and email is already existing
$query = "SELECT username FROM users WHERE username = '" .$username. "'";
$result = mysqli_query($connect,$query);
$row_cnt = mysqli_num_rows($result);
mysqli_free_result($result);

$emailQuery = "SELECT username FROM users WHERE email = '" .$email."'";
$resultEmail = mysqli_query($connect,$emailQuery);
$row_cnt_email = mysqli_num_rows($resultEmail);
mysqli_free_result($resultEmail);

#if username is not existing, passwords are matching and all fields are not left empty and all follows the regular expressions for inputs
if ($row_cnt == 0 && $row_cnt_email == 0 &&
	$password == $confirmPassword &&
	!empty($username) && 
	!empty($password) &&
	($passCount >= 6 && $passCount <=12) && 
	($passCCount >=6 && $passCCount<=12) &&
	!empty($confirmPassword) &&
	(strlen($confirmPassword) >= 6 && strlen($confirmPassword) <=12) &&
	!empty($email) && 
	preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email) == 1 &&
	!empty($lastname) &&
	preg_match("/^([\\sa-zA-Z]*$)$/i",$lastname) == 1 &&
	!empty($firstname) &&
	preg_match("/^([\\sa-zA-Z]*$)$/i",$firstname) == 1 &&
	preg_match("/(?!^([0-9])*$)^([a-zA-Z])([a-zA-Z0-9]{4,15})$/i",$username) == 1){
		
	$password = password_hash($confirmPassword,PASSWORD_BCRYPT);
	$insertquery = "INSERT INTO users (username,password,email,lastname,firstname,birthday,country,dateReg,validationHash,isValidated)
					VALUES ('$username','$password','$email','$lastname','$firstname','$birthday','$country','$dateReg','$validationHash','$isValidated')";
	$insert = mysqli_query($connect,$insertquery);
					echo "<p style=\"color:red;\">".$username." has been successfully registered. Check your email for validation.<p>";
	
	//Send an email
	//Send email To:
	$to = "admin_jeishii@localhost.com "; // change this to $email if will be launched on a commercial server.
	//Subject of the Email
	$subject = "Welcome to our E-tourist Guide using GIS Technology PH Web-App";
	//Extra headers
	$headers = "From:postmaster@localhost.com" . "\r\n";
	//Message content
	$message = "Hello " .$firstname. " " .$lastname. "\n\n";
	$message .= "We would like to thank you for registering at our web app. You can log-in on your account using the following credentials.\n\n";
	$message .= "----------------------------------------------" . PHP_EOL;
	$message .= "Username: " .$username. PHP_EOL;
	$message .= "Password: " .$confirmPassword. PHP_EOL;
	$message .= "----------------------------------------------" . PHP_EOL; 
	$message .= "\nPlease click the link below to activate your account or copy paste it on your URL." . PHP_EOL;
	$message .= "http://localhost/www/MMD_Thesis/emailVerify.php?email=$email&hash=$validationHash" . PHP_EOL;
	$message .= "\nIf ever you have comments and suggestion, we would like to hear it from you. \nYou can email us at reply-postmaster@localhost.com";
	$message .= "\n\nThank you. \n\nFrom," .$headers;	
	//Send mail using mail() function
	mail($to,$subject,$message,$headers);
	
	
}else if ($row_cnt == 1){
		echo "<p style=\"color:red;\">Username is already existing<p>";	
}else if ($row_cnt_email == 1){
		echo "<p style=\"color:red;\">E-mail is already existing<p>";	
}else if (empty($username) && empty($password) && empty($confirmPassword) && empty($email) && empty($lastname) && empty($firstname)){
	echo "<p style=\"color:red;\">Cannot left all fields to be empty<p>";	
}else if (preg_match("/(?!^([0-9])*$)^([a-zA-Z])([a-zA-Z0-9]{5,16})$/i",$username)==0){
	echo "<p style=\"color:red;\">Username must not be less than 5 characters and not more than 16 characters, does not contain special characters.<p>";
}else if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email) == 0  ){
	echo "<p style=\"color:red;\">Invalid e-mail address format<p>";
}else if ($password != $confirmPassword){
	echo "<p style=\"color:red;\">Passwords does not match<p>";		
}else if ($passCount > 12){
	echo "<p style=\"color:red;\">Passwords must be more than 6 and not less than 12 characters long<p>";
}else if ($passCount < 6){
	echo "<p style=\"color:red;\">Passwords must be more than 6 and not less than 12 characters long<p>";
}else if (preg_match("/^([\\sa-zA-Z]$)/i",$lastname) == 0 ){
	echo "<p style=\"color:red;\">Invalid last name format. Must not contain special characters<p>";
}else if (preg_match("/^([\\sa-zA-Z]$)/i",$firstname) == 0){
	echo "<p style=\"color:red;\">Invalid first name format. Must not contain special characters<p>";
}else if (empty($username)){
	echo "<p style=\"color:red;\">Username cannot be left empty<p>";
}


#close sql connection
mysqli_close($connect);
?>