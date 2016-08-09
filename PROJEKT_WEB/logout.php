<?php
	session_start(); //para se ta shkatrrojm sesionin dht q ta nisim
	$_SESSION = array(); 
	session_destroy();
	header('Location: Artigiano.php');//e ridrejtojme userin tek faqja kryesore !
	
?>