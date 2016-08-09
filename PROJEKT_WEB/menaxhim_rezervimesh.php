<?php
include_once 'includes/init/init.php';
include_once 'jquery_js.php';
include_once 'includes/head.php'; 
include_once 'includes/headerAdmin.php'; 
echo '<br></br>';
echo '<br></br>';
mbro_faqet();
mbro_admin();
//nqs perdoruesit duan ta axesojn por nuk jn admin =>i ridrejtojm
//tek faqja kryesore
?>
<?php
if(isset($_POST['anullo']))
{
	//mysql_query("DELETE FROM rezervime WHERE emri = '".$_POST['emri']."' AND nr_kontakti='".$_POST['nr_kontakti']."' AND ora='".$_POST['ora']."' ");
}
if(isset($_POST['aprovo']))
{
	
	mysql_query("UPDATE tavolina SET sasia = sasia - 1 WHERE lloji = '".$_POST['tavolina']."'");
	mysql_query("DELETE FROM rezervime WHERE emri = '".$_POST['emri']."' AND nr_kontakti='".$_POST['nr_kontakti']."' AND ora='".$_POST['ora']."'");
}
?>

<?php
$query = mysql_query("SELECT * FROM rezervime r , vizitor v where
 v.username = r.emri
	");	
if(mysql_num_rows($query)>0)
{
echo '
<center><fieldset style="width: 80px"> <legend><h1>Rezervime</h1></legend>
 <table>
 <tr>
 <th class="ok">Username </th>
 <th class="ok">Tavolina </th>
 <th class="ok">Vakti </th>
 <th class="ok">Data</th>
 <th class="ok">Ora</th>
 <th class="ok">Kontakte</th>
 </tr>';
while($r = mysql_fetch_array($query))
{   
	echo '<form action="menaxhim_rezervimesh.php" method="POST" >';
    echo '<tr>';
	echo "<td class='ok'>" .$r["username"]."</td>";
    echo '<td class="ok"><div style="width: 80px; padding-left: 36px;">'.$r['tavolina'].'</div></td>';
    echo "<td class='ok'>" . $r["vakti"]."</td>";
    echo '<td class="ok"><div style="width: 100px; padding-left: 36px;">' . $r["data"].'</div></td>';
    echo "<td class='ok'>" . date('h:i',strtotime($r["ora"]))."</td>";
	echo '<td class="ok">'.$r['nr_kontakti'].' </td>';
	echo '<td>'.'<input type="submit" value="Aprovo" name="aprovo"/>'.' </td>';
	echo '<td>'.'<input type="submit" value="Anullo" name="anullo"/>'.' </td>';
	echo '<input type="hidden" name="emri" value="'.$r["emri"].'"/>';
	echo '<input type="hidden" name="ora" value="'.$r["ora"].'"/>';
	echo '<input type="hidden" name="data" value="'.$r["data"].'"/>';
	echo '<input type="hidden" name="tavolina" value="'.$r["tavolina"].'"/>';
	echo '<input type="hidden" name="nr_kontakti" value="'.$r["nr_kontakti"].'"/>';
	echo '</tr>';
	
	}
?>
 </form>
 </table>
 </fieldset>
 </center>

 <?php
}
else{
	echo '<h1>Nuk ka asnje rezervim !</h1>';
	//include_once 'includes/aside.php';
	
}
	if(isset($_POST['ndrysho']))
	{
		mysql_query("UPDATE tavolina SET sasia = '".$_POST['nrtav']."' WHERE lloji= '".$_POST['hidden']."' ");
	}

include 'menaxho_tavolina.php';
include 'includes/HEADERS/footerTOTAL.php';
?>