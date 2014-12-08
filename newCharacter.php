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
	width: 125px;
}

</style>

<p> Create Character </p>

<div style="text-align: center;">
	<form action="createdCharacter.php" method="get">
		<input type="text" title="Character Name" Name="charName" placeholder="Character Name" style="width: 500px;">

		<br /><br />

		<input type="text" title="Gender" Name="gender" placeholder="Gender" class="left">
		<input type="text" title="Race" Name="race" placeholder="Race" class="right">

		<br /><br />

		<input type="text" title="Class" Name="class" placeholder="Class" class="left">
		<input type="text" title="Alignment" Name="alignment" placeholder="Alignment" class="right">

		<br /><br />

		<input type="text" title="Level" Name="level" placeholder="Level" class="left">
		<input type="text" title="Starting Location" Name="location" placeholder="Starting Location" class="right">

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

		<br /><br /><br />

		<input type="submit" value="Submit" style="width: 500px;">

	</form>
</div>
