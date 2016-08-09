<?php 

include_once 'includes/init/init.php';
mbro_faqet();
include_once 'includes/HEADERS/headerTOTAL.php'; 
include_once 'jquery_js.php';
require 'products.php';
if(admini($session_user_id)===true)
{
	header('Location: admin.php');
}

 echo '<br>
 		<br><br>
<div>
 		<p>Me aplikimin online, ju deklaroni se jepni miratimin tuaj për të proceduar me porosine tuaj.<p>
<p>Artigiano thekson se dhënia e të dhënave tuaja personale nuk është e detyrueshme dhe është në dëshirën e çdo subjekti për të dhënë vullnetarisht informacionin e kërkuar dhe për të vijuar më tej me aplikimin për qëllimin për të cilën ajo kërkohet.</p> 
<p>Të dhënat do të grumbullohen, përpunohen dhe ruhen nga Artigiano në përputhje të plotë me parashikimet e ligjit nr. 9887 date 10.03.2008 “Për Mbrojtjen e të Dhënave Personale”.</p><p>
 Këto veprime do të kryhen sipas parimit të respektimit dhe garantimit të drejtave dhe lirive themelore të njeriut dhe në veçanti të drejtës së ruajtjes së jetës private.

</p>
</div>'
;
include 'includes/HEADERS/footerTOTAL.php';
?>
