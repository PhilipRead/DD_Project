
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

$username= $_GET['username'];

echo "<p> $username </p>";

echo "<div style=\"text-align: center;\">";

echo "<input type=\"text\" title=\"Character Name\" Name=\"charName\" placeholder=\"Character Name\" style=\"width: 500px;\">";

echo "<br /><br />";

echo "<input type=\"text\" title=\"Gender\" Name=\"gender\" placeholder=\"Gender\" style=\"width: 225px; margin-right: 25px;\">";

echo "<input type=\"text\" title=\"Race\" Name=\"race\" placeholder=\"Race\" style=\"width: 225px; margin-left: 25px;\">";

echo "<br /><br />";

echo "<input type=\"text\" title=\"Class\" Name=\"class\" placeholder=\"Class\" style=\"width: 225px; margin-right: 25px;\">";

echo "<input type=\"text\" title=\"Alignment\" Name=\"alignment\" placeholder=\"Alignment\" style=\"width: 225px; margin-left: 25px;\">";

echo "<br /><br />";

echo "<input type=\"text\" title=\"Level\" Name=\"level\" placeholder=\"Level\" style=\"width: 225px; margin-right: 25px;\">";

echo "<input type=\"text\" title=\"Starting Location\" Name=\"location\" placeholder=\"Starting Location\" style=\"width: 225px; margin-left: 25px;\">";

echo "<br /><br />";

echo "<input type=\"text\" title=\"Strength\" Name=\"str\" placeholder=\"Strength\" style=\"width: 225px; margin-right: 25px;\">";

echo "<input type=\"text\" title=\"Dextertiy\" Name=\"dex\" placeholder=\"Dexterity\" style=\"width: 225px; margin-left: 25px;\">";

echo "<br /><br />";

echo "<input type=\"text\" title=\"Constitution\" Name=\"con\" placeholder=\"Constitution\" style=\"width: 225px; margin-right: 25px;\">";

echo "<input type=\"text\" title=\"Inteligence\" Name=\"intl\" placeholder=\"Inteligence\" style=\"width: 225px; margin-left: 25px;\">";

echo "<br /><br />";

echo "<input type=\"text\" title=\"Wisdom\" Name=\"wis\" placeholder=\"Wisdom\" style=\"width: 225px; margin-right: 25px;\">";

echo "<input type=\"text\" title=\"Charisma\" Name=\"cha\" placeholder=\"Charisma\" style=\"width: 225px; margin-left: 25px;\">";

echo "<br /><br />";

echo "<input type=\"text\" title=\"Luck\" Name=\"lck\" placeholder=\"Luck\" style=\"width: 225px; margin-right: 275px;\">";

echo "<br /><br /><br />";

echo "<input type=\"submit\" value=\"Submit\" style=\"width: 500px;\">";

echo "</div>";

/*
Char_Name
Gender
Race
Class
Alignment
Loc_ID
Level
STR
DEX
CON
INTL
WIS
CHA
LCK
*/

?>
