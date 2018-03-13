<?php
require 'header.php';
?>



<html>
<head>
	<title> Verify Account | eXPLORE! </title>
</head>
<body>
	<div class="provideTheEmailAddress" >
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		 <p> Please Provide Your Email Address With Which You Have Logged-In in This Site </p>
		 <input name="email-address" type="email" placeholder="Email Address" ><br>
		 <button name="check" > CHECK </button>
		</form>
	</div>
</body>
</html>



<style>
.provideTheEmailAddress{
	width: 600px;
	height: 400px;
	border: 10px inset grey;
    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}
.provideTheEmailAddress p{
  text-align: center;
  font-family: fantasy;
  font-style: italic;
  text-shadow: 2px 2px #ff0000;
  color: yellow;
}
.provideTheEmailAddress input{
	width: 300px;
	height: 40px;
	margin-left: 140px;
}
.provideTheEmailAddress button{
   background-color: skyblue;
   color: white;
   width: 100px;
   height: 40px;
   margin-top: 40px;
   margin-left: 230px;
}

