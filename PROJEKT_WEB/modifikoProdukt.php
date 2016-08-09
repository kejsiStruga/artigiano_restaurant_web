<html><head>
<body>
<?php 
include_once 'includes/init/init.php';
include 'jquery_js.php';
mbro_faqet();
mbro_admin();
include 'includes/head.php'; 
echo '<br></br>';
?>
<?php
if(numero_produkte()==0)
{
    header('Location: shtoProdukt.php');
	exit();
}
?>
<center>
<form method="GET" action="modifikoProdukt.php" name="">
<input type="text" name="mod" maxlength="40" id="userInput" placeholder="Kerko nje produkt" size="50" />
<input type="submit" name="" id="search_buton" value=">>"/>
</form>
</center>
<?php
include_once 'includes/init/init.php';
global $id;
$i=0;
if(isset($_GET['mod'])&&!empty($_GET['mod']))
{
$k = strtolower($_GET['mod']);

$terms = explode(" ",$k);
$q= "SELECT * FROM produkte WHERE  emri='$k'";

$i=0;

$query = mysql_query("SELECT * FROM produkte WHERE  emri='$k'");
$numrows = mysql_num_rows($query);
//trigger_error(mysql_error()." ".$query);
$output = "";

if($numrows>0)
{
while($r = mysql_fetch_assoc($query))
	{
		$produktet['id'] = $r['id'];
		$produktet['emri'] =  $r['emri'];
		$produktet['cmimi']=  $r['cmimi'];
		$produktet['kategoria'] = $r['kategoria'];
		$produktet['pershkrime'] = $r['pershkrime'];
		$produktet['kalori'] = $r['kalori'];
		$produktet['foto'] = $r['foto'];
		$produktet['sasia'] = $r['sasia'];
	}
	if(!empty($_POST['regj'])&&isset($_POST['regj']))
	{
//fillon validimi i formes per modifikimin e produktit ! 
	 $required_fields = array('emri','cmimi','kategoria','pershkrime','kalori','sasia');
	foreach($_POST as $l=>$value)
	{
		if(empty($value) && in_array($l, $required_fields))
		{
			$errors[] = 'Ploteso te gjithe fushat me yll ';
			break 1; //del nga cikli
		}
	}
		 if (!preg_match("/^[a-zA-Z ]*$/",$_POST['emri'])) {
       $errors[]= "Lejohen vetem karaktere dhe hapesira"; ; 
         }
		if(strlen($_POST['emri'])>40)
		{
			$errors[] = 'Lejohen deri ne 40 karaktere';
		}
		
		if (!is_numeric($_POST['cmimi']))
        {
            $errors[] = 'Cmimi duhet te jene nje numer';
        }
		if(strlen($_POST['pershkrime'])>100)
		{
			$errors[] = 'Pershkrimi shume i gjate';
			if (!preg_match("/^[a-zA-Z ]*$/",$_POST['pershkrime'])) {
       $errors[]= "Lejohen vetem karaktere dhe hapesira"; 
             }
		}
		
		if (!is_numeric($_POST['kalori']))
        {
            $errors[] = 'Kalorite duhet te jene nje numer';
        }
		if (!is_numeric($_POST['sasia']))
        {
            $errors[] = 'Sasia duhet te jete nje numer';
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
		
			$errors[]= 'Ky tip imazhi nuk lejohet <br> Sigurohu te fusesh nje nga tipet e meposhtme:
			
			<br>';
			foreach($lejuar as $l)
			{
				$errors[] = $l;
			}
			
		}  
       }		
}
if(isset($_GET['ndryshoi']))//ne men qe perdorusit mos ti dale perseri forma
{
	echo 'Te dhenat u ndryshuan me sukses !';
	
}
else{//shkon deri ne fund te formes
 if(!empty($errors)){
	echo output_errors($errors);
}
 if(!empty($_POST['regj'])&&empty($errors))
 {
	$modifiko_produkt= array(
	'emri' => $_POST['emri'],
	'cmimi' => $_POST['cmimi'],
	'kategoria' => $_POST['select'],
	'pershkrime' => $_POST['pershkrime'],
	'kalori' => $_POST['kalori'],
	'sasia' => $_POST['sasia']);
	
    modifiko_produkt($produktet['id'],$modifiko_produkt);
	//ne menyre q dhe nqs ai nuk zgjedh foto prp ti ngeli fotoja q kishte !!!!
	if(isset($_FILES['produkt'])&&!empty($_FILES['produkt']['name'])){
		ndrysho_foto_produkti( $modifiko_produkt['emri'] , $file_temp, $file_extn);
	}
	header('Location: modifikoProdukt.php?ndryshoi');
	echo 'Produkti '.$produkt_data['emri'] .' u modifikua me sukses !'; //sepse aty lart nk del !!???
	exit();
}
?>
<center><fieldset style="width: 80px"> <legend><h1>Modifiko Produkt</h1></legend>
<form action="modifikoProdukt.php" method="POST" enctype="multipart/form-data" name="modifikim">
 <table>
    
 <tr><th><label for="emri"> Emri*: </label></th>
 <td><input type = "text" name="emri" value="<?php echo $produktet['emri'];?>"/></td>
 
 </tr>
 
 <tr><th><label for="cmimi">Cmimi*: </label></th>
 <td><input type = "text" name="cmimi" value="<?php echo $produktet['cmimi'];?>"/></td>
 </tr>

<tr>
   <th><label for="kategoria"> Kategoria*: </label></th>
   <td><form><select style="align: center;" name="select" value="<?php echo $produktet['kategoria'];?>">
<?php 
$veprim = array(1=>'Embelsira',2=>'Pije',3=>'Pasta',4=>'Pizza',5=>'Te tjera');
foreach($veprim as $l)
{
	echo '<option name="',$l,'">'.$l.'</option>';
}
?>
   </td>
   </tr> 
 
  <tr><th><label for="pershkrime">Pershkrime*:</label></th>
 <td><input type = "text" name="pershkrime" value="<?php echo $produktet['pershkrime']; ?>"/></td>
 </tr>
  <tr><th><label for="kalori">Kalori*:</label></th>
 <td><input type = "text" name="kalori" value="<?php echo $produktet['kalori']; ?>"/></td>
 </tr>
 <th><label for="produkt"> Foto*: </label></th>
<td>

   <input type="file" name="produkt">
   </td>
   </tr>
   <tr><th><label for="sasia">Sasia*:</label>
   </th>
 <td><input type = "text" name="sasia" value="<?php echo $produktet['sasia']; ?>"/></td>
 </tr>

<tr><th><input type="submit" value="Ndrysho" name = "regj"/></th></tr>
 </table>
 
 </form>
 </fieldset>
 </form>
<?php
}
}
else
{
	echo 'Asnje rezultat';
}
}
include 'includes/HEADERS/footerTOTAL.php';
?>