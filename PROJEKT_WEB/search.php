<?php  
require 'jquery_js.php';
require 'connect.inc.php';
?>
<?php
$q = $_REQUEST["q"];
$arr =array();
$query = mysql_query("SELECT * FROM produkte WHERE  emri LIKE '%{$q}%' ");
while($row = mysql_fetch_assoc($query))
{
	$row['emri'] = strtolower($row['emri']);
	array_push($arr,$row['emri']);
}
//mer parametrin 1 nga url-ja
$produkt = "";

if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($arr as $n) {
        if (stristr($q, substr($n, 0, $len))) {
            if ($produkt === "") {
                $produkt = $n;
            } else {
                $produkt .= ", $n";
            }
        }
    }
}
echo $produkt === "" ? "Asnje rezultat" : $produkt;
?>