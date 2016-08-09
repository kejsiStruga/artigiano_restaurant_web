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
<h1>Dieta Glutten-Free dhe kujdesi ndaj shendetit</h1>
Nje nder menyrat me te perhapura te jeteses sot eshte dhe dietat qe permbajne vetem ushqime te pastruara ose qe nuk permbajne gluten.
Gluten-i eshte nje komponent qe gjendet tek ushqimet e grurit. Nje arsye per te mos konsumuar ushqime te tilla eshte dhe mbajtja ne forme e linjave si dhe 
deshira per te patur nje organizem me te shendetshem. <br>
<p>
Njekja e nje diete te tille eshte me e lehte kur je ne dijeni te disa rregullave :
</p>
<h2>Konsumoni:</h2> 
Foods made from grains (and grain-like plants) that do not contain harmful gluten, including:
<ul>
<li>Amaranth </li>
<li>Oriz kafe, ose te zi</li>
<li>Patate te embla</li>
<li>Miell nga drrithra glutten-free</li>
</ul>
<h2>Mos konsumoni</h2>
<li>Qumeshti</li>
<li>Margarina</li>
<li>Djathe</li>
<li>Produkte te prodhuara ne fabrik</li></ul>';
echo '<img src = "glutenfree.jpg" width="300px" height="200px">';
?>

<?php

include 'includes/HEADERS/footerTOTAL.php';
?>