<?php
session_start();
require '../includes/backbone.php';
require '../includes/functionalities.php';

$comment = $_GET["comment"];
$commentator = get("full_name");
$commented_time = date("h:ia");
$commentId = $_GET["commentId"];
$postId = getId($commentId);

$connection = mysqli_connect($server_name, $database_username, $database_password, $database_name);
$sql = "INSERT INTO `comments`(`post_id`, `commentor`, `commentor_id`, `comment`, `commented_time`) VALUES (".$postId.", '". get("full_name"). "', ". get("id"). ", \"". $comment . "\", '$commented_time')";
mysqli_query($connection, $sql);



?>
