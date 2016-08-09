<?php
include 'includes/init/init.php';
//trigger_error(mysql_error()." ".$q);
?>
<?php

	if(isset($_POST['ndrysho']))
	{
		mysql_query("UPDATE tavolina SET sasia = '".$_POST['nrtav']."' WHERE lloji= '".$_POST['hidden']."' ");
	}

?>
<table>
<?php
$q = mysql_query("SELECT * FROM tavolina ");
while($k = mysql_fetch_array($q)){
echo '<form method ="post" action="kotpalidhje.php">';	
  echo '<tr><td>'.$k['lloji'].'</td></tr>';
  echo '<tr><td><input type="number" name="nrtav" max="20" value = '.$k['sasia'].'></td></tr>';
  $a = $k["lloji"];
  echo '<input type=hidden name=hidden value = "'.$k['lloji'].'">';
  echo '<tr><td><input type= "submit" value = "Ndrysho" name="ndrysho" ></td></tr></form>';
}
?>
</table>

<table>
<?php
echo '<table><th>3 persona</th>
 <th>4 persona</th>
 <th>5 persona</th>
 <th>6 persona</th>
 <th>7 persona</th>
 <th>8 persona</th>
 <th>9 persona</th>
 <tr>';
$q = mysql_query("SELECT * FROM tavolina ");
while($k = mysql_fetch_array($q)){
echo '<form method ="post" action="kotpalidhje.php">';	     
    echo "<td><input size='13px' type='number'  min='0' max='20'  name= 'sasia' value='" . $k['sasia']."' /></td>";
	echo '<td><input  type=hidden name= hidden value='.$k["lloji"].' /> </td>';
}
?>
</table>