<?php
session_start();
$_SESSION["fileSelected"] = true;


echo $_SESSION["first_name"] . "<br>";
echo $_SESSION["last_name"] . "<br>";
echo $_SESSION["birthDate"] . "<br>";
echo $_SESSION["email"] . "<br>";
echo $_SESSION["password"] . "<br>";
echo $_SESSION["profession"] . "<br>";
echo $_SESSION["gender"] . "<br>";
echo $_SESSION["age"];



?>


<html>
<head>
	<title> Be Ready For eXPLORE! </title>
	<link rel="stylesheet" type="text/css" href="../Style/setup_user.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
</head>
<body>
<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
</style>

	<div class="slide1" >
		<h4> Let's see how pretty are you, more or less than we've expected? </h4>
		<div class="img-container">
          <img id="blah" src="../#"/><b id="info">Your Profile Picture Will Be Previewed Here!</b> <br> <i class="fa fa-picture-o" style="font-size: 300px;" id="pictureFont"></i>
	    </div>
		<form method="post" action="../includes/upload.php" enctype="multipart/form-data"><br>
		 <input type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this);" >
         <input type="submit" name="submit" id="submit">
	    </form>
	    <button id="notNeeded" name="exit" > <i class="fa fa-exclamation" > </i> Skip</button>
	</div>
</body>

<script>
document.getElementById("notNeeded").addEventListener("click", () => {
	<?php
		$_SESSION["fileNameAuto"] = "../Images/male_profile_picture.png";
	?>
	location.href = "setup_user2.php";
})
</script>


<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
            .attr('src', e.target.result)
            .width(486)
            .height(355);
        };

     reader.readAsDataURL(input.files[0]);
    }
    document.getElementById("pictureFont").style.display = "none";
    document.getElementById("info").style.display = "none";
}

</script>





































