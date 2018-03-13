<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function openPopUpWindow ($content) {

	?>








<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
   <p> <?php echo $content; ?> </p> 
  </div>

</div>







<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}



</style>




<script>
	// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>






<?php 
}






























function openInputPopUp () {
  ?>
  <div class="openInputPopUp" id="inputPopUp">
  <form method="post" action="write-post.php" >
    <input name="title" type="text" placeholder="Title"  class="title" required><br>
    <input name="type" type="radio" value="query" > Query
    <input name="type" type="radio" value="post"> Post
    <textarea name="body" placeholder="Write what you desire to!" required></textarea>
    <button type="submit" name="postSubmissionButton" > Let's Go! </button>
  </form>
  </div>

 <style>
 
 .openInputPopUp{
  width: 600px;
  height: 320px;
  border-radius: 0px;
  border: 7.5px inset blue;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  margin-top: 100px;
               }
  .openInputPopUp .title{
  left: 0;
  right: 0;
  margin: 0 auto;
  float: right;
  color: violet;
  padding-left: 10px;
  margin-top: 10px;
  width: 98%;
  height: 35px;
  margin: 1px 0px 0px -1px;
  border: 5px outset red;
  margin-right: 5px;
  margin-left: 5px;
  margin-top: 10px;

                       }
  .openInputPopUp button{
  top: -305;
  background-color: skyblue;
  color: white;
  width: 100px;
  height: 40px;
  border-radius: 60px;
                        }
  textarea{
  width: 98%;
  height: 220px;
  padding-left: 170px;
  color: red;
  border: 7px inset #C0C0C0;
  margin-left: 5px;
  }


  </style>
  <?php
}




openPopUpWindow(openInputPopUp());







