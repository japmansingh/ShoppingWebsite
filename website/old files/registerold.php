<?php

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$city = $_POST['city'];
$state = $_POST['state'];
$address = $_POST['address'];
$phoneno = $_POST['phoneno'];

if(!empty($name) || !empty($email) !empty($password) !empty($city) !empty($state) !empty($address) !empty($phoneno))
{
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "ecommerce"
	
	$conn = new mysqli($host, $dbUsername, dbPassword, dbname);
	
	if (mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_errorno().')'. mysqli_connect_error());
								}
								
	else {
			$SELECT = "SELECT email From register Where email = ? Limit 1";
			INSERT INTO customer_reg (name, email, password, city, state, address, phoneno)
			VALUES('$name','$email','$password','$city','$state','$address','$phoneno');
		 }	

else{
	echo "All fields are required";
	die();
	}

$sql = "INSERT INTO customer_reg (name, email, password, city, state, address, phoneno)
VALUES('$name','$email','$password','$city','$state','$address,'$phoneno');";
mysqli_query($conn,$sql); 
header("Location: index.php?signup=success");
echo"success"

?>