<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'userdb';
$connect = mysqli_connect($host,$user,$password,$db);
if(!$connect){
	die ('cannot connect to the database' . mysqli_connect_error());
}
//Get form values
$email = strip_tags($_POST['email']);
$email = mysqli_real_escape_string($connect, $email);
//Generate new hash for link
$validationHash = md5(rand(0,1000));
//check if email is already validted
$query = "SELECT lastname,firstname,email FROM users WHERE email= '" .$email. "' AND isValidated = '0'";
$result = mysqli_query($connect,$query);
$row = mysqli_fetch_array ($result,MYSQL_ASSOC);
$lastname = $row['lastname'];
$firstname = $row['firstname'];
$row_cnt = mysqli_num_rows($result);
mysqli_free_result($result);
if ($row_cnt > 0){		
	
	$query = "UPDATE users SET validationHash = '" .$validationHash."' WHERE email = '" .$email. "'";
	$result = mysqli_query($connect,$query);
	echo "<p style = \"color:red;\">Your email verification link has been sent to your registered e-mail address.</p>";
	
	
	//Send an email
	//Send email To:
	$to = "admin_jeishii@localhost.com "; // change this to $email if will be launched on a commercial server.
	//Subject of the Email
	$subject = "Welcome to our E-tourist Guide using GIS Technology PH Web-App";
	//Extra headers
	$headers = "From:postmaster@localhost.com" . "\r\n";
	//Message content
	$message = "Hello " .$firstname. " " .$lastname. "\n\n";
	$message .= "You have requested to re-send your email-validation link. The link is now available below.\n\n";
	$message .= "----------------------------------------------" . PHP_EOL; 
	$message .= "\nPlease click the link below to activate your account or copy paste it on your URL." . PHP_EOL;
	$message .= "http://localhost/www/MMD_Thesis/emailVerify.php?email=$email&hash=$validationHash" . PHP_EOL;
	$message .= "\nIf ever you have comments and suggestion, we would like to hear it from you. \nYou can email us at reply-postmaster@localhost.com";
	$message .= "\n\nThank you. \n\nFrom," .$headers;	
	//Send mail using mail() function
	mail($to,$subject,$message,$headers);
}







mysqli_close($connect);

?>
