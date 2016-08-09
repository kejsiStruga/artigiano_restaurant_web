<?php 
ob_start();
include 'includes/init/init.php';
include 'includes/HEADERS/headerTOTAL.php'; 
include 'jquery_js.php';
global $username;
if(!isset($_SESSION['id']))
{
	header("Location: Artigiano.php");
	exit();
}
if(admini($vizitor_te_dhena['username']))
{
	header("Location: admin.php");
	exit();
}

else
{
	if(isset($_GET['username']) && !empty($_GET['username']))
	{$username = $_GET['username']; //ht exes file 	
	}
			if(ekziston($username))//konrtrrollojm a ekz
			{
				$user_id= user_id_from_username($username);
				$te_dhena_profil = Vizitor_te_Dhena($user_id,'username','emri','mbiemri','email','shporta');

			   $q = mysql_query("SELECT* FROM rezervime R, vizitor V  WHERE R.emri=V.username AND V.username = '".$te_dhena_profil['username']."'");
				//trigger_error(mysql_error()." ".$q);
				if(mysql_num_rows($q)>0)
				{
			   echo '<div id="rez"><dl><dt><b> Rezervimet me status Pritje</b></dt><br>';		
						while($r = mysql_fetch_array($q))
							{
							echo '<dd>'.$r['data'].'&nbsp , ';
							echo $r['tavolina'].'</dd>';
							echo '<br>';
							}
				
			echo '</dl></div>';
				}

				//porosit 
			/*	 $d = mysql_query("SELECT PR.emri, P.sasia 
									FROM porosite P, vizitor V, produkte PR 
									WHERE P.vizitor_id=V.id AND PR.id=P.produkt_id AND P.aprovuar=0 AND V.username = '".$te_dhena_profil['username']."'");
				//trigger_error(mysql_error()." ".$q);
			   echo '<div id="rez"><dl><dt><b> Porosite e me status Pritje</b></dt><br>';		
						while($r = mysql_fetch_array($d))
							{
							echo '<dd>Produkti: '.$r['emri'].'</br>
							  Sasia:'.$r['sasia'].'</dd>';
							echo '<br>';
							}
				echo '</dl></div>';
			*/	
			}	

			else{
					echo 'Na vjen keq por ky vizitor nuk ekziston ';
				}
}

include 'includes/HEADERS/footerTOTAL.php';
?>