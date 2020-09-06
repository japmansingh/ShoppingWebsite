<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html>
<!-- Header -->
  <nav class="myheader">
    <span class="logo"> Project By Japman Singh</span>
    <ul>
      <li><a href="index.html">Home</a></li>
	  <li><a href="#">Cart</a></li>
	   <li><a href="login.php">Login/Register</a></li>
      <li>Contact: info@thewatchfacecompany.co.in</li>
    </ul>
  </nav>
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="styles/style.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1><font color="red">Hi</font> &nbsp <b> <font color="yellow"> <?php echo htmlspecialchars($_SESSION["username"]); ?></font> &nbsp </b><font color="red">Welcome to The Watchface Co. </font> </h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>