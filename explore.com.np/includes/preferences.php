<?php
session_start();
require 'header.php';
require 'functionalities.php';
?>


<html>
<head>
	<title>
		Preferences 
	</title>
</head>
<body>
	<div class="container" >
	 <table>
		<tr><td><a href="#account"> <i class="fa fa-users"> </i> Account </a></td></tr>
		<tr><td><form ><button name="logOutButton" class="logOutButton"> <i class="fa fa-sign-out"> </i> Log Out </button> </form> </td></tr>
		<tr> </tr>
		<tr> </tr>
		<tr> </tr>
		<tr> </tr>
		<tr> </tr>
	 </table>
	</div>
</body>




<style>
.container{
	width: 40%;
	background-color: white;
	top: 0;
	bottom: 0;
	margin: 0 auto;
	margin-top: 100px;
	height: 30%;
	overflow: auto;
}
.container table{
	border: 2px inset #d3d3d3;
	width: 100%;
	height: 100%;
}
.container table tr td a{
	text-decoration: none;
	font-size: 20px;
}
.container .logOutButton{
	background-color: white;
	border: none;
	font-size: 17px;
	color: blue;
	cursor: pointer;
	margin-left: -3px;
}
.container .logOutButton i{
	font-size: 25px;
}


</style>



<?php
if(isset($_GET["logOutButton"])){
	logOut();
}



