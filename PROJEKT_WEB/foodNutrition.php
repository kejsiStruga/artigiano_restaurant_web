<?php 
include_once 'includes/init/init.php';
include 'jquery_js.php';
mbro_faqet();
include 'includes/HEADERS/headerTOTAL.php'; 
echo '<h1>Food Nutrition</h1>';
if(admini($session_user_id)===true)
{
	header('Location: admin.php');
}
?>
<div class="Nutri">
<ul>
<li><a href = "glutten-free.php" >Dieta Glutten Free</a></li>
<li><a href = "vegan.php" >Dieta Vegan</a></li>
<li><a href = "produktetTona.php">Produktet Tona</a></li>
</ul>
</div>
<?php

echo "Sepse per ne shendeti eshte aspekti kryesor kur pergatisim produktet tona!";
echo 'Sigurohu se po ndjek nje diete te shendetshme ';
echo 'Me poshte gjenden disa nga artikujt me me pak kalori te pergatitura nga ne posacerisht per ju !';
?>
<br>
<br>

<?php

include 'includes/HEADERS/footerTOTAL.php';
?>