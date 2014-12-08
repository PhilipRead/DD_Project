
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

$sql = "INSERT INTO CharacterTable VALUES (5, "
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

//echo "<p> $sql </p>";

$conn->query($sql);

echo "<p> $Char_Name Created! </p>";

echo "<div class=\"menu\">";

echo "<input type=\"submit\" value=\"Back to Account Info\" style=\"width: 225px; margin-right: 25px;\">";
echo "<input type=\"submit\" value=\"Play This Character\" style=\"width: 225px; margin-right:25px;\">";

echo "</div>";

?>
