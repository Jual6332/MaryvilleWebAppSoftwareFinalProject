<?php
	$servername = 'localhost';
	$username = 'root';
	$pass = '';
	$dbname = 'biologyclassfinalproject';
	$conn=mysqli_connect($servername,$username,$pass,"$dbname");
	if (mysqli_connect_errno()){
		// If there is an error with the connection, stop the script and display the error.
		exit('Failed to connect to MySQL: ' . mysqli_connect_error());
	}

	// Connecting to the database is essential, how can we retrieve and store information related to our users?
	// We must make sure to update the variables to reflect our MySQL database credentials.

	// Now, check if the data from the login form was submitted.
	// isset() will check if the data exists.
	if ( !isset($_POST['username'], $_POST['password'])){
		// Did not get the data that should have been sent.
		exit('Please fill both the username and password fields!');
	}

	// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
	if ($stmt = $con->prepare('SELECT username, password FROM teacherlogin WHERE username = ?')){
		// Bind parameters (s = string, i = int, b = blob, etc).
		// In this case, the username is a string
		$stmt->bind_param('s',$_POST['username']);
		$stmt->execute();
		// Store the result. We will check if account exists in the database.
		$stmt->store_result();
	}
?>

