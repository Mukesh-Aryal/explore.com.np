<?php
session_start();
$_SESSION["fullName"] = $_SESSION["first_name"] . " " . $_SESSION["last_name"];
$_SESSION["joinedDate"] = date("Y-m-d");



?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="../Style/success.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
	<h3> <i class="fa fa-smile-o" > </i> Hello, <?php echo $_SESSION["fullName"]; ?>. We're Glad You Are Here.. <i class="fa fa-smile-o" > </i></h3>
	<h4> Those information were what we need to give you the best experience and we're done knowing you from just chunks of texts. Now, its your turn to make us pleased by exploring and sharing what you have known. Good Luck! </h4>
	<a href="about.php" ><button><h5> Here are some of the things that you can see before diving in! </h5></button></a><br><br><br><br><br>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
	  <button id="endInfo" name="saveAndExit" type="submit"> Let's eXPLORE! </button>
    </form>
	</div>


<?php
if(isset($_POST["saveAndExit"])){
	require '../includes/backbone.php';
	$connection = mysqli_connect($server_name, $database_username, $database_password, $database_name);
	$sql = "INSERT INTO users(first_name, last_name, birth_date, email, password, profession, gender, age, bio, preferred_people, profile_picture, full_name, joined_date) VALUES ('" . $_SESSION["first_name"] . "','" . $_SESSION["last_name"] . "','" . $_SESSION["birthDate"] . "','" . $_SESSION["email"] . "','" . $_SESSION["password"] . "','" . $_SESSION["profession"] . "','" . $_SESSION["gender"] . "','" . $_SESSION["age"] . "','" . $_SESSION["bio"] . "','" . $_SESSION["preferredPeople"] . "','" . $_SESSION["profPicture"] . "','" . $_SESSION["fullName"] . "','" . $_SESSION["joinedDate"] . "')";
	mysqli_query($connection, $sql);
		$newSql = "SELECT * FROM users WHERE first_name = '" . $_SESSION["first_name"] . "' AND last_name = '" . $_SESSION["last_name"] . "' AND birth_date = '" . $_SESSION["birthDate"] . "' AND email = '" .$_SESSION["email"] . "' AND password = '" . $_SESSION["password"] . "' AND profession = '" . $_SESSION["profession"] . "' AND gender = '" . $_SESSION["gender"] . "' AND age = '" . $_SESSION["age"] . "' AND bio = '" .$_SESSION["bio"] . "' AND preferred_people = '" . $_SESSION["preferredPeople"] . "' AND profile_picture = '" . $_SESSION["profPicture"] . "' AND full_name = '" . $_SESSION["fullName"] . "' AND joined_date = '" .$_SESSION["joinedDate"] . "'";
		$result = mysqli_query($connection, $newSql);
		while($row = mysqli_fetch_assoc($result)){
			session_destroy();
			session_start();
			$_SESSION["id"] = $row["id"];
		}
		header("Location: ../home/news_feed.php");
}
