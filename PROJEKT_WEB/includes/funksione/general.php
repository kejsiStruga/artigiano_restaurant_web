<?php
function mbro_admin()   
{	
global $vizitor_te_dhena;

if(admini($vizitor_te_dhena['id'])==false){
	header('Location: Artigiano.php');
   exit();
}
}
function email($to, $subjekt,$msg)
{
	mail($to, $subjekt, $msg, 'From: myartigi@myartigiano.com');
}

function logged_in_drejto() //nqs perdorusi esh loguar por do ta aksesoj prp faqen (permes urls) nuk e lejojme 
{
	if(isset($_SESSION['id']))
	{
		header('Location: Artigiano.php');
		exit();
	}
}
function mbro_faqet() //kete funx e therrasim ne gjjithfaqet qe duam te mbrojm
{
	if(!vizitor_i_loguar())
	{
      header('Location: ndalo.php');
        exit();
	}
}
function output_errors($errors)
{
return '<ul><li>'. implode('*<li></li>', $errors). '*</li></ul>'; 
}
function sanitize_data($d)
{
 return htmlentities(strip_tags($d));
}
//implode() eshte e kundrta e explode(nga aray e kthen ne string)

?>