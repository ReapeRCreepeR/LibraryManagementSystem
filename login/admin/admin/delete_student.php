<?php
    include "connection.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Student</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
.container {
	margin: 50px auto;
	max-width: 900px;
	padding: 20px;
	background-color: #f2f2f2;
	border-radius: 5px;
	box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
}
body{
  overflow-y: scroll;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

h2 {
	text-align: center;
	margin-bottom: 20px;
}

label {
	display: block;
	margin-bottom: 10px;
}

input[type="text"] {
	padding: 5px;
	border-radius: 3px;
	border: none;
	background-color: #fff;
	box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
	margin-bottom: 20px;
}

button[type="submit"] {
	padding: 5px 10px;
	background-color: #4CAF50;
	color: #fff;
	border: none;
	border-radius: 3px;
	cursor: pointer;
}

button[type="submit"]:hover {
	background-color: #3e8e41;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
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

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.h:hover
{
	color:white;
	width: 350px;
	height: 50px;
	background-color: #00544c;
}
.scroll {
  height: 380px; /* set the height of the scrollable area */
  overflow-y:scroll; /* enable vertical scrolling */
  display: block;
}
.table-header{
  position: sticky; /* make the header stick to the top of the scrollable area */
  top: 0;
  background-color: #fff; /* add a white background color to the header */
}
</style>
<body>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <div style="color: white; margin-left:80px; font-size:20px;">

      <?php
      if(isset($_SESSION['login_user'])){
      echo "<img class='img-circle profile_img' height=120 width=120 src='img/".$_SESSION['pic']."'>";
      echo "<br><br>";
      echo "Welcome ".$_SESSION['login_user'];
    }?>

    </div>
<br>

    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="h"><a href="update_password_student.php">Change Student Password</a></div>
    <div class="h"><a href="delete_student.php"> Delete User</a></div>

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
		<h2>Delete Student</h2>
		<form method="post" action="delete_student.php">
			<label>Username:</label>
			<input type="text" name="username" required>
			<button type="submit" name="submit">Delete</button>
		</form>
	</div>
</body>
<?php
  if(isset($_SESSION['login_user'])){


  // Connect to database
  $db = mysqli_connect("localhost","root","","library");

  // Check if form submitted
  if (isset($_POST['submit'])) {
  	// Get input value
  	$username = $_POST['username'];

  	// Check if student exists in database
  	$sql = "SELECT * FROM student WHERE username = '$username'";
  	$result = mysqli_query($db, $sql);
  	$count = mysqli_num_rows($result);

  	if ($count == 0) {
  		echo "Student does not exist";
  	} else {
  		// Delete student from database
  		$sql = "DELETE FROM student WHERE username = '$username'";
  		if (mysqli_query($db, $sql)) {
  			echo "Student deleted successfully";
  		} else {
  			echo "Error deleting student: " . mysqli_error($db);
  		}
  	}
  }
}
else{
  ?>
  <script type="text/javascript">
      window.location.assign("admin_login.php")

  </script>
  <?php
}
?>
</html>
<!DOCTYPE html>
<html>
<head>

  <div class="container">


	<title>List of Students</title>
	<style type="text/css">
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		tr:hover {
			background-color: #f5f5f5;
		}
		th {
			background-color: #4CAF50;
			color: white;
		}
	</style>
</head>
<body>

	<center><p style="font-size: 30px;">List of Students</p></center>

	<table>
		<thead>
			<tr>

				<th>First Name</th>
				<th>Last Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Roll</th>
				<th>Contact</th>

			</tr>
		</thead>
		<tbody>
			<?php
				// Connect to database
				$db = mysqli_connect("localhost","root","","library");

				// Query to retrieve all student records
				$sql = "SELECT first, last, username, email, roll, contact FROM student";
				$result = mysqli_query($db, $sql);

				// Loop through the records and display them in the table
				while ($row = mysqli_fetch_assoc($result)) {

					echo "<tr>";
					echo "<td>" . $row['first'] . "</td>";
					echo "<td>" . $row['last'] . "</td>";
					echo "<td>" . $row['username'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
					echo "<td>" . $row['roll'] . "</td>";
					echo "<td>" . $row['contact'] . "</td>";
  				echo "</tr>";
				}

				// Close database connection
				mysqli_close($db);
			?>
		</tbody>
	</table>
    </div>

</body>
</html>
