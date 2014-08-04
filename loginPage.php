<?php session_start(); ?>
<html class="no-js" lang="en" >

<head>
  <script>
  function onLoadEvent() {
    <?php
    Include('dbConnection.php');

      $sql=mysql_query("Select * from user_tbl");
      $result = mysql_num_rows($sql);
      if($result != 0){
        //header('Location: loginPage.php');
      }else {
       header('Location: inventoryRegistrationForm.php');
      }
    ?>

 }

 </script>
 <body onload="onLoadEvent()">
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

<form method = "post" action="loginFnc.php">
  <div class="row">
    <div class="large-10 columns large-centered">
      <!--TITLE START-->
      <nav class="top-bar" data-topbar>
        <ul class="title-area">
          <li class="name">
            <h1><a href="#">Northstar Admin Login</a></h1>
          </li>
          <li class="toggle-topbar"><a href="#"><span>Menu</span></a></li>
        </ul>
        <section class="top-bar-section">
          <!-- Right Nav Section -->
        </nav>
        <!--TITLE END-->

        <!--FIELDS - START-->
        <div class="panel">
          <div class="row">
            <div class="large-10 columns">
              <div class="row">
                <div class="large-6 columns">
                  <label>Username
                    <input type="text" placeholder="Enter your username" name="usernameTbx"  value=
                    <?php
                    if(isset($_SESSION['usernameTbx'])) {
                      echo mysql_real_escape_string($_SESSION['usernameTbx']);
                      unset($_SESSION['usernameTbx']);
                    }
                    ?>
                    >
                  </label>
                  <?php 
                  if(isset($_SESSION['error']['usernameTbx'])) {
                    echo '<small class="error">'.$_SESSION['error']['usernameTbx'].'</small>';
                    unset($_SESSION['error']['usernameTbx']);
                  } 
                  ?>

                </div>
              </div>
              <div class="row">
                <div class="large-6 columns">
                  <label>Password
                    <input type="password" placeholder="Enter your Password" name="passwordTbx"/>
                  </label>
                  <?php 
                  if(isset($_SESSION['error']['passwordTbx'])) {
                    echo '<small class="error">'.$_SESSION['error']['passwordTbx'].'</small>';
                    unset($_SESSION['error']['passwordTbx']);
                  } 
                  ?>
                </div>
              </div>
            </br>
            <div class="row">  
              <div class="large-2 columns">
                <input class="button small radius expand" type="submit" value="Login" name="submit">
              </div>
            </div>
            <?php
            if(isset($_SESSION['sysMsg']['$strSuccess'])) {
              echo '<div id="div1" data-alert class="alert-box success radius">'.$_SESSION['sysMsg']['$strSuccess'].'</div>';
              unset($_SESSION['sysMsg']['$strSuccess']);
            }elseif(isset($_SESSION['sysMsg']['$strFail'])) {
              echo '<div id="div1" data-alert class="alert-box alert radius">'.$_SESSION['sysMsg']['$strFail'].'</div>';
              unset($_SESSION['sysMsg']['$strFail']);
            }
            ?>
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
      $("#div1").fadeOut(1900);
    });
    </script>
  </body>
  </html>
  <?php
  if(isset($_POST['submit']) && ($_POST['submit'])=="submit")
  {
    $val=trim($_POST['usernameTbx']);
  }
  ?>