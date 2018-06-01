<?php 
require 'config/config.php';

if(isset($_SESSION['username'])) {
	$userLoggedIn = $_SESSION['username'];
	$user_details_query= mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}
else {
	header("Location: register.php");

}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Swirlfeed</title>
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Assets/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">



</head>
<body>

	<div class="top_bar">
		<div class="logo">
			<a href="index.php">Swirlfeed</a>

		</div>

		<nav>
			<a href="<?php echo $userLoggedIn ?>" >
			<?php echo $user['first_name'];?>
			</a>
			<a href="index.php"><i class="fa fa-home fa-lg"></i> </a>
			<a href="#"><i class="fa fa-envelope fa-lg"></i></a>
			<a href="#"><i class="fa fa-bell fa-lg"></i></a>
			<a href="#"><i class="fa fa-users fa-lg"></i></a>
			<a href="#"><i class="fa fa-cog fa-lg"></i></a>	 
		</nav>


	</div>
	<div class="wrapper">