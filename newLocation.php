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

<p> Create Location </p>

<div class="menu">
	<form action="createdLocation.php" method="get">
		<input type="text" title="Name" Name="name" placeholder="Name" style="width: 500px;">

		<br /><br />

		<input type="text" title="X Coordinate" Name="xCoord" placeholder="X Coordinate" class="left">
		<input type="text" title="Y Coordinate" Name="yCoord" placeholder="Y Coordinate" class="right">

		<br /><br />

		<input type="text" title="Type" Name="type" placeholder="Type" style="width: 225px; margin-right: 275px;">

		<br /><br /><br />

		<input type="submit" value="Submit">
	</form>
</div>
