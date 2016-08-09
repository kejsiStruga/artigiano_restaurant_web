
<br>
<center><fieldset style="width: 150px"><h1><legend>Shto tavolina</h1></legend>
<?php
$q = mysql_query("SELECT * FROM tavolina ");
while($k = mysql_fetch_array($q)){
echo '<table><form method ="post" action="menaxhim_rezervimesh.php">';	
  echo '<tr><td  <td width="70%">'.$k['lloji'].'</td></tr>';
  echo '<tr><td><input type="number" name="nrtav" max="20" value = '.$k['sasia'].'></td>';
  echo '<input type=hidden name=hidden value = "'.$k['lloji'].'">';
  echo '<td><input type= "submit" value = "Ndrysho" name="ndrysho" ></td></tr></form>';
}
?>
</table>
</fieldset></center>