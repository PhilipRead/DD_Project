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

		<input type="text" title="Gender" Name="gender" placeholder="Gender" class="left">
		<input type="text" title="Race" Name="race" placeholder="Race" class="right">

		<br /><br />

		<input type="text" title="Class" Name="class" placeholder="Class" class="left">
		<input type="text" title="Alignment" Name="alignment" placeholder="Alignment" class="right">

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

