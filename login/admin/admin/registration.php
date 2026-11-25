<?php
    include "navbar.php";
    include "connection.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>
      Online Library Management System
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- when browser is open at phone-->
<style type="text/css">
    section{
      margin-top: -165px;
    }
    .reg_img{
      height: 630px;
      margin-top: -10px;
      background-image: url("img/library.jpg");
    }
    body{
      overflow-x:hidden;
      overflow-y: hidden;
    }
    .box2{
      height: 320px;
      width: 511px;
      background-color: black;
      margin: 70px auto;
      opacity: .7;
      color: white;
      padding: 15px;
    }
</style>
</head>

<body>
  <div class="wrapper">             <!-- all header,footer,section is in one class(wrapper)!-->
  <header>

    </header>

    <section>
      <div class="reg_img">
<br>
        <div class="box2">

        <h1 style = "text-align: center; font-size: 35px; font-family: fantasy;">
          Library Management System
        </h1>
          <h1 style = "text-align: center; font-size: 25px;"> Admin Registration Form</h1><br>
            <form name="Registration" action="" method="post">

              <div class="login">

              <br>
                <input class="form-control"  type="text" name="username" placeholder="Username" required>
              <br>
                <input class="form-control"  type="password" name="password" placeholder="Password" required>
              <br>
              <input class= "btn btn-default" type="submit" name="submit" value="Sign up"  style="color: black;
              width: 70px; height: 30px"></div>


      </div>
      </div>
    </section>


    <?php
    if (isset($_POST['submit'])) {
    $count = 0;
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Hash the password using bcrypt
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if the username already exists
    $sql = "SELECT username FROM `admin` WHERE username='$username'";
    $res = mysqli_query($db, $sql);

    if (mysqli_num_rows($res) > 0) {
        ?>
        <script type="text/javascript">
            window.alert("The Username already exists. Account not registered.");
        </script>
        <?php
    } else {
        // Insert the new user into the database
        $sql = "INSERT INTO `admin` (`username`, `password`, `pic`) VALUES ('$username', '$hashed_password', 'user.jpg')";
        mysqli_query($db, $sql);

        ?>
        <script type="text/javascript">
            window.location.assign("admin_login.php")
            window.alert("Registration Successful.");

        </script>
        <?php
    }
}


    ?>
</body>
</html>
