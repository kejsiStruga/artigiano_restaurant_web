<?php 

include_once 'includes/init/init.php';
mbro_faqet();
include_once 'includes/HEADERS/headerTOTAL.php'; 
include_once 'jquery_js.php';
require 'products.php';
if(admini($session_user_id)===true)
{
	header('Location: admin.php');
}
?>
<?php	
echo "<h3 style='text-align:center;'><a href='./porositOnline.php?shporta=1'>Shporta Juaj </a></h3>";
//INICIALIZIMI I SHPORTES
if(!isset($_SESSION['shporta'])) {
	$_SESSION['shporta'] = array();
}
// shporta dht t behet bosh => var sesionit = null
if(isset($_GET['shporta_bosh'])) {
	$_SESSION['shporta'] = array();
}

// **VALIDIMI TE DHENAVE**

$mesg = '';

// SHTO PRODUKT N SHPORT PASI KLIKOHET BUTONI
if(isset($_POST['shto_ne_shport'])) {
	$prod_id = $_POST['prod_id'];

	// NQS KY PRODUKT EKZISTON N SHPORTE; USER VTM MUND TA MODIFIKOJE
	if(isset($_SESSION['shporta'][$prod_id])) {
		$mesg = "<p style='color:black;'>Ky produkt eshte ne shporte!</p><br />";
	}
	// NE TE KUNDERT; SHTOHET N SHPORT
	else {
		$_SESSION['shporta'][$prod_id]['prod_id'] = $prod_id;
		$_SESSION['shporta'][$prod_id]['sasi'] = $_POST['sasi'];
		$mesg = "<p style='color:black;'>U shtua ne shporte!</p>";
	}
}
// UPDATE SHPORTA
if(isset($_POST['modifiko_shport'])) {
	$sasia = $_POST['vr'];
	$id_mod = $_POST['id_modifikim'];
	foreach($sasia as $id => $s) {
		if(!isset($produktet_arr[$id])) {
			$mesg = "<p style='color:black;'>Produkt i pavlefshem!</p>";
			break;
		}
		/*echo $s.'<br>';
		if($sasia==0)
		{  unset($_SESSION['shporta'][$id][$id_mod]); }
	else{*/
		$_SESSION['shporta'][$id]['sasi'] = $s;
	
	}
	if(!$mesg) {
		$mesg = "<p style='color:black;'>Shporta u modifikua !</p><br />";
	}
}
// ********SHFAQET FAQJA POROSIT_ONLINE******

echo $mesg;
// shfaq produktin mbi te cilin klikoi perdoruesi
if(isset($_GET['produkti'])) {
	$prod_id = $_GET['produkti'];

	if(isset($produktet_arr[$prod_id])) {
		echo "<p>
			<a href='./porositOnline.php'>Artigiano</a> &gt; <a href='./porositOnline.php'>" . 
			$produktet_arr[$prod_id]['kategoria_prod'] . "</a></p>";
		// SHFAQ DETAJET E PRODUKTIT !
		echo "<p>
			<span style='font-weight:bold; color:black;'><img width='150px' height='150px'src='" . $produktet_arr[$prod_id]['foto'] . "'</span><br />
			<span style='font-weight:bold; color:black;'>" . ucfirst($produktet_arr[$prod_id]['emri_prod']) . "</span><br />
			<span style='color:black;'>" . $produktet_arr[$prod_id]['cmimi_prod'] . " lek</span><br />
			<span style='color:black;'>" . $produktet_arr[$prod_id]['pershkrim_prod'] . "</span><br />
			<p>
				<form action='./porositOnline.php?produkti=$prod_id' method='post'>
					<select name='sasi'>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
						<option value='4'>4</option>
						<option value='5'>5</option>
					</select>
					<input type='hidden' name='prod_id' value='$prod_id' />
					<input type='submit' name='shto_ne_shport' value='Shto ne Shporte' />
				</form>
			</p>
		</p>";
	}
	else {
		echo "<p>Produkti nuk eshte i vlefshem !</p>";
	}
}

// SHFAQ SHPORTEN E EPERDORUESIT
else if(isset($_GET['shporta'])) {
	// Display site links
	echo "<p>
		<a href='./porositOnline.php'>Artigiano</a></p>
	<p>
		<a href='./porositOnline.php?shporta_bosh=1'>Boshatis Shporten</a>
	</p>";
	
	if(empty($_SESSION['shporta'])) {
		echo "<p style='color:black;'>Shporta juaj eshte bosh.</p><br />";
	}
	else {
		echo "<form action='./porositOnline.php?shporta=1' method='post'>
		<table style='width:500px;' cellspacing='0'>
				<tr>
					<th style='border-bottom:1px solid #000000; color:black;'>Emri</th>
					<th style='border-bottom:1px solid #000000;color:black;'>Cmimi</th>
					<th style='border-bottom:1px solid #000000; color:black;'>Kategoria</th>
					<th style='border-bottom:1px solid #000000; color:black;'>Sasia</th>
				</tr>";
				foreach($_SESSION['shporta'] as $id => $prod) {
					$prod_id = $prod['prod_id'];
					
					echo "<tr>
						<td style='border-bottom:1px solid #000000;'><a href='./porositOnline.php?produkti=$id'>" . 
							$produktet_arr[$prod_id]['emri_prod'] . "</a></td>
						<td style='border-bottom:1px solid #000000; color:black;'>" . $produktet_arr[$prod_id]['cmimi_prod'] . " lek</td> 
						<td style='border-bottom:1px solid #000000; color:black;'>" . $produktet_arr[$prod_id]['kategoria_prod'] . "</td>
						<td style='border-bottom:1px solid #000000; color:black;'>
						";
						//$prod['sasi'] merret nga sesioni !! sepse nryshon x cdo perdorues 
						//si text field sepse dht t jet e modifikueshme
						//sasi[$prod_id] sepse cdo produkkt ka sasin e vet
					echo "<input type='number' name='vr[$prod_id]' value='" . $prod['sasi'] . "' /></td> 
					      <input type='hidden' name='id_modifikim' value='" . $prod_id  . "' /></td> 
					</tr>";
				}
			echo "</table><br>
			<input type='submit' name='modifiko_shport' value='Modifiko' />
			</form>
			<p>
				<a href='./porositOnline.php?konfirmimi=1'>Konfirmo</a>
			</p>";
		
	}
}

