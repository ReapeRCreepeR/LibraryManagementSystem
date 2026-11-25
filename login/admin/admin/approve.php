  <?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Approve Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">

		.srch
		{
			padding-left: 850px;

		}
		.form-control
		{
			width: 300px;
			height: 45px;
			background-color: black;
			color: white;
		}

		body {
			background-image: url("images/1111.jpg");
			background-repeat: no-repeat;
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
  color: white;
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
	width: 350px;
	height: 50px;
	background-color: #00544c;
}
.container
{
	height: 600px;
	background-color: black;
	opacity: .8;
	color: white;
}
.Approve
{
  margin-left: 420px;
}


	</style>

</head>
<body>
<!--_________________sidenav_______________-->

	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user'];
                }
                ?>
            </div><br><br>


            <div class="h"><a href="add.php">Add Books</a></div>
            <div class="h"><a href="delete_books.php"> Delete Books</a></div>
            <div class="h"><a href="request.php">Books Request</a></div>
            <div class="h"><a href="all_issue.php">All Request Book</a></div>
            <div class="h"><a href="issue_info.php">Issue Information</a></div>
            <div class="h"><a href="expired.php">Returned and Expired List</a></div>
</div>

<div id="main">

  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


	<script>
	function openNav() {
	  document.getElementById("mySidenav").style.width = "350px";
	  document.getElementById("main").style.marginLeft = "300px";
	  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	}

	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	  document.getElementById("main").style.marginLeft= "0";
	  document.body.style.backgroundColor = "white";
	}
	</script>
  <div class="container">
    <br><h1 style="text-align: center; font-size: 30px;">Approve Request</h1><br><br>

    <head>
    <style>
      /* Hide the form initially */
      #myForm {
        display: none;
      }
      .yes_btn{
        margin-left: 40%;
        font-size: 20px;
      }
      .no_btn{
        margin-left: 50%;
        font-size: 20px;
        position: absolute;
        margin-top: -45px;
      }

    </style>

    <!DOCTYPE html>
  <html>
  <head>
      <style>
          .Approve {
              display: none;
          }

          .yes_btn,
          .no_btn {
              color: black;
              background-color: #e0e0e0;
              border: 1px solid #ccc;
              padding: 5px 10px;
              border-radius: 4px;
              cursor: pointer;
          }
      </style>
  </head>
  <body>

  <button onclick="toggleForm('myForm')" class="yes_btn">YES</button><br><br>
  <button onclick="toggleForm('myForm1')" class="no_btn">NO</button><br><br>

  <form id="myForm" class="Approve" action="" method="post">
      <input class="form-control" type="text" name="approve" placeholder="Yes" required=""><br>
      <input type="text" name="issue" placeholder="Issue Date yyyy-mm-dd" required="" class="form-control"><br>
      <input type="text" name="return_" placeholder="Return Date yyyy-mm-dd" required="" class="form-control"><br>
      <button class="btn btn-default" type="submit" name="submit">Approve</button>
  </form>

  <form id="myForm1" class="Approve" action="" method="post">
      <input class="form-control" type="text" name="approve" placeholder="No, Because..." required=""><br>
      <button class="btn btn-default" type="submit" name="submit">Approve</button>
  </form>

  <script>
      function toggleForm(formId) {
          var form = document.getElementById(formId);
          var otherForm = formId === "myForm" ? document.getElementById("myForm1") : document.getElementById("myForm");

          if (form.style.display === "block") {
              form.style.display = "none";
          } else {
              form.style.display = "block";
              otherForm.style.display = "none";
          }
      }
  </script>

  </body>
  </html>


  <!--  <form class="Approve" action="" method="post">
        <input class="form-control" type="text" name="approve" placeholder="Yes or No" required=""><br>

        <input type="text" name="issue" placeholder="Issue Date yyyy-mm-dd" required="" class="form-control"><br>

        <input type="text" name="return_" placeholder="Return Date yyyy-mm-dd" required="" class="form-control"><br>
        <button class="btn btn-default" type="submit" name="submit">Approve</button>
    </form>-->

  </div>
</div>

  <?php
    if (isset($_POST['submit']))
    {
      mysqli_query($db, "UPDATE `issue_book` SET `approve`='$_POST[approve]',`issue`='$_POST[issue]', `return_`='$_POST[return_]' WHERE username='$_SESSION[name]' and bid='$_SESSION[bid]';");

      ?>
      <script type="text/javascript">
      alert("Update Succesfully");
      window.location="request.php";
      </script>
      <?php
    }
   ?>

</body>
</html
