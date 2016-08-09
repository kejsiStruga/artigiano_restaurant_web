<html>

<body>
<?php 
include_once 'includes/init/init.php';
include_once 'jquery_js.php';
mbro_faqet();
mbro_admin();
/*nqs perdoruesit duan ta axesojn por nuk jn admin =>i ridrejtojm
tek faqja kryesore
*/include 'includes/head.php';
//sePSE ESHTE TEK HEADER ADMIN 
include 'includes/headerAdmin.php'; 
include 'includes/aside.php';
echo '<br></br>';
echo '<br></br>';
?>
<div id="kr" style="margin-top: 30px">
<center><form action="MENAXHIM_MENUJE.php" method="post" id="form">
<!--<select style="align: center;" name="select" id="select">-->
<?php 
$veprim = array('shtoProdukt.php'=>'Shto Produkt','MODIFIKO2.php'=>'Modifiko Produkt','fshiProdukt.php'=>'Fshi Produkt',
'listoProdukte.php'=>'Listo Produkte','menuJavore.php'=>'Krijo Menu Javore','fshiMenuJavore.php'=>'Fshi Menu Javore');
foreach($veprim as $l=>$value)
{
	echo '<input type="button" class="k" style="width: 20em; height: 2em;letter-spacing: 3px;" name="',$l,'"value="',$value,'"/><br><br>';
}
?>
<input type="button" style="visibility: hidden" value="Kthehu" id="kthehu"/>
<div type="hidden" id="div_errrors"></div>
</form></center>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script>
$('.k').click(function(){
	
	$(this).fadeOut('100');
	var k = $(this).attr('name');
    location.replace("http://localhost/PROJEKT_WEB/"+k);
	return false;
});
</script>
<?php
include 'includes/HEADERS/footerTOTAL.php';
?>
</body>
</html>