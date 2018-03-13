<?php
require '../includes/header.php'; //It contains the header of the page.
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



function showPosts($date, $author, $body, $multimedia, $id) {
  ?>
  <div class="post" id="post<?php echo $id; ?>">
    <div class="poster"><b id="author"><a href="user.php/<?php echo $author ?>"><?php echo $author; ?></a> <?php echo "added a new post."?></b> <b id="date"> <?php echo $date; ?> </b></div>
    <div class="body"><p><?php echo $body; ?></p></div>
    <div class="multimedia"></div>
    <div class="beSocialDudes" >
    	
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
    </style>
<?php
} 
?>




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
</div>






<?php
require '../includes/backbone.php'; //Server Info!
$connection = mysqli_connect($server_name, $database_username, $database_password, $database_name);


$sql = "SELECT * FROM users_posts";
$result = mysqli_query($connection, $sql);
while($row = mysqli_fetch_assoc($result)){
	showPosts($row["posted_date"], $row["author"], $row["body"], $row["multimedia"], $row["id"]); //Main function to run
}




function getId($serial_number){
	while($rowspec = mysqli_fetch_assoc($result2)){
		$data[] = $rowspec;
	}

	echo ($data[($serial_number - 1)]);
} 



?>






















