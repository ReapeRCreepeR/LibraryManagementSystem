<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Student Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style>
</head>
<body>

<section>
  <div class="log_img">
   <br>
    <div class="box1">
        <h1 style="text-align: center; font-size: 35px;">Library Management System</h1>
        <h1 style="text-align: center; font-size: 20px;">Admin Login Form</h1><br><br>
      <form  name="login" action="" method="post">

        <div class="login">
          <input class="form-control" type="text" name="username" placeholder="Library Username" required=""> <br>
          <input class="form-control" type="password" name="password" placeholder="Library Password" required=""> <br>
          <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px">
        </div>


    </form>
    </div>
  </div>
</section>

  <?php

    if(isset($_POST['submit']))
    {
      $count=0;
      $res=mysqli_query($db,"SELECT * FROM `library_pass_adm` WHERE username='$_POST[username]' && password='$_POST[password]';");

      $row= mysqli_fetch_assoc($res);

      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
          <div class="alert alert-danger" style="width: 600px; margin-left: 349px; margin-top: 9px; background-color: #de1313; color: white">
            <strong>The username and password doesn't match</strong>
          </div>
        <?php
      }
      else
      {
        /*-------------if username & password matches---*/


        ?>
          <script type="text/javascript">
            window.location="admin/index.php"
          </script>
        <?php
      }
    }

  ?>

</body>
</html>
