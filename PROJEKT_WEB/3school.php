<?php 
ob_start();
include 'includes/init/init.php';
include 'includes/HEADERS/headerTOTAL.php'; 
include 'jquery_js.php';
global $username;
global $flag;
$shkalla = $apartamenti = $rruga = '';
$err_shkalla=$err_apartamenti=$err_rruga='';
if(admini($vizitor_te_dhena['username']))
{
	header("Location: admin.php");
	exit();
}
else{
	if(isset($_POST['konfirmo']))
	{
			if(empty($_POST['adresa_rruga']))
			{
			$err_rruga= 'Rruga eshte e detyrueshme* <br>';
			}else if(is_numeric($_POST['adresa_rruga'])){ $err_rruga="Rruga permban vetem karaktere dhe hapesira"; }
			else{ $rruga = $_POST['adresa_rruga']; }
	
		if(isset($_POST['adresa_apartamenti']))
			{
			if(empty($_POST['adresa_apartamenti']))
			{
				$err_apartamenti='';
			}
			else if(!is_numeric($_POST['adresa_apartamenti']))
			{
			$err_apartamenti='Apartamenti duhet te jete nje numer* <br>';
			}else{ $apartamenti = $_POST['adresa_apartamenti']; }
			}
		
		if(isset($_POST['adresa_shkalla']))
			{
			if(empty($_POST['adresa_shkalla']))
			{
				$err_shkalla='';
			}
		else if(!is_numeric($_POST['adresa_shkalla']))
			{
			$err_shkalla =  'shkalla duhet te jete nje numer*<br> ';
			}else{ $shkalla = $_POST['adresa_shkalla']; }
			}
				if(empty($err_shkalla)&&empty($err_apartamenti)&&empty($err_rruga))
	{
		header('Location: Artigiano.php');
	}
		
	}
	$k = mysql_query("select* from porosite where vizitor_id =".$vizitor_te_dhena['id']." and konfirmuar =0");
	
	if(mysql_num_rows($k)>0)
	{
			$adresa_rruga = mysql_query("select adresa_rruga from adresa where adresa_vizitor_id =".$vizitor_te_dhena['id']);
if ($row = mysql_fetch_array($adresa_rruga))
		{
					$adresa_rruga1 = $row['adresa_rruga'];
		}
$adresa_apartamenti = mysql_query("select adresa_apartamenti from adresa where adresa_vizitor_id =".$vizitor_te_dhena['id']);
if ($row = mysql_fetch_array($adresa_apartamenti))
		{
					$adresa_apartamenti1 = $row['adresa_apartamenti'];
		}
$adresa_shkalla = mysql_query("select adresa_shkalla from adresa where adresa_vizitor_id =".$vizitor_te_dhena['id']);
if ($row = mysql_fetch_array($adresa_shkalla))
		{
					$adresa_shkalla1 = $row['adresa_shkalla'];
		}
		echo 'Ju keni porosi te pakonfirmuara';
	?>
	
	<form action="3school.php" method="post">
<table>
<tr>Adresa: </tr>
<tr><td><input type = "text" placeholder = "Rruga " name="adresa_rruga" value="<?php echo $rruga;?>" ></td><td><?php echo $err_rruga;?></td></tr>
<tr><td><input type = "text"  placeholder = "Apartamenti" name = "adresa_apartamenti" value="<?php echo $apartamenti;?>"></td><td><?php echo $err_apartamenti;?></td></tr>
<tr><td><input type = "text" placeholder = "Shkalla " name="adresa_shkalla" value="<?php echo $shkalla;?>" ></td><td><?php echo $err_shkalla;?></td></tr>
<tr><td><input type="submit" name="konfirmo" value="Konfirmo"  />
<input type="submit" name="kthehu" value="Kthehu tek Shporta"  /></td></tr>
</table></form>
	
	<?php

	
	
	
	
	
	
	
	}else{
		
		
		echo 'Ju  nuk keni asnje porosi te pakonfirmuar !!!!!!!!!!';
		
		
		
	}




























	
}

?>