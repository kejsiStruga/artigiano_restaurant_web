<?php
require ("connect.inc.php");

global $products;
$query = mysql_query("select * from produkte where sasia>0 order by id desc ");
//trigger_error(mysql_error()." ".$query);

$produktet_arr= array ();
	while($r= mysql_fetch_assoc($query))
{ 
	$produktet_arr[$r['id']]['emri_prod']= $r['emri'];
	$produktet_arr[$r['id']]['cmimi_prod']= $r['cmimi'];
	$produktet_arr[$r['id']]['kategoria_prod']= $r['kategoria'];
	$produktet_arr[$r['id']]['pershkrim_prod']= $r['pershkrime'];
	$produktet_arr[$r['id']]['foto']= $r['foto'];										
}

?>
