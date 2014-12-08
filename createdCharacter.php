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

$result = $conn->query("SELECT charCount FROM SystemVals");

$Char_ID = $result->fetch_assoc()[$result->fetch_field_direct(0)->name];
$Char_Name = $_GET["charName"];
$Gender = $_GET["gender"];
$Race = $_GET["race"];
$Class = $_GET["class"];
$Alignment = $_GET["alignment"];
$Loc_ID = $_GET["location"];
$Level = $_GET["level"];
$STR = $_GET["str"];
$DEX = $_GET["dex"];
$CON = $_GET["con"];
$INTL = $_GET["intl"];
$WIS = $_GET["wis"];
$CHA = $_GET["cha"];
$LCK = $_GET["lck"];

$sql = "INSERT INTO CharacterTable VALUES ("
. $Char_ID . ", "
. "\"" . $Char_Name . "\", "
. $Gender . ", "
. $Race . ", "
. $Class . ", "
. $Alignment . ", "
. $Loc_ID . ", "
. $Level . ", "
. $STR . ", "
. $DEX . ", "
. $CON . ", "
. $INTL . ", "
. $WIS . ", "
. $CHA . ", "
. $LCK . ")";

$conn->query($sql);

$conn->query("UPDATE SystemVals SET charCount = charCount + 1");

echo "<p> $Char_Name Created! </p>";

?>

<div class="menu">
	<form action="mainMenu.php" method="get">
		<input type="submit" value="Return To Main Menu">
	</form>
</div>;
