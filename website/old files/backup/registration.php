<?php

$name = filter_input(INPUT_POST, 'name');
$email = $_POST['email'];
$password = $_POST['password'];
$city = $_POST['city'];
$state = $_POST['state'];
$address = $_POST['address'];
$phoneno = $_POST['phoneno'];

if(!empty($name) || !empty($email) || !empty($password) || !empty($city) || !empty($state) || !empty($address) || !empty($phoneno))
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "customer_reg";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
	
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}


else{
	
$sql = "INSERT INTO registeration (name, email, password, city, state, address, phoneno)
values ('$name','$email','$password','$city','$state','$address','$phoneno')";

if ($conn->query($sql)){
echo "New record is inserted sucessfully";
}


else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "All fields are mandatory";
die();
}
?>