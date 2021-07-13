<?php
include('Database/DB.php');
    DB::query('DELETE FROM gallery WHERE id=:id', array(':id'=>$_GET['id']));
    header('Location:gallery.php');
 ?>
