<?php 
include_once 'includes/init/init.php';
include_once 'jquery_js.php';
mbro_faqet();
mbro_admin();
//nqs perdoruesit duan ta axesojn por nuk jn admin =>i ridrejtojm
//tek faqja kryesore
include 'includes/head.php';
//ketu nuk e pranon init.php qe ka sesionin ????????????????????????????????????/
include 'includes/headerAdmin.php'; 
include 'includes/aside.php';
echo '<br></br>';
echo '<br></br>';
?>
<?php 

$query = mysql_query("SELECT COUNT(*)-1 FROM vizitor ");

echo '<center><div id="kr" style="margin-top: 30px">';
if(mysql_num_rows($query)>0)
{
  echo '<center><h1>Ne sistem ndodhen te regjistruar: '.mysql_result($query,0).' vizitor me llogari</h1></center>'; 
  echo '<p></p>';
echo '<p></p>';
echo '<br></br>';
}
echo '<form action="menaxhim_llogarish.php" method="get" id="form">';
$veprim = array( 1=>'listoPerdorues1.php', 2=>'fshiPerdorues.php');
?>
<center><input type="button" style="width: 20em; height: 2em;letter-spacing: 3px;" name="<?php echo $veprim[1];?>"value="Listo" id="listo"/></center>
<br>
<br>
</form>
</div>
</center>
<script>
$('#listo').click(function(){
var a = $(this).attr('name');
$("#kr").load(a);
});
$('#fshi').click(function(){
var b = $(this).attr('name');
$("#kr").load(b);
});
</script><?php
include 'includes/HEADERS/footerTOTAL.php';
?>