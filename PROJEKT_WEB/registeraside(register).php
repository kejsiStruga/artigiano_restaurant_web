<?php 
include_once 'includes/init/init.php';
include 'includes/HEADERS/headerTOTAL.php';?>
<?php
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$emriErr = $emailErr = $mbiemriErr = $pass1Err =  $pass2Err = $usernameErr="";
$emri= $email1 = $mbiemri = $username = $pass1 = $pass2="";
//$errors = array('emri'=>" ",'email'=>" ",'mbiemri'=>" ",'pass1'=>" ", 'pass2'=>" ",'username'=>" " );
$errors = array();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["emri"])) {
   $emri = " ";
   } else {
     $emri = test_input($_POST["emri"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$emri)) {
      $errors['emri']= "Lejohen vetem karaktere dhe hapesira"; 
     }
   }
    if (empty($_POST["mbiemri"])) {
  $mbiemri ="";
   } else {
     $mbiemri = test_input($_POST["mbiemri"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$emri)) {
       $errors['mbiemri']= "Lejohen vetem karaktere dhe hapesira"; ; 
     }
   }
   
   if (empty($_POST["email1"])) {
     $errors['email']= "Ju lutem fusni nje e-mail ";
   } else {
     $email1 = test_input($_POST["email1"]);
     // check if e-mail address is well-formed
     if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
       $errors['email']= "Fusni nje e-mail te sakte"; 
     }
   }
     
   if (empty($_POST["username"])) {
      $errors['username'] = "Username eshte i detyrueshem";
   } else {
     $username = test_input($_POST["username"]);
    
   }

   if (empty($_POST["pass1"])) {
     $errors['pass1'] = "Passwordi eshte i detyrueshem";
   } else {
     $pass1= test_input($_POST["pass1"]);
   }

   if (empty($_POST["pass2"])) {
      $errors['pass2'] = "Ju lutem konfirmoni passwordin ";
   } else {
	   
     $pass2 = test_input($_POST["pass2"]);
   if($pass1!==$pass2)
   {
	   $errors['pass2'] = "Rishkruajeni dhe njehere !";
   }
   }
   if(count($errors)==0)
	{
			$emri1 = mysql_escape_string($emri);
			$mbiemri1 = mysql_escape_string($mbiemri);
			$username1 = mysql_escape_string($username);
			$email11 = mysql_escape_string($email1);
			
			$pass11 = mysql_escape_string( $pass1);
			$pass21 = mysql_escape_string( $pass2);
						
		
		$ekz= mysql_query("SELECT * FROM vizitor WHERE username='$username1' ") or die(mysql_error());
			if(mysql_num_rows($ekz)>0)
			{
            echo "Ky perdorues ekziston. Logohu me nje emer tjeter.";
			
			}
 //fusim te dhenat e vizitorit pa llogari ne DATABAZE
		 else{  mysql_query("INSERT INTO `vizitor` (`id`, `emri`, `mbiemri`, `username`, `E-mail`, `password`) VALUES (NULL, '$emri1', '$mbiemri1', '$username1', '$email11', '$pass11')") or die(mysql_error());
         echo "Ju u regjistruat me sukses ";	
		}
	}

$pass1 = md5($pass1)	

}
else {
		function error_for($n)
{
	global $errors ;
	if(!empty($errors[$n]))
	{
		return $errors[$n];
	}
}
}
?>

<h1>Regjistrohu</h1>
<form action="registeraside(register).php" method="POST">
<table class="form">
<tr>
<th><label for="emri" >Emri: </label></th>
        <td><input type="text" name="emri" value="<?php echo $emri;?>"/>
		<?php echo  error_for('emri');?>
		</td>
		</tr>
<tr>
   <th><label for="mbiemri"> Mbiemri: </label></th>
   <td><input type="text" name="mbiemri" value="<?php echo $_POST['emri'];?>"/>
<?php echo error_for('mbiemri');?>
   </td></tr>
   
<tr>
   <th><label for="username"> Username: </label></th>
   <td><input type="text" name="username" value="<?php echo $username;?>"/>
  <?php echo error_for('username');?>
   </td></tr>
   
<tr >
<th><label for="email1"> E-mail: </label></th>
<td><input type="text" name="email1" value="<?php echo $email1;?>"/>
<?php echo error_for('email1');?>
   </td></tr>
<tr>
   <th><label for="pass1"> Password: </label></th>
   <td><input type="password" name="pass1" />
   <?php echo error_for('pass1');?>
   </td></tr>   
<tr>
   <th><label for="pass2"> Konfirmo Password: </label></th>
   <td><input type="password" name="pass2"/>
 <?php echo error_for('pass2');?>
 </td></tr> 
   
   <tr ><th align="center"><input type="submit" value="Regjistrohu"/></th></td>
</table>
</form>

<?php }?>


    </div>
<?php include 'includes/HEADERS/footerTOTAL.php'?>