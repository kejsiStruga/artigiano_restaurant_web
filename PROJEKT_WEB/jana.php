<?phpinclude_once 'includes/init/init.php';
include_once 'jquery_js.php';?>
<html>
<form>
<input type="checkbox" name="item[]" value="5">5
<input type="checkbox" name="item[]" value="6">6

<select>
<option value="0">Male</option>
<option value="1">Female</option>
</select>
<input type = "submit" value="Save1" 
             id="save1" onclick="a()"/>
			 </form>
<script>
function a(){
var count = $('input: checked').length;
if(count==0)
{
	alert("Ju nuk keni klikuar as1");
	
}else{alert("YEEEEEEEEEEEEEEEEEEEEEESSSSSSSSS");}/*
else{
	
	$('form').find(':checkbox').each(
	function(){
		if($(this).is(':checked'))
		{
			amt = amt +parseInt($(this).val());
		}
	});
	alert(amt);
}*/
}
</script>
</html>