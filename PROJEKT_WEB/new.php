<?php 
include_once 'includes/init/init.php';
mbro_faqet();
include_once 'includes/HEADERS/headerTOTAL.php'; 
include_once 'jquery_js.php';
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("input[name=submit]").click(function(){
        $("#div4").hide(1000);
    });
});
</script>
</head>
<body>
<div id="div4">

<input type="submit" name="submit" value="vlkgflsjkls"/>
<p>This is a paragraph with little content.</p>
<p>This is another small paragraph.</p>
</div>
</body>
</html>
