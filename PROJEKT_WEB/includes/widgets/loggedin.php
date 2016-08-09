<div class="widget">

<h2>Pershendetje, <?php echo ucfirst($vizitor_te_dhena['username']).' !'; ?></h2>
  <div class="inner">
  <div class="profili">
  <?php 
  //kontrrollojm nqs esh b submit forma

  if(isset($_FILES['profili']))
  {
	  if(empty($_FILES['profili']['name']))
	  {
		  echo '<h1>Zgjidhni nje foto*</h1>';
	  }
	  else{
		  $lejuar = array('jpeg','jpg','gif','png');
		  $file_name = $_FILES['profili']['name'];
		  $exp = explode('.',$file_name);  //  kthej STRINGUN N ARRAY !!!!!!
		  $fundit = strtolower($exp[count($exp)-1]);
		  $file_extn = $fundit;
		  $file_temp = $_FILES['profili']['tmp_name'];
		if(in_array($file_extn,$lejuar))
		{
            ndrysho_profilin($vizitor_te_dhena['id'] , $file_temp, $file_extn);
            header('Location: Artigiano.php?ndryshoi');			
		}else{
		
			echo 'Ky tip imazhi nuk lejohet <br> Sigurohu te fusesh nje nga tipet e meposhtme:
			
			<br>';
			foreach($lejuar as $l)
			{
				echo '<b>'.$l.'</b>'.' <br>';
			}
			
		}
	  }
  }
  if(!empty($vizitor_te_dhena['profili']))
  {
	  echo '<img src="', $vizitor_te_dhena['profili'], '" alt = "Imazhi i Profilit te"', $vizitor_te_dhena["username"],'>';
  }
  ?>
<form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="profili">
   <br><br>
  <input type="submit" value = "Dergo">
  </form>
  </div>
 <table>
	  <tr><td><a href="logout.php">Logout</td></tr>
	  <tr></tr>
	  <?php
	  if(!admini($session_user_id))
	  { ?><tr><td><a href="/PROJEKT_WEB/<?php echo $vizitor_te_dhena['username'];?>">Profili<td></tr>
          <?php
	  }
		  ?>
		  <tr><td><a href="ndryshopassword.php">Ndrysho Passwordin</td></tr>
	  <tr><td><a href="settings.php">Settings</td></tr>
 </table>
 </div>
</div>