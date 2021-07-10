<?php
include('Database/DB.php');
DB::query('DELETE FROM users_login WHERE user_id =:id', array(':id'=>$_GET['users_id']));
echo "<script>window.open('index.php', '_self')</script>";
if (isset($_COOKIE['SNID'])) {
DB::query('DELETE FROM users_login WHERE tokens =:token', array(':token'=>sha1($_COOKIE['SNID'])));
  echo "<script>window.open('index.php', '_self')</script>";
}
setcookie('SNID', '1' , time()-3600);
setcookie('SNID_', '1' , time()-3600);
 ?>
