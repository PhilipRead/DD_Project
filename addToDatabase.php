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

<p> Add New Data </p>

<div class="menu">
	<form action="newCharacter.php" method="get">
		<input type="submit" value="New Character" style="width: 300px;">
	</form>

	<br />

	<form action="newQuest.php" method="get">
		<input type="submit" value="New Quest" style="width: 300px;">
	</form>

	<br />

	<form action="newItem.php" method="get">
		<input type="submit" value="New Item" style="width: 300px;">
	</form>

	<br />

	<form action="newLocation.php" method="get">
		<input type="submit" value="New Location">
	</form>
</div>
