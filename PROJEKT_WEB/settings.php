<?php //jo per vizitoret qe nuk jn t loguar !
include 'includes/init/init.php';
mbro_faqet();
if(!admini($vizitor_te_dhena['id']))
{
include 'includes/HEADERS/headerTOTAL.php'; 
}
else{
	include "admin.php";
} 
include 'jquery_js.php';?>
<?php 
if(!empty($_POST))
 {
	 $required_fields = array('email');
	foreach($_POST as $l=>$value)
	{
		if(empty($value) && in_array($l, $required_fields))
		{
			$errors[] = 'Ju lutemi plotesoni email-in e ri ';
			break 1; //del nga cikli
		}
	}
	if(empty($errors))
	{
		if (isset($_POST['emri'])&&(!preg_match("/^[a-zA-Z ]*$/",$_POST['emri']))) {
       $errors[] = "Lejohen vetem hapesira dhe karaktere per emrin"; 
     }else{
		 $reg_data1['emri']=$_POST['emri'];
		 $reg['emri']=$reg_data1['emri'];
	 }
	 if (isset($_POST['mbiemri'])&&(!preg_match("/^[a-zA-Z ]*$/",$_POST['mbiemri']))) {
       $errors[] = "Lejohen vetem hapesira dhe karaktere per mbiemrin"; 
     }else{
		 $reg_data1['emri']=$_POST['emri'];
		 $reg['emri']=$reg_data1['emri'];
	     }
		if(ekziston_email($_POST['email']) && $_POST['email']!= $vizitor_te_dhena['email'])
	   	 {
			$errors[] = "Na vjen keq por \"".$_POST['email']."\" ekziston tashme"; 
		 }
		 else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
			$errors[] = 'Fusni nje email te sakte';
		}
		if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $_POST['nr_kontakti']))
			{
				$errors[] = 'Numri i kontaktit nuk eshte i sakte</br>';
			}else{
				$reg_data1['nr_kontakti']=$_POST['nr_kontakti'];
			}
	
    }
 }
?>
<h1>Settings</h1> <!--useri te mund te ndryshoi emrin apo email-in-->
<h2>Ndryshoni te dhenat tuaja</h2>
<?php
if(isset($_GET['ndryshoi']))//ne men qe perdorusit mos ti dale perseri forma
{
	echo 'Te dhenat u ndryshuan me sukses !';
}
else//shkon deri ne fund te formes 
{
if(!empty($_POST)&&empty($errors)) //nqs tjgitha jane ne rregull pra ska errore dhe esht postuar
//ath dht te ndryshojm pass
{
	$ndrysho_te_dhena= array(
	'emri' => filter_var($_POST['emri'],FILTER_SANITIZE_STRING),
	'mbiemri' => filter_var($_POST['mbiemri'],FILTER_SANITIZE_STRING),
	'email' => $_POST['email'],
	'nr_kontakti'=>$_POST['nr_kontakti']);
	ndrysho_te_dhena($session_user_id,$ndrysho_te_dhena); //$session_user_id ndodhet tek init !! var global merr id 
	//sepse kur logohet var celsi id i var t sesionit merr vleren e user_id qe meret nga db !
	header('Location: settings.php?ndryshoi');
	exit();
}

else if(!empty($errors)){
	echo output_errors($errors);
}
?>
<form action="settings.php" method="POST" >
 <table>
    
 <tr><th><label for="emri"> Emri: </label></th>
 <td><input type = "text" name="emri" value="<?php echo $vizitor_te_dhena['emri']; ?>" /></td>
 </tr>
 
 <tr><th><label for="mbiemri">Mbiemri:</label></th>
 <td><input type = "text" name="mbiemri" value="<?php echo $vizitor_te_dhena['mbiemri']; ?>"/></td>
 </tr>

 <tr><th><label for="email">E-mail*:</label></th>
 <td><input type = "text" name="email" value="<?php echo $vizitor_te_dhena['email']; ?>"/></td>
 </tr>
  <tr><th><label for="nr_kontakti">Nr_kontakti*:</label></th>
 <td><input type = "tel" pattern ="[0-9]{10}" maxlength="10"  name="nr_kontakti" value="<?php echo '0'.$vizitor_te_dhena['nr_kontakti']; ?>"/></td>
 </tr>
 
<tr><th><input type="submit" value="Ndrysho" name = "regj"/></th></tr>
 </table>
 
 </form>

<?php
}
include 'includes/HEADERS/footerTOTAL.php';
?>
