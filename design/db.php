<?php
	$servername = 'localhost';
	$username = 'root';
	$pass = '';
	$dbname = 'biologyclassfinalproject';
	$conn=mysqli_connect($servername,$username,$pass,"$dbname");
	if (!$conn){
		die('Could not Connect to MySQL Server:'.mysql_error());
	}
?>