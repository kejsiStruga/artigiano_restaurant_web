<?php 
include_once 'includes/init/init.php';
logged_in_drejto(); //nqs perdorusi esh loguar por do ta aksesoj prp faqen (permes urls) nuk e lejojme 
include 'includes/HEADERS/headerTOTAL.php'; 
$reg_data1 = array('emri'=>'','mbiemri'=>'','username'=>'','email'=>'','password'=>'','nr_kontakti'=>'',
					'adresa_rruga'=>'','adresa_apartamenti'=>'','adresa_shkalla'=>''); 
$reg = array('emri'=>'','mbiemri'=>'','username'=>'','email'=>'','nr_kontakti'=>'',
			'adresa_rruga'=>'','adresa_apartamenti'=>'','adresa_shkalla'=>'');

 if(!empty($_POST))
 {   //fillojm kontrrollet 1. a ekziton nje user me kete username??
		if (isset($_POST['emri'])&&(!preg_match("/^[a-zA-Z ]*$/",$_POST['emri']))) {
       $errors[] = "Lejohen vetem hapesira dhe karaktere per emrin"; 
     }else{
		 $reg_data1['emri']=$_POST['emri'];
		 $reg['emri']=$reg_data1['emri'];
	 }
	 if (isset($_POST['mbiemri'])&&(!preg_match("/^[a-zA-Z ]*$/",$_POST['mbiemri']))) {
       $errors[] = "Lejohen vetem hapesira dhe karaktere per mbiemrin"; 
     }else{
		 $reg_data1['mbiemri']=$_POST['mbiemri'];
		 $reg['mbiemri']=$reg_data1['mbiemri'];
	 }
		if(isset($_POST['username']))
		{
			if(ekziston($_POST['username']))
			{$errors[] = 'Ky username eshte i zene';  }
		
		if(preg_match("/\\s/",$_POST['username']))
		{
			$errors[] = "Username-i nuk duhet te permbaje hapesira";
		}
		
		else{
			$reg_data1['username'] = $_POST['username'];
			$reg['username'] = $_POST['username'];
		}}
		if(isset($_POST['pass1'])&&!empty($_POST['pass1']))
		{
		if(strlen($_POST['pass1'])<7)
		{
			$errors[] = 'Passwordi nuk eshte i sigurte, te pakten 7 karaktere';
		}
		else if(isset($_POST['pass2'])&&($_POST['pass1']!=$_POST['pass2']))
		{
			$errors[] = "Passwordet nuk perputhen !";
		}
		}
		if(isset($_POST['email'])&&!empty($_POST['email']))
		{
		      if ((!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))
		                 {
		          	$errors[] = 'Email nuk eshte i sakte';
		            }
	                 else if(ekziston_email($_POST['email']))
		              {
			                $errors[] = 'Ky email eshte tashme i zene.'.'</br>'.'Kerkohet nje email tjeter';
		        }
				else{
			$reg_data1['email']=$_POST['email'];
			$reg['email']=$_POST['email'];
		}
		}
		if(!preg_match("/^[0-9]{10}$/", $_POST['nr_kontakti']))
			{
				$errors[] = 'Numri i kontaktit duhet te permbaje deri ne 9 vlera numerike</br>';
			}else{
				$reg_data1['nr_kontakti']=$_POST['nr_kontakti'];
				$reg['nr_kontakti']=$_POST['nr_kontakti'];
			}

 	$te_detyrueshme = array('username','email','nr_kontakti','pass1','pass2');
	foreach($_POST as $l=>$value)
	{
		if(empty($value) && in_array($l, $te_detyrueshme))
		{
			$errors[] = 'Ju lutemi plotesoni te gjithe fushat me yll';
			break 1; //del nga cikli
		}
	}
 }
?>
<h1>Regjistrohu</h1>
<?php
if(!empty($errors))
{
	echo output_errors($errors);
}
else if(!empty($_POST) && empty($errors))
{ //krijojm vizitorin dhe e ridrejtojme ! 
	$reg_data = array(
	'emri'=>sanitize_data($reg_data1['emri']), //  includes/funksione/general.php
	'mbiemri'=>sanitize_data($reg_data1['mbiemri']),
	'username'=>sanitize_data($reg_data1['username']),
	'email'=>sanitize_data($reg_data1['email']),
	'nr_kontakti'=> sanitize_data($reg_data1['nr_kontakti']),
	'password'=>$_POST['pass1'],
	'data_regjistrimit'=> date("Y-m-d")
	); //'+' ben date-in(koha ne ms) append  
	regjistro_vizitor($reg_data);
	echo 'Regjistrimi u krye me sukses. Tani mund te logoheni !';
	exit();
	//'kod_email'=>md5($_POST['username']+microtime()), //kodi emailit qe ja kalojm perdoruesit ! ne men qe te aktivizoj llogarin
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<table class="form">
<tr>
<th><label for="emri" >Emri: </label></th>
        <td><input type="text" name="emri" value="<?php echo $reg['emri'];?>"/>
		
		</td>
		</tr>
<tr>
   <th><label for="mbiemri"> Mbiemri: </label></th>
   <td><input type="text" name="mbiemri" value="<?php echo $reg['mbiemri'];?>"/>
   </td>
   </tr>

<tr>
   <th><label for="username"> Username*: </label></th>
   <td><input type="text" name="username" value="<?php echo $reg['username'];?>"/>
   </td>
   </tr>
   
<tr >
<th><label for="email1"> E-mail*: </label></th>
<td><input type="text" name="email" value="<?php echo $reg['email'];?>"/>
   </td>
   </tr>
   
<tr >
<th><label for="nr_kontakti"> Numer Kontakti*: </label></th>
<td><input type="text"  maxlength="10"  name="nr_kontakti" value="<?php echo $reg['nr_kontakti'];?>"/>
   </td>
   </tr>

   
<tr>
   <th><label for="pass1"> Password*: </label></th>
   <td><input type="password" name="pass1" />
   </td>
   </tr>   
<tr>
   <th><label for="pass2"> Konfirmo Password*: </label></th>
   <td><input type="password" name="pass2"/>
   </td>
   </tr> 
   
   <tr ><th align="center"><input type="submit" value="Regjistrohu" name = "regj"/></th></td>
</table>
</form>

    </div>
<?php
include 'includes/HEADERS/footerTOTAL.php';
?>

