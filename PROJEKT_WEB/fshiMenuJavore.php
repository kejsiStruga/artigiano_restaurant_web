<?php
include_once 'includes/init/init.php';
include_once 'jquery_js.php';
include_once 'includes/init/init.php';
mbro_faqet();
mbro_admin();
//nqs perdoruesit duan ta axesojn por nuk jn admin =>i ridrejtojm
//tek faqja kryesore
include 'includes/head.php'; 
include 'includes/headerAdmin.php'; 
include 'includes/aside.php';
echo '<br></br>';
echo '<br></br>';
?>
<?php
if(isset($_POST['fshi'])&&!empty($_POST['fshi'])&&!empty($_POST['name']))
{
?>	     
		 <?php 
		mysql_query("DELETE FROM `menu_javore` WHERE data IN ('".implode(",",array_values($_POST['name']))."')");
	//implode kthen n string el e array

}
else if(isset($_POST['fshi'])&&!empty($_POST['fshi'])){
	
	?>
	<script>
	alert("Zgjidh te pakten nje menu per te fshire !");
	</script>
	
	<?php
 /*  echo '<meta HTTP-EQUIV="REFRESH" content="0; url=fshiMenuJavore.php">';
	exit();	
*/}?>
<script>
function b1()
{	
var v = document.getElementsByTagName("input");
var checked = 0;   
for (var i = 0; i < v.length; i++) {   
    var input = v[i];
    if('checkbox' == v[i].type && v[i].checked)
        checked++;
}
	if(checked == 0){
		alert("asnji prod");
	}

	else{
		var k = document.getElementById('pp').innerHTML;
	    if(!confirm("Jeni te sigurt se deshironi te fshini menune:  ?"))
	          {	   alert("nuk u fshi ");
	
	           }

	  else{
		  alert("nuk u fshi ");
	  }	
}}
function f(){
$("#tabledata").dataTable();
{
	$('#select-all').click(function(){
		if(this.checked=true){
			$(':checkbox').each(function(){
				this.checked = true;
				alert("ojdaojf");
			});
		}else{
			$(':checkbox').each(function(){
				this.checked = false;
				alert("ojdaojf");
			});
		}
	});
}}
</script>
<?php
$q = mysql_query("select DISTINCT data from menu_javore where data in ( select data from menu_javore group by data having count(*) > 1 ) ORDER BY data ASC");
?>
<h1>Menute e ruajtura ne sistem: </h1>
<?php
$arr = array();
$arr2 = array();
echo '<form action="fshiMenuJavore.php" method="post">
       <table id="tabledata">';
while($r = mysql_fetch_array($q))
{    
	echo '<tr><th>'.$r['data'].'<input type="checkbox" name="name[]  id="select-all" value="'.$r["data"].'"" /></th></th>';
     echo '<tr></tr>';
     echo '<tr></tr>';
	echo '<input type="hidden" id="pr" name="data" value="'.$r["data"].'"></td>';
}
echo '</table>';
echo '<br>';
echo '<input type="submit"  id="new" name="fshi" onclick="f()" value="Fshi Menu">';
echo '</form>';
?>