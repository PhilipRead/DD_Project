
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
	width: 125px;
}

</style>

<?php

echo "<p> Create Account </p>";

echo "<div class=\"menu\">";

echo "<form action=\"newCharacter.php\" method=\"get\">
		  <input type=\"text\" Name=\"username\" placeholder=\"Username\" style=\"width: 200px;\">
        <input type=\"submit\" value=\"Create\" style=\"width: 100px;\">
	  </form>";

echo "</div>";

?>
