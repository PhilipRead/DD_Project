
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

	height: 280px;
	width: 420px;
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
	width: 1285px;
}

#locContent, #statsContent, #questContent
{
	resize: none;
	background-color: black;
	color: yellow;
	width: 420px;
	height: 190px;

}

#questContent
{
	width: 1280px;
}

#itemContent
{
	font-family: monospace;
	background-color: black;
	color: yellow;
	width: 420px;
	height: 190px;
	border: 1px solid rgb(169, 169, 169);
	overflow-y:auto;
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

$gender = array(
	"0" => "Male",
	"1" => "Female"
);

$race = array(
	"0" => "Human",
	"1" => "Elf",
	"2" => "Dwarf",
	"3" => "Halfling",
	"4" => "Gnome",
	"5" => "Half-Orc",
	"6" => "Beholder",
	"7" => "Mind Flayer",
	"8" => "Drow",
	"9" => "Dragon",
	"10" => "Owlbear",
	"11" => "Rust Monster",
	"12" => "Gelatinous Cube",
	"13" => "Giant",
	"14" => "Displacer Beast",
	"15" => "Githyanki",
	"16" => "Kobold",
	"17" => "Kuo-Toa",
	"18" => "Lich",
	"19" => "Orc",
	"20" => "Slaad",
	"21" => "Unber Hulk",
	"22" => "Yuan-Ti"
);

$class = array(
	"0" => "Fighter",
	"1" => "Wizard",
	"2" => "Cleric",
	"3" => "Rogue",
	"4" => "Ranger",
	"5" => "Paladin",
	"6" => "Monster"
);

$alignment= array(
	"0" => "Lawful Good",
	"1" => "Nuetral Good",
	"2" => "Chaotic Good",
	"3" => "Lawful Neutral",
	"4" => "True Neutral",
	"5" => "Chaotic Neutral",
	"6" => "Lawful Evil",
	"7" => "Neutral Evil",
	"8" => "Chaotic Evil"
);

$locType = array(
	"0" => "Dungeon",
	"1" => "City",
	"2" => "Town",
	"3" => "Bulding",
	"4" => "Room",
	"5" => "Point of Interest",
	"6" => "Other"
);

$itemAbility = array(
	"0" => "None",
	"1" => "Striking",
	"2" => "Smashing",
	"3" => "Arcing",
	"4" => "Blazing",
	"5" => "Coolant",
	"6" => "Branding",
	"7" => "Dispelling",
	"8" => "Exploding",
	"9" => "Flaying",
	"10" => "Killing",
	"11" => "Spell Drain",
	"12" => "Shockwave",
	"13" => "Unholy"
);

$itemType = array(
	"0" => "Weapon",
	"1" => "Armor",
	"2" => "Ring",
	"3" => "Amulet",
	"4" => "Potion",
	"5" => "Rod",
	"6" => "Staff",
	"7" => "Wand",
	"8" => "Scroll",
	"9" => "Quest Item",
	"10" => "Misc Item"
);

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
	<textarea readonly id="statsContent"></textarea>
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

$sql = "SELECT *\n"
    . "FROM Location";

$result = $conn->query($sql);
$numCols = $result->field_count;
$nameCol = "Name";

$locData = [];

while($row = $result->fetch_assoc())
{
	$locData[$row[$nameCol]] = $row;
}

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
		var genDic = ' . json_encode($gender) . ';
		var classDic = ' . json_encode($class) . ';
		var raceDic = ' . json_encode($race) . ';
		var alignmentDic = ' . json_encode($alignment) . ';
		var invents = ' . json_encode($itemDic) . ';
		var locData = ' . json_encode($locData) . ';
		var locChars = ' . json_encode($locDic) . ';
		var locType = ' . json_encode($locType) . ';
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
				curStats += "Class: " + classDic[charStats[selectedVal].Class] + "\n";
				curStats += "Race: " + raceDic[charStats[selectedVal].Race] + "\n";
				curStats += "Alignment: " + alignmentDic[charStats[selectedVal].Alignment] + "\n";
				curStats += "Gender: " + genDic[charStats[selectedVal].Gender] + "\n\n";

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

				curChars += "\nType: " + locType[locData[selectedVal].Type] + "\n"
						  + "Location: " + 	locData[selectedVal].X_Coordinates + ", " + locData[selectedVal].Y_Coordinates;

				$( "#locContent" ).val(curChars);
			}
		}

		function loadQuests() {
			var selectedVal = $("#questSelect").val()
			if(selectedVal) {

				$( "#questContent" ).val(quests[selectedVal]);
			}
		}

		function createChars( except ) {
			returnHTML = "<select Name=\"receimyver\">";
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

