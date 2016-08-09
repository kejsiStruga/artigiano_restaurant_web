<?php
session_start();
//error_reporting(0);
require 'connect.inc.php';
require 'includes/funksione/general.php';
require 'includes/funksione/vizitor.php';
require 'includes/funksione/produkte.php';
$errors = array(); //var qe do aksesohet nga cdo faqe
$menu = array();
global	$session_user_id;
if(vizitor_i_loguar())
{
	//$_SESSION['id'] = $login;//sepse login kthen id e vizitorit ! tek logaside(login) kur perdorusi arrin te logohet
$session_user_id=$_SESSION['id'];
	//$vizitor_te_dhena eshte array associative';
$vizitor_te_dhena = Vizitor_te_Dhena($session_user_id,'id','emri','mbiemri','username','email','password','tipi','profili');

		//nqs do shtojme nje atribut ne tabelen e vizitorit ath 
		//ate ja afishojm xdoruesit nepermjet ktij funx, duke e 
		//SHTUAR SI PARAMETER TE ARRAY $Vizitor_te_Dhena ;PRA TEK FUNX LART 

/*TI BEJM DISABLE NJE PERDORUESI! NQS GJENDJA E TIJ NGA ACTIVE BEHET JO ACTIVE (psh si vendim i 
adimit) ath DHT QE TA PERJASHTOJM NGA CDO FAQE !*/		
		if(!vizitor_aktiv($vizitor_te_dhena['username'])) //nqs esh aktiv
		{
			session_destroy();
			header('Location: Artigiano.php');
		}		
}
?>
<link rel="shortcut icon" href="http://localhost/PROJEKT_WEB/favicon.ico">
