<?php include 'jquery_js.php';?>
<div class="widget" >

<h2>Log in</h2>
  <div class="inner">
  <table>
  <form method="POST" action="logaside(login).php">
  <tr><th><label for="username">Username </label> </th></tr>
  <tr><td><input type="text" name="username" id="username">
  </td>
  </tr>
  <tr>
  <th><label for="password">Password</label></th>
  </tr>
  <tr>
  <td><input type="password" name="password" id="password">
  </td>
  </tr><tr></tr><tr><td></td></tr>
  <tr>
  <td>Keni harruar <a href="recover.php?mode=username">username</a> ose <a href="recover.php?mode=password">password</a>
  </td>
  </tr><tr></tr>
  <tr>
  <td><input type ="submit" class="reg_log" value="Login" name="login">
  </form>
  </td></tr>
  </table>

<a href ="register.php" >Regjistrohu</a>
 </div>
</div>