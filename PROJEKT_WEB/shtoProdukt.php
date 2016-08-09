<html><head>
<body>
<?php 
include_once 'includes/head.php'; 
include_once 'includes/init/init.php';
include_once 'jquery_js.php';
mbro_faqet();
mbro_admin();
//nqs perdoruesit duan ta axesojn por nuk jn admin =>i ridrejtojm
//tek faqja kryesore
include 'includes/head.php'; 
include 'includes/headerAdmin.php'; 
include 'includes/aside.php';
echo '<br></br>';
echo '<br></br>';
$produkt_data1 = array('emri'=>'', 'cmimi'=>'', 'kategoria'=>'', 'kalori'=>'','pershkrime'=>'','foto'=>'','sasia'=>'');
//$reg_data1 = array('emri'=>'','mbiemri'=>'','username'=>'','email'=>'','password'=>'','nr_kontakti'=>''); 
$reg = array('emri'=>'', 'cmimi'=>'', 'kategoria'=>'', 'kalori'=>'','pershkrime'=>'','foto'=>'','sasia'=>''); 
?>
<?php
if(numero_produkte()==0)
{
	echo '<center><b><h1>Ne katalog nuk ka asnje produkt. Fillimisht Shtoni produkte</h1></b></center> ';
}
if(!empty($_POST))
 {
	if(ekziston_produkt($_POST['emri']))
	{
		echo "Ky produkt ekziston kthehu per ta modifikuar";
		exit();
	}
	//fillojm kontrrollet 1. a ekziton nje user me kete username??
		if(isset($_POST['emri']))
		{
		
		if (!preg_match("/^[a-zA-Z ]*$/",$_POST['emri'])) {
       $errors[]= "Lejohen vetem karaktere dhe hapesira"; 
          }
		else if(strlen($_POST['emri'])>40)
		{
			$errors[] = 'Emri produktit shume i gjate';
		}
		 else{	
			$produkt_data1['emri']= $_POST['emri'];
			$reg['emri'] = $_POST['emri'];
		}
		}
		if(isset($_POST['cmimi'])&&!is_numeric($_POST['cmimi'])&&!empty($_POST['cmimi']))
        {
            $errors[] = 'Cmimi duhet te jene nje numer';
        }else{
			$produkt_data1['cmimi']= $_POST['cmimi'];
			$reg['cmimi'] = $_POST['cmimi'];
		}
		if(isset($_POST['pershkrime'])&&strlen($_POST['pershkrime'])>100&&!empty($_POST['pershkrime']))
		{
			$errors[] = 'Pershkrimi shume i gjate';
			if (!preg_match("/^[a-zA-Z ]*$/",$_POST['pershkrime'])) {
       $errors[]= "Lejohen vetem karaktere dhe hapesira"; ; 
        }
		}
		else{
			$produkt_data1['pershkrime']= $_POST['pershkrime'];
			$reg['pershkrime'] = $_POST['pershkrime'];
		}
		if (isset($_POST['kalori'])&&!is_numeric($_POST['kalori'])&&!empty($_POST['kalori']))
        {
            $errors[] = 'Kalorite duhet te jene nje numer';
        }else{
			$produkt_data1['kalori']= $_POST['kalori'];
              $reg['kalori'] = $_POST['kalori'];		
		}
		if (isset($_POST['sasia'])&&!is_numeric($_POST['sasia'])&&!empty($_POST['kalori']))
        {
            $errors[] = 'Sasia duhet te jete nje numer';
        }else{
			$produkt_data1['sasia']= $_POST['sasia'];
              $reg['sasia'] = $_POST['sasia'];	
		}
		
		 if(isset($_FILES['produkt'])&&!empty($_FILES['produkt']['name']))
        {
		  $lejuar = array('jpeg','jpg','gif','png');  
		  $file_name = $_FILES['produkt']['name'];
		  $exp = explode('.',$file_name);
		  $fundit = strtolower($exp[count($exp)-1]);
		  $file_extn = $fundit;
		  $file_temp = $_FILES['produkt']['tmp_name'];
		if(!in_array($file_extn,$lejuar))
		{
			if(!in_array($file_extn,$lejuar))
		
			$errors[]= 'Ky tip imazhi nuk lejohet <br> Sigurohu te fusesh nje nga tipet e meposhtme:';
			foreach($lejuar as $l)
			{
				$errors[] = $l;
			}
			
		}  
       }else{
		   $errors[]="Fotoja eshte e detyrueshme";
	   }
 
  $te_detyruseshme = array('emri','cmimi','select','pershkrime','kalori','sasia','produkt');
	foreach($_POST as $l=>$value)
	{
		if(empty($value) && in_array($l, $te_detyruseshme))
		{
			$errors[] = ucfirst($vizitor_te_dhena['emri']).' Ploteso te gjitha fushat me yll !';
			break 1; //del nga cikli
		}
	}	  
 }
?>
<br></br>
<?php
/*if(isset($_GET['ndryshoi']))//ne men qe perdorusit mos ti dale perseri forma
{
	echo 'Te dhenat u ndryshuan me sukses ';
	/*echo '<center><b><h1>Produkti '.$produkt_data1['emri'] .' u shtua me sukses ! </h1></b>	
	<p>Tani ndodhen: '.$sasi.' produkte.</p></center> ';	
}*/
if(!empty($errors))
{
	echo output_errors($errors);
}
if(!empty($_POST) && empty($errors))
{ 
	$produkt_data = array(
	'emri'=>strtolower($produkt_data1['emri']),
	'cmimi'=>$produkt_data1['cmimi'],
	'kategoria'=>$_POST['select'],
	'kalori'=>$produkt_data1['kalori'],
	'pershkrime'=>$produkt_data1['pershkrime'],
	'sasia'=>$produkt_data1['sasia']);
	shto_produkt($produkt_data);
	ndrysho_foto_produkti( $produkt_data['emri'] , $file_temp, $file_extn);
	$query=mysql_query("SELECT COUNT(*) FROM produkte ");
		$sasi = mysql_fetch_array($query)[0];
		echo '<center><b><h1>Produkti '.$produkt_data1['emri'] .' u shtua me sukses ! </h1></b>	
	<p>Tani ndodhen: '.$sasi.' produkte.</p></center> ';	
	//header('Location: shtoProdukt.php?ndryshoi');
 
}
?>

<form action="shtoProdukt.php" method="POST" enctype="multipart/form-data">
<center><fieldset style="width: 80px"> <legend><h1>Shto Produkt</h1></legend>
<center><table>
<tr>
   <th><label for="emri"> Emri Produktit*: </label></th>
   <td><input type="text" name="emri" value="<?php echo $reg['emri'];?>"/>
   </td>
   </tr>
   
<tr>
<th><label for="cmimi"> Cmimi*: </label></th>
<td><input type="text" name="cmimi" value="<?php echo $reg['cmimi'];?>"/>
   </td>
   </tr>
<tr>
   <th><label for="kategoria"> Kategoria*: </label></th>
   <td><form><select  style="width:173px;align: center;" name="select" value="<?php echo $produkt_data1['kategoria'];?>">
<?php 
$veprim = array(1=>'Embelsira',2=>'Pije',3=>'Pasta',4=>'Pizza',5=>'Te tjera');
foreach($veprim as $l)
{
	echo '<option name="',$l,'">'.$l.'</option>';
}
?>
   </td>
   </tr>   
<tr>
   <th><label for="kalori"> Kalorite*: </label></th>
   <td><input type="text" name="kalori" value="<?php echo $produkt_data1['kalori'];?>"/>
   </td>
   </tr> 
<tr>
   <th><label for="pershkrime"> Pershkrime*: </label></th>
   <td><input type="text" name="pershkrime" value="<?php echo $produkt_data1['pershkrime'];?>"/>
   </td>
   </tr>   
<tr>
<tr >
<th><label for="produkt"> Foto*: </label></th>
<td>

 <input type="file"  name="produkt" />
  
   </td>
   </tr>
   <th><label for="sasia"> Sasia*: </label></th>
   <td><input type="text" name="sasia" value="<?php echo $produkt_data1['sasia'];?>"/>
   </td>
   </tr>     
   <tr><th align="center"><input type="submit" value="Shto" id= "regj"name = "regj"/></th></td>

</table>
</center></legend>
</center>
</fieldset>
</form>
<?php
include 'includes/HEADERS/footerTOTAL.php';
?>