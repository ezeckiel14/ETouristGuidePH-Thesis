<?php
#remove '@' to show errors logs
#set parameters for database connection
$host = "127.0.0.1";
$username = "root";
$password = "";
#connect to the mySQL
$connect = @mysqli_connect($host,$username,$password);
if (!$connect){
	die("connection failed: " . mysqli_connect_error());
}
#check if database is existing if not create one
$dbname = "userdb";
$dbselect = @mysqli_select_db($connect,$dbname);
if(!$dbselect){
	mysqli_query($connect,"CREATE DATABASE $dbname");
}

#close the connection
mysqli_close($connect);
?>