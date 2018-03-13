<?php
session_start();
if(isset($_SESSION["first_name"]) && isset($_SESSION["last_name"]) && isset($_SESSION["birthDate"]) && isset($_SESSION["email"]) && isset($_SESSION["password"]) && isset($_SESSION["profession"]) && isset($_SESSION["gender"]) && isset($_SESSION["age"])){
echo $_SESSION["first_name"] . "<br>";
echo $_SESSION["last_name"] . "<br>";
echo $_SESSION["birthDate"] . "<br>";
echo $_SESSION["email"] . "<br>";
echo $_SESSION["password"] . "<br>";
echo $_SESSION["profession"] . "<br>";
echo $_SESSION["gender"] . "<br>";
echo $_SESSION["age"];
}else{
	header("Location: home.php");
}



?>


<html>
<head>
	<link rel="stylesheet" type="text/css" href="../Style/sign-up.css">
	<title>
		Be An eXPLORER!
	</title>
</head>
<body>
	<div class="container" >
		<h1> Verify Your Email Address </h1>
		<h4> We have sent a code to the email address <b>'<?php echo $_SESSION["email"]; ?>'</b> that you had provided. Please verify your email address by typing the sent code in the box below: </h4>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
		  <input name="verificationCode" type="text" placeholder="Please Enter The Verification Code Here"> <br>
		  <button name="verifyCode" type="submit" > <i class="fa fa-cog" > </i> Verify </button>
	    </form>
	</div> 
	


<?php
if(isset($_POST["verifyCode"]) && $_POST["verificationCode"] === "123"){
	header("Location: setup_user.php");
}
