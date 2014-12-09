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

$result = $conn->query("SELECT questCount FROM SystemVals");

$Quest_ID = $result->fetch_assoc()[$result->fetch_field_direct(0)->name];
$Details = $_GET["description"];
$Name	= $_GET["Name"];

$sql = "INSERT INTO Quest VALUES ("
. $Quest_ID . ", "
. "\"" . $Details . "\", "
. "\"" . $Name . "\")";

$conn->query($sql);

$conn->query("UPDATE SystemVals SET questCount = questCount + 1");

?>

<p> Quest Created! </p>

<div class="menu">
	<form action="mainMenu.php" method="get">
		<input type="submit" value="Return To Main Menu">
	</form>
</div>;
