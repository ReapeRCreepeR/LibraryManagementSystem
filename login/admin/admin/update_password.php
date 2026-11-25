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
			<h1 style="text-align: center; font-size: 35px;">Change Your <br>Password</h1><br><br>
		</div>
		<div style="padding-left: 30px; ">
		<form action="" method="post" >
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="password" name="password" class="form-control" placeholder="New Password" required=""><br>
			<button class="btn btn-default" type="submit" name="submit" >Update</button>
		</form>

	</div>

</div>


	<?php

	if (isset($_POST['submit'])) {
    $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "UPDATE admin SET password='$new_password' WHERE username='$_POST[username]'";
    if (mysqli_query($db, $sql)) {
        echo "Password updated successfully.";
    } else {
        echo "Error updating password: " . mysqli_error($db);
    }
}

	?>
</body>
</html>
