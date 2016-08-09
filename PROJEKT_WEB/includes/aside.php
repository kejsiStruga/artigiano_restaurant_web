<aside >
<?php
if(vizitor_i_loguar())
{
	require 'includes/widgets/loggedin.php';
}
else
{
require 'includes/widgets/logaside(login).php'; 
}
?>
</aside>