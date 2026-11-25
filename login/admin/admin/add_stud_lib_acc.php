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
    .srch
    {
      padding-left: 850px;
    }
    body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
  margin-left: 20px;
}
.h:hover
{
  color:white;
  width: 450px;
  height: 50px;
  background-color: #00544c;
}
.scroll{
  overflow: auto;
  width: 100%;
  height: 50px;
}

</style>
</head>

<body>

  <div class="wrapper">             <!-- all header,footer,section is in one class(wrapper)!-->
  <header>

    	<div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

      			<div style="color: white; margin-left: 60px; font-size: 20px;">

              <?php
              if(isset($_SESSION['login_user'])){
              echo "<img class='img-circle profile_img' height=120 width=120 src='img/".$_SESSION['pic']."'>";
              echo "<br><br>";
              echo "Welcome ".$_SESSION['login_user'];

            }?>
                </div>
                <br><br>
                <div class="h"><a href="add_adm_lib_acc.php">Add Admin Library Account</a></div>
                <div class="h"><a href="add_stud_lib_acc.php">Add Student Library Account</a></div>
                <div class="h"><a href="change_adm_lib.php">Change Admin Library Password</a></div>
                <div class="h"><a href="change_stud_lib.php">Change Student Library Password</a></div>

    </div>

    <div id="main">

    <a style="text-color:red;">  <span style="font-size:30px; cursor:pointer; " onclick="openNav()">&#9776; open</span></a>
    </header>

    <section>
      <div class="reg_img">
<br>
        <div class="box2">

        <h1 style = "text-align: center; font-size: 35px; font-family: fantasy;">
          Library Management System
        </h1>
          <h1 style = "text-align: center; font-size: 25px;">Add Student Library Account</h1><br>
            <form name="Registration" action="" method="post">

              <div class="login">

              <br>
                <input class="form-control"  type="text" name="username" placeholder="Library Username" required>
              <br>
                <input class="form-control"  type="password" name="password" placeholder="Library Password" required>
              <br>
              <input class= "btn btn-default" type="submit" name="submit" value="Sign up"  style="color: black;
              width: 70px; height: 30px"></div>


      </div>
      </div>
    </section>
    <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "450px";
      document.getElementById("main").style.marginLeft = "300px";
      document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
      document.body.style.backgroundColor = "white";
    }
    </script>


    <?php

      if(isset($_POST['submit']))
      {
        $count=0;
        $sql="SELECT username from `library_pass_stud`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['username']==$_POST['username'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          mysqli_query($db,"INSERT INTO `library_pass_stud` VALUES('$_POST[username]', '$_POST[password]');");
        ?>
          <script type="text/javascript">
           alert("Registration successful");
          </script>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("The username already exist.");
            </script>
          <?php

        }

      }

    ?>

</body>
</html>
