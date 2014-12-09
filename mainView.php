
<style type="text/css">

body {
	background-color: black;
}

p {
	line-height: 25%;
}

.viewBox
{
	background-color: black;

	height: 50%;
	width: 31.5%;
	color: yellow;
	border: 1px solid red;
	padding: 5px;
	float: left;
	min-width: 0;
}

.statsHead, .invHead, .locHead, .questHead
{
	font-size: 150%;
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


//Statistics Block
echo "<div id=\"statsView\" class=\"viewBox\">
	<div class=\"statsHead\">Statistics</div>
	<br/>";

$sql = "SELECT * FROM CharacterTable";
$result = $conn->query($sql);
$numCols = $result->field_count;
$nameCol = "Char_Name";

echo "<select id=\"charSelect\">";

$statsRows = [];

while($row = $result->fetch_assoc())
{
	echo "<option value= $row[$nameCol] > $row[$nameCol] </option>";
	$statsRows[$row[$nameCol]] = $row;
}

echo	'</select>
	<div id="statsContent">
		<p>Level: <span id="Level"></span></p>
		<p>Class: <span id="Class"></span></p>
		<p>Race: <span id="Race"></span></p>
		<p>Alignment: <span id="Alignment"></span></p>
		<p>Gender: <span id="Gender"></span></p>
		<br/>
		<p>STR: <span id="STR"></span></p>
		<p>DEX: <span id="DEX"></span></p>
		<p>CON: <span id="CON"></span></p>
		<p>INTL: <span id="INTL"></span></p>
		<p>WIS: <span id="WIS"></span></p>
		<p>CHA: <span id="CHA"></span></p>
		<p>LCK: <span id="LCK"></span></p></div>
	</div>';



//Inventory Block
echo "<div id=\"invView\" class=\"viewBox\">
	<div class=\"invHead\">Inventories</div>
	<br/>";

$sql = "SELECT Char_Name, Name\n"
    . "FROM CharacterTable, CharacterHas, Items\n"
    . "WHERE CharacterTable.Char_ID = CharacterHas.Char_ID\n"
    . "AND CharacterHas.Item_ID = Items.Item_ID";
$result = $conn->query($sql);
$numCols = $result->field_count;
$nameCol = "Char_Name";

echo "<select id=\"invSelect\">";

$invDic = [];

while($row = $result->fetch_assoc())
{
	if($invDic[$row[$nameCol]] == NULL)
	{
		echo "<option value= $row[$nameCol] > $row[$nameCol] </option>";
		$invDic[$row[$nameCol]] = [$row["Name"]];
	}
	else
	{
		$invDic[$row[$nameCol]][] = $row["Name"];
	}
}

echo	'</select>
	<div id="invContent"></div>
	</div>';


//Locations Block
echo "<div id=\"locView\" class=\"viewBox\">
	<div class=\"locHead\">Locations</div>
	<br/>";

$sql = "SELECT Name, Char_Name\n"
    . "FROM CharacterTable, Location\n"
    . "WHERE CharacterTable.Loc_ID = Location.Loc_ID";
$result = $conn->query($sql);
$numCols = $result->field_count;
$nameCol = "Name";

echo "<select id=\"locSelect\">";

$locDic = [];

while($row = $result->fetch_assoc())
{
	if($locDic[$row[$nameCol]] == NULL)
	{
		echo "<option value= $row[$nameCol] > $row[$nameCol] </option>";
		$locDic[$row[$nameCol]] = [$row["Char_Name"]];
	}
	else
	{
		$locDic[$row[$nameCol]][] = $row["Char_Name"];
	}
}

echo	'</select>
	<div id="locContent"></div>
	</div>';

//Quests Block
echo "<div id=\"questView\" class=\"viewBox\">
	<div class=\"questHead\">Quests</div>
	<br/>";

$sql = "SELECT *\n"
    . "FROM Quest";
$result = $conn->query($sql);
$numCols = $result->field_count;
$nameCol = "Name";

echo "<select id=\"questSelect\">";

$questDic = [];

while($row = $result->fetch_assoc())
{
	echo "<option value='" . $row[$nameCol] . "'> $row[$nameCol] </option>";
	$questDic[$row[$nameCol]] = $row["Details"];
}

echo	'</select>
	<textarea id="questContent"></textarea>
	</div>';


echo '<script src="jquery.js"></script>
	  <script>

		var charStats = ' . json_encode($statsRows) . ';
		var invents = ' . json_encode($invDic) . ';
		var locChars = ' . json_encode($locDic) . ';
		var quests = ' . json_encode($questDic) . ';

		$( document ).ready(function() {
			loadStats();
			loadInventories();
			loadLocations();
			loadQuests();
		});

		$( "#charSelect").on({
			change: loadStats
		});

		$( "#invSelect").on({
			change: loadInventories
		});

		$( "#locSelect").on({
			change: loadLocations
		});

		$( "#questSelect").on({
			change: loadQuests
		});

		function loadStats() {
			var selectedVal = $("#charSelect").val()
				
			$( "#Level" ).html(charStats[selectedVal].Level)
			$( "#Class" ).html(charStats[selectedVal].Class)
			$( "#Race" ).html(charStats[selectedVal].Race)
			$( "#Alignment" ).html(charStats[selectedVal].Alignment)
			$( "#Gender" ).html(charStats[selectedVal].Gender)

			$( "#STR" ).html(charStats[selectedVal].STR)
			$( "#DEX" ).html(charStats[selectedVal].DEX)
			$( "#CON" ).html(charStats[selectedVal].CON)
			$( "#INTL" ).html(charStats[selectedVal].INTL)
			$( "#WIS" ).html(charStats[selectedVal].WIS)
			$( "#CHA" ).html(charStats[selectedVal].CHA)
			$( "#LCK" ).html(charStats[selectedVal].LCK)
		}

		function loadInventories() {
			var selectedVal = $("#invSelect").val()
			
			var curInv = "";
			var i;
			for(i = 0; i < invents[selectedVal].length; i++)
			{
				curInv += "<p>" + invents[selectedVal][i] + "</p>"
			}
			$( "#invContent" ).html(curInv);
		}

		function loadLocations() {
			var selectedVal = $("#locSelect").val()
			
			var curChars = "";
			var i;
			for(i = 0; i < locChars[selectedVal].length; i++)
			{
				curChars += "<p>" + locChars[selectedVal][i] + "</p>"
			}
			$( "#locContent" ).html(curChars);
		}

		function loadQuests() {
			var selectedVal = $("#questSelect").val()

			console.log(selectedVal);
			$( "#questContent" ).val(quests[selectedVal]);
		}

</script>';

?>

