<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../Style/news_feed.css">
<div class="whole-container">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <div class="queryAndpostswitcher">
     <button id="postPage" name="postPage"> <i class="fas fa-globe"></i></button>
     <button id="queryPage" name="queryPage"><i class="fas fa-question"></i></button>
  </div>
</form>
  <div class="make_a_post">
    <div class="tabs">
      <button name="make_post" id="post"><i class="fa fa-pencil"></i> Make a post </button>
      <button name="make_query" id="query"><i class="fa fa-question"></i> Make a query </button>
    </div>
    <div class="main-post" style="display: none;" id="main-post">
      <textarea placeholder="Enter Your Post Here" minlength="5" oninput="showOptions();"></textarea>
    </div>
    <div class="main-query" id="main-query">
      <textarea placeholder="Enter Your Query Here" minlength="5" oninput="showOptions();"></textarea>
      <select name="askTo">
        <option> Friends </option>
        <option> Community </option>
        <option> Both</option>
      </select>
    </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <label for="multimedia"> <i class="fa fa-camera-retro"></i> Multimedia </label>
                <input type="file" id="multimedia" name="image" style="display: none;"/>
               <input type="submit" style="display: none;"/>
          </form>
          <div class="postingOptions">
        <button id="postButton"><i class="fa fa-tick"></i>Let's Go!</button>
      </div>
      </div>