
<div class="meDiv" id="myself" >
	<h2> Me </h2>
	<div class="prof-pic" >
	</div>
	<div class="info">
		<?php getDetailsFromUser($_SESSION["id"]); ?>
</div>




<style>
.meDiv{
	width: 28%;
	background-color: white;
	float: left;
	margin-top: 20px;
	border: 1px inset #d3d3d3;
	border-radius: 20px;
	height: 70%;
	padding-left: 5px;
}
.meDiv h2{
	text-align: center;
	font-family: courier;
}
</style>