
<?php //jo per vizitoret qe nuk jn t loguar !

include 'includes/init/init.php';
mbro_faqet();
if(!admini($vizitor_te_dhena['id']))
{
include 'includes/HEADERS/headerTOTAL.php'; 
}
else{
	include "admin.php";
}include 'jquery_js.php';?>
<?php
if(!empty($_POST))
 {
	 $required_fields = array('passwordi_vjeter','passwordi_ri','passwordi_ri2');
	foreach($_POST as $l=>$value)
	{
		if(empty($value) && in_array($l, $required_fields))
		{
			$errors[] = 'Ju lutemi plotesoni te gjithe fushat me yll';
			break 1; //del nga cikli
		}
	}
	if(md5($_POST['passwordi_vjeter'])==$vizitor_te_dhena['password'] )
	{ //kur sigurohemi se ky pass ekziston =>kontrrolllojm a i plotson kushtet pass ri
		if(trim($_POST['passwordi_ri']) !==trim($_POST['passwordi_ri2']))
		{
			$errors[] = 'Passwordet nuk perputhen ';
		}else{
			if(strlen($_POST['passwordi_ri'])<7)
		{
			$errors[] = 'Passwordi nuk eshte i sigurte, te pakten 7 karaktere';
		}
		if(strlen($_POST['passwordi_ri'])>30)
		{
			$errors[] = 'Passwordi shume i gjate. Lejohen deri ne 10 karaktere';
		}
		if(md5($_POST['passwordi_ri'])==$vizitor_te_dhena['password'])
		{
			$errors[]="Ky nuk eshte nje password i ri ";
		}
		}
	}else if(!empty($_POST['passwordi_vjeter'])){
		$errors[]= 'Passwordi juaj aktual eshte i gabuar';
	}

 }
 ?>
 <h1>Ndrysho Passwordin</h1>
<?php
if(isset($_GET['ndryshoi']))//ne men qe perdorusit mos ti dale perseri forma
{
	echo 'Passwordi u ndryshua me sukses !';
}
else//shkon deri ne fund te formes 
{
	
if(!empty($_POST)&&empty($errors)) //nqs tjgitha jane ne rregull pra ska errore dhe esht postuar
//ath dht te ndryshojm pass
{
	ndrysho_password($session_user_id , $_POST['passwordi_ri']);
	header('Location: ndryshopassword.php?ndryshoi');
}

else if(!empty($errors)){
	echo output_errors($errors);
}
?>
<form action="ndryshopassword.php" method="POST" name ="forma">
 <table>
    
 <tr><th><label for="password"> Passwordi aktual *: </label></th>
 <td><input type = "password" name="passwordi_vjeter" /></td>
 </tr>
 
 <tr><th><label for="password">Passwordi ri *:</label></th>
 <td><input type = "password" name="passwordi_ri"/></td>
 </tr>
 
 <tr><th><label for="password">Passwordi ri perseri *:</label></th>
 <td><input type = "password" name="passwordi_ri2"/></td>
 </tr>
 <tr></tr>
<tr ><th align="center"><input type="submit" value="Ndrysho" name = "regj"/></th></tr>
 </table>
 
 </form>
<?php
}
include 'includes/HEADERS/footerTOTAL.php';
?>
