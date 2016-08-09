<?php 
include_once 'includes/init/init.php';
mbro_faqet();
include_once 'includes/HEADERS/headerTOTAL.php'; 
include_once 'jquery_js.php';
require 'products.php';
if(admini($session_user_id)===true)
{
	header('Location: admin.php');
}
?>
<?php 
include_once 'includes/init/init.php';
mbro_faqet();
include_once 'includes/HEADERS/headerTOTAL.php'; 
include_once 'jquery_js.php';
require 'products.php';
if(admini($session_user_id)===true)
{
	header('Location: admin.php');
}
?>
<?php
$shkalla = $apartamenti = $rruga = $pranoj=$banesa=' ';
$err_shkalla=$err_apartamenti=$err_rruga=$err_pranoj=$err_banesa=' ';
	$total_cmimi_prod = 0;
	//i hedhim t dhenat n db !!!!!!!
	$porosi = array('porosi_id'=>'', 'produkt_id'=>'','vizitor_id'=>'','cmimi_total'=>'','sasia'=>'');
	

echo '<h1 style="text-align:center; font-weight:bold;">Dergo Porosi</h1>';

if(isset($_POST['vendos']))
	{
		if(count($_SESSION['shporta'])!=0&&!empty($_SESSION['shporta']))
		{
			mysql_query("INSERT INTO adresa VALUES( DEFAULT,'"  .$_POST['adresa_rruga']."',
										'"  .$_POST['adresa_banesa']."','"  .$_POST['adresa_apartamenti']."', '"  .$_POST['adresa_shkalla']."')");
			$k = mysql_query("select max(adresa_id) as m from adresa");
			$ad ;
			if(mysql_num_rows($k)>0)
			{
				$f = mysql_fetch_array($k);
				$ad = $f['m'];
				
			}
			mysql_query("INSERT INTO porosi VALUES (DEFAULT,".$vizitor_te_dhena['id']." , ".$ad.", DEFAULT,DEFAULT )");
			/////////////////////////////////////////
			$porosi_id = mysql_query("select max(porosi_id) as p from porosi");
			$order ;
			if(mysql_num_rows($porosi_id)>0)
			{
				$f = mysql_fetch_array($porosi_id);
				$order = $f['p'];
			}
			//echo $order;
			foreach($_SESSION['shporta'] as $id => $prod)
			{				
					$prod_id = $prod['prod_id'];																					
					$total_cmimi_prod = $produktet_arr[$prod_id]['cmimi_prod'] * $prod['sasi'];
					mysql_query( "INSERT INTO porosi_detaje VALUES(" .$prod['prod_id'].",".$order.",
									".$prod['sasi'].",".$total_cmimi_prod.")");
				}
				
				$_SESSION['shporta'] = array();
								echo 'Porosia juaj u krye me sukses !';
								
		}else{
		echo 'Shporta juaj eshte bosh !';	
		}					

	}else if(isset($_POST['vendos'])){;}
//value="<?php echo $banesa;
ELSE{
?>
<form action="arka.php" method="post">
	<table>
		<th>Adresa: </th>
		<tr><td>Rruga</td> <td><input type = "text" required  name="adresa_rruga" / ></td><td><?php echo $err_rruga;?></td></tr>
		<tr><td>Banesa</td><td><input type = "text" required name="adresa_banesa" /></td><td><?php echo $err_banesa;?></td></tr>
		<tr><td>Apartamenti</td><td><input type = "text"  name= "adresa_apartamenti" /></td><td><?php echo $err_apartamenti;?></td></tr>
		<tr><td>Shkalla</td><td><input type = "text"  name="adresa_shkalla" / ></td><td><?php echo $err_shkalla;?></td></tr>
	</table>
<br>
		
		<br>
		<input type="checkbox" required name="pranoj" >
		<?php
		 echo 'UNE I LEXOVA DHE I PRANOJ <b><a href="politikat.php">POLITIKAT E DERGESES</a></b>&nbsp' .$err_pranoj.'<br><br>';
		?>

		<input type="submit" value="Vendose Porosine" name="vendos"/>

		<input type="submit" value="Anullo Porosine" name="anullo"/>

</form>
<?PHP
}
?>



























