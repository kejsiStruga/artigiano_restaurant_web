<?php
include 'includes/init/init.php';
logged_in_drejto();
	if(!empty($_POST["login"]))
{
	$username = $_POST['username'];
	$password= $_POST['password'];
	
	if(empty($username)||empty($password))
	{		
		$errors[] = "Ploteso password-in dhe username";
	}
	else if(!ekziston($username))
	{
		$errors[]="Ky username nuk gjendet. Provoni te regjistroheni";
	}
	else{
		$login = login($username, $password); //ktu behet logimi dhe i referohet funx login() tek vizitor.php
		if($login===false)
		{
			$errors[] = "Password-i ose username-i eshte i gabuar ";
		}
		else{ //VENDOSJA E SESIONIT TE PERDORUESIT !!!
		//PASI PERSONI ESH LOGUAR ME SUKSES E RIDREJTOJM TEK FAQJA KRYESORE !
			$_SESSION['id'] = $login;//sepse login kthen id e vizitorit ! 
			header('Location: Artigiano.php'); //ridrejtohet  n faqen kryesore !
			exit();

		}
    }	
}
else{
	$errors[] = 'Ridrejtohu';//ose ridrejtoji me 1 funksion header();
}
include 'includes/HEADERS/headerTOTAL.PHP';
if(!empty($errors)){
	?>
<h2>Provuam t'ju logonim por:</h2>
<?php echo output_errors($errors);
}
include 'includes/HEADERS/footerTOTAL.PHP';
?>