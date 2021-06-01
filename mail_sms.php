<?php
include('Database/user_Logins.php');

//get data from form
if (Login::isLoggedIn()) {
  $users = DB::query('SELECT * FROM users WHERE id=:id', array(':id'=>Login::isLoggedIn()));
  foreach ($users as $user) {
$name = $user['name'];
$email= $_POST['sender'];
$message= $_POST['msg'];
$to = "abeltony03@gmail.com";
$subject = "Mail From ".$name." Visitor";
$txt ="Name = ". $name . "\r\n  Email = " . $email . "\r\n Message =" . $message;
$headers = "From: noreply@artisansclient.com" . "\r\n" .
"CC: somebodyelse@example.com";
}
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:index.php");
}
?>
