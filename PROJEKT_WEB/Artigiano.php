<?php 
include_once 'includes/init/init.php';
include_once 'includes/HEADERS/headerTOTAL.php'; 
include_once 'jquery_js.php';

?><h1>Restaurant and Coffee</h1>
<?php

if(!vizitor_i_loguar())
{?>
<span><h2>Mireserdhet !<h2>
</span>
<?php
}?>
 <div id="slider">
                <ul class="slides">
                    <li class="slide slide1"><img src="slide1.jpg"></li>
                    <li class="slide slide2"><img src="slide9.jpg"></li>
                    <li class="slide slide3"><img src="slide3.jpg"></li>
                    <li class="slide slide4"><img src="slide4.jpg"></li>
                    <li class="slide slide5"><img src="slide5.jpg"></li>
                    <li class="slide slide1"><img src="slide6.jpg"></li>
                    <li class="slide slide1"><img src="slide7.jpg"></li>
                    <li class="slide slide1"><img src="slide8.jpg"></li>
					
                </ul>
  </div>
<h2><a href="bistro.php">Menu Javore</a><h2>
<?php
if(admini($session_user_id)===true)
{
	header('Location: admin.php');
}
?>
<?php
  include 'includes/HEADERS/footerTOTAL.php';
?>