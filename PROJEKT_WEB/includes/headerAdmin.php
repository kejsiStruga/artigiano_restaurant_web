<?php
include_once 'includes/init/init.php';
include 'jquery_js.php';
?>
<header class="header"> 
<div class="clear" >
</div>
</header>
<div style="padding-left: 194px">
<h1 class="admin"><b>Faqe Admin </b></h1>
</div>
<div id="container">
<br>
<?php $veprime= array(1=>'Menaxho Menu', 2=>'Menaxho Restorant', 3=>'Menaxho Porosi',4=>'Menaxho Llogarite',5=>'Menaxho Rezervime')?>
<nav id="navAdmin">
<ul id="nAdmin">
<li>
<a href="MENAXHIM_MENUJE.php"><?php echo $veprime[1];?></a>
</li>
<!--<li>
<a href="MENAXHIM_CONTENT.php"><?php echo $veprime[2];?></a>
</li>-->
<li>
<a href="MENAXHIM_POROSISH.php"><?php echo $veprime[3];?></a>
</li>
<li>
<a href="menaxhim_llogarish.php"><?php echo $veprime[4];?></a>
</li>
<li>
<a href="MENAXHIM_REZERVIMESH.php"><?php echo $veprime[5];?></a>
</li>
</ul>
</nav>
<script type="text/javascript" src="js/mut2.js"></script>