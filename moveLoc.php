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

$charName = $_GET["charName"];
$locName = $_GET["locName"];

$sql = "UPDATE CharacterTable " .
		   "SET Loc_ID = " .
				"(SELECT Loc_ID " .
				"FROM Location " .
				"WHERE Name = \"$locName\") " .
           "WHERE Char_Name = \"$charName\"";

$conn->query($sql);


//Redirect back to the main screen
header("Location: mainView.php");
exit;

?>
