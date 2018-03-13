<?php
session_start();
require '../includes/header.php'; //It contains the header of the page.

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php

function get($property){
  require '../includes/backbone.php'; //It contains the server information
  $connection = mysqli_connect($server_name, $database_username, $database_password, $database_name);
  $sql = "SELECT * FROM users WHERE id = '" . $_SESSION["id"] . "'";
  $result = mysqli_query($connection, $sql);
  while($row = mysqli_fetch_assoc($result)){
    $outcome = $row[$property];
  }
  return $outcome;
}


function find($property, $id){
  require '../includes/backbone.php'; //It contains the server information
  $connection = mysqli_connect($server_name, $database_username, $database_password, $database_name);
  $sql = "SELECT * FROM users WHERE id = '" . $id . "'";
  $result = mysqli_query($connection, $sql);
  while($row = mysqli_fetch_assoc($result)){
    $outcome = $row[$property];
  }
  return $outcome;
}


function showQueries($date, $author, $body, $multimedia, $id, $author_id) {
  ?>
  <div class="post" id="post<?php echo $id; ?>">
    <div class="poster"><b id="author">
      <a href="user.php/<?php echo $author ?>">
        <div class="userProfPic">
        <img src="../profile_pictures/<?php echo find("profile_picture", $author_id); ?>" /><?php echo $author; ?></a> <?php echo "added a new query."?></b> <b id="date"> <?php echo $date; ?> </b></div>
      </div>
    <div class="body"><p><?php echo $body; ?></p></div>
    <div class="comment">
    	<input type="text" placeholder="Wanna help?" name="comment" id="comment<?php echo $id; ?>" required>
    	<button type="submit" name="commentButton" id="commentButton<?php echo $id; ?>" title="Land the spaceship of your kindness and knowledge!"><i class="fa fa-space-shuttle"></i></button>
    </div>
    <div class="comments">
    	<button id="showComments<?php echo $id; ?>"> <i class="fas fa-hand-point-down"></i> Show Comments!</button>
    	<div id="commentsDiv">
    	</div>
    </div>
</div>
  <style>
  .post{
    width: 40%;
    background-color: #ffffff;
    margin-left: 20%;
    margin-top: 2.5%;
    border: 0.2px solid #dddfe2;
    padding: 2px 2px 2px 2px;
    min-height: 10%;
    overflow: auto;
    margin-bottom: 10px;
  }
  .poster{
    display: inline-block;
    width: 100%;
    min-height: 20%;
    max-height: 20%;
    background-color: #ffffff;
    overflow-wrap: break-word;
    text-overflow: ellipsis;
  }
  .poster #author{
    float: left;
    font-family: helvetica;
    font-size: 13px;
  } 
  .poster #date{
    float: right;
    font-family: arial;
    color: grey;
    font-size: 13px;
  }
  .post .body{
    width: 100%;
    background-color: #ffffff;
    float: left;
    overflow-wrap: break-word;
    max-height: 40%;
  }
  .post .body p{
    font-family: helvetica;
  }
  .comments button{
    width: 30%;
    background-color: #ffffff;
    border: none;
    cursor: pointer;
    font-family: helvetica;
    color: #3b5998;
  }
  .post #showComments i{
    color: purple;
  }
  .post .comments{
    width: 100%;
    background-color: #f2f3f5;
    height: 39%;
    max-height: 40%;
    overflow: auto;
    margin-top: 1%;
  }
  .post .comments b{
    font-weight: normal;
    font-family: helvetica;
  }
  .comment input{
    width: 50%;
    margin-left: 20%;
    background-color: #ffffff;
    border-bottom: 0.2px solid #dddfe2;
    border-left: none;
    border-right: none;
    border-top: none;
    height: 20px;
    padding-left: 10px;
  }
  .comment button{
    width: 10%;
    background-color: #ffffff;
    border: 1px solid #dddfe2;
    border-radius: 5px;
    color: #3b5998;
    cursor: pointer;
  }
  #comment:focus{
    outline-width: 0px;
    border-bottom: 1px solid #dddfe2;
  }
  .comment{
  	margin-bottom: 10px;
  	width: 100%;
  }
  .userProfPic{
    width: 100%;
    height: 100%;
    border-radius: 20px;
    background-color: #ffffff;
    display: inline-block;
  }
  .userProfPic img{
    border-radius: 50%;
    width: 5%;
    height: 5%;
  } 
  .userProfPic a{
    text-decoration: none;
    color: #3b5998;
    font-family: helvetica;
  }
  </style>
<?php
} ?>




