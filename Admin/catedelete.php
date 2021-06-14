<?php
include("../Database/DB.php");
DB::query('DELETE FROM categories WHERE id=:id', array(':id'=>$_GET['category_id']));
echo "<script>window.open('category_list.php', '_self')</script>";
 ?>
