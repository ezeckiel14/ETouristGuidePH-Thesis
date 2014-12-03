<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "userdb";
#connect to the database
$connect = mysqli_connect ($host,$username,$password,$database);
if(!$connect){
	die("connection failed" . mysqli_connect_error());
}
#get users inputted username and password, and strip them of unwanted tags
$username = strip_tags($_POST['username']);
$password = strip_tags($_POST['password']);

#escape special characters
$username = mysqli_real_escape_string($connect, $username);
$password = mysqli_real_escape_string($connect, $password);

#make a query to match to start a session
$query = "SELECT username,password,isValidated FROM users WHERE username = '".$username."'";
$result = mysqli_query($connect,$query);	
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$hashPass = $row['password'];
$isValidated = $row['isValidated'];
$row_cnt = mysqli_num_rows($result);
mysqli_free_result($result);
#if query match then start session if not then output login failed
if($row_cnt == 1 && password_verify($password,$hashPass) && $isValidated == 1){
	session_start();
	$_SESSION['username'] = $username;
	header('Location: index.php');
	echo "login succesful";
}else if ($row_cnt == 1 && password_verify($password,$hashPass) && $isValidated == 0){
	echo "<p style=\"color:red;\">Email is not yet validated. <a href=\"./resendValidation.php\">Re-send email validation</a>";
}else {
	echo "<p style=\"color:red;\">Check your username or password.";
}
#close sql connection
mysqli_close($connect);

?>
