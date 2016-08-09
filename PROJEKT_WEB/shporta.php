<?php
include 'includes/init/init.php';
mbro_faqet();
if(admini($session_user_id)===true)
{
	header('Location: admin.php');
}
include 'includes/HEADERS/headerTOTAL.php'; 
include 'connect.inc.php'; 
require 'jquery_js.php'; ?>

<?php
//kontrrollo a ka produkte ne porosi 
$cnt_produkte = mysql_query("SELECT count(*) from porosite where vizitor_id = '".$vizitor_te_dhena['id']."'");
if(mysql_fetch_array($cnt_produkte)>0)
{
	
	if(isset($_POST['pagesa']))
{	
header('Location: verifiko_shporta.php');    	
}//trigger_error(mysql_error()." ".$p);
else{

if(isset($_POST['modifiko']))
{
	if(isset($_POST['sasi']))
	{
		$porosi_id = $_POST['porosi_id'];
		$sasia = $_POST['sasi'];
mysql_query("UPDATE porosite pt SET pt.sasia = $sasia, pt.cmimi_total = $sasia*(SELECT p.cmimi from produkte p where p.id = pt.produkt_id and pt.porosi_id = $porosi_id) 
where pt.porosi_id=$porosi_id ");
	}
}

	$p = mysql_query("SELECT R.foto, R.emri, P.sasia, P.cmimi_total, P.porosi_id FROM porosite P,produkte R, vizitor V  WHERE P.produkt_id = R.id AND
	P.vizitor_id = V.id AND V.username = '".$vizitor_te_dhena['username']."'");

//FORMAAAAAAAAAAAAAAAAAAAAAAAAAAA

echo '<div id="rez"><dl><dt><b>  Shporta juaj: </b></dt><br>';		
echo '<table class ="shporta" border=1 frame=void rules=rows>';
echo '<tr><td  style="visibility:hidden;"> Emer Produkti</td>';
echo '<td style="color: black; font-weight: bold;">Emer Produkti </td>';
echo '<td style="color: black; font-weight: bold;">Sasia </td>';
echo '<td style="color: black; font-weight: bold;">Cmimi </td></tr>';			
	while($r = mysql_fetch_array($p))
		    {
			echo '<form action="shporta.php" method="post">';
			echo '<tr> <td ><img width="90px" height="90px" src=" ' .$r["foto"].' "></td>';
			echo '<td>'.ucwords($r['emri']).'</td> ';
			echo '<td><input type= "number" name = "sasi" value ="' .$r["sasia"].'"></td> ';
			echo '<td>'.$r['cmimi_total'].' l.</td>';
			echo '<input type="hidden" name="porosi_id" value="' .$r["porosi_id"].'">';
            echo '</form>';
			}
echo ' </table></dl></div>';

}
?>
<div style = "margin: auto;
    width: 60%;
    padding: 10px;">
	<form method="post">
<input type ="submit" class="button" name ="modifiko" id = "buton1" value = "Modifiko Shporten"/>
<input type ="submit" class="button"  name ="pagesa" id = "buton2" value = "Vazhdo me Pagesen"/>
</form>
</div>

<?php

} // mbyllet if , qe kontrrollon a ka porosi ky vizitor
else{
	echo 'Pershendetje , ju nuk keni asnje porosi te pa shlyer. Falemninderit !';
}


