<?php  
require 'jquery_js.php';
require 'connect.inc.php';?>
<link rel="stylesheet" type="text/css" href="includes/faqjakryesore.css">
<?php
$q = $_GET['q'];
$query = mysql_query("SELECT * FROM `produkte` WHERE `emri`='$q'");	
if($query)
{
 echo'<center><fieldset style="width: 340px;height: 200px"> <legend>'.'<h3>'.ucfirst($q).'</h3>'.'</legend>';
 echo "<table><tr>";
while($row = mysql_fetch_assoc($query)) {
   
    echo "<th style='align: left;'>Emri:</th> <td>". $row['emri'] . "</td></tr>";
    echo "<tr>";
    echo "<th>Cmimi:</th> <td>" . $row['cmimi'] . "</td></tr>";
    echo "<tr>";
    echo "<th>Kategoria:</th><td>" . $row['kategoria'] . "</td></tr>";
    echo "<tr>";
    echo "<th>Pershkrime:</th> <td>" . $row['pershkrime'] . "</td></tr>";
    echo "<tr>";
    echo "<th>Kalori:</th><td>" . $row['kalori'] . "</td></tr>";
   
  }
 echo "</tr></table></fieldset></center>";
}
include 'includes/HEADERS/footerTOTAL.php';
?>
