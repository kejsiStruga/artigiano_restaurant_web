<html><head>
<body>
<?php 
include_once 'includes/init/init.php';
include_once 'jquery_js.php';
mbro_faqet();
mbro_admin();
/*nqs perdoruesit duan ta axesojn por nuk jn admin =>i ridrejtojm
tek faqja kryesore
*/include 'includes/head.php'; 
include 'includes/headerAdmin.php'; 
include 'includes/aside.php';
echo '<br></br>';
echo '<br></br>';
?>

<body>
<center><form action="listoProdukte1.php">
<fieldset  style="width: 340px;height: 60px"> <legend><h1>Listo Produktet</h1></legend>
<br><br>
<select name="q" style="width: 250px" onchange="listoProd(this.value)">
<?php $query = mysql_query("SELECT * FROM `produkte` ");	
echo '<option><b style="align: center">Zgjidh nje produkt</b></option>';
  if(mysql_num_rows($query)>0)
{
while($k =mysql_fetch_assoc($query))
{   
	echo '<option>'.$k['emri'].'</option>';
} 
}
else{
	echo '<option>Asnje vizitor me llogari !</option>';
}?>
  </select>
  </fieldset>
</form>
</center>
<br><br><br><br>
<div id="produkti">

</div>

</body>
