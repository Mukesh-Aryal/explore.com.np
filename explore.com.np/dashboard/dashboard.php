<?php
session_start();
require '../includes/functionalities.php';
?>

<html>
<head>
	<title>
		Dashboard | <?php echo get("full_name"); ?> 
	</title>
	<link rel="stylesheet" type="text/css" href="../Style/dashboard.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="profile-container">
	  <div class="profile_picture">
	  	<?php echo "<img src=" . get("profile_picture") . " style=\"width: 70%; height: 80%; margin-left: 15%;\">"; ?>
	  </div>
	  <div class="additional_info">
	  	<h1><?php echo get("full_name"); ?></h1>
	  </div>
	  <div class="bio">
	  	<h2> Bio </h2>
	  	<h4> <?php echo get("bio"); ?> </h4>
	  </div>
	</div>
	<div class="side-bar">
		  <a href="<?php echo $_SERVER["PHP_SELF"]; ?>" > <i class="fa fa-globe"></i>Timeline</a>
		  <a href="#account"><i class="fa fa-user"></i>Account </a>
		  <a href="#preferences"><i class="fa fa-server"></i>Preferences</a>
		  <a href="#people"><i class="fa fa-users"></i>eXPLORERS!</a>
		  <a href="#uhh_oh"><i class="fa fa-ban"></i>Danger Zone</a>
	</div>

	<div id="account">
		<h1> General Information </h1>
		<b>First Name: <?php echo get("first_name"); ?></b> <button id="change"> </button>
		<b>Last Name: <?php echo get("last_name"); ?></b> <button id="change"> </button>
		<b>Email Address: <?php echo get("email"); ?></b> <button id="change"> </button>
		<b>Birth Date: <?php echo get("first_name"); ?></b> <button id="change"> </button>
		<b>Password: <?php echo get("first_name"); ?></b> <button id="change"> </button>
		<h1> Security </h1>
		Create a pin that you can use to get a quick sign in. <br> <input name="pin">
		<h1> Activity </h1>
		Choose What We Can Know About You
		<h1> Contact Info </h1>
		Who Can Get Your Account Info Including Your Contact Info
		<h1> Trusted Devices </h1>
		Check this to get the information whenever this account is assessed from several devices.
		<h1> Suggest People To You </h1>
		Check this to get suggestions about people who can be your freXPLORERS! during this journey 
		<h1> Make your account Undeletable </h1>
		Check this to require a password if you decide to de-activate the account 
		<h1> For Your Health </h1>
		Check this to get the best we offer; ALL THE TIME!
	</div>
	<div id="preferences">
	</div>
	<div id="people">
	</div>
	<div id="uhh_oh">
	</div>
