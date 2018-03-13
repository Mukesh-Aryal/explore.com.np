<?php
session_start();


if(isset($_SESSION["fileNameNotAuto"])){
	showMessage("<i class=\"fa fa-file-image-o\"></i> <t> <i class=\"fa fa-picture-o\"></i>" . "Your Profile Picture Is Set!", "yes");
	$_SESSION["profPicture"] = $_SESSION["fileNameNotAuto"];
}else{
	showMessage("<i class=\"fa fa-file-image-o\"></i> <t> <i class=\"fa fa-picture-o\"></i>" . "Your Profile Picture Is Set To The Default!", "no");
	$_SESSION["profPicture"] = $_SESSION["fileNameNotAuto"];
}	

?>
<link rel="stylesheet" type="text/css" href="../Style/setup_user2.css">
	<div name="user_other_details" class="slide2" id="slide2">
		<h3 id="text"> Hello, <?php echo $_SESSION["first_name"]; ?>! Nice to meet you. Now you are just some steps away from making your best move! </h3>
		<h4 id="text"> We always care for our people, So let's get some more information, shall we? </h4>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
			<textarea id="textarea" name="bio" type="text" placeholder="Write Something About You" title="This will Be Used As Your Bio"></textarea><br>
			<h5> People You Would Prefer To Meet: </h5>
			<select id="select" name="preferredPeople">
				<option> Anyone eXPLORE! Would Prefer </option>
				<?php
				require '../includes/backbone.php';
				$connection = mysqli_connect($server_name, $database_username, $database_password, $database_name);
				$sql = "SELECT * FROM explore_users";
				$result = mysqli_query($connection, $sql);
				while($row = mysqli_fetch_assoc($result)){
					$professions[] = $row["profession"];
					if(count(array_unique($professions))<count($professions))
                    {
                        continue;
                    }
                    else
                    {
                        echo "<option> ". $row["profession"] . "</option>";
                    }
				} ?>
            </select><br><br>
            <button class="nextStep" name="nextStep" type="submit"> <i class="fa fa-fast-forward" > </i><t> Let's Go! </button>
        </form>
	</div>


<?php
function showMessage($text, $state) {
	?>
	<div class="done" id="done" >
		<i id="close" class="fa fa-times" onclick="hideDone();"> </i><br>
		<?php echo $text; ?>
	</div>

	<div class="error" id="error">
		<i id="close" class="fa fa-times" onclick="hideDone();"> </i><br>
		<?php echo $text; ?>
	</div>
	<?php
	if($state === "yes"){
		?>
		<script>
			document.getElementById("error").style.display = "none"; 
		</script>
		<?php
	}else{
		?>
	<script>
			document.getElementById("done").style.display = "none";
		</script>
		<?php
}
}
?>

<script>
function hideDone() {
	document.getElementById("done").style.display = "none";
}
function hideError() {
	document.getElementById("error").style.display = "none";
}
</script>




<?php
if(isset($_POST["nextStep"])){
	if($_POST["bio"] !== null){
		if(strlen($_POST["bio"]) > 50){
			if(isset($_POST["preferredPeople"])){
				$_SESSION["bio"] = $_POST["bio"];
				$_SESSION["preferredPeople"] = $_POST["preferredPeople"];
				header("Location: success.php");
			}
		}else{
			?><script>alert("Your Bio Must Be Minimum Of 50 Characters");</script><?php
		}
	}
}
