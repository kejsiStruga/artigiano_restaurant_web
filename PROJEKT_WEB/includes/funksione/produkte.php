<?php
function kthe_produkt_id($emer)
{
	$use = ltrim($emer," ");
	$e = mysql_query("select id from produkte where emri = '$use'");

	while($r = mysql_fetch_array($e))
		return 
			$r['id'];
}
function kthe_produkt_cmimin($emer)
{
	$use = ltrim($emer," ");
	$e = mysql_query("select cmimi from produkte where emri = '$use'");

	while($r = mysql_fetch_array($e))
		return 
			$r['cmimi'];
}
function shuma($vizitor)
{
	$q1 = mysql_query("select sum(cmimi_total) from porosite WHERE vizitor_id = $vizitor");
	return mysql_result($q1,0);
}
function upload_porosi($vizitor)
{
	
		 $q1 = mysql_query("SELECT PR.emri, P.porosi_id, P.cmimi_total, P.sasia 
							FROM porosite P, produkte PR 
							WHERE vizitor_id = $vizitor and P.produkt_id=PR.id ");
		 echo '<table >
		 <tr ><td  style = "border-bottom: thin solid black; color: black; font-weight:bold; ">Produkti: </td>
		 
		 <td style="visibility: hidden; border-bottom: thin solid black;">BOSH </td>
		 <td style="visibility: hidden; border-bottom: thin solid black;"> BOSH</td>
		 <td style="visibility: hidden; border-bottom: thin solid black;"> BOSH</td>
		 <td style = "color: black; font-weight:bold; border-bottom: thin solid black;">Totali: </td></tr>
		 ';
		 while($k = mysql_fetch_assoc($q1))
		 {
			 echo '<tr><td>'. ucwords($k["emri"])  .' x '.$k["sasia"] .'</td>';
			 echo '<td></td>';
			 echo '<td></td>';
			 echo '<td></td>';
			 echo '<td >'. $k["cmimi_total"] .' l. </td></tr>';
		 }
		 echo '<tr><td style="visibility: hidden;">BOSH </td>';
		 echo '<td style="visibility: hidden;">BOSH </td>';
		 echo '<td style="visibility: hidden;">BOSH </td>';
		 echo '<td style="visibility: hidden;">BOSH </td>';
		 echo '<td >'.shuma($vizitor).' l.  </td></tr>';
		 echo '<table>';
		  
//trigger_error(mysql_error()." ".$q1);
}
function insert_porosi($emer, $vizitor, $sasi)
{
	$sasi = trim($sasi);
	$produkt_id = kthe_produkt_id($emer);
     $cmimi_total = kthe_produkt_cmimin($emer)*$sasi; 	
	 $q1 = "SELECT * FROM porosite where produkt_id = $produkt_id";
	 if($t = mysql_query($q1))
	 {
		if( mysql_num_rows($t)>0)
		{
		
			$query = "UPDATE porosite SET cmimi_total =  cmimi_total + $cmimi_total, sasia = sasia + $sasi
				where produkt_id = $produkt_id";					  
	 }
	 
	 else{
				$query = "INSERT INTO porosite (produkt_id,vizitor_id,cmimi_total,sasia)
	          values($produkt_id, $vizitor ,$cmimi_total, $sasi)
			  ";
			}	
	 }
mysql_query($query);

//	echo $query;		  

}

//trigger_error(mysql_error()." ".$query);
function upload_produkt($query)
{
	global $produkt; 
    $produkt= array('id','emri' ,'cmimi' ,'sasia');
	echo '<table><form action="porositOnline.php" method="post">';
	
	while($row= mysql_fetch_assoc($query))
{
  ?>
     <tr>
	 <td><img width="200px" height="200px" src="<?php echo  $row['foto'];?> "></td>
	
     <td><?php  echo ucfirst($row['emri']);
	 $produkt['emri'] = $row['emri'];
	
	 ?>
	 <br>
	 <input type="hidden" name="hidden1" value="<?php echo  $row['id'];?> "> 
	     <?php echo ucfirst($row['pershkrime']).'.';?> 
	     <?php echo ucfirst($row['cmimi'])." l<br>" ;
		 $produkt['cmimi'] = $row['cmimi'];?>
        
   <select id="select_sasi_shto" name="shto_sasi">
   <?php
   for($i = 1; $i<=6; $i++)
   {
	  echo ' <option value= "'.$i.'">'. $i. '</option>';	   
   }
    echo '<br> <input type="submit" value="Shto Ne Shporte"  name="shto" />';
   ?>
   </td>
   </tr> 
</select>
 <?php  
}echo '</table></form>';
 if(isset($_POST['shto']))
{ 
	if(isset($_POST['shto_sasi']))
	{
		echo $_POST['shto_sasi'];
		echo $produkt['emri'];
	}
}
}
?>

<?php
function rezervime($rezervim)
{
	foreach($rezervim as $l=>$value)
	{
	mysql_real_escape_string($value);	
	}
	$atributet = '`'.implode('`,`',array_keys($rezervim)).'`';
	$teDhena='\''.implode('\',\'',$rezervim).'\'';
	
	mysql_query("INSERT INTO `rezervime` ($atributet) VALUES ($teDhena)");
	 //trigger_error(mysql_error()." ".$query);
}

?>


<?php
function ndrysho_foto_produkti($produkt_emer , $file_temp, $file_extn)
{	
     //$produkt_emer= mysql_real_escape_string($produkt_emer);
    
	$file_path ='imagesProdukte/produkte/' .substr(md5(time()), 0 , 10 ).'.'.$file_extn;
	move_uploaded_file($file_temp, $file_path);

	
	mysql_query("UPDATE produkte SET foto ='$file_path' WHERE emri= '$produkt_emer' "); //ketu e ka vendosur foton n db
	//dhe axesohet nepermjet $produkt_te_dhena['foto'];
}

global $produktet; 
$produktet= array('id','emri' ,'cmimi' ,'kategoria', 'pershkrime' ,'kalori', 'foto' ,'sasia');
function modifiko_produkt($id, $modifiko_produkt){
	
	$id=(int)$id;
	
	foreach($modifiko_produkt as $l=>$value)
	{
		$value=mysql_real_escape_string($value);
	}
	foreach($modifiko_produkt as $l=>$value)
	{
		mysql_query("UPDATE produkte SET $l ='$value' WHERE id = $id")or die("gabim");
	}

}

global 	$produkt_te_dhena ;
$produkt_te_dhena = produkt_te_dhena('emri' ,'cmimi' ,'kategoria',  'pershkrime' ,'kalori', 'foto' ,'sasia');

function kerko_produkt()
{
	$searched_item=" ";
}


function numero_produkte()
{
	$query = mysql_query("SELECT COUNT(`emri`) FROM `produkte`");
	return  mysql_result($query, 0);
}

function produkt_te_dhena($produkt)
{
	$teDhena = array();
	$produkt = mysql_real_escape_string($produkt);
	
	$func_num_args = func_num_args();//kthen nr e paramtr t funx
	$func_get_args = func_get_args();//kthen array me parametrat e fnx
	
if($func_num_args>1)
{
	
  $atributet = '`'.implode(' `,`', $func_get_args).'`';
  
  $query=mysql_query("SELECT emri ,cmimi ,kategoria,  pershkrime ,kalori, foto ,sasia FROM `produkte` WHERE emri='$produkt'");
 // trigger_error(mysql_error()." ".$query);
 
     $teDhena = mysql_fetch_assoc($query);

return $teDhena;
	}
}

function ekziston_produkt($produkt)
{
	//$produkt = mysql_real_escape_string($produkt); //NE KOMENT SEPSE FOTOT NUK JAN STRINGJE ~?
		$ekziston= mysql_query("SELECT * FROM produkte WHERE emri='$produkt' ") or die(mysql_error());
			if(mysql_num_rows($ekziston)==1)
			{
            return true;
			}
	else{ return false;}
		
}
function shfaq_kategori($kategoria)
{
  $query = mysql_query("SELECT * FROM `produkte` WHERE `kategoria` = '$kategoria'");	
  if(mysql_num_rows($query)>0)
 {
   while($k = mysql_fetch_assoc($query))
     {
	echo '<ul><li>'.$k['emri'].'</li>'.'<li>'.$k['cmimi'].'</li><li>'.'<b>Pershkrim: </b>'.$k['pershkrime'].'</li>'.'<li>'.'<b>Kalori: </b>'.$k['kalori'].'</li>'.'</ul>';
	
     }
 }
}
function shto_produkt($produkt_data)
{
	foreach($produkt_data as $l=>$value)
	{
	mysql_real_escape_string($value);	
	}
	$atributet = '`'.implode('`,`',array_keys($produkt_data)).'`';
	$teDhena='\''.implode('\',\'',$produkt_data).'\'';
	
	mysql_query("INSERT INTO `produkte` ($atributet) VALUES ($teDhena)");
	// trigger_error(mysql_error()." ".$query);
}



?>