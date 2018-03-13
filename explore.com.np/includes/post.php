<?php
require_once 'functionalities.php';
?>

<div class="postNow" id="postDiv">
	<button id="closePost" > <i class="fa fa-times" onclick="closePost();"> </i> </button>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	<span> <h3> Make the people your audience </h3> <input type="checkbox" name="type" value="query"> Query </span>
	   <textarea onclick="makeButtonsVisible()" name="post" class="post" id="post" required> What's on your mind, <?php echo get("first_name"); ?>?</textarea>
	   <button name="photo" ><i class="fa fa-picture-o"></i>  Photo </button>
	   <button name="video" ><i class="fa fa-video-camera"></i> Video </button>
	   <button name="postButton" id="postButton" type="submit"> <i class="fa fa-check" > </i> </button>
    </form>
</div>




<style>
.postNow{
	width: 40%;
    height: 27%;
    position: static;
    text-align: center;
    border-spacing: 20px;
    margin-top: 100px;
    left: 0;
    right: 0;
    margin: 0 auto;
    margin-top: 100px;
    margin-bottom: 40px;
    background-color: white;
    border: 1px inset #d3d3d3;
    border-radius: 15px;
}
.postNow textarea{
	width: 100%;
	font-family: helvetica;
	color: grey;
	font-size: 15px;
	text-align: center;
	height: 60px;
	border: 0.5px solid #d3d3d3;
}
.postNow h3{
	font-family: helvetica;
	color: grey;
	font-size: 15px;
}
.postNow button{
	border-radius: 50px;
	margin-top: 10px;
	float: left;
	height: 30px;
	width: 100px;
	background-color: #d3d3d3;
	cursor: pointer;
	font-weight: 2px;
}
.postNow button:hover{
	background-color: #aaaaaa;
}
.postNow #postButton {
	float: right;
	font-size: 25px;
	color: blue;
	width: 40px;
	margin-right: 10px;
	display: none;
	background-color: white;
	border: none;
	font-style: italic;
	font-weight: 2px;
}
.postNow #postButton:hover{
	color: green;
}

.postNow #closePost{
	width: 20px;
	height: 26px;
	float: right;
	font-size: 20px;
	color: blue;
	width: 40px;
	margin-right: 10px;
	display: none;
	background-color: white;
	border: none;
}
.postNow #closePost:hover{
	color: red;
}

</style>


<script>
	function makeButtonsVisible () {
    document.getElementById("closePost").style.display = "block";
    document.getElementById("postButton").style.display = "block";
    document.getElementById("post").innerHTML = "";

}
</script>






<?php

if(isset($_POST["postButton"]) && !empty($_POST["post"])){
	if(!empty($_POST["type"])){
		$type = "query";
	}else{
		$type = "post";
	}
	$body = $_POST["post"];
	$time = date("Y-m-d");
	require 'backbone.php';
	$connection = mysqli_connect($server_name, $database_username, $database_password, $database_name);
	$sql = "INSERT INTO posts (type, body, author, posted_date) VALUES ('" . $type. "', '" . $body . "', '" . get("full_name") . "', '" . $time . "')";
	$newSql = "SELECT * FROM posts WHERE type= '". $type . "' AND body = '". $body . "' AND author = '". get("full_name") . "' AND posted_date = '". $time . "'";
	$result = mysqli_query($connection, $newSql);
	while($row = mysqli_fetch_assoc($result)){
		$_SESSION["postId"] = $row["id"];
	}	
}
?>

<script type="text/javascript">
	function closePost() {
		document.getElementById("post").innerHTML = "What's on your mind, <?php echo get("first_name"); ?> ?";
		document.getElementById("closePost").style.display = "none";
        document.getElementById("postButton").style.display = "none";

	}
</script>


