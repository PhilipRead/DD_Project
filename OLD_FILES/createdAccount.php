
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
	width: 125px;
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

$UserName = $_GET["username"];

$sql = "INSERT INTO Player VALUES ("
. "\"" . $UserName . "\", "
. "\"password\")";

$conn->query($sql);

echo "<p> $UserName Created! </p>";

echo "<div class=\"menu\">";

echo "<form action=\"newCharacter.php\" method=\"get\">";

echo "<input type=\"hidden\" name=\"username\" value=$UserName >";

echo "<input type=\"submit\" value=\"Create A Character\" style=\"width: 225px; margin-right:25px;\">";

echo "</form>";

echo "</div>";

?>
