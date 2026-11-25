<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>

    <nav class= "navbar navbar-inverse">
      <div class= "container-fluid">
        <div class = "navbar-header">
        </div>
          <ul class= "nav navbar-nav navbar-left">
            <li><a href="index.php"> HOME </a></li>


          </ul>
          <ul class= "nav navbar-nav">

        </ul>
          <?php
            if(isset($_SESSION['login_user']))
            {?>


              <ul class="nav navbar-nav navbar-left">
                <li><a href="books.php"> BOOKS </a></li>
                <li><a href="student.php">STUDENT-INFORMATION </a></li>
                <li><a href="comments.php"> FEEDBACK </a></li>
                <li><a href="all_lib_acc.php"> LIBRARY ACCOUNT </a></li>

              </ul>
              <ul class= "nav navbar-nav navbar-right">

                <li><a href="profile.php">
                  <div style="color: white;">
                    <?php

                    echo "Welcome, ".$_SESSION['login_user'];// the user img and the username - user img and username
                    ?>
                  </div>
                </a></li>
              <li><a href="logout.php"><span class= "glyphicon glyphicon-log-out"> LOGOUT</span></a></li>


            </ul>
              <?php
            }
            else
            {?>
              <ul class= "nav navbar-nav navbar-right">

                <li><a href="admin_login.php"><span class= "glyphicon glyphicon-log-in"> LOGIN </span></a></li>
                <li><a href="registration.php"><span class= "glyphicon glyphicon-user"> SIGNUP</span> </a></li>
              </ul>
             <?php
          }
           ?>

      </div>
    </nav>

  </body>
</html>
