

<html>
<head>
	<title> eXPLORE! The World With Freedom! </title>
	<link rel="stylesheet" type="text/css" href="../Style/nav-bar.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

</head>
<body>
	<div class="main-container">
		<div class="user-container">
			<a href="dashboard.php#changeProfPic">
			<div class="user-img-container">
				<?php echo "<img src=" . get("profile_picture") . " style=\"width: 70%; height: 80%; margin-left: 15%;\">"; ?>
			</div>
			<?php echo "<h5>" .  get("full_name") . "</h5>"; ?>
			</a>
		</div>
		<div class="navigations">
			<a href="create.php"><i class="fa fa-flask"></i></a>
			<a href="seek.php"><i class="fa fa-search"></i></a>
			<a href="explore.php"><i class="fa fa-graduation-cap"></i></a>
		</div>
	</div>
</body>