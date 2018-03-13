<?php
session_start();
if(!isset($_SESSION["id"])){
  header("Location: index.php");
}
require '../includes/header.php';


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

<?php
function showPosts($date, $author, $body, $multimedia, $id, $author_id) {
  ?>
  <div class="post" id="post<?php echo $id; ?>">
    <div class="poster"><b id="author"><a href="user.php/<?php echo $author ?>">
      <div class="userProfPic">
        <img src="../profile_pictures/<?php echo find("profile_picture", $author_id); ?>" />
        <?php echo $author; ?></a> <?php echo "added a new post."?></b> <b id="date"> <?php echo $date; ?> </b>
      </div>
    </div>
    <div class="body"><p><?php echo $body; ?></p></div>
    <div class="multimedia">
      <img src="data:image/jpeg;base64, <?php echo $multimedia; ?>"/>
    </div>
    <div class="beSocialDudes" >
      <button id="like"><i class="fas fa-thumbs-up"></i></button>
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
  .post .multimedia img{
    width: 100%;
    height: 30%;
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
  .post .beSocialDudes{
    width: 100%;
    height: 2.5%;
  }
  .post .beSocialDudes button{
    margin-bottom: 10px;
    width: 20%;
    height: 30px;
    background-color: #eaebee;
    border-radius: 20px;
    border: none;
    font-size: 20px;
    color: grey;
    cursor: pointer;
  }
  .post .beSocialDudes button:hover{
    color: blue;
  }
  .post .beSocialDudes button:focus{
    color: blue;
  }
  .post .beSocialDudes button:active{
    color: blue;
  }
</style>
<?php
} 
?>


?>
<link rel="stylesheet" type="text/css" href="../Style/home.css">
<div class="whole-container">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <div class="queryAndpostswitcher">
     <button id="logOut" name="logOut" title="Log Out From The Site"> <i class="fas fa-sign-out-alt"></i></button>
  </div>
</form>
  <div class="make_a_post">
    <div class="tabs">
      <button name="make_post" id="post"><i class="fa fa-pencil"></i> Make a post </button>
      <button name="make_query" id="query"><i class="fa fa-question"></i> Make a query </button>
    </div>
    <div class="main-post" id="main-post">
      <textarea placeholder="Enter Your Post Here" minlength="5" oninput="freezeAll();" id="postTextArea"></textarea>
    </div>
    <div class="main-query" style="display: none;" id="main-query">
      <textarea placeholder="Enter Your Query Here" minlength="5" oninput="freezeAll();" id="queryTextArea"></textarea>
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
        <button id="postButton" onclick="sendComment();"><i class="fa fa-tick"></i>Let's Go!</button>
      </div>
      </div>

<script type="text/javascript">
  let postTab = document.getElementById("post");
  let queryTab = document.getElementById("query");
  let postDiv = document.getElementById("main-post");
  let queryDiv = document.getElementById("main-query");
  let selectedTab = "post";

  queryTab.addEventListener("click", () => {
    queryTab.style.backgroundColor = "#3b5998";
    postTab.style.backgoundColor = "#f6f7f9";
    postDiv.style.display = "none";
    queryDiv.style.display = "block";
    selectedTab = "query";
    console.log(selectedTab);


  })
  postTab.addEventListener("click", () => {
    postDiv.style.backgroundColor = "#3b5998";
    queryTab.style.backgroundColor = "#f6f7f9";
    queryDiv.style.display = "none";
    postDiv.style.display = "block";
    selectedTab = "post";
    console.log(selectedTab);
  })
</script>










<?php
require '../includes/backbone.php'; //Server Info!
$connection = mysqli_connect($server_name, $database_username, $database_password, $database_name);
$sql = "SELECT * FROM users_posts";
$result = mysqli_query($connection, $sql);
while($row = mysqli_fetch_assoc($result)){
  showPosts($row["posted_date"], $row["author"], $row["body"], base64_encode($row["multimedia"]), $row["id"], $row["author_id"]);
}
$sql2 = "SELECT * FROM users_queries";
$result2 = mysqli_query($connection, $sql2);
while($row2 = mysqli_fetch_assoc($result2)){
  showQueries($row2["posted_date"], $row2["author"], $row2["body"], $row2["multimedia"], $row2["id"], $row2["author_id"]); 
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
        eraseComment(count+1);
      }
      xhr.send();
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

<script type="text/javascript">
  function eraseComment(id){
    document.getElementById("comment"+id).value = "Your Comment Is Posted!";
    setTimeout(function(){
    document.getElementById("comment"+id).value = "";
}, 400);
  }
</script>



<?php
if(isset($_POST["logOut"])){
  ?>
  <script>
    let wantToGo = confirm("Hey, <?php echo get("full_name"); ?>! Are You Sure You're Leavin'?");
    if(wantToGo === true){
      <?php
  session_destroy();
  ?>
    location.href = "index.php";
}
</script>  
  <?php
}
?>



<script type="text/javascript">
  function freezeAll() {
    document.body.style.backgroundColor = "red";
  }
</script>





<script>
  function sendPost(){
  if(selectedTab === "post"){
    console.log(selectedTab);
    var comment = document.getElementById("postTextArea").value;
    console.log(comment);
  }else if(selectedTab === "query"){
    console.log(selectedTab);
    var comment = document.getElementById("queryTextArea").value;
    console.log(comment);
  }

  let xmlhtr = new XMLHttpRequest();
  xmlhtr.open('POSt', '../processor/send_post.php', true);
}
</script>











