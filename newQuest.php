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
		<textarea name="description"></textarea>

		<br /><br /><br />

		<input type="submit" value="Submit">
	</form>
</div>
