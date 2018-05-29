<?php 
$con = mysqli_connect("localhost", "root", "", "social"); //connection variable -server, username, password, table

if(mysqli_connect_errno())
{
	echo "Failed to connect: " . mysqli_connect_errno();
}

$query = mysqli_query($con, "INSERT INTO test VALUES ('1', 'Sam')");

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Swirlfeed</title>
</head>
<body>
	Hello Sam
</body>
</html>