<?php
include 'includes/init/init.php';
mbro_faqet();
if(admini($session_user_id)===true)
{
	header('Location: admin.php');
}
include 'includes/HEADERS/headerTOTAL.php'; 
include 'connect.inc.php'; 
require 'jquery_js.php'; ?>	
<h1 style="font-weight: bold;">Kryej Pagesen</h1>
<form action="post">
		<table class ="shporta">
		<tr><td>Adresa*: </td></tr>
		<tr><td><input type="text" name="adresa" placeholder="Adresa e Rruges"  required /></td></tr>
		<tr><td><input type="text" name="apartamenti" placeholder="Apartamenti"  required /></td></tr>
		<tr><td>Numri Kartes*:</td></tr>
		<tr><td><input type="text" name="karta" placeholder="xxxx-xxxx-xxxx-xxxx"  required /></td></tr>
		
		<tr><td style="visibility: hidden; ">BOSH </td></tr>
		<tr style="font-weight: bold;"><td style = "color: black; font-weight:bold">Porosia juaj</td></tr>
		</table>
	<?php
		upload_porosi($vizitor_te_dhena['id']);
		echo '<input class = "button" type="submit" name="dergo_porosi" value="Dergo"><br>';
		
	ECHO '</form>';
?>	<script>
			// alert("jrkjkjkjk");
			 document.getElementById("buton2").style.display = "none";
		</script>';
<?php		
if(isset($_POST['dergo_porosi']))
{
	echo 'POOOOOOOOOOO';
}