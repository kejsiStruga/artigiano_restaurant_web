<?php
include 'includes/init/init.php';
include 'includes/HEADERS/headerTOTAL.php'; 
include 'jquery_js.php';
?>
<?php
if(isset($_POST['rezervime']))
{$q = mysql_query("SELECT* FROM rezervime R, vizitor V  WHERE R.emri=V.username AND V.username = 'jola'");
//trigger_error(mysql_error()." ".$q);
echo '<div> Ju keni rezervuar:';		
		while($r = mysql_fetch_array($q))
		    {
            echo $r['data'];
			echo $r['tavolina'];
            }
echo ' </div>';
}?>