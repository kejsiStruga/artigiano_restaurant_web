<?php 
include_once 'includes/init/init.php';
include 'jquery_js.php';
include 'includes/HEADERS/headerTOTAL.php'; 
echo '<h1>Food Nutrition</h1>';
if(admini($session_user_id)===true)
{
	header('Location: admin.php');
}
?>

<br>
<br>
<?php
echo '
<h1>Cfare eshte Veganizmi ?</h1>
<p>Vegjetarianet nuk konsumojne produkte mishi te kuq ,mish pule, peshku, pra nuk ushqehen me ushqime mishi.</p>
<p>Nderkohe Veganet nuk ushqehen me<em> produkte qe prodhohen nga kafshet</em> </p> 
<center><img src="vegan.jpg" width="300" height="200"></center>
<p>Njerzit zgjedhin kete menyre jetese sepse i ndihmon ata te perqendrohen me shume ne aktivitetet e jetes se perditshme</p>
<p>por edhe sepse ne kete menyre mund te mbrojne kafshet nga zhdukja apo rreziqe te tjera qe i kanosen nga konsumimi i tyre.</p>
<p>Ne ju rekomandojme kete lloj jetese sepse ne kete menyre konsumoni produkte teper te ushqyeshme sic mund te jene: </p>
<ul>
<li>Fruta</li>
<li>Perime</li>
<li>Drithra</li>
<li>Fara</li>
<li>Legume</li>
</ul>
';
?>

<?php

include 'includes/HEADERS/footerTOTAL.php';
?>