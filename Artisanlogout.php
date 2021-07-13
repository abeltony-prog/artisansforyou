<?php
include('Database/DB.php');
DB::query('DELETE FROM artisan_login WHERE artisan_id =:id', array(':id'=>$_GET['artisan_id']));
echo "<script>window.open('ArtisanLogin.php', '_self')</script>";
if (isset($_COOKIE['SNID'])) {
DB::query('DELETE FROM artisan_login WHERE tokens =:token', array(':token'=>sha1($_COOKIE['SNID'])));
echo "<script>window.open('ArtisanLogin.php', '_self')</script>";
}
setcookie('SNID', '1' , time()-3600);
setcookie('SNID_', '1' , time()-3600);

?>
