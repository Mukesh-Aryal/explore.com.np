<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>eXPLORE!</title>
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Style/header.css">
</head>
<body>
	<div class="container">
	<div class="logo">
		<i class="fab fa-edge"></i>
	</div>
	<div class="search-container">
		<input name="search" type="text" placeholder="Search"><button name="search"><i class="fa fa-search"></i></button>
	</div>
	<div class="user-container">
		<?php echo "<img src=" . "../profile_pictures/" . get("profile_picture") . " style=\"width: 80%; height: 100%; margin-left: 15%;\">"; ?>
	</div>
	<div class="user-name"> <b> <?php echo get("first_name"); ?> </b></div>
	<div class="nav-bar">
		<b><a href="../home/"> Home </a></b>
		<a href="#notifications"><i class="fa fa-bell"></i></a>
		<a href="#requests"><i class="fa fa-user"></i></a>
		<a href="#messages"><i class="fas fa-envelope-square"></i></a>
	</div>
	</div>
</body>
</html>




