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
	width: 500px;
}

textarea {
	resize: none;
	width: 500px;
	height: 250px;
}

</style>

<p> Create Quest </p>

<div class="menu">
	<form action="createdQuest.php" method="get">
		<input type="text" title="Quest Title" Name="Name" placeholder="Quest Title" style="width: 500px;">

		<br /><br />

		<textarea name="description" title="Quest Description" placeholder="Quest Description"></textarea>

		<br /><br /><br />

		<input type="submit" value="Submit">
	</form>
</div>
