<?php
#remove '@' to show errors logs
#set parameters for database connection
$serverName = "127.0.0.1";
$username = "root";
$password = "";
$database = "userdb";
#connect to the mySQL
$connect = @mysqli_connect($serverName,$username,$password,$database);
if (!$connect){
	die("connection failed: " . mysqli_connect_error());
}
#upon creating the database check if table is existing
$tablename = "users";
$tableselectquery = "SELECT TABLE users";
$tableselect = @mysqli_query($connect,$tableselectquery);
if(!$tableselect){
	$tablecreate = "CREATE TABLE $tablename (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(16),
	password VARCHAR(60),
	email VARCHAR(60),
	lastname VARCHAR(60),
	firstname VARCHAR(60),
	birthday VARCHAR(15),
	country VARCHAR(100),
	dateReg DATE,
	validationHash VARCHAR(40),
	isValidated BOOLEAN)";
	if(mysqli_query($connect,$tablecreate)){
		echo "the database " . $dbname . " and the table" . $tablename . " is SUCCESFULLY CREATED.";
	}
}

#close the connection
mysqli_close($connect);
?>