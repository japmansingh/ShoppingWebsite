<font color="red"><?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $name = $city = $state = $address = $phoneno = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM registered WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This email is already taken.";
                } else{
                    $username = trim($_POST["username"]);
					}
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
   
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO registered (username, password, name, city, state, address, phoneno) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sssssss", $username, $password, $name, $city, $state, $address, $phoneno);
			
			/*Set parameters*/
			
$username = $_POST['username'];
$password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
$name = $_POST['name'];
$city = $_POST['city'];
$state = $_POST['state'];
$address = $_POST['address'];
$phoneno = $_POST['phoneno'];



            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                echo "Redirect to login page";
                header("location: login.php");
											} 
		else{
              echo "Something went wrong. Please try again later.";
			}
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?></font>


 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="styles/stylelogin.css">

    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
		
    </style>
</head>
<body>
<!-- Header -->
   <nav class="header">
    <span class="logo"> Project By Japman Singh</span>
    <ul>
      <li><a href="index.html">Home</a></li>
	  <li><a href="#">Cart</a></li>
	   <li><a href="login.php">Login/Register</a></li>
		<li>Contact: info@thewatchfacecompany.co.in</li>
    </ul>
  </nav>
	
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
		
		<div class="form-group">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            
			<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            
			<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
			
			<div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>
			
			<div class="form-group">
                <label>City</label>
                <input type="text" name="city" class="form-control">
            </div>
			
			 <div class="form-group">
                <label>State</label>
                <input type="text" name="state" class="form-control">
            </div>
			
			<div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control">
            </div>
			
			<div class="form-group">
                <label>Phone No.</label>
                <input type="text" name="phoneno" class="form-control">
            </div>

            <div class="">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
			
			
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
    </div>    
</body>
</html>