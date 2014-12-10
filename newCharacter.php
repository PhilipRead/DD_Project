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

.left {
	width: 225px;
	margin-right: 25px;
}

.right {
	width: 225px;
	margin-left: 25px;
}

form {
	margin: 0px;
}

input[type=submit] {
	width: 500px;
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

	$sql = "SELECT * FROM Location";
	$result = $conn->query($sql);
	$numCols = $result->field_count;
	$nameCol = "Name";
?>

<p> Create Character </p>

<div style="text-align: center;">
	<form action="createdCharacter.php" method="get" id="charForm">
		<input type="text" title="Character Name" Name="charName" placeholder="Character Name" style="width: 500px;">

		<br /><br />
		<select Name="gender" class="left" title="Gender">
			<option value="0">Male</option>
			<option value="1">Female</option>
		</select>

		<select Name="race" class="right" title="Race">
			<option value="0">Human</option>
			<option value="1">Elf</option>
			<option value="2">Dwarf</option>
			<option value="3">Halfling</option>
			<option value="4">Gnome</option>
			<option value="5">Half-Orc</option>
			<option value="6">Beholder</option>
			<option value="7">Mind Flayer</option>
			<option value="8">Drow</option>
			<option value="9">Dragon</option>
			<option value="10">Owlbear</option>
			<option value="11">Rust Monster</option>
			<option value="12">Gelatinous Cube</option>
			<option value="13">Giant</option>
			<option value="14">Displacer Beast</option>
			<option value="15">Githyanki</option>
			<option value="16">Kobold</option>
			<option value="17">Kuo-Toa</option>
			<option value="18">Lich</option>
			<option value="19">Orc</option>
			<option value="20">Slaad</option>
			<option value="21">Unber Hulk</option>
			<option value="22">Yuan-Ti</option>
		</select>

		<br /><br />

		<select Name="class" class="left" title="Class">
			<option value="0">Fighter</option>
			<option value="1">Wizard</option>
			<option value="2">Cleric</option>
			<option value="3">Rogue</option>
			<option value="4">Ranger</option>
			<option value="5">Paladin</option>
			<option value="6">Monster</option>
		</select>

		<select Name="alignment" class="right" title="Alignment">
			<option value="0">Lawful Good</option>
			<option value="1">Nuetral Good</option>
			<option value="2">Chaotic Good</option>
			<option value="3">Lawful Neutral</option>
			<option value="4">True Neutral</option>
			<option value="5">Chaotic Neutral</option>
			<option value="6">Lawful Evil</option>
			<option value="7">Neutral Evil</option>
			<option value="8">Chaotic Evil</option>
		</select>

		<br /><br />

		<input type="text" title="Level" Name="level" placeholder="Level" class="left">

		<?php
			echo '<select Name="location" class="right">';

			while($row = $result->fetch_assoc())
			{
				echo "<option value='" . $row["Loc_ID"] . "'> $row[$nameCol] </option>";
			}

			echo '</select>';
		?>

		<br /><br />

		<input type="text" title="Strength" Name="str" placeholder="Strength" class="left">
		<input type="text" title="Dextertiy" Name="dex" placeholder="Dexterity" class="right">

		<br /><br />

		<input type="text" title="Constitution" Name="con" placeholder="Constitution" class="left">
		<input type="text" title="Inteligence" Name="intl" placeholder="Inteligence" class="right">

		<br /><br />

		<input type="text" title="Wisdom" Name="wis" placeholder="Wisdom" class="left">
		<input type="text" title="Charisma" Name="cha" placeholder="Charisma" class="right">

		<br /><br />

		<input type="text" title="Luck" Name="lck" placeholder="Luck" style="width: 225px; margin-right: 275px;">

		<br /><br />

		<input type="submit" value="Submit">

	</form>
</div>

