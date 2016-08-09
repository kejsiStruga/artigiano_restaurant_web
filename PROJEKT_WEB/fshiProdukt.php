<html>
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
mbro_faqet();
mbro_admin();
//nqs perdoruesit duan ta axesojn por nuk jn admin =>i ridrejtojm
//tek faqja kryesore
include_once 'includes/head.php'; 
//include_once 'includes/headerAdmin.php'; 
//include_once 'includes/aside.php';
?>
<?php
if(numero_produkte()==0)
{
	header('Location: shtoProdukt.php');
	exit();
}
else{
if(!empty($_POST['select']))
{
	$prod = mysql_real_escape_string($_POST['select']);
	$q = mysql_query("DELETE FROM produkte WHERE emri='$prod'") or die(mysql_error());
	//trigger_error(mysql_error()." ".$q);

		echo '<center><b><h1>Produkti u fshi me sukses</h1></b></center> ';	
}else{

echo '<h1>Zgjidh nje nga produktet qe doni te fshini: </h1>
<form action="fshiProdukt.php" method="POST">
<select name="select">';

$query = mysql_query("SELECT * FROM `produkte` ");	
  if(mysql_num_rows($query)>0)
{
while($k =mysql_fetch_assoc($query))
{
	echo '<option>'.$k['emri'].'</option>';
	
} 
echo '</select> <input type="submit" value="Fshi produkt"/>
</form>';
}
}
}
include 'includes/HEADERS/footerTOTAL.php';
?>