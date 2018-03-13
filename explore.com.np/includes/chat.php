<?php
session_start();
if(isset($_SESSION["username"])){
require 'header.php';
$title = "";
$message = "";
$emailId = "";
require 'functionalities.php';
echo "<h2> CHAT </h2>";
if(isset($_SERVER["QUERY_STRING"])){
	$selectedUser = $_SERVER["QUERY_STRING"];
	chatNow($selectedUser, getEmailAddress($selectedUser));
	echo getEmailAddress($selectedUser);
	if(isset($sendMessageButton)){
// 	if(isset($_POST["message"]) && isset($_POST["sendMessageButton"])){
// 	$title = $_SESSION["username"] . " sent a message from eXPLORE!";
// 	$message = $_POST["message"];
// 	$emailId = getEmailAddress($selectedUser);
// 	mail($emailId, $title, $message);
// 	if(mail($emailId, $title, $message)){
// 		?> <script> alert("Your message was sent successfully!"); </script> <?php
// 	}
	
// }
}
}
}else{
	header("Location: home.php");
}
