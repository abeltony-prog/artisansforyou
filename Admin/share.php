<?php
include('../Database/DB.php');
$permit = "1";
DB::query('UPDATE comment SET permit=:permit WHERE id=:commentid', array(':commentid'=>$_GET['comment_id'],':permit'=>$permit));
header('Location:comments.php');
 ?>
