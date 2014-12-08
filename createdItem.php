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

$result = $conn->query("SELECT itemCount FROM SystemVals");

$Item_ID = $result->fetch_assoc()[$result->fetch_field_direct(0)->name];
$Name = $_GET["name"];
$Ability = $_GET["ability"];
$Cost = $_GET["cost"];
$Weight = $_GET["weight"];
$Type = $_GET["type"];
$Loc_ID = $_GET["location"];

$sql = "INSERT INTO Items VALUES ("
. $Item_ID . ", "
. "\"" . $Name . "\", "
. $Ability . ", "
. $Cost . ", "
. $Weight . ", "
. $Type . ", "
. $Loc_ID . ")";

$conn->query($sql);

$conn->query("UPDATE SystemVals SET itemCount = itemCount + 1");

?>

<p> Item Created! </p>

<div class="menu">
	<form action="mainMenu.php" method="get">
		<input type="submit" value="Return To Main Menu">
	</form>
</div>;
