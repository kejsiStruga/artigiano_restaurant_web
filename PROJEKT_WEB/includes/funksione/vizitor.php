
<?php
//ne db tek atributi profili do te mbahet path-i relativ i fotos !!!
//no browser access to the images folder !!!
//.htaccess file qe do i thot browserit qe filet n kt direktori nk dht t listohen 
function fshi($user_id){
	$user_id =(int)$user_id ;
 mysql_query("DELETE  FROM `vizitor` WHERE id=$user_id ");	
}
function ndrysho_profilin($user_id , $file_temp, $file_extn)
{	
	$file_path ='images/profili/' .substr(md5(time()), 0 , 10 ).'.'.$file_extn;
	move_uploaded_file($file_temp, $file_path);  //I TIPIT BOOL MERR SI PARAMETER EMRIN E FILE-it DHE DESTINACIONIN E FILE-it

    $user_id = (int)$user_id;
	
	mysql_query("UPDATE vizitor SET profili ='$file_path' WHERE id= $user_id ");
}
function admini($user_id)
{
	$user_id = (int)$user_id;
	$q= mysql_query("SELECT COUNT(`id`) FROM `vizitor` WHERE `id` = $user_id AND `tipi`=1");
	if(mysql_result($q,0)==1)
	{
		return true;
	}
	else{
		return false;
	}
}
function recover($mode, $email)
{
	$mode = mysql_real_escape_string($mode);
	$email= mysql_real_escape_string($email);
	
	$te_dhena_vizitor=Vizitor_te_dhena(user_id_from_email($email),'username');
	if($mode=='username'){
		//FUNX MAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIL !!!!!!!!!!!!!!!
		email($email,'Username i juaj ','Pershendetje , n\n\Username i juaj eshte'.$vizitor_te_dhena['username']);
	}
	else if($mode='password'){
		email($email,'Username i juaj ','Pershendetje , n\n\Username i juaj eshte'.md5($vizitor_te_dhena['password']));
	}
}
function ndrysho_te_dhena($user_id,$ndrysho_te_dhena) //vetem per emrin dhe mbiemrin ~!
{  
	$user_id=(int)$user_id;
	foreach($ndrysho_te_dhena as $l=>$value)
	{
	mysql_real_escape_string($value);	
	}
	foreach($ndrysho_te_dhena as $l=>$value)
	{
	mysql_query("UPDATE vizitor SET $l='$value' WHERE id = $user_id ") or die('gabim');
	}
}

function ndrysho_password($user_id, $password)
{
	$user_id=(int)$user_id;
	$password = md5($password);
	
	mysql_query("UPDATE vizitor SET password= '$password' WHERE id = $user_id ");
}
function ndrysho_email($user_id,$email)
{
	$user_id = (int)$user_id;
	
mysql_query("UPDATE vizitor SET email = '$email' WHERE id=$user_id");	
}

function regjistro_vizitor($reg_data)
{
	foreach($reg_data as $l=>$value)
	{
	    mysql_real_escape_string($value);	
	}
	$reg_data['password']=md5($reg_data['password']);
	
	$atributet = '`'.implode('`,`',array_keys($reg_data)).'`'; //implode->kthen nga array ne string
	$teDhena='\''.implode('\',\'',$reg_data).'\'';
	
	mysql_query("INSERT INTO `vizitor` ($atributet) VALUES ($teDhena)");
	//trigger_error(mysql_error()." ".$query);
	
}
//kthen te dhena nga db 
function Vizitor_te_Dhena($user_id)
{
	$teDhena = array();
	$user_id = (int)$user_id;
	
	$f_arg_nr = func_num_args();//kthen nr e paramtr t funx
	$f_get_args = func_get_args();//kthen array me parametrat e fnx
	
if($f_arg_nr>1)
{
	unset($f_get_args[0]) ;//heqim session[id]
    $atributet = '`'.implode(' `,`', $f_get_args).'`';
  
    $query=mysql_query("SELECT id,emri ,mbiemri ,username , email, password ,tipi, profili, nr_kontakti FROM `vizitor` WHERE id='$user_id'");
 // trigger_error(mysql_error()." ".$query);
 
     $teDhena = mysql_fetch_assoc($query);

return $teDhena;
	}
}

function vizitor_i_loguar()
{ //e perdorim ne cdo 
//faqe ku duam te kontrrojllojm nqs esh i loguar apo jo 
//$username = mysql_real_escape_string($username);
	if(isset($_SESSION['id']))
	{
		return true;
	}
    else 
	{
		return false;
	}
}

function ekziston($username)
{
	$username = mysql_real_escape_string($username);
		$ekziston= mysql_query("SELECT * FROM vizitor WHERE username='$username' ") or die(mysql_error("Gabim"));
			if(mysql_num_rows($ekziston)==1)
			{
            return true;
			}
	else{
		return false;
		}
		
}

function vizitor_aktiv($username)
{	
$username = mysql_real_escape_string($username);
mysql_query("UPDATE vizitor SET active=1 WHERE username = '$username' ");
$aktiv=mysql_query("SELECT * FROM vizitor WHERE username = '$username' AND active=1 ") or die(mysql_error());

if(mysql_num_rows($aktiv)==1)
{
	return true;
}	
else{
	return false;
}
}
//kur ti cojm email nqs harron passw ose username-in

function user_id_from_email($email)
{$email = mysql_real_escape_string($email);
	$vizitori = mysql_query("SELECT id FROM vizitor WHERE email='$email'");
	
	return mysql_result($vizitori, 0, 'id');
}
function user_id_from_username($username)
{ 
    $username = mysql_real_escape_string($username);

	$vizitori = mysql_query("SELECT id FROM vizitor WHERE username='$username'");
/*	while($r = mysql_fetch_array($vizitori))
		return 
			$r['id'];
	*/return mysql_result($vizitori, 0, 'id');
}
//te kontrrollojm kredencialet e user-it
function login($username, $password)
{
    $user_id =user_id_from_username($username);
	$username = mysql_real_escape_string($username);
	$password=md5($password);
//kontrrollojm nqs username perputhet me passwordin 
$user=mysql_query("SELECT * FROM vizitor WHERE username='$username' AND password='$password'");

if(mysql_num_rows($user)==1)
{
	return $user_id;
}	else
{
	return false;
}
}
function ekziston_email($email)
{
	$email = mysql_real_escape_string($email);
		$ekziston= mysql_query("SELECT * FROM `vizitor` WHERE `email`='$email' ") or die(mysql_error());
			if(mysql_num_rows($ekziston)==1)
			{
            return true;
			}
	else{ return false;}
		
}

?>