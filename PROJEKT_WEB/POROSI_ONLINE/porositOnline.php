<?php 
include_once 'includes/init/init.php';
mbro_faqet();
include_once 'includes/HEADERS/headerTOTAL.php'; 
include_once 'jquery_js.php';

foreach (glob("POROSIT_ONLINE/*.php") as $filename)
{
    include $filename;
}
if(admini($session_user_id)===true)
{
	header('Location: admin.php');
}?>


<h1>Zgjidh nje nga kategorite me poshte dhe Porosit !</h1>
<br>
<br>
<div class="produkte">
<div id = "katmenu" style="padding-left:450px">
<br>
<form action="porositOnline.php" method="POST">
<select id="seli" style="width:180px" name="kategori">

<option>Kerko sipas kategorive</option>
<option><a href="embelsira.php">Embelsira</option>
<option><a href="pasta.php">Pasta te Fresketa</option>
<option><a href="pizza.php">Pizza</option>
<option><a href="pije.php">Pije</option>
<option><a href="te_tjera.php">Te Tjera</option>
</select> 
<input type ="submit" id="button" class="MyButton" value=">>">
</form>
<br>
<form action="porositOnline.php" method="POST">
<select id="seli" style="width: 180px" name="cmim">
<option>Rendit sipas cmimit</option>
<option><a href="" >Rend Rrites</option>
<option><a href="" >Rend Zbrites</option>
</select> 
<input type ="submit" id="button" class="MyButton" value=">>">
</form>
</div>
<?php
echo '<div id="ponline">';
if(isset($_POST['kategori'])&&!empty($_POST['kategori']))
{
	$kat = strtolower($_POST['kategori']);
  if($kat === "pasta te fresketa")
  {
	 $query =  mysql_query("SELECT `emri`, `cmimi`, `pershkrime`, `foto` FROM `produkte` WHERE `kategoria` = 'pasta'"); 
  }else {
	$query =  mysql_query("SELECT `emri`, `cmimi`, `pershkrime`, `foto` FROM `produkte` WHERE `kategoria` = '$kat'");
  }
  if(mysql_num_rows($query)>0)
  {
	  upload_produkt($query);
  }
  else{
	  echo 'Na vjen keq, kjo kategori eshte bosh ';
  }
}
else if(isset($_POST['cmim'])&&!empty($_POST['cmim']))
{   $rend = ($_POST['cmim']);
  if($rend == "Rend Zbrites")
  {  $query =  mysql_query("SELECT `emri`, `cmimi`, `pershkrime`, `foto` FROM `produkte` ORDER BY `cmimi` DESC");
	upload_produkt($query);
  }
  else if($rend == "Rend Rrites") {
$query =  mysql_query("SELECT `emri`, `cmimi`, `pershkrime`, `foto` FROM `produkte` ORDER BY `cmimi` ASC"); 
	upload_produkt($query);
  }  
}else {
$query = mysql_query("SELECT emri, cmimi, pershkrime,id, foto FROM produkte ORDER BY `emri` DESC ");
//upload_produkt($query);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Display site links
	echo "<p>
		<a href='./index.php'>Artigiano</a></p>";
	
	echo "<h3>Porosi Online</h3>";

	echo "<table style='width:500px;' cellspacing='0'>";
	echo "<tr>
		<th style='border-bottom:1px solid #000000;'>Foto</th>
		<th style='border-bottom:1px solid #000000;'>Emri</th>
		<th style='border-bottom:1px solid #000000;'>Produkti</th>
		<th style='border-bottom:1px solid #000000;'>Kategoria</th>
	</tr>";


	// Loop to display all products
	foreach($products as $id => $product) {
		echo "<tr>	
<td style='border-bottom:1px solid #000000;'><img width='150px' height='150px'src='" . $product['foto'] . "'</td>
			<td style='border-bottom:1px solid #000000;'><a href='./index.php?view_product=$id'>" . ucfirst($product['name']) . "</a></td>
			<td style='border-bottom:1px solid #000000;'>" . $product['price'] . " lek</td> 
			<td style='border-bottom:1px solid #000000;'>" . $product['category'] . "</td>
		</tr>";
	}
	echo "</table>";
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<br></br>
<?php
echo '</div>';
include 'includes/HEADERS/footerTOTAL.php';
?>