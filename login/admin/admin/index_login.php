<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Online Library Management System </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- when browser is open at phone-->

</head>
<style type="text/css">

</style>
<body>
  <div class="wrapper">             <!-- all header,footer,section is in one class(wrapper)!-->

  <header>
      <div class = "logo">
        <img src = "img/sti_logo.png">
        <h1 style="color: white">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
      </div>
      <?php // logged in - it will show the username - they are inside - own profile
      if(isset($_SESSION['login_user']))
      {
        ?>
         <nav>
            <ul>
              
           </ul>
         </nav>
         <?php
      }
      else
      {
        ?>
        <nav>
           <ul>

           </ul>
         </nav>
      <?php
    }
       ?>

  <style type="text/css">
    nav{
      float: right;
      word-spacing: 40px;
      padding: 20px;
    }
    nav li{
      display: inline-block;
      line-height: 60px;
    }
  </style>
  </header>

  <section>
    <div class="sec_img">
      <br>
      <div class="box_login">
        <br><br><br><br>
        <h1 style="text-align: center;font-size: 35px; ">Welcome to STI Library </h1><br><br>
        <h1 style="text-align: center;font-size: 25px; ">Opens at 8:00 am</h1> <br>
        <h1 style="text-align: center;font-size: 25px; ">Closes at 5:00 pm</h1> <br>
        <h1 style="text-align: center;font-size: 20px; ">Breaktime 12 - 1 pm</h1> <br>
       </div>




    </div>

  </section>
  <footer>
  </footer>
  </div>


</body>
</html>
