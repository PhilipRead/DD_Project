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
	$sql = "INSERT INTO CharacterHas " .
		   "VALUES (" . 
				"(SELECT Char_ID " .
				 "FROM CharacterTable " .
				 "WHERE Char_Name = \"$receiver\"), " . 
				"(SELECT Item_ID " .
				 "FROM Items " .
				 "WHERE Name = \"$item\"), 1)";

	$conn->query($sql);
}
else if($receiver == "Unowned")
{
	$sql = "DELETE FROM CharacterHas " .
			"WHERE Item_ID = " . 
				"(SELECT Item_ID " .
				 "FROM Items " .
				 "WHERE Name = \"$item\")";

	$conn->query($sql);
}
else
{
	$sql = "UPDATE CharacterHas " .
		   "SET Char_ID = " .
				"(SELECT Char_ID " .
				"FROM CharacterTable " .
				"WHERE Char_Name = \"$receiver\") " .
           "WHERE Item_ID = " .
				"(SELECT Item_ID " .
				"FROM Items " .
				"WHERE Name = \"$item\")";

	$conn->query($sql);
}

//Redirect back to the main screen
header("Location: mainView.php");
exit;

?>
