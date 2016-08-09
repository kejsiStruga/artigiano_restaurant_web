<?php
include 'funksione/produkte.php';
$connect_error="Na falni, po kalojme nje problem ";
$mysql_host = "localhost"; //host name aty ku esh mbajtur db 
$mysql_user = "root";
$mysql_password = NULL;
$mysql_database ="projekt web";
//$db = mysql_connect($mysql_hostname, $mysql_username, $mysql_password);
if(!mysql_connect($mysql_host,$mysql_user,  $mysql_password) || !mysql_select_db($mysql_database))
 die($connect_error);
?>
<?php
header("Content-Type: text/xml");
echo '<?xml version="1.0" encoding="utf-8" standalone="yes"?>';
echo '<response>';
$food = $_GET['food'];
$query = mysql_query("SELECT* FROM produkte");

if(mysql_num_rows($query)>0)
{
	while($foodArray=mysql_fetch_assoc($query))
	{if($foodArray['emri']==$food)
       {
	        echo produkt_te_dhena($food);
        }
        else if($food==" ")
       {
	echo "Kerko nje Produkt! ";
    }
else{
	echo "Jo nuk kemi !";
	}
}

}else{
	echo 'Ne katalog nuk ka ushqime !';
}
echo '</response>';
?>