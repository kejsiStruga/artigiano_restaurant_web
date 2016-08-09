<?php
include_once 'includes/init/init.php';
//mbro_faqet();
include_once 'includes/HEADERS/headerTOTAL.php'; 
include_once 'jquery_js.php';
require 'products.php';
if(admini($session_user_id)===true)
{
	header('Location: admin.php');
}
?>
<?php
					/*
						1. nqs e klikon butonin pa shkruajtur asnje produkt => nk shfaq asgje
						2. nqs query nuk kthen asnje rresht, dmth qe produkti nuk ekziston => afishojm ky prod nk ekziston
						perndryshe shfaqet prod me gjith atributet 
					*/
					if(isset($_POST['emri'])&&!empty($_POST['emri'])) {
					$kriteri = $_POST['emri'];
					$p = '%'.$kriteri.'%_%';
					//$pl = '%'.$kriteri.'[]%';
					$query = "SELECT * FROM  produkte WHERE emri LIKE '".$p ."' and sasia>0";
					$data = mysql_query($query);
					if(mysql_num_rows($data)==0)
					{
						echo '<h1>Ky produkt nuk ekziston !</h1>';

					}	
					else{
						echo "<table><thead><th>Foto</th><th>Emri</th><th></th><th>Cmimi</th></thead>";
					while($rresht = mysql_fetch_assoc($data)){
						echo "<tr><td><img width='50px' height='50px'src='" . $rresht['foto'] . "'></td>";
						echo "<td>". ucfirst($rresht['emri']) . "</td><td></td><td>". $rresht['cmimi'] . " lek</td></tr>";
					}	
						
					echo "</table>";
					}}	
	?>

    </body>
</html>
