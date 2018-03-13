<?php
session_start();
require '../includes/functionalities.php';
if(isset($_SESSION["id"])){
	setcookie("logInInfo", md5($id), time() + (86400*15),"/");
	header("Location: home.php");
}
require '../includes/backbone.php';

?>
<html>
<head>
	<meta charset="utf-8" >
	<title>eXPLORE! | Log In or Sign Up </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../Style/index.css" >
</head>
<body>
	<div class="container" >

		<div class="sign-in">
			<h1><img src="https://png.icons8.com/color/50/000000/idea.png"> eXPLORE! </h1>
			<div class="sign-in-form">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			  <pre class="tab" ><h4>  Email Address            Password </h4></pre>
			  <input name="emailAddress" type="email" required>
			  <span> <input name="passwordForLoggingIn" type="password" required>
			  <button name="logInButton" type="submit"> Log In </button> </span><br>
			</form>
			  <a href="recover-account.php" > <i class="fa fa-frown-o"> </i> Forgot Account? </a> 
		    </div>
		</div>

		<div class="sign-up">
			<img src="../Images/logo.PNG" id="logoImage" title="eXPLORE! The World With Freedom!">
			<div class="sign-up-form" >
				<h1 title="Be an eXPLORER!"><i class="fa fa-user"> </i> Create a New Account </h1>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				   <input  name="first_name" type="text" placeholder="First Name" class="name" required>
				   <input name="last_name" type="text" placeholder="Last Name" class="name" required> <br>
				   <input name="email" type="email" placeholder="Email Address" required> <br>
				   <input name="password" type="password" placeholder="Choose A Password" required>
				   <h3 style="color: grey; font-family: helvetica;"><i class="fa fa-calendar"> </i> Birthday </h3>
				   <label for="day"><i style="color: grey; font-family: helvetica;">Day</i></label>
				   <select id="day" name="day" required>
				   	<?php for($i=1;$i<=30;$i++){
				   		echo "<option> ". $i . "</option>";
				   	} ?>
				   </select>
				   <label for="month"><i style="color: grey; font-family: helvetica;">Month</i></label>
				   <select id="month"  name="month" required>
				   	<?php for($i=1;$i<=12;$i++){
				   		echo "<option> ". $i . "</option>";
				   	} ?>
				   	</select>
				   	<label for="year"><i style="color: grey; font-family: helvetica;">Year</i></label>
				   	<select id="year"  name="year" required>
				   	<?php for($i=1950;$i<=date("Y");$i++){
				   		echo "<option>" . $i . "</option>";
				   	} ?>
				   	</select> <br> <br>
				   <input name="gender" value="male" type="radio" id="radio" required> Male <input name="gender" value="female" type="radio" id="radio" required> Female <br> <br>
				   <input name="profession" type="text" placeholder="Optional: What You Do Eg: Student"> <br>
				   <input name="passwordAgain" type="password" placeholder="Confirm Your Password" required> <br>
				   <button name="signInButton" id="signInButton" type="submit"> <i class="fa fa-check-square" > </i> Create Account </button>
			    </form>
			</div>
		</div>

	</div>
</body>
</html>





<?php
if(!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && isset($_POST["day"]) && isset($_POST["month"]) && isset($_POST["year"]) && !empty($_POST["email"]) && !empty($_POST["password"]) &&  !empty($_POST["profession"]) && !empty($_POST["passwordAgain"])){
	if(isset($_POST["signInButton"])){
		$first_name = test_input($_POST["first_name"]);
		$last_name = test_input($_POST["last_name"]);
		$birthDate = test_input($_POST["year"]) . "-" . test_input($_POST["month"]) . "-" . test_input($_POST["day"]) . "";
		$email = test_input($_POST["email"]);
		$password = md5(test_input($_POST["password"]));
		$profession = test_input($_POST["profession"]);
		$passwordAgain = md5(test_input($_POST["passwordAgain"]));
		$gender = $_POST["gender"];
		$age = date_diff(date_create($birthDate), date_create('today'))->y;
		if($password === $passwordAgain){
			$_SESSION["first_name"] = $first_name;
			$_SESSION["last_name"] = $last_name;
			$_SESSION["birthDate"] = $birthDate;
			$_SESSION["email"] = $email;
			$_SESSION["password"] = $passwordAgain;
			$_SESSION["profession"] = $profession;
			$_SESSION["gender"] = $gender;
			$_SESSION["age"] = $age;
			// header("Location: sign-up.php");
			?> <script type="text/javascript">location.href = "../sign-up/sign-up.php";</script> <?php
		}
}
}


else if(isset($_POST["logInButton"])){
	$emailAddress = $_POST["emailAddress"];
	$passwordForLogIn = md5($_POST["passwordForLoggingIn"]);
	$connection = mysqli_connect($server_name, $database_username, $database_password, $database_name);
	$sql = "SELECT * FROM users WHERE email = '" . $emailAddress . "' AND password = '" . $passwordForLogIn . "'";
	$result = mysqli_query($connection, $sql);
	if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$_SESSION["id"] = $row["id"];
		?> <script type="text/javascript"> location.href = "index.php"; </script> <?php
	}
	}else{
		?><script> alert("Your email and password combination is incorrect!"); </script> <?php
	}
}
?>










