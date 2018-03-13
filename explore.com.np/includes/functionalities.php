<?php



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Log Out Function
function logOut() {
  echo "Logging Out!";
  require 'backbone.php';
  $conn_to_server = mysqli_connect($server_name, $database_username, $database_password, $database_name);
  $sql1 = "DELETE FROM active_users WHERE username = ";
  $sql2 =  "'" . $_SESSION["username"] . "'"; 
  $sql3 = "AND email = ";
  $sql4 = "'" . $_SESSION["email"] . "'"; 
  $whole_sql = $sql1 . $sql2 . $sql3 . $sql4;
  echo $whole_sql;
  session_destroy(); 
  header("Location: home.php");
}


function getId($serial_number){
  require '../includes/backbone.php';
  $connection = mysqli_connect($server_name, $database_username, $database_password, $database_name);
  $sql = "SELECT * FROM users_queries";
  $result = mysqli_query($connection, $sql);
  while($row = mysqli_fetch_assoc($result)){
    $data[] = $row["id"];
  }
  return $data[($serial_number-1)];
}





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Function to know if a user is active is active or not!
function isActive($username, $email){
  require 'backbone.php';
  $connection = mysqli_query($server_name, $database_username, $database_password, $database_name);
  $sql_num_1 = "SELECT * FROM active_users WHERE username=";
  $sql_num_2 = "'" . $_SESSION["username"] . "'" . "AND email=";
  $sql_num_3 = "'" . $_SESSION["email"] . "'";
  $total_num_sql = $sql_num_1 . $sql_num_2 . $sql_num_3;
  $result = mysqli_query($connection, $total_num_sql);
  if(mysqli_num_rows($result) > 0){
    return true;
  }else{
    return false;
  }
}













/////////////////////////////////////////////////////////////////////////////////////////////////////







function alreadyAUser ($email){
  require 'backbone.php';
  $connection = mysqli_connect($server_name, $database_username, $database_password, $database_name);
  $sql_num_1 = "SELECT * FROM explore_users WHERE email=";
  $sql_num_2 = "'" . $email . "'";
  $total_num_sql = $sql_num_1 . $sql_num_2;
  $result = mysqli_query($connection, $total_num_sql);
  if(mysqli_num_rows($result) > 0){
    return true;
  }else{
    return false;
  }
}















//////////////////////////////////////////////////////////////////////////////////////////////////////////////






function showActivePeople () {
  require 'backbone.php';
  echo "<div class=\"active_people\" >";
  echo "<table>";
  echo "<h2> ACTIVE PEOPLE";
  $connection = mysqli_connect($server_name, $database_username, $database_password, $database_name);
  $sql = "SELECT * FROM active_users";
  $result = mysqli_query($connection, $sql);
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      echo "<tr>";
      echo "<td>";
      if($row["username"] === $_SESSION["username"]){
        echo "---> This is you!";
      }
      echo '<a  href="chat.php?', urlencode($row["username"]), '"">';
      echo $row["username"] . "</a> </td> </tr>";
      $emailAddress = $row["username"];

    }
  }else{
    echo "<h4> Sorry, No Active Users";
  }
  echo "</table>";
  echo "</div>";

  ?>
<style>
.active_people{
  background-color: blue !important;
  height: 100%;
  float: left;
  width: 180px;

}
.active_people table td{
  font-family: fantasy;
  border: 5px inset red;
  border-radius: 40px;
  padding: 3px 3px 3px 3px;
  color: white;
  background-color: green;
  text-align: center;
}
.active_people table td a{
  color: white;
}
.active_people h2{
  text-align: center;
  font-family: fantasy;
  font-style: italic;
  text-shadow: 2px 2px yellow;
  color: yellow;
}

</style>

  <?php
}






////////////////////////////////////////////////////////////////////////////////////////////












function chatNow($username, $emailAddress){
  ?>  
  <div class="chatWindow">
    <button name="closeWindow" type="submit"> </button>
    <?php showActivePeople(); ?>
    <div class="sendMessage">
  <p>Send to : <?php echo $username ?> </p>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <textarea name="message" value="Type your message here!"> </textarea>
  <input name="sendMessageButton" type="submit" value="SEND">
</form>
</div>
  </div> 
  <style>
  .chatWindow{
    width: 700px;
    height: 450px;
    border: 5px inset grey;
    margin: 0 auto;
  }
  .chatWindow p{
  font-family: fantasy;
  border: 5px inset red;
  border-radius: 40px;
  padding: 3px 3px 3px 3px;
  color: white;
  background-color: green;
  text-align: center;   
  }
  .chatWindow textarea{
    text-align: center;
    width: 400px;
    margin-left: 70px;
    height: 300px;
    border-radius: 60px;
    border: 5px outset blue;
    background-color: yellow;
    color: green;
  }
  .chatWindow input{
   background-color: skyblue;
   color: white;
   width: 100px;
   height: 40px;
   margin-left: 220px;  
   margin-top: 10px;
   border-radius: 40px; 
  }

</style>

  <?php
  if(isset($_POST["sendMessageButton"])){
    ?> <script> alert("Your message was sent successfully!"); </script> <?php
  }
  
}




function getEmailAddress ($username) {
  $emailAddress = "";
  require 'backbone.php';
  $connection = mysqli_connect($server_name, $database_username, $database_password, $database_name);
  $sql = "SELECT * FROM active_users WHERE username= '" . $username . "' ";
  $result = mysqli_query($connection, $sql);
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      $emailAddress = $row["email"];
    }
  }else{
    return "No email addresses found!";
  } 
  return $emailAddress;
}

//////////////////////////////////////////////////////////////////////////////////

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////




















function usernameAlreadyTaken ($username) {
  require 'backbone.php';
  $connection = mysqli_connect($server_name, $database_username, $database_password, $database_name);
  $sql = "SELECT * FROM explore_users WHERE $username = '" . $username . "' ";
  $result = mysqli_query($connection, $sql);
  if($result && mysqli_num_rows($result) > 0){
    $output =  "The username is already taken!";
    echo $output;
    $response = true;  
  }else{
    $output = "";
    $response = false;
  }
  return $response;
}






function getDetailsFromUser ($id) {
  require 'backbone.php';
  $connection = mysqli_connect($server_name, $database_username, $database_password, $database_name);
  $sql = "SELECT * FROM users WHERE id = '" . $_SESSION["id"] . "'";
  $result = mysqli_query($connection, $sql);
  while($row = mysqli_fetch_assoc($result)){
    $birthdate = $row["birth_date"];
    $gender = $row["gender"];
    $profession = $row["profession"];
    $email = $row["email"];
    $full_name = $row["full_name"];
    echo "<img src=" . get("profile_picture") . " style=\"width: 50%; height: 30%; margin-left: 25%;\">";
  }
  ?><h3 style="font-family: helvetica; text-align: center;"> <?php echo $full_name ?> </h3>
    <h3 style="font-family: helvetica; text-align: center;"> Born On <?php echo $birthdate?> </h3>
    <h3 style="font-family: helvetica; text-align: center;"> <?php echo $gender ?> </h3>
    <h3 style="font-family: helvetica; text-align: center;"> <?php echo $profession ?> </h3>
  </div> <?php
}










function get($property){
  require 'backbone.php';
  $connection = mysqli_connect($server_name, $database_username, $database_password, $database_name);
  $sql = "SELECT * FROM users WHERE id = '" . $_SESSION["id"] . "'";
  $result = mysqli_query($connection, $sql);
  while($row = mysqli_fetch_assoc($result)){
    $outcome = $row[$property];
  }
  return $outcome;
}
























