// Konfirmimi
else if(isset($_GET['konfirmimi'])) {
	// Display site links
	echo "<p>
		<a href='./porositOnline.php'>Artigiano</a></p>";
	
	echo "<h3 style='color:black;'>Konifrmimi</h3>";
	
	if(empty($_SESSION['shporta'])) {
		echo "Shporta juaj eshte bosh.<br />";
	}
	else {
		echo "<form action='./porositOnline.php?konfirmimi=1' method='post'>
		<table style='width:500px;' cellspacing='0'>
				<tr>
					<th style='color:black;border-bottom:1px solid #000000;'>Emri</th>
					<th style='color:black;border-bottom:1px solid #000000;'>Cmimi Produktit</th>
					<th style='color:black;border-bottom:1px solid #000000;'>Sasia</th>
					<th style='color:black;border-bottom:1px solid #000000;'>Cmimi</th>
				</tr>";
				
				$total_cmimi_prod = 0;$sasia_produkt=0;
				foreach($_SESSION['shporta'] as $id => $prod) {
					$prod_id = $prod['prod_id'];
					//KONTRROLLLO NQS KA GJENDJE PER SASIN E ZGJEDHUR !!
					$q=mysql_query("select emri, sasia from produkte where id=".$prod_id);
					if(mysql_num_rows($q)>0)
					{
						$k = mysql_fetch_array($q);
					    $sasia_produkt=$k['sasia'];
						$emri = $k['emri'];
					}
					if($sasia_produkt<$prod['sasi'])
					{
						echo '<p style="color:black;">Sasia maksimale per '.$emri.' eshte '.$sasia_produkt.' !';
					}
				
					else{
					$total_cmimi_prod += $produktet_arr[$prod_id]['cmimi_prod'] * $prod['sasi'];
					echo "<tr>
						<td style='border-bottom:1px solid #000000;'><a href='./porositOnline.php?produkti=$id'>" . 
							$produktet_arr[$prod_id]['emri_prod'] . "</a></td>
						<td style='border-bottom:1px solid #000000;color:black;'>" . $produktet_arr[$prod_id]['cmimi_prod'] . " lek</td> 
						<td style='border-bottom:1px solid #000000;color:black;'>" . $prod['sasi'] . "</td>
						<td style='border-bottom:1px solid #000000;color:black;'>" . ($produktet_arr[$prod_id]['cmimi_prod'] * $prod['sasi']) . " lek</td>
					</tr>";
				}
				}
			echo "</table>
			<br><p style='color:black;'>Totali: ".$total_cmimi_prod." lek</p>";	
		echo '
			<a href="./arka.php">Vazhdo Tek Arka</a>
		';
		}
if(isset($_GET['arka']))
{
	header('Location: arka.php');
	
}
}

// Afisho gjith POROSIT_ONLINE
else{
	echo "<p>
		<a href='./porositOnline.php'>Artigiano</a></p>";
	
	
	echo "<table style='width:500px;' cellspacing='0'>";
	echo "<tr>
		<th style='border-bottom:1px solid #000000;'>Foto</th>
		<th style='border-bottom:1px solid #000000;'>Emri</th>
		<th style='border-bottom:1px solid #000000;'>Produkti</th>
		<th style='border-bottom:1px solid #000000;'>Kategoria</th>
	</tr>";

	//AFISHOJM TE GJITHE PRODUKTET NE FAQEN KRYESORE
	foreach($produktet_arr as $id => $prod) {
		echo "<tr>	
<td style='border-bottom:1px solid #000000;'><img width='150px' height='150px'src='" . $prod['foto'] . "'</td>
			<td style='border-bottom:1px solid #000000;'><a href='./porositOnline.php?produkti=$id'>" . ucfirst($prod['emri_prod']) . "</a></td>
			<td style='border-bottom:1px solid #000000; color:black;'>" . $prod['cmimi_prod'] . " lek</td> 
			<td style='border-bottom:1px solid #000000; color:black;'>" . $prod['kategoria_prod'] . "</td>
		</tr>";
	}
	echo "</table>";
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<br></br>
<?php
}
echo '</div>';
include 'includes/HEADERS/footerTOTAL.php';
?>
