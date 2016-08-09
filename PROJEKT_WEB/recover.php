<?php 
include 'includes/init/init.php';
logged_in_drejto(); //te sigurohemi q sjan t loguar
include 'includes/HEADERS/headerTOTAL.php'; 
?>
<h1>Rregullo</h1>
<?php
if(isset($_GET['ndryshoi'])&& empty($_GET['ndryshoi']))
{
	?>
	<p>Faleminderit, kontrrollo email-in</p>
	<?php
}else{
//username or password recovery
$lejo = array('username','password');
if(isset($_GET['mode'])&&in_array($_GET['mode'],$lejo))
{
	if(isset($_POST['email'])&& !empty($_POST['email']))
	{
		if(ekziston_email($_POST['email']))
		{
			recover($_GET['mode'],$_POST['email']);
			header('Location: recover.php?ndryshoi');
			exit();
		}
		else{
		echo '<p>Kjo adrese email nuk gjendet</p>';
	}
	}
	?>
	<form action="" method="post">
	<table>
	<tr><td>Fut E-mail:</td></tr>
	<tr><td><input type="text" name="email"></td></tr>
	<tr><td><input type="submit" name="submit" value="Rregullo"></td></tr>
	</table>
	</form>
<?php	
}
else{
	header('Location: Artigiano.php');
	exit();
}}
?>
<?php

include 'includes/HEADERS/footerTOTAL.php';
?>