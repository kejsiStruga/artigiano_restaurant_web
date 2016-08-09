<html>
<?php
?>
<?php

echo '<form id="fo">
<input type="checkbox">5
<input type="checkbox">4
<input type="checkbox">8
<input type="checkbox">2016-05-20
<input type="submit"  id="submit" onclick="kejsi()" value="dergo">
</form>';
?>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js"></script>
<script>
function kejsi(){
        alert("Ju klikuat :"+$("input:checked").length+"!");
		if($("input:checked").length>0)
		{jQuery("#fo").each(function(){
			if($(this).is(':checked'))
			{
				alert("oko");
			}
			
		});
	alert(a);
		}
	}
</script>

</html>