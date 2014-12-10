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

$giver = $_GET["giver"];
$item = $_GET["item"];
$receiver = $_GET["receiver"];

if($giver == "Unowned")
{
	//$conn->query("SELECT locationCount FROM SystemVals");
}
else if($receiver == "Unowned")
{
	//$conn->query("SELECT locationCount FROM SystemVals");
}
else
{
	//$conn->query("SELECT locationCount FROM SystemVals");
}

//Redirect back to the main screen
header("Location: mainView.php");
exit;

?>