<link rel="stylesheet" type="text/css" href="../Style/news_feed.css">
<div class="whole-container">

  <div class="queryAndpostswitcher">
    <button id="postPage" > <i class="fas fa-globe"></i></button>
    <button id="queryPage" ><i class="fas fa-question"></i></button>
  </div>
  <div class="make_a_post">
    <div class="tabs">
      <button name="make_post" id="post"><i class="fa fa-pencil"></i> Make a post </button>
      <button name="make_query" id="query"><i class="fa fa-question"></i> Make a query </button>
    </div>
    <div class="main-post" style="display: none;" id="main-post">
      <textarea placeholder="Enter Your Post Here" minlength="5" oninput="showOptions();"></textarea>
    </div>
    <div class="main-query" id="main-query">
      <textarea placeholder="Enter Your Query Here" minlength="5" oninput="showOptions();"></textarea>
      <select name="askTo">
        <option> Friends </option>
        <option> Community </option>
        <option> Both</option>
      </select>
    </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <label for="multimedia"> <i class="fa fa-camera-retro"></i> Multimedia </label>
                <input type="file" id="multimedia" name="image" style="display: none;"/>
               <input type="submit" style="display: none;"/>
          </form>

      <div class="postingOptions">
        <button id="postButton"><i class="fa fa-tick"></i>Let's Go!</button>
      </div>
  </div>



<script>
	document.getElementById("queryPage").addEventListener("click", () => {
		document.getElementById("queryPage").style.display = "none";
		document.getElementById("postPage").style.display = "block";
		location.href = "news_feed.php";

	})
</script>





<script type="text/javascript">
	function showTab(tabName, anotherTab){
		document.getElementById(tabName).style.display = "block";
		document.getElementById(anotherTab).style.display = "none";
	}
	document.getElementById("post").addEventListener("click", () => {
		showTab("main-post", "main-query");
		console.log("Main-post is selected!");
	});
	document.getElementById("query").addEventListener("click", () => {
		showTab("main-query", "main-post");
	});
</script>


<?php
require '../includes/backbone.php'; //Server Info!
$connection = mysqli_connect($server_name, $database_username, $database_password, $database_name);
if ($connection->connect_error) {
   die("Connection failed: " . $connection->connect_error);
}else{
$sql2 = "SELECT * FROM users_queries";
$result2 = mysqli_query($connection, $sql2);
if(mysqli_affected_rows($connection)>0){
while($row2 = mysqli_fetch_assoc($result2)){
	showQueries($row2["posted_date"], $row2["author"], $row2["body"], $row2["multimedia"], $row2["id"], $row2["author_id"]); //Main function to run
}
}
}

?>





<script type="text/javascript">
	for(let count=0; count < <?php echo mysqli_num_rows($result2); ?>; count++){
		console.log(count);
		document.getElementById("commentButton"+(count+1)).addEventListener("click", sendComment);

			function sendComment(){
				if(document.getElementById("comment"+(count+1)).value === ""){
					alert("Please comment something!");
				}else{
			let comment = document.getElementById("comment" + (count+1)).value;
		    let commentId = (count+1);
			console.log("Comment No. " + (count+1) + " clicked!");
			let xhr = new XMLHttpRequest();
			xhr.open('GET', '../processor/send_comment.php?comment='+comment+'&commentId='+commentId, true);
			xhr.onload = function () {
				console.log("Comment Sent!");
				console.log(xhr.responseText);
			}
			xhr.send();
			document.getElementById("comment" + (count+1)).innerHTML = "";
		}
	}

	}
</script>


<script type="text/javascript">
	for(let count=0; count < <?php echo mysqli_num_rows($result2); ?>; count++){
		console.log(count);
		document.getElementById("showComments"+(count+1)).addEventListener("click", showComments);
			function showComments(){
				console.log(document.getElementById("comment"+(count+1)).value);
		    let postId = (count+1);
			console.log("Show Comment No. " + (count+1) + " clicked!");
			let xhr1 = new XMLHttpRequest();
			xhr1.open('GET', '../processor/show_comment.php?postId='+postId, true);
			xhr1.onload = function showComment() {
				let commentDiv = document.getElementById("commentsDiv");
				console.log("Show Comments Request Sent!");
				console.log(xhr1.responseText);
				let str = xhr1.responseText;
				let json = JSON.parse(str);
				for(let i=0;i<json.length;i++){
					let comment = document.createElement("div");
					let commentor_image = document.createElement("span");
					let commentor = document.createElement("span");
					let actual_comment = document.createElement("div");
					actual_commented_text = document.createTextNode(json[i]["comment"]);
					actual_commentor = document.createTextNode(json[i]["commentor"]);
					commentor.appendChild(actual_commentor);
					actual_comment.appendChild(actual_commented_text);
					comment.appendChild(commentor_image);
					comment.appendChild(commentor);
					comment.appendChild(actual_comment);
					commentsDiv.appendChild(comment);
					commentor_image.style.width = "30px";
					commentor.style.width = "50px";
					commentor.style.color = "#3b5998";
					commentor.style.marginRight = "20px";
					commentor.style.marginLeft = "20px"
					actual_comment.style.marginLeft = "30px";
					comment.style.backgroundColor = "#ffffff";
					comment.style.marginBottom = "10px";
					comment.style.borderRadius = "20px";
					comment.style.marginTop = "5px";
					commentor.fontFamily = "helvetica";

				}
			}
			xhr1.send();

			document.getElementById("showComments"+(count+1)).style.display = "none";

	}
}
</script>



