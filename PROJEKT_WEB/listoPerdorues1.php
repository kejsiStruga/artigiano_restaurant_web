<?php  
require 'jquery_js.php';
require 'connect.inc.php';?>
<link rel="stylesheet" type="text/css" href="includes/faqjakryesore.css">


<?php
include 'jquery_js.php';
//tipi != 1 => sigurohemi nk esht admin !
$query = mysql_query("SELECT * FROM vizitor where tipi != 1");

echo '<form method="get" action="fshi.php">';
echo '<fieldset><legend><h2>Vizitor Modifikim</h2></legend>';
echo'<table id="tabProdukte"  >
<tr>
<th>Emri</th>
<th>Username</th>
<th>Email</th>

<th>Regjistruar me:</th>
<th>Fshi Vizitor</th>
</tr>';
	while($row = mysql_fetch_assoc($query)) {
    echo "<tr>";
    echo "<td>" . $row['emri'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['data_regjistrimit'] . "</td>";
    echo "<td><input type='checkbox' id='checkbox' name='merrrId[]' value='",$row['id'],"' />";
}echo '</table></fieldset><br><br><center><input style="width: 12em; height: 2em;letter-spacing: 3px;" type="submit" value="Update" name="submit_button" id="fshi_check"></center></form>';

?>
<script type="text/javascript" src="js/jquery.js"></script>
<!--<a href='menaxhim_llogarish.php' class = 'link' name='link' id='",$row['username'],"'>Fshi vizitor</a></td>"-->
<script>
				if($("#fshi_check").click(function(){
				var total=$('input[name="merrrId[]"]:checked').length;	
var value = $("#checkbox").attr("value");
				           if(total>0){
							   alert("Vizitori me ID: "+value+" u fshi me sukses !");
						   }

}));

</script>

<?php
include 'includes/HEADERS/footerTOTAL.php';
?>
