
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

echo "<p> DnD Simulator </p>";

echo "<div class=\"menu\">";

echo "<form action=\"login.php\" method=\"get\">
		  <input type=\"text\" Name=\"username\" placeholder=\"Username\" style=\"width: 200px;\">
          <input type=\"submit\" value=\"Continue\" style=\"width: 100px;\">
	  </form>";

echo "<br/>";

echo "<form action=\"newCharacter.php\" method=\"get\">
		  <input type=\"submit\" value=\"New Character\" style=\"width: 300px;\">
	  </form>";

echo "</div>";

?>
