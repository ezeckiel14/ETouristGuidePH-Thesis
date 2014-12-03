<?php
#this is used to destroy user session
session_start();
session_destroy();
header('location:index.php');
?>