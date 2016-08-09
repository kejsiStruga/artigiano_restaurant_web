<?php
//kte do e bjm include kudo ku do na duhet kjo databaze! 
$connect_error="Na falni, po kalojme nje problem ";
$mysql_host = "localhost"; //host name aty ku esh mbajtur db 
$mysql_user = "root";
$mysql_password = NULL;
$mysql_database ="projekt web";
//$db = mysql_connect($mysql_hostname, $mysql_username, $mysql_password);
if(!mysql_connect($mysql_host,$mysql_user,  $mysql_password) || !mysql_select_db($mysql_database))
{	
 die($connect_error);
}


$q = mysql_query("SELECT produkt FROM menu WHERE lloji ='perhershme' ");

//"', $vizitor_te_dhena['profili'], '" 

echo '<ul>';
while($k = mysql_fetch_assoc($q))
{
	foreach($k as $value)
	{
		echo '<li>'.'<a href = "">'.$value.'</a>'.'</li>';
	}
}
echo '</ul>';
?>