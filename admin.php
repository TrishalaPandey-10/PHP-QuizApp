<?php
session_start();

include "connection.php";
if (isset($_SESSION['admin'])) {
	header("location: adminhome.php");
}
if (isset($_POST['password']))  {
	$password = mysqli_real_escape_string($conn , $_POST['password']);
	$adminpass = '$2y$10$FSQqSTutJbHuIJR9gFXCCudTAVeqtvQMJ38bDd7hUe.vpQUkhYyKq';
	if (password_verify($password , $adminpass)) {
		$_SESSION['admin'] = "active";
		header("Location: adminhome.php");
	}
	else {
		echo  "<script> alert('wrong password');</script>";
	}
}


?>



<html>
	<head>
		<title>Kuiz-Mania</title>
		<link rel="stylesheet" type="text/css" href="css/admin.css">
	</head>

	<body>
	<header>
        <div class="header-container">
            <a href="index.php" class="nav-button">Home</a>
            <h1 class="admin-title">Admin Panel - Kuiz-Mania</h1>
        </div>
    </header>

    <main>
        <div class="form-container">
            <h2>Enter Admin Password</h2>
            <form method="POST" action="">
            <input type="password" name="password"  required="">
                <input type="submit" name="submit" value="send" class="login-button">
            
        </div>
    </main>

    <footer>
        <p>&copy; 2024 PHP-kuiz | All Rights Reserved</p>
    </footer>

	</body>
</html>