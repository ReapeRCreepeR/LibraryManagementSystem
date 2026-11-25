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
			background-image: url("img/library.jpg");
			overflow: hidden;
		}
		.wrapper
		{
			width: 400px;
			height: 400px;
			margin:100px auto;
			background-color: black;
			opacity: .8;
			color: white;
			padding: 27px 15px;
		}
		.form-control
		{
			width: 300px;
		}
	</style>
</head>
<body>



	<div class="wrapper">
		<div style="text-align: center;">
			<h1 style="text-align: center; font-size: 35px;">Change Student's <br>Password</h1><br><br>
		</div>
		<div style="padding-left: 30px; ">
		<form action="" method="post" >
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="password" name="password" id="password" class="form-control" placeholder="New Password" required=""><br>
			<input class="form-control" type="password" name="cpassword" placeholder="Enter Confirm Password" oninput="check(this)" required><br>

			<button class="btn btn-default" type="submit" name="submit" >Update</button>
		</form>

	</div>

</div>
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
	  $username = $_POST['username'];
	  $new_password = $_POST['password'];

	  // Retrieve the student's password hash from the database
	  $sql = "SELECT password FROM student WHERE username = '$username'";
	  $result = mysqli_query($db, $sql);

	  if (mysqli_num_rows($result) == 1) {
	    $row = mysqli_fetch_assoc($result);
	    $current_password_hash = $row['password'];

	    // Check if the current password is in hashed form
	    if (password_verify($new_password, $current_password_hash)) {
	      // Password is already hashed, no need to hash it again
	      $sql = "UPDATE student SET password = '$current_password_hash' WHERE username = '$username'";
	    } else {
	      // Hash the new password
	      $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
	      $sql = "UPDATE student SET password = '$new_password_hash' WHERE username = '$username'";
	    }

	    // Update the password in the database
	    if (mysqli_query($db, $sql)) {
	      // Password updated successfully
	      echo "Password updated successfully";
	    } else {
	      // Error updating password
	      echo "Error updating password: " . mysqli_error($db);
	    }
	  } else {
	    // Student not found
	    echo "Student not found";
	  }
	}
	?>

</body>
</html>
