<?php
  include('../Database/DB.php');
  DB::query('DELETE FROM comment WHERE id=:id', array(':id'=>$_GET['comment_id']));
  echo "<script>alert('Comment deleted !!')</script>";
  header('Location:comments.php');
 ?>
