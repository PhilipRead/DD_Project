
<style type="text/css">

body {
	background-color: black;
}

.worldInfoBox, .statsBox, .controlBox, .inventoryBox, .choiceBox {
	resize: none;
	background-color: black;
	color: yellow;
	border: 2px solid red;
}

.worldInfoBox, .inventoryBox {
	height: 69%;
}

.worldInfoBox {
	width: 70%;
}

.inventoryBox {
	width: 30%;
}

.controlBox, .statsBox {
	height: 29%;
	width: 50%;
}

.choiceBox {
	height: 2%;
	width: 100%;
}

</style>


<textarea readonly disabled class="worldInfoBox" style="resize:none">Welcome to DnD Simulator!
Test
</textarea><textarea readonly disabled class="inventoryBox" style="resize:none">Inventory
</textarea>

<textarea readonly disabled class="controlBox" style="resize:none">Control
</textarea><textarea readonly disabled class="statsBox" style="resize:none">Stats</textarea>

<textarea class="choiceBox" style="resize:none">Choice</textarea>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">

$("textarea").keyup(function(e){
		window.alert("Test");
});

</script>

<?php

?>
