<?php session_start(); ?>
<html class="no-js" lang="en" >
<head>
  <body>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Foundation 5</title>

   <!-- If you are using the CSS version, only link these 2 files, you may add app.css to use for your overrides if you like -->
   <link rel="stylesheet" href="css/normalize.css">
   <link rel="stylesheet" href="css/foundation.css">

   <!-- If you are using the gem version, you need this only -->
   <link rel="stylesheet" href="css/app.css">

   <script src="js/vendor/modernizr.js"></script>

 </head>

 <form name="" method="POST" action="registrationFnc.php">
  <!--TITLE START-->
  <nav class="top-bar" data-topbar data-options="is_hover: false">
    <ul class="title-area">
      <li class="name">
        <h1><a href="#">Main Page</a></h1>
      </li>
      <li class="toggle-topbar"><a href="#"><span>Menu</span></a></li>
    </ul>
    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li class="has-dropdown">
          <a href="#">Hi, <?php 
          if(isset($_SESSION['userFirstName'])) {
            echo $_SESSION['userFirstName'];
          }?> 
        </a>
        <ul class="dropdown">
          <li><a href="loginPage.php">Logout</a></li>
        </ul>
      </ul>
    </nav>
    <!--TITLE END-->

    <!--FIELD START-->
  <div class="row">
    <div class="large-3 columns">

    </div>
    <div class="large-9 columns">
      <ul class="inline-list right">
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
      </ul>
    </div>
  </div>


    <div class="row">    
      <div class="large-9 push-3 columns">
        <div class="panel">
          <table>
  <thead>
    <tr>
      <th width="200">Headset ID#</th>
      <th width="200">Assigned to</th>
      <th width="200">Assigned Date</th>
      <th width="200">Action</th>
    </tr>
  </thead>
  <tbody>
    <p>There is no available headset right now.</p>
  </tbody>
</table>
        </div>
      </div>

      <div class="large-3 pull-9 columns">
        <div class="panel">
          Menu
        </div>
        <div class="panel">
          <ul class="vertical-nav">
            <li><a href="#">Headsets</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="#">Persons</a></li>
          </ul>
        </div>
      </div>
    </div>

    <footer class="row">
      <div class="large-12 columns">
        <hr/>
        <div class="row">
          <div class="large-6 columns">

          </div>
          <div class="large-6 columns">

          </div>
        </div>
      </div> 
    </footer>

    <!--FIELDS - END-->
  </form>
  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/foundation/foundation.js"></script>
  <script src="js/foundation/foundation.offcanvas.js"></script>
  <script src="js/foundation/foundation.topbar.js"></script>
  <script>
  $(document).foundation();
  </script>
</body>
</html>