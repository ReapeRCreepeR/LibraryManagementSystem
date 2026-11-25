<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>

	<style type="text/css">
		body
		{
			height: 650px;
			background-image: url("images/library.jpg");
			background-repeat: no-repeat;
		}
		.wrapper
		{
			width: 400px;
			height: 400px;
			margin: -35px auto;
			background-color: black;
			opacity: .8;
			color: white;
			padding: 27px 15px;
		}
		.form-control
		{
			width: 300px;
		}
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
	</style>
</head>
<body>
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

<div id="main">


<a style="text-color:red;">  <span style="font-size:30px; cursor:pointer; " onclick="openNav()">&#9776; open</span></a>
</header>
	<div class="wrapper">
		<div style="text-align: center;">
			<h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Change Library Password</h1>
		</div>
		<div style="padding-left: 30px; ">
		<form action="" method="post" >
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="password" name="password" class="form-control" placeholder="New Password" required=""><br>
			<button class="btn btn-default" type="submit" name="submit" >Update</button>
		</form>

	</div>

	<?php

		if(isset($_POST['submit']))
		{
			if(mysqli_query($db,"UPDATE library_pass_adm SET password='$_POST[password]' WHERE username='$_POST[username]';"))
			{
				?>
					<script type="text/javascript">
                alert("The Password Updated Successfully.");
              </script>

				<?php
			}
		}
	?></div>
</body>
</html>
