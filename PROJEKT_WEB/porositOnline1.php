<?php 
include_once 'includes/init/init.php';
mbro_faqet();
include_once 'includes/HEADERS/headerTOTAL.php'; 
include_once 'jquery_js.php';
if(admini($session_user_id)===true)
{
	header('Location: admin.php');
}
?><h1>POROSI ONLINE  !</h1>
<br>
<br>

<?php
global $v ;
$v = 0;
global $total ;
global $sub ;
global $vek ;

if(isset($_GET['add']) || isset($_POST['dergo']))
{
	//$_SESSION['porositOnline1_'.$_GET['add']]+= '1';	
	$quantity = mysql_query("SELECT id, sasia FROM produkte where id =".$_GET['add'] );
	while($quantity_row= mysql_fetch_array($quantity))
	{
		if($quantity_row['sasia'] != $_SESSION['porositOnline1_'.(int)$_GET['add']])
		{
			 $_SESSION['porositOnline1_'.$_GET['add']]+= '1';
		}
	}
	header('Location: porositOnline1.php');
}
global $k ;
$k = 0;
if(isset($_POST['dergo']))
	{		
		foreach($_SESSION as $name => $value) //bredh ne cdo sesion ;name eshte emri sesionit; cdo produkct ruhet mes nje emri sesioni
		{
			
			if(substr($name, 0, 15)=='porositOnline1_') //marrim vtm var e cart_ sepse kemi var e tjera te sesionit si psh id !!
				{	
					$id = substr($name, 15, (strlen($name)-15)); 
				$get_1 = mysql_query("SELECT id, emri, cmimi FROM PRODUKTE where id = " .mysql_real_escape_string($id));
			
				$ekziston = mysql_query("SELECT * from porosite where produkt_id =".mysql_real_escape_string($id));
				
				if(mysql_num_rows($ekziston)>0)
				{
					while($get_row = mysql_fetch_array($get_1))
							{
								 $sub = $get_row['cmimi']*$value;
								 echo $sub.'<br>';
								 if($sub>0)
								 {
									mysql_query("update porosite set porosi_id = DEFAULT, sasia = sasia+'".$value."',
									cmimi_total = cmimi_total+'".$sub."' where produkt_id = ".mysql_real_escape_string($id));
								 }
							}	
					
				}else{
					while($get_row = mysql_fetch_array($get_1))
							{
								 $sub = $get_row['cmimi']*$value;
								 echo $sub.'<br>';
								 if($sub>0)
								 {
								 mysql_query("INSERT INTO porosite VALUES(DEFAULT, '" .$get_row['id']."','".$vizitor_te_dhena['id']."',
									'".$sub."', '".$value."', DEFAULT ,DEFAULT)");
								 }
							}	
							
				}
				
				}				
		}
	
	header("Location: ".$vizitor_te_dhena['username']);

}

global $id_remove;
if(isset($_GET['remove']))
{
	
	$_SESSION['porositOnline1_'.(int)$_GET['remove']]--;
	$k = $_SESSION['porositOnline1_'.(int)$_GET['remove']];
	
	header('Location: porositOnline1.php');
}
if(isset($_GET['delete']))
{	
		$_SESSION['porositOnline1_'.(int)$_GET['delete']]='0';
		header('Location: porositOnline1.php');
}
if(isset($_GET['dergo']))
{		
		header('Location: '.$vizitor_te_dhena['username']);
		
}
function products() //shfaqim t gjithe produktet
{
	//marr info nga dba_close
	$get = mysql_query('SELECT emri, cmimi, pershkrime,id, foto FROM produkte WHERE sasia > 0 ORDER BY id DESC');
	if(mysql_num_rows($get)==0)
	{
		echo 'Nuk ka asnje produkt !';
	}
	else{
	
	while($get_row= mysql_fetch_assoc($get))
	{
		echo '<p>'.ucfirst($get_row['emri']).'<br>';
		echo ucfirst($get_row['pershkrime']).'<br>';
		echo $get_row['cmimi'].' lek<br>';
		//butoni Add!!!!!!!!!
		//ky buton na con tek faqja cart.php !!
		echo '<a href = "porositOnline1.php?add='.$get_row["id"]. '">Shto</a></p>';
		echo '</p>';
		}
		}
}
global $vek;
/*function cart()
{*/
echo '<div id="div4" style="border: 1px solid black; width: 300px;">';

$vek = array('id'=>'','cmimi'=>'','total'=>'');
	foreach($_SESSION as $name => $value) //bredh ne cdo sesion ;name eshte emri sesionit; cdo produkct ruhet mes nje emri sesioni
	{
			if($value>0)
			{
				if(substr($name, 0, 15)=='porositOnline1_') //marrim vtm var e cart_ sepse kemi var e tjera te sesionit si psh id !!
				{
								$id = substr($name, 15, (strlen($name)-15)); //marr nr e id => heqim stringun 'porositOnline1_'
								$get = mysql_query("SELECT id, emri, cmimi FROM PRODUKTE where id = " .mysql_real_escape_string($id)); //marr cmimin emrin
							while($get_row = mysql_fetch_array($get))
							{
								 $sub = $get_row['cmimi']*$value;
								 echo $get_row['emri'].' x '.$value .'@'.$get_row['cmimi'].'  = '.$sub.' lek '.
								
								'<a href="porositOnline1.php?remove='.$id.'"> [-] </a>';
								$id_remove = '.$get_row["id"].';
							echo '	<a href="porositOnline1.php?add='.$id.'">[+] </a> 
								<a href="porositOnline1.php?delete='.$id.'">[Fshi]</a><br>';
							}			
				}
				$total += $sub;
			}
	}
	if($total==0)
	{
		$q = "SELECT count(*) from porosite where vizitor_id =".$vizitor_te_dhena['id'];
		$kejsi = mysql_query($q);
		if(mysql_num_rows($kejsi)>0)
		{
			$k = "delete from porosite where vizitor_id =".$vizitor_te_dhena['id'];
		 mysql_query($k);
		}
		
		echo '<h2>Ju nuk keni asnje produkt ne shporte</h2> <br><br>';
	}
	else{
		echo $total;
		echo '<br><br><h2>Totali juaj eshte: '.$total.' lek </h2>';
		echo '<form method ="post" name = "dergo" action="porositOnline1.php">';
		echo '<input type="submit" id="hide" value="DERGO" name = "dergo"><br><br>';
		echo '</form>';
	

		}
	echo '</div>';
	/*
}

*/echo products();

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<br></br>
<?php

include 'includes/HEADERS/footerTOTAL.php';
?>