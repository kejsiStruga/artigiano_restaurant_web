<?php 
include 'includes/init/init.php';
mbro_faqet();
if(admini($session_user_id)===true)
{
	header('Location: admin.php');
}
include 'includes/HEADERS/headerTOTAL.php'; 
include 'connect.inc.php'; 
require 'jquery_js.php'; 
 $query1=mysql_query("SELECT *FROM `tavolina` WHERE `sasia` > 0 ");
 $errors = array('tavolina'=>'', 'vakti'=>'','data' =>'', 'ora'=>'');
 $vlera = array('emri'=>$vizitor_te_dhena['username'],'nr_kontakti'=>$vizitor_te_dhena['nr_kontakti']);
 $vlera2 =array('emri'=>'','tavolina'=>'', 'vakti'=>'','data' =>'', 'ora'=>'', 'nr_kontakti'=>'');
 ?>
 <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.0/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<?php
if(isset($_POST['submit']))
{
	if(empty($_POST['emri']))
	{
		$errors['emri'] = 'Emri eshte i detyrueshem ';
	}else{
		$vlera['emri'] = $_POST['emri'];
		$vlera2['emri'] = $_POST['emri'];
	}	
	
	if(empty($_POST['vakti']))
	{
		$errors['vakti'] = 'Zgjedhja e nje vakti eshte e detyrueshme ';
	}else{
		$vlera['vakti'] = $_POST['vakti'];
		$vlera2['vakti'] = $_POST['vakti'];
	}		
	if(empty($_POST['tavolina']))
	{
		$vlera['tavolina'] =3;
	}else{
		$vlera['tavolina'] =$_POST['tavolina'];
	}	
    if(empty($_POST['data']))
	{
		$errors['data'] = 'Data eshte e detyrueshme ';
	}
	else{
		$vlera['data'] = $_POST['data'];
		$vlera2['data'] = $_POST['data'];
		if(empty($_POST['ora']))
		{
			$errors['ora'] ="Ora eshte e detyrueshme";
		}
		else if( date('m',strtotime($_POST['data'])) == date('m',strtotime("now"))
			&& date('d',strtotime($_POST['data'])) == date('d',strtotime("now")))
		{
			if( date('H',strtotime($_POST['ora']))<date('H',strtotime("now")))
			
			{	$errors['ora'] = 'Kjo ore ka kaluar ';}
			else{
			$vlera['ora'] = $_POST['ora'];
	        }
		}
		else{
			$vlera['ora']=$_POST['ora'];
			$vlera2['ora']=$_POST['ora'];
		}
}
}
$rezervim = array();
if(count($vlera)==6)
{
rezervime($vlera);

echo '<center><h1>Faleminderit '.ucfirst($vizitor_te_dhena['emri']).' Rezervimi u krye me sukses ! </center></h1>';

exit();
header("Location: rezervo.php?rezervim");
exit();
}
?>
<br>
<br>
<style>
.rezervo  ul{
	list-style-type:none;
}
.rezervo input{
	border: #ccc 3px solid;

	padding: 5px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<center><div class="rezervo">
<p>Pershendetje <?php echo '<b>'.ucfirst($vizitor_te_dhena['username']).'</b>  !'; ?> Ploteso formen poshte dhe na u bashko ne ambjentet tona</p>
<br>
<fieldset class="rezervim"> <legend><h1>Rezervim Online</h1></legend>
<form method ="post" action="rezervo.php">
<ul>
<li><label for="numer_personash">Numer Personash:</label><?php echo '&nbsp&nbsp&nbsp'.$errors['tavolina'];?></li>
<select style="width: 150px" name="tavolina">
<?php while($row = mysql_fetch_assoc($query1))
{
	echo '<option>'.$row['lloji'].'</option>';	
} 
?>
</select>
</li>
<li><label for="vakti">Vakti*:</label><br> <input size="20" type="radio"  <?php if (isset($vlera2['vakti']) && $vlera2['vakti']=="dreke") echo "checked";?> 
name="vakti" value="dreke">Dreke<?php echo '&nbsp&nbsp&nbsp'.$errors['vakti'];?><br>
<li><label for="vakti"></label><input type="radio" <?php if (isset($vlera2['vakti']) && $vlera2['vakti']=="dark") echo "checked";?> 
name="vakti" size=20 value="dark" >Darke </li>
<li><label for="data">Data*:</label><br> <input size="20" style="width:150px;" value="<?php echo $vlera2['data'];?>" type="text" name="data" id="data" class="l" /> <?php echo '&nbsp&nbsp&nbsp'.$errors['data'];?></li>
<li><label for="ora">Ora*:</label><br> <input size=20 value="<?php echo $vlera2['ora'];?>" type="time" name="ora" min="08:00" max="23:00" id="ora" class="l" /><?php echo '&nbsp&nbsp&nbsp'.$errors['ora'];?></li> 
</ul> 
</fieldset>
<br>
<p><input type="submit" value="Rezervo !" name="submit" class="l"> 
</p>
</form>
</div>
</center> 
<?php 
include 'includes/HEADERS/footerTOTAL.php';
?>