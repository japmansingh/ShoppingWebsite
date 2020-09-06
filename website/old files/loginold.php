<?php
  include("config.php");
  session_start();
  
  if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

  
	if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']))
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	echo "hello1";
      
      $sql = "SELECT email FROM registeration WHERE email = '$email' and password = '$password'";
	  echo "hello2";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
		
      if($count == 1) 
	    {
		session_register("email");
		$_SESSION['login_user'] = $name;
		header("location: welcome.php");
		echo "hello3";
		}
		
      else
		  {
				$error = "Your Login Name or Password is invalid";
		  }
?>