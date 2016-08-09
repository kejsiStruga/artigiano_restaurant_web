<?php
mysql_connect('localhost', 'root', '' ) or die();
mysql_select_db('projekt web');

$q = mysql_query("select * from produkte");

$produkt = array('emri'=>'', 'cmimi'=>'','id'=>'');


while($k = mysql_fetch_array($q))
{
echo '<form method="post" action="code_course.php">';
	echo $k['emri'].'&nbsp ';
	$produkt['emri']=$k['emri'];
	echo $k['id'].'&nbsp ';
	echo '<input type = "hidden" name="f" value =" '.$k['emri']. '"/>';
    echo '<input type="submit" name="buton_porosit" value="Porosit" >'.'<br>';
echo '</form>';
}
//trigger_error(mysql_error()." ".$query);


if(isset($_POST['buton_porosit']))
{
	echo $_POST['f'];
	
}
?>