<?php  
//include_once 'includes/init/init.php';
require 'jquery_js.php';
require 'connect.inc.php';
?>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
<nav id="nav" > 
<ul >
<li ><a href="Artigiano.php">Restaurant and Coffee</a></li>
<li style="color: #f08080;
opacity: 1; text-weight: bold"><a href="porositOnline.php" >Porosit Online</a></li>
<li><a href="rrethNesh.php">Rreth Nesh</a></li>
<li><a href="rezervo.php">Rezervo Tavoline</a></li>
<li><a href="foodNutrition.php">Food Nutrition</a></li>
<li style="padding-right: 80px;"><a href="kontakt.php">Na kontaktoni</a></li>
</ul> 
</nav>

<div id="search">
	<form action="search_kejsi.php" method="post">
        Kerko: <input type="text" id="name" name="emri" size="15">
		<input type="submit" id="name-submit" value=">>">
	</form>
</div>
	
<div id="footer">
</div>
</html>

