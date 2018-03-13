<?php
session_start();
require '../includes/backbone.php';
require '../includes/functionalities.php';
$postId = $_GET["postId"];


$connection = mysqli_connect($server_name, $database_username, $database_password, $database_name);
$sql = "SELECT * FROM comments WHERE post_id=".$postId;
$result = mysqli_query($connection, $sql);
while($row = mysqli_fetch_assoc($result)){
	$rows[] = $row;
}
header("Content-type:application/json"); 
echo json_encode($rows);

