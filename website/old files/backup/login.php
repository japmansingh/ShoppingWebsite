<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $password= mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT phoneno FROM registeration WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("email");
         $_SESSION['login_user'] = $email;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/stylelogin.css">
</head>
<body>
<!-- Header -->
   <nav class="header">
    <span class="logo"> Project By Japman Singh</span>
    <ul>
      <li><a href="index.html">Home</a></li>
	  <li><a href="#">Cart</a></li>
	   <li><a href="login.php">Login/Register</a></li>
		<li>Contact: info@indianshopper.com</li>
    </ul>
  </nav>
	
	<div class="welcome">
		<form action="php/login.php" method="POST">
					<span class="logo">
						Welcome
					</span>
					<span>
					<div class="photo">
					<div class="image-container">
						<img src="media/logo.png" alt="IndianShopper" height="250px" width="50px" align="left">
					</span>
					</div>
					</div>
					<div class="inputs">
						<label for="email"><b><font size="4.5">Email</font></b></label>
						<input type="text" placeholder="Enter Email" name="email" required>
						<label for="password"><b><font size="4.5">Password</font></b></label>
						<input type="password" placeholder="Enter Password" name="password" required>
						<button type="login" name="login" class="login">Login</button>						
						<span class="txt">
							<font size="4"><center>Don’t have an account?</center>
						</span>
						<a href="register.html" class="txt2">
								<font size="4"><center>Sign up<center></font>
						</a>
										</div>

				
		</form>
	</div>
</body>
</html>