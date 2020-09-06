<?php

$email = $_POST["email"];
$pass = $_POST["password"];

$con = mysqli_connect("localhost","root","");
if(! $con)
{
    die('Connection Failed'.mysql_error());
}

mysqli_select_db("customer_reg",$con);

$result = mysql_query("SELECT email, password FROM registerations WHERE email = $email");


$row = mysql_fetch_array($result);

if($row["email"]==$email && $row["password"]==$password)
    echo"You are a validated user.";
else
    echo"Sorry, your credentials are not valid, Please try again.";

?>