
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

echo "<p> DnD Manager </p>";

echo "<div class=\"menu\">";

echo "<form action=\"mainView.php\" method=\"get\">
        <input type=\"submit\" value=\"View Data\" style=\"width: 300px;\">
	  </form>";

echo "<br/>";

echo "<form action=\"defaultMenu.php\" method=\"get\">
		  <input type=\"submit\" value=\"Create Data\" style=\"width: 300px;\">
	  </form>";

echo "</div>";

?>
