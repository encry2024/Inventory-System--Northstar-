<?php session_start(); ?>
<html class="no-js" lang="en" >
<head>
  
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
  <div class="row">
    <div class="large-12 columns">
      <!--TITLE START-->
      <nav class="top-bar" data-topbar>
        <ul class="title-area">
          <li class="name">
            <h1><a href="#">Northstar User Registration</a></h1>
          </li>
          <li class="toggle-topbar"><a href="#"><span>Menu</span></a></li>
        </ul>
        <section class="top-bar-section">
          <!-- Right Nav Section -->
          <ul class="right">
            <li id="loginLnk" class="active"><a href="loginPage.php">Login</a></li>
          </nav>
          <!--TITLE END-->

          <!--FIELDS - START-->
          <div id="div2" class="panel">
            <div class="row">
              <div class="large-12 columns">
                <div class="row">
                  <div class="large-6 columns">
                    <label><cite>Enter your Desired Username *</cite>
                      <input type="text" placeholder="Enter your username" name="usernameTb" />
                    </label>
                    <?php 
                    if(isset($_SESSION['error']['usernameTb'])) {
                      echo '<small class="error">'.$_SESSION['error']['usernameTb'].'</small>';
                      unset($_SESSION['error']['usernameTb']);
                    } 
                    ?>
                  </div>
                </div>
                <div class="row">
                  <div class="large-6 columns">
                    <label><cite>Enter your Desired Password *</cite>
                      <input type="password" placeholder="Enter your password" name="passwordTb"/>
                    </label>
                    <?php 
                    if(isset($_SESSION['error']['passwordTb'])) {
                      echo '<small class="error">'.$_SESSION['error']['passwordTb'].'</small>';
                      unset($_SESSION['error']['passwordTb']);
                    } 
                    ?>
                  </div>
                  <div class="large-6 columns">
                    <label><cite>Confirm your Password *</cite>
                      <input type="password" placeholder="Confirm Password" name="confirmPassTb"/>
                    </label>
                    <?php 
                    if(isset($_SESSION['error']['confirmPassTb'])) {
                      echo '<small class="error">'.$_SESSION['error']['confirmPassTb'].'</small>';
                      unset($_SESSION['error']['confirmPassTb']);
                    } 
                    ?>
                  </div>
                </div>
                <div class="row">
                  <div class="large-6 columns">
                    <label><cite>Enter your Firstname *</cite>
                      <input type="text" placeholder="Enter your Firstname" name="firstNameTb"/>
                    </label>
                    <?php 
                    if(isset($_SESSION['error']['firstNameTb'])) {
                      echo '<small class="error">'.$_SESSION['error']['firstNameTb'].'</small>';
                      unset($_SESSION['error']['firstNameTb']);
                    } 
                    ?>
                  </div>
                  <div class="row">
                    <div class="large-6 columns">
                      <label><cite>Enter your Lastname *</cite>
                        <input type="text" placeholder="Enter your Lastname" name="lastNameTb"/>
                      </label>
                      <?php 
                      if(isset($_SESSION['error']['lastNameTb'])) {
                        echo '<small class="error">'.$_SESSION['error']['lastNameTb'].'</small>';
                        unset($_SESSION['error']['lastNameTb']);
                      } 
                      ?>
                    </div>
                  </div>
                </div>
              </br>
              <div class="row">
                <div class="large-2 columns">
                  <input class="button small radius expand" type="submit" value="submit" name="submit">
                </div>
              </div>
              
              <?php
              if(isset($_SESSION['sysMsg']['$strSuccess'])) {

                echo '<div id="div1" data-alert class="alert-box success radius">'.$_SESSION['sysMsg']['$strSuccess'].'</div>';
                unset($_SESSION['sysMsg']['$strSuccess']);
              }
              ?>

          </div>
        </div>
      </div>
      <!--FIELDS - END-->
    </div>
  </form>
  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script>
  $(document).foundation();
  </script>
  <script>
  $(document).ready(function() {
      $("#div1").fadeOut(2500);
    /*$("submit").click(function(){
    });*/
  });
  </script>
</body>
</html>