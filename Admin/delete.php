<?php
include("../Database/DB.php");
DB::query('DELETE FROM location WHERE id=:id', array(':id'=>$_GET['id']));
echo "<script>window.open('Citylist.php', '_self')</script>";
 ?>
