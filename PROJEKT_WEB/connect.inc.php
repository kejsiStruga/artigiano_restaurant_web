<?php
//kte do e bjm include kudo ku do na duhet DB! 
$connect_error="Na falni, po kalojme nje problem ";
$mysql_host = "localhost"; //host name aty ku esh mbajtur db 
$mysql_user = "root";
$mysql_password = NULL;
$mysql_database ="projekt web";
if(!mysql_connect($mysql_host,$mysql_user,  $mysql_password) || !mysql_select_db($mysql_database))
	
 die($connect_error);

?>