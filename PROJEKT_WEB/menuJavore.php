<html><head>
<body>
<?php 
include_once 'includes/init/init.php';
include_once 'jquery_js.php';
mbro_faqet();
mbro_admin();
//nqs perdoruesit duan ta axesojn por nuk jn admin =>i ridrejtojm
//tek faqja kryesore
include 'includes/head.php'; 
include 'includes/headerAdmin.php'; 
include 'includes/aside.php';
echo '<br></br>';
echo '<br></br>';

include_once 'includes/init/init.php';
include 'jquery_js.php';
mbro_faqet();
mbro_admin();
//nqs perdoruesit duan ta axesojn por nuk jn admin =>i ridrejtojm
//tek faqja kryesore
include_once 'includes/head.php'; 
//include_once 'includes/headerAdmin.php'; 
//include_once 'includes/aside.php';?>
<?php

if(isset($_GET['menu1'])&&!empty($_GET['menu']))
{
	if(count($_GET['menu'])<4)
	{
		echo '<center><h1>Minimumi duhen 4 produkte ! </h1></center>';
		
	}
	else if(count($_GET['menu'])>7){
		echo '<center><h1>Menu nuk mund te permbaje me shume se 7 produkte </h1></center>';
	
	}else{
		$v = date("Y-m-d");
	foreach($_GET['menu'] as $l)
{ 
	  mysql_query("INSERT INTO `menu_javore` VALUES((SELECT id FROM produkte WHERE emri = '$l'),'Javore','$v') ");
	  array_push($menu,$l);
}
echo '<br><br><center><h1>Menuja u krijua me sukses !</h1></center>'; //sepse aty lart nk del !!???
	exit();
	}
	
}else if(isset($_GET['menu1'])&&empty($_GET['menu']))
{
	echo 'FUT PRODUKT!'; //sepse aty lart nk del !!???
	exit();
}
?>
<body> 
<center><form action="menuJavore.php" method="get" >
<fieldset  style="width: 340;"> <legend><h1>Krijo Menu Javore !</h1></legend>
<?php
$query_data= mysql_query("SELECT MAX(data) as d FROM menu_javore");
$row = mysql_fetch_array($query_data);

echo 'Menuja e fundit eshte krijuar me : '.$row['d'];

$query = mysql_query("SELECT * FROM `produkte` WHERE sasia > 0");

echo '<br><br><table style="">';

  if(mysql_num_rows($query)>0)
{
while($k =mysql_fetch_assoc($query))
{
	echo '<tr><td><input type="checkbox" value="'.$k['emri'].'" name="menu[]" >'.$k['emri'].'</td></tr>';
} echo '</table>';
}
else{
	echo '<option>NUK KA ASNJE PRODUKT !</option>';
}
?>
<input type="submit" id="buton_menu" value="Krijo" name="menu1">
</select>
</fieldset><br><br>

</form>
</center>
</body>
