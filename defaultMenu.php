<style type="text/css">
body {
	background-color: black;
}

p {
	text-align: center;
	color: #B80000;
	font-size: 500%;
	margin-top: 250px;
}

.menu {
	text-align: center;
}

form {
	margin: 0px;
}

input[type=submit] {
	width: 300px;
}

</style>

<?php

$servername = "mysql.eecs.ku.edu";
$username = "acowdrey";
$password = "Jcony7490404=";
$dbname = "acowdrey";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

$result = $conn->query("SELECT locationCount FROM SystemVals");
$Loc_ID = $result->fetch_assoc()[$result->fetch_field_direct(0)->name];

if($Loc_ID > "0")
{
	header("Location: addToDatabase.php");
	exit;
}

?>

<p> Add New Data </p>

<div class="menu">
	<form action="newLocation.php" method="get">
		<input type="submit" value="New Location">
	</form>
</div>
