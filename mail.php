<?php
//get data from form
$name = $_POST['name'];
$email= $_POST['sender'];
$message= $_POST['message'];
$to = "abeltony03@gmail.com";
$subject = "Mail From ".$name." Visitor";
$txt ="Name = ". $name . "\r\n  Email = " . $email . "\r\n Message =" . $message;
$headers = "From: noreply@artisansforyou.com" . "\r\n" .
"CC: somebodyelse@example.com";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:index.php");
?>
