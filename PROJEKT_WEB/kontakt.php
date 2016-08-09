<?php 
include 'includes/init/init.php';
include 'jquery_js.php';
include 'includes/HEADERS/headerTOTAL.php'; 
 echo '<h1>Na kontaktoni </h1>';
 if(admini($session_user_id)===true)
{
	header('Location: admin.php');
}
?>
 <?php
 if(isset($_POST['submit']))
{	if (!preg_match("/^[a-zA-Z ]*$/",$_POST['emri'])) {
       $errors[] = "Per emrin lejohen vetem hapesira dhe karaktere "; 
     }else{
		 $name=$_POST['emri'];
	 }
	 if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		 $errors[] = 'Kerkohet nje email i sakte';
	 }
}
if(count($errors)>0)
{
	echo output_errors($errors);
}
else if(isset($_POST['submit'])&&count($errors)==0){
	
	if(mysql_query('INSERT INTO kontaktime VALUES ( "' .$_POST['emri'].'", "' .$_POST['email'].'", "' .$_POST['subjekti'].'", "' .$_POST['mesazhi'].'" )'))
	{
		echo 'Faleminderit, kerkesa juaj u dergua me sukses !';
	}
	else{
		echo die();
	}
}
?>
<style>
#kont {
	width: 400px;
}
#kont  ul{
	list-style-type:none;
}
#kont  ul li{
	margin: 15px 0;
}
#kont  label{
	display: block;
	font-size: 1.5em
}
#kont input{
	width: 80%;
	padding: 5px;
	border: #ccc 3px solid;
}
</style>

<form id="kont" action="kontakt.php" method="post">
<ul>
<li>
<label for="emri">Emri: </label>
<input type="text" required  placeholder="Emri" name="emri" id="emri"/>
</li>
<li>
<label for="email">Email: </label>
<input type="text" required  placeholder="Email" name="email" id="email"/>
</li>
<li>
<label for="subjekti">Subjekti: </label>
<input type="text"required  placeholder="Subjekt" name="subjekti" id="subjekti"/>
</li>
<li>
<label for="mesazhi">Mesazhi: </label>
<textarea id="mesazhi"  required  maxlength="400" placeholder="Mesazhi juaj ..." name="mesazhi" cols="43" rows="9">
</textarea>
</li>
<li>
<input type="submit" value="Dergo" name="submit" >
</li>
</ul>
</form>

 <?php
include 'includes/HEADERS/footerTOTAL.php';
?>