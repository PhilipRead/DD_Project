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

<p> Create Item </p>

<div class="menu">
	<form action="createdItem.php" method="get">
		<input type="text" title="Name" Name="name" placeholder="Name" style="width: 500px;">

		<br /><br />

		<select title="Ability" Name="ability" class="left">
			<option value="0">None</option>
			<option value="1">Striking</option>
			<option value="2">Smashing</option>
			<option value="3">Arcing</option>
			<option value="4">Blazing</option>
			<option value="5">Coolant</option>
			<option value="6">Branding</option>
			<option value="7">Dispelling</option>
			<option value="8">Exploding</option>
			<option value="9">Flaying</option>
			<option value="10">Killing</option>
			<option value="11">Spell Drain</option>
			<option value="12">Shockwave</option>
			<option value="13">Unholy</option>
		</select>

		<input type="text" title="Cost" Name="cost" placeholder="Cost" class="right">

		<br /><br />

		<input type="text" title="Weight" Name="weight" placeholder="Weight" class="left">

		<select Name="type" title="Type" class="right">
			<option value="0">Weapon</option>
			<option value="1">Armor</option>
			<option value="2">Ring</option>
			<option value="3">Amulet</option>
			<option value="4">Potion</option>
			<option value="5">Rod</option>
			<option value="6">Staff</option>
			<option value="7">Wand</option>
			<option value="8">Scroll</option>
			<option value="9">Quest Item</option>
			<option value="10">Misc Item</option>
		</select>

		<br /><br />

		<?php
			echo '<select Name="location" style="width: 225px; margin-right: 275px;">';

			while($row = $result->fetch_assoc())
			{
				echo "<option value='" . $row["Loc_ID"] . "'> $row[$nameCol] </option>";
			}

			echo '</select>';
		?>

		<br /><br /><br />

		<input type="submit" value="Submit">
	</form>
</div>
