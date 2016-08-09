<?php
include_once 'includes/init/init.php';
include 'jquery_js.php';
include 'includes/HEADERS/headerTOTAL.php'; 

$q  = mysql_query("SELECT* FROM `produkte` WHERE `kalori` < 300 AND (`kategoria` IN ('pasta','Te tjera') )AND `sasia` >0");

echo '<div><h2>Me poshte po listojme disa nga prodkutet tona me te shendetshme </h2></div>';

echo '<table cellspacing="10">';
if(mysql_num_rows($q)>0)
{echo '<th>Produkti</th>';
echo '<th>Kalorite</th>';
	while($r = mysql_fetch_array($q))
	{
		echo '<tr><th>'.$r['emri'].'</th>';
		echo '<td>'.$r['kalori'].' k.</td></tr>';
	}
}
echo '</table>';

include 'includes/HEADERS/footerTOTAL.php';
?>