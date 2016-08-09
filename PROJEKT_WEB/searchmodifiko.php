<?php
include_once 'includes/init/init.php';
include_once 'jquery_js.php';
mbro_faqet();
mbro_admin();
//nqs perdoruesit duan ta axesojn por nuk jn admin =>i ridrejtojm
//tek faqja kryesore
include 'includes/head.php'; 
include 'includes/headerAdmin.php'; 
include 'includes/aside.php';
echo '<br></br>';
echo '<br></br>';
mbro_faqet();
mbro_admin();
//nqs perdoruesit duan ta axesojn por nuk jn admin =>i ridrejtojm
//tek faqja kryesore
include_once 'includes/head.php'; 
//include_once 'includes/headerAdmin.php'; 
//include_once 'includes/aside.php';?>
<?php
$query = mysql_query("SELECT * FROM `produkte` ");	
  if(mysql_num_rows($query)>0)
{
	echo '<form name="gjej" method="POST" action="searchmodifiko.php"><select name="select">';
  while($k =mysql_fetch_assoc($query))
   {
	echo '<option>'.$k['emri'].'</option>';
	
    } 
echo '</select> 
<input type="submit" id="modifiko_produkt" value="Modifiko produkt"/> 
</form>'; //BUTONIIIIII KUR SELECT NJE PRODUKT PER TE MODIFIKUAR 
}?><?php
?>
<script type='text/javascript'>
function formValidator()
{
    // Make quick references to our fields
    alert("hiiiiiii");
    var name = document.getElementById('emri').value;

    if( name=="" || name==null)
     {
         alert("Please Enter user name");
         return false;
     }
    return true;
}
</script>
<?php
if(isset($_POST['select'])){
$k=$_POST['select'];
$query = mysql_query("SELECT * FROM produkte WHERE  emri='$k'");
echo '<center><fieldset style="width: 80px"> <legend><h1>Modifiko Produkt</h1></legend>
<form action="searchmodifiko.php" method="POST" enctype="multipart/form-data" name="modifikim2"   onsubmit="return formValidator()" >
 <table>';
while($r = mysql_fetch_assoc($query))
	{
	  	echo '<input type="text" name="emri" value= "'.$r['emri'].'"';
	}

?>
<tr><th><input type="submit" value="Ndrysho" name = "kejsi"/></th></tr>
 </table>
 </form>
 </fieldset>
 </form>
 </div>
<?php
}
?>