<?php  
include_once 'includes/init/init.php';
require 'jquery_js.php';
require 'connect.inc.php';
?>
<link rel="stylesheet" type="text/css" href="includes/faqjakryesore.css">

<?php
if(isset($_GET['submit_button'])&&!empty($_GET['merrrId']))
{
	foreach($_GET['merrrId'] as $id)
	{
		fshi($id);
    }
	echo 'Update u krye me sukses !';
	header("Location: menaxhim_llogarish.php");
	exit();
}else if(isset($_GET['submit_button'])&&empty($_GET['merrrId']))
{
	$q = $_GET['submit_button']?>
	<script>
	alert("Fshi nje vizitor !");
	</script>
	
	<?php
}	header("Location: menaxhim_llogarish.php");
	exit();

?>

