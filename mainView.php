
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

	height: 49%;
	width: 32.5%;
	color: yellow;
	border: 1px solid red;
	padding: 5px;
	float: left;

}

.statsHead, .itemHead, .locHead, .questHead
{
	font-size: 150%;
}

#questView
{
	width:99%;
}

#locContent, #statsContent, #questContent
{
	resize: none;
	background-color: black;
	color: yellow;
	width: 100%;
	height: 84%;

}
#itemContent
{
	background-color: black;
	color: yellow;
	width: 100%;
	height: 84%;
	border: 1px solid rgb(169, 169, 169);
}

form
{
	margin-bottom: 5px;
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
	echo "<option value='" . $row[$nameCol] . "'> $row[$nameCol] </option>";
	$statsRows[$row[$nameCol]] = $row;
}

echo	'</select><br/><br/>
	<textarea id="statsContent"></textarea>
	</div>';



//Items Block
echo "<div id=\"itemView\" class=\"viewBox\">
	<div class=\"itemHead\">Items</div>
	<br/>";

$sql =  "SELECT Char_Name, Name\n"
    . "FROM CharacterTable, CharacterHas, Items\n"
    . "WHERE CharacterTable.Char_ID = CharacterHas.Char_ID\n"
    . "AND CharacterHas.Item_ID = Items.Item_ID";
$result = $conn->query($sql);
$numCols = $result->field_count;
$nameCol = "Char_Name";

echo "<select id=\"itemSelect\">";

$itemDic = [];

while($row = $result->fetch_assoc())
{
	if($itemDic[$row[$nameCol]] == NULL)
	{
		echo "<option value='" . $row[$nameCol] . "'> $row[$nameCol] </option>";
		$itemDic[$row[$nameCol]] = [$row["Name"]];
	}
	else
	{
		$itemDic[$row[$nameCol]][] = $row["Name"];
	}
}

$itemDic["Unowned"] = [];
echo "<option value='Unowned'> Unowned </option>";

$sql = "SELECT Name\n"
    . "FROM Items \n"
    . "WHERE Name NOT IN\n"
    . "(SELECT Name\n"
    . "FROM CharacterTable, CharacterHas, Items\n"
    . "WHERE CharacterTable.Char_ID = CharacterHas.Char_ID\n"
    . "AND CharacterHas.Item_ID = Items.Item_ID)";
$result = $conn->query($sql);
$numCols = $result->field_count;
$nameCol = "Name";

while($row = $result->fetch_assoc())
{
	$itemDic["Unowned"][] = $row[$nameCol];
}

echo	'</select><br/><br/>
	<div id="itemContent"></div>
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

echo '<select id="locSelect">';

$locDic = [];

while($row = $result->fetch_assoc())
{
	if($locDic[$row[$nameCol]] == NULL)
	{
		echo "<option value='" . $row[$nameCol] . "'> $row[$nameCol] </option>";
		$locDic[$row[$nameCol]] = [$row["Char_Name"]];
	}
	else
	{
		$locDic[$row[$nameCol]][] = $row["Char_Name"];
	}
}

echo	'</select><br/><br/>
	<textarea readonly id="locContent"></textarea>
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

echo	'</select><br/><br/>
	<textarea readonly id="questContent"></textarea>
	</div>';


echo '<script src="jquery.js"></script>
	  <script>

		var charStats = ' . json_encode($statsRows) . ';
		var invents = ' . json_encode($itemDic) . ';
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

		$( "#itemSelect").on({
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
			
			if(selectedVal) {
				var curStats = "";

				curStats += "Level: " + charStats[selectedVal].Level + "\n";
				curStats += "Class: " + charStats[selectedVal].Class + "\n";
				curStats += "Race: " + charStats[selectedVal].Race + "\n";
				curStats += "Alignment: " + charStats[selectedVal].Alignment + "\n";
				curStats += "Gender: " + charStats[selectedVal].Gender + "\n\n";

				curStats += "STR: " + charStats[selectedVal].STR + "\n";
				curStats += "DEX: " + charStats[selectedVal].DEX + "\n";
				curStats += "CON: " + charStats[selectedVal].CON + "\n";
				curStats += "INTL: " + charStats[selectedVal].INTL + "\n";
				curStats += "WIS: " + charStats[selectedVal].WIS + "\n";
				curStats += "CHA: " + charStats[selectedVal].CHA + "\n";
				curStats += "LCK: " + charStats[selectedVal].LCK + "\n";

				$( "#statsContent" ).val(curStats);
			}
		}

		function loadInventories() {
			var selectedVal = $("#itemSelect").val()
			
			if(selectedVal) {
				var curInv = "";
				var i;
				for(i = 0; i < invents[selectedVal].length; i++)
				{
					curInv += "<form action=\"giveItem.php\" method=\"get\">"
							   + "<input type=\"hidden\" name=\"giver\" value=\"" + selectedVal + "\">"
							   + "<input type=\"hidden\" name=\"item\" value=\"" + invents[selectedVal][i] + "\">"
							   + invents[selectedVal][i] + "  </input><input type=\"submit\" value=\"Give\">"
							   + "<span>  to  </span>" + createChars(selectedVal) + "</form>";
				}
				$( "#itemContent" ).html(curInv);
			}
		}

		function loadLocations() {
			var selectedVal = $("#locSelect").val()

			if(selectedVal) {

				var curChars = "";
				var i;
				for(i = 0; i < locChars[selectedVal].length; i++)
				{
					curChars += locChars[selectedVal][i] + "\n"
				}
				$( "#locContent" ).val(curChars);
			}
		}

		function loadQuests() {
			if(selectedVal) {
				var selectedVal = $("#questSelect").val()

				$( "#questContent" ).val(quests[selectedVal]);
			}
		}

		function createChars( except ) {
			returnHTML = "<select Name=\"receiver\">";
			for (var charName in charStats) {
				if(charStats.hasOwnProperty(charName)) {
					if(charName != except){
						returnHTML += "<option value=\"" + charName + "\">" + charName + "</option>";
					}
				}
			}
			if(except != "Unowned") {
				returnHTML += "<option value=\"Unowned\">Unowned</option>";
			}
			returnHTML += "</select>";
			return returnHTML;
		}

</script>';

?>

