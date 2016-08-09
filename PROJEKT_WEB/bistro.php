<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Artigiano Coffee and Food Menu Javore</title>
<?php 
include_once 'includes/init/init.php';
include_once 'includes/HEADERS/headerTOTAL.php'; 
include_once 'jquery_js.php';
?>
<style>
bistro{
    font-family: Georgia, serif;
    font-size: small;
    line-height: 175%;
    padding: 20px;
}
#header p {
    font-style: italic;
    color: gray;
}
h1{
    font-size: 1.5em;
    color: purple;
}
h2{
    font: bold 1em Georgia, serif;
    text-transform: uppercase;
    letter-spacing: 8px;
    color: purple;
}
dt {
    font-weight: bold;
}
.price {
    font-style: italic;
    font-family: Georgia, serif;
}
.label {
    font-weight: bold;
    font-variant: small-caps;
    font-style: normal;
}
strong {
    font-style: italic;
}
dt{
    font-weight: bold;
    color: olive;
}
dt strong {
    color: maroon;
}
p.warning, sup {
    font-size: x-small;
    color: red;
}
#header, h2, #appetizers p, #entrees p {
    text-align: center;
}
#appetizers p, #entrees p {
    font-style: italic;
}
</style>
<div id="bistro">
<div id="header">  
<h1> Artigiano Coffee and Food &bull; Menu Javore </h1> </div>

<!--Kryqezimi i Librit Universitar, Tirane <br> Oret: H-P: 11 me 9, P-D; 11 deri ne mesnate 
-->
<div id="appetizers"> <br> </div>
<?php
//$query_data= mysql_query("SELECT * FROM menu_javore  WHERE data IN (SELECT MAX(data) FROM menu_javore)");
$query_data2 = mysql_query("SELECT emri,cmimi,pershkrime FROM produkte  WHERE id IN(SELECT produkt_id FROM menu_javore WHERE data IN (SELECT MAX(data) FROM menu_javore))");

echo '<div id="main"> <h2>Vaktet kryesore </h2> </div>';
echo '<center><dl>';

while($row = mysql_fetch_array($query_data2) )
{
	echo  '<dt>'.ucwords($row['emri']).'</dt>';
	echo '<dd>'.ucwords($row['pershkrime']).'.<span class="price">&nbsp' .round($row['cmimi']-($row['cmimi']*0.05)).' l.</span><dd><br>';
}
?>
</dl></center>

<div id="warnings" class="footnote"> </div>
<br>
<br>
<br>
<p> <sup>*</sup> Perfitoni nga zbritjet e menuse javore. </p>
</div>

</html>
