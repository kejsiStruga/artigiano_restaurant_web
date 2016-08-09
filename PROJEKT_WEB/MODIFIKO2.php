<?php
include_once 'includes/init/init.php';
include_once 'jquery_js.php';
mbro_faqet();
mbro_admin();
//nqs perdoruesit duan ta axesojn por nuk jn admin =>i ridrejtojm
//tek faqja kryesore
include 'includes/head.php'; 
include 'includes/headerAdmin.php'; 
echo '<br></br>';
echo '<br></br>';
?>
<?php
$produkte = array('emri'=>'','cmimi'=>'','kategoria'=>'','pershkrime'=>'');
$veprim = array(1=>'Embelsira',2=>'Pije',3=>'Pasta',4=>'Pizza',5=>'Te tjera');
$array1 = array();?>
 <?php
if(isset($_POST['update']))
{
		if(isset($_POST['emri']))
	{
		if (!preg_match("/^[a-zA-Z ]*$/",$_POST['emri'])) 
		{
          $errors[]= "Lejohen vetem karaktere dhe hapesira per emrin" ; 
         }
		 if($_POST['emri']==NULL)
		 {
			$errors[]= "Emri eshte i detyrueshem" ;  
		 }
		if(strlen($_POST['emri'])>40)
		{
			$errors[] = 'Lejohen deri ne 40 karaktere';
		}
	}
	if(isset($_POST['cmimi']))
	{if($_POST['cmimi']==null)
		 {
			$errors[]= "Cmimi eshte i detyrueshem" ;  
		 }
		if (!is_numeric($_POST['cmimi']))
        {
            $errors[] = 'Cmimi duhet te jene nje numer';
        }
		 
	}	
	if(isset($_POST['pershkrime']))
	{ if(strlen($_POST['pershkrime'])>100)
		{
		$errors[] = 'Pershkrimi shume i gjate';
		}
			if($_POST['pershkrime']==NULL)
		 {
			$errors[]= "Pershkrimi eshte i detyrueshem" ;  
		 }	
	}	
      if(isset($_POST['sasia']))
	  {	if (!is_numeric($_POST['sasia']))
	   {
            $errors[] = 'Sasia duhet te jete nje numer';
        }if($_POST['sasia']==0)
		 {
			$errors[]= "Sasia eshte e detyruesheme" ;  
		 }
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
       }
}
if(!empty($errors))
{
	echo output_errors($errors);
}
if(isset($_POST['update'])&&empty($errors))
	{
		mysql_query("UPDATE produkte SET emri='".$_POST['emri']."',
		               
                       cmimi = '".$_POST['cmimi']."',
					   kategoria = '".$_POST['select']."',
					   pershkrime = '".$_POST['pershkrime']."',
					   sasia = '".$_POST['sasia']."'
					   WHERE id = '".$_POST['hidden']."'");					
	
	
	if(isset($_FILES['produkt'])&&!empty($_FILES['produkt']['name']))
	{ndrysho_foto_produkti( $_POST['emri'] , $file_temp, $file_extn);
	}
?>
<script>
alert("Modifikimi u krye me sukses !");
</script>
<?php 
}?>
<?php
$query = mysql_query("SELECT * FROM `produkte` ");	
echo '
<center><fieldset style="width: 80px"> <legend><h1>Modifiko Produkt</h1></legend>
 <table id="tabelModifikim">
 <tr>
 <th>Emri* </th>
 <th>Cmimi* </th>
 <th>Kategoria* </th>
 <th>Pershkrime*</th>
 <th>Sasia*</th>
 <td></td>
 <th>Foto</th>
 </tr>';
while($r = mysql_fetch_array($query))
{   
	echo '<form action="MODIFIKO2.php" method="POST"  enctype="multipart/form-data">';
    echo '<tr>';
	echo "<td><input type='text' size=18 name= 'emri' value='" . nl2br($r["emri"]). "'/></td>";
    echo '<td><input type="number" size="13px" name= "cmimi" value="'.$r['cmimi'].'" /></td>';
	?>                      
	                        <td><select name="select">
                            <option name="Pasta"<?php if($r["kategoria"]=='Pasta') echo 'selected'?>>Pasta</option>
							<option name="Pizza"<?php if($r["kategoria"]=='Pizza') echo 'selected'?>>Pizza</option>
							<option name="Embelsira"<?php if($r["kategoria"]=='Embelsira') echo 'selected'?>>Embelsira</option>
                            <option name="Pije"<?php if($r["kategoria"]=='Pije') echo 'selected'?>>Pije</option>
                            <option name="Te tjera"<?php if($r["kategoria"]=='Te Tjera') echo 'selected'?>>Te Tjera</option>
	                        </select></td>
							<?php
    echo "<td><input type='text'  size=20 name= 'pershkrime' value='" . nl2br($r["pershkrime"]). "'/></td>";
    echo "<td ><input size='13px' type='number' name= 'sasia' required value='" . $r["sasia"]."' /></td>";
	echo '<td></td>';
	echo '<td><img src="', $r['foto'], '" height="42" width="42" ></td>';
    echo '<td><input type="file"  name="produkt" /></td>';
	echo '<td>'.'<input  type=hidden name= hidden value='.$r['id'].' /> </td>';
	echo '<td>'.'<input type="submit" value=">>" name="update"/>'.' </td>';
	echo '</tr>';
	echo '</form>';
	}
?>
 </table> 
 </form>
 </fieldset>
 </form>
<?php
include 'includes/HEADERS/footerTOTAL.php';
?>