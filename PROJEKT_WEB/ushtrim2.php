<?php

$studentet = array(1=>'S1',2=>'S2',3=>'S3');
$lendet = array(1=>'L1',2=>'L2',3=>'L3');
$notat = array(1=>array('n11','n12','n13'),2=>array('n21','n22','n23'),3=>array('n31','n32','n33'))

$s = fopen("notat1.txt", "w");

for($studentet as $st)
{
	fwrite($s, $st);
}



?>