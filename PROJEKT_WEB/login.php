<!DOCTYPE HTML> 
<html>
<head>
</head>
<?php require 'connect.inc.php';?>
<body>
<?php
$emriErr=$usernameErr= $emailErr = $pass1Err=$pass2Err = $mbiemriErr=" ";
$mbiemri=$emri=$username=$email=$pass1=$pass2 =  " ";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["emri"])) {
     $emri=" ";
   } else {
     $emri = test_input($_POST["emri"]);
     if (!preg_match("/^[a-zA-Z ]*$/",$emri)) 
	 {
       $emriErr = "Vetem karaktere dhe hapesira lejohen"; 
     }
   } 
   if (empty($_POST["mbiemri"])) {
     $mbiemri= " ";
   } else {
     $mbiemri = test_input($_POST["mbiemri"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$mbiemri)) {
       $mbiemriErr = "Vetem karaktere dhe hapesira lejohen"; 
     }
   }
if (($_POST["email"])==NULL) {
     $emailErr = "Email eshte i detyrueshem";
	
   } else {
     $email = test_input($_POST["email"]);
     //kontrrollo e-mail address 
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Fut nje E-mail te vlefshem"; 
     }
   }
    if (empty($_POST["username"])) {
     $usernameErr = "Username eshte i detyrueshem";
	
   } else {
     $username = test_input($_POST["username"]);
   }

   if (empty($_POST["pass1"])) {
     $pass1Err = "Password eshte i detyrueshem";
	
   } else {
     $pass1 = test_input($_POST["pass1"]);
   }
    if (empty($_POST["pass2"])) {
     $pass2Err = "Rishkruaj passwordin";
   } else {
     $pass2Err = test_input($_POST["pass2"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);               
   return $data;
}
?>
</head>
<h1 align="center">Regjistrohu neqoftese nuk ke Llogari !</h1><br><br><br>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

Emri: <input type="text" name="emri" value="<?php echo $emri;?>"/>

<span class="error"> <?php echo $emriErr;?></span>
<br><br>

Mbiemri: <input type="text" name="mbiemri" value="<?php echo $mbiemri;?>"/>
<br><br>

E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
   
Username: <input type="text" name="username" value="<?php echo $username;?>"/>

<span class="error">* <?php echo $usernameErr;?></span>
<br><br>

Password: <input type="password" name="pass1" />

<span class="error">* <?php echo $pass1Err;?></span>
<br><br>

Perserit Password-in: <input type="password" name="pass2"/>

<span class="error">* <?php echo $pass2Err;?></span>

<br><br><br>
<input type="submit" name="submit" value="Submit"/>
   
</form>
</body>
</html>