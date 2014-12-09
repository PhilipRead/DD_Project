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

		<input type="text" title="Ability" Name="ability" placeholder="Ability" class="left">
		<input type="text" title="Cost" Name="cost" placeholder="Cost" class="right">

		<br /><br />

		<input type="text" title="Weight" Name="weight" placeholder="Weight" class="left">
		<input type="text" title="Type" Name="type" placeholder="Type" class="right">

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
