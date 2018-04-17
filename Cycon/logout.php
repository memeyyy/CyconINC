<?php
require_once('dbconfig.php');
session_start();

$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection,"SELECT user_ID FROM user_account WHERE username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
mysqli_query($connection,"INSERT INTO `user_log` (`log_ID`, `log_Type`, `log_Date`, `user_ID`) VALUES (NULL, 0, CURRENT_TIMESTAMP, ".$row['user_ID'].")");
	header("Location: index.php"); // Redirecting To Home Page
session_destroy(); // Destroying All Sessions

?>