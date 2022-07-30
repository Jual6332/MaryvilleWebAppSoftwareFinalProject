<?php	
	session_start();
	require_once "db.php";
	if (isset($_SESSION['username']) != ""){
		header("Location: dashboard.html");
	}

	$error_message = '';
	if (isset($_POST['submit'])) {
	    $db = new DB();
	    $response = $db->check_credentials($_POST['username'], $_POST['password']);
	 
	    if ($response['status'] == 'success') {
	        #$_SESSION['user'name] = array('username' => $response[''], 'fullname' => $response['fullname']);
	        header('Location: dashboard.php');
	    }
	 
	    $error_message = ($response['status'] == 'error') ? $response['message'] : '';
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<!-- Title Heading -->
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href="styling/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!-- Login Form -->
		<div class="login">
			<h1>Login</h1>
			<!-- Form action call to authenticate.php with method post-->
			<form action="db.php" method="post">
				<!-- This login form uses labels. Labels are often used for  -->
				<!-- User Icon w/ a label-->
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<!-- Input Field: Username -->
				<input type="text" name="username" placeholder="Username" id="username" required>
				<!-- Lock Icon w/ a label-->
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<!-- Input Field: Password -->
				<input type="password" name="password" placeholder="Password" id="password" required>
				<!-- Login Submit Button -->
				<input type="submit" value="Login">
		</div>
	</body>
</html>