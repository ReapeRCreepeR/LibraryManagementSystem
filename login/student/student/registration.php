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
      height: 569px;
      width: 450px;
      background-color: black;
      margin: 22px auto;
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

        <h1 style = "text-align: center; font-size: 30px; font-family: fantasy;">
          Library Management System
        </h1>
          <h1 style = "text-align: center; font-size: 20px;"> Student Registration Form</h1><br>
            <form name="Registration" action="" method="post">

              <div class="login">
                <input class="form-control" type="text" name="first" placeholder="First Name" required="">
              <br>
                <input class="form-control"  type="text" name="last" placeholder="Last Name" required="">
              <br>
                <input class="form-control"  type="text" name="username" placeholder="Username" required>
              <br>
                  <input class="form-control"  type="password" id="password" name="password" placeholder="Password" required>
              <br>
                    <input class="form-control"  type="text" name="roll" placeholder="Student ID" required="">
              <br>
                <input class="form-control"  type="text" name="email" placeholder="Email" required="">
              <br>
                <input class="form-control"  type="text" name="contact" placeholder="Phone Number" required="">
              <br>

              <input class= "btn btn-default" type="submit" name="submit" value="Sign up"  style="color: black;
              width: 70px; height: 30px"></div>


      </div>
      </div>
    </section><!-- password confirmation -->

    <script type="text/javascript">
    function check(input) {
      if (input.value != document.getElementById('password').value) {
        input.setCustomValidity('Password Must be Matching.');
      } else {
        input.setCustomValidity('');
      }
    }
    </script>

    <?php
    if (isset($_POST['submit'])) {
        $count = 0;
        $sql = "SELECT username from `Student`";
        $res = mysqli_query($db,$sql);

        while($row = mysqli_fetch_assoc($res)) {
            if($row['username'] == $_POST['username']) {
                $count = $count+1;
            }
        }
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
        mysqli_query($db,"INSERT INTO  `STUDENT` VALUES('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[email]', '$password', '$_POST[roll]', '$_POST[contact]', 'user.jpg');");
    ?>
        <script type="text/javascript">
            alert("Registration Successful");
        </script>
    <?php
    }
    ?>

</body>
</html>
