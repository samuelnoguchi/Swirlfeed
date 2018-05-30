<?php 
session_start();
$con = mysqli_connect("localhost", "root", "", "social"); //connection variable -server, username, password, table

if(mysqli_connect_errno())
{
	echo "Failed to connect: " . mysqli_connect_errno();
}

//Declaring variables to prevent errors
$fname = ""; //first name
$lname = ""; //last name
$em = ""; //email
$em2 = ""; //email 2
$password = ""; //password
$password2 = ""; //password 2
$date = ""; //Sign on date
$error_array = array(); //holds error messages

if(isset($_POST['register_button'])){

//Registration from values

	//first name
	$fname = strip_tags($_POST['reg_fname']); //remove html tags
	$fname = str_replace(' ', '', $fname); //remove spaces
	$fname = ucfirst(strtolower($fname)); //Deals with capital letters
	$_SESSION['reg_fname'] = $fname; //Stores first name into session variable

	//last name
	$lname = strip_tags($_POST['reg_lname']); //remove html tags
	$lname = str_replace(' ', '', $lname); //remove spaces
	$lname = ucfirst(strtolower($lname)); //Deals with capital letters
	$_SESSION['reg_lname'] = $lname; //Stores last name into session variable

	//email
	$em = strip_tags($_POST['reg_email']); //remove html tags
	$em = str_replace(' ', '', $em); //remove spaces
	$em = ucfirst(strtolower($em)); //Deals with capital letters
	$_SESSION['reg_email'] = $em; //Stores email into session variable


	//email2
	$em2 = strip_tags($_POST['reg_email2']); //remove html tags
	$em2 = str_replace(' ', '', $em2); //remove spaces
	$em2 = ucfirst(strtolower($em2)); //Deals with capital letters
	$_SESSION['reg_email2'] = $em2; //Stores email2 into session variable

	//Password
	$password = strip_tags($_POST['reg_password']); //remove html tags
	
	//Password2
	$password2 = strip_tags($_POST['reg_password2']); //remove html tags

	$date = date("Y-m-d"); //Current date

	if($em == $em2) {
	//check email is valid format
		if(filter_var($em, FILTER_VALIDATE_EMAIL)) {
			$em = filter_var($em, FILTER_VALIDATE_EMAIL);

			//Check if email exists
			$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

			//count the number of rows returned

			$num_rows = mysqli_num_rows($e_check);

			if($num_rows > 0) {
				echo "Email already in use";
			}

		}
		else {
			echo "Invalid format";
		}
	}
	else {
		echo "Emails don't match";
	}

	if(strlen($fname) > 24 || strlen($fname) < 2) {
		echo "Your first name must be between 2 and 25 characters";
	}
	if(strlen($lname) > 24 || strlen($lname) < 2) {
		echo "Your last name must be between 2 and 25 characters";
	}
	if($password != $password2) {
		echo "Your passwords do not match";
	}
	else {
		if(preg_match('/[^A-Za-z0-9]/', $password)) {
			echo "Your password can only contain characters or numbers";
		}
	}
	if(strlen($password) > 30 || strlen($password) < 5) {
		echo "Your password must be between 5 or 30 characters";
	}


}


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Swirlfeed!</title>
</head>
<body>

	<form action="register.php" method="POST">
		<input type="text" name="reg_fname" placeholder="First Name" value ="<?php 
		if(isset($_SESSION['reg_fname'])) {
			echo $_SESSION['reg_fname'];
		}
		?>" required>
		<br>
		<input type="text" name="reg_lname" placeholder="Last Name" value ="<?php 
		if(isset($_SESSION['reg_lname'])) {
			echo $_SESSION['reg_lname'];
		}
		?>" required>
		<br>
		<input type="email" name="reg_email" placeholder="Email" value ="<?php 
		if(isset($_SESSION['reg_email'])) {
			echo $_SESSION['reg_email'];
		}
		?>" required>
		<br>
		<input type="email" name="reg_email2" placeholder="Confirm Email" value ="<?php 
		if(isset($_SESSION['reg_email2'])) {
			echo $_SESSION['reg_email2'];
		}
		?>" required>
		<br>
		<input type="password" name="reg_password" placeholder="Password" required>
		<br>
		<input type="password" name="reg_password2" placeholder="Confirm Password" required>
		<br>
		<input type="submit" name="register_button" value="Register">



	</form>

</body>
</html>