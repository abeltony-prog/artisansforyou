<?php
//get data from form
$name = $_POST['name'];
$email= $_POST['sender'];
$message= $_POST['message'];
$to = "abelstilesnani280@gmail.com";
$subject = "Mail From ".$name." Visitor";
$txt ="Name :". $name . "\r\n  From: " . $email . "\r\n " . $message;
$headers = "From: ".$email."" . "\r\n" .
"CC: somebodyelse@example.com";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:index.php");
?>
