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
<style>
#porosi{border: 1px solid; border-collapse: collapse;}
#porosi th, td, tr{border: 1px solid;padding: 4px;}
</style>
<?php
if(isset($_POST['aprovo']))
{
	
	mysql_query("update porosi set aprovuar = 1 WHERE porosi_id = ".$_POST['hidden']." and vizitor_id=  ".$_POST['hidden_h'] ." ");
	
	
}else if(isset($_POST['anullo'])){
		mysql_query("DELETE FROM porosi WHERE porosi_id = ".$_POST['hidden']." and vizitor_id=  ".$_POST['hidden_h'] ." ");		
		mysql_query("DELETE FROM adresa WHERE adresa_id = ".$_POST['hidden_adresa']. " ");		
		mysql_query("DELETE FROM porosi_detaje WHERE porosi_id = ".$_POST['hidden']);		
}
?>
<?php

if(isset($_GET['nr_porosi']))
{
	$porosi_id = $_GET['nr_porosi'];
echo "<p>
	<a href='./MENAXHIM_POROSISH.php'></a></p>";
		$query_porosi = mysql_query("select P.emri, D.sasia, P.cmimi 
									FROM porosi_detaje D, produkte P 
									WHERE  P.id = D.produkt_id and D.porosi_id=".$porosi_id." order by D.sasia");
		while($k = mysql_fetch_assoc($query_porosi))
		{
			echo $k['emri'].' ';
			$tot = $k['sasia']*$k['cmimi'];
			echo $k['sasia'].' x '.$k['cmimi'].'='. $tot .'<br>';
			
		}
}
ELSE{
$query_upload = mysql_query("SELECT P.aprovuar, P.porosi_id ,V.username,V.id ,A.adresa_id,P.porosi_id, V.nr_kontakti, A.adresa_rruga, A.nr_banesa,  P.data
							FROM porosi P, vizitor V, adresa A
							WHERE P.vizitor_id = V.id and P.adresa_id = A.adresa_id ");

if(mysql_num_rows($query_upload)>0)
{
	echo '
	      <table id="porosi">
		  <tr>
	      <th>DETAJE POROSI</th>
	      <th>Klienti</th>
	      <th>Nr. Tel</th>
		  <th>Rr. Banimit</th>
	      <th>Nr. Banese</th>
	      <th>Data</th>                                
	      <th>Aprovuar</th>';                                
		while($r = mysql_fetch_array($query_upload))
			{   echo '<form action="MENAXHIM_POROSISH.php" method="post"><tr>'; 
				 $nr_porosi = $r['porosi_id'];
				 echo "<td> <a href='./MENAXHIM_POROSISH.php?nr_porosi=$nr_porosi'> NR:" .$r['porosi_id'] . "</a></td> ";
				echo '<td> '.ucfirst($r['username']).'  </td>';
				echo '<td> 0'.$r['nr_kontakti'].'  </td>';
				$adresa_rruga = $r['adresa_rruga'];
				echo '<td> '.$adresa_rruga.'  </td>';
				echo '<td> '.$r['nr_banesa'].'  </td>';
				echo '<td> '.date('m-d-Y', strtotime($r['data'])).'  </td>';
				echo '<td> '.$r['aprovuar'].'  </td>';
				
		echo '<input type="hidden"  name="hidden" value = "'.$r['porosi_id'].'">';
		echo '<input type="hidden"  name="hidden_h" value = "'.$r['id'].'">';
		echo '<input type="hidden"  name="hidden_adresa" value = "'.$r['adresa_id'].'">';
		
				echo '<td><input type="submit" name= "aprovo" value="Aprovo">';
				echo '<input type="submit" value="Anullo" onchange="showOrder(this.value)" name ="anullo"></td>';
				
				echo '</form>';
			}
}else{
	echo 'ASNJE POROSI NE SISTEM';
}
}

?>