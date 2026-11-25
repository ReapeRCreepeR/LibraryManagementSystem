<!-- THIS IS FOR COMMENT SECTION INDEX -->
<?php
	include_once 'controllers/Comment.php';
  include "navbar.php";
	$com = new Comment();
 ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="utf-8">
 	<title>Comment System OOP</title>
 	<style>
 		.box{border: 6px solid #999;margin: 30px auto 0;padding: 20px;width: 1000px;height: 250px;overflow: scroll;}
 		.box ul{margin: 0;padding: 0;list-style: none;}
 		.box li{display: block;border-bottom: 1px dashed #ddd;margin-bottom: 5px;padding-bottom: 5px;}
 		.box li:last-child{border-bottom: 0 dashed #ddd;}
 		.box span{color: #888;}
		body {
		font-family: "Lato", sans-serif;
		transition: background-color .5s;
		overflow: hidden;

	}

	.sidenav {
	height: 100%;
	margin-top: 52px;
	width: 0;
	position: fixed;
	z-index: 1;
	top: 0;
	left: 0;
	background-color: #222222;
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
 	</style>
 </head>

 <body style="background-color:lightblue;">

	 <div id="mySidenav" class="sidenav">
	   <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	   <div style="color: white; margin-left:80px; font-size:20px;">

	     <?php
	     if(isset($_SESSION['login_user'])){
	     echo "<img class='img-circle profile_img' height=120 width=120 src='img/".$_SESSION['pic']."'>";
	     echo "<br><br>";
	     echo "Welcome ".$_SESSION['login_user'];
			 echo "<br><br>";
	   }?>

	   </div>



	       <div class="h"><a href="delete_comment.php">Delete Comments</a></div>


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
	   document.body.style.backgroundColor = "lightblue";
	 }
	 </script>
 	<div class="box">
 		<ul>
 			<?php
 				$result = $com->index();
 				while ($data = $result->fetch_assoc()) {
 			 ?>
 			<li><b><?php echo $data['name']; ?><b> - <?php echo $data['comment'] ?> - <?php echo $com->dateFormat($data['comment_time']); ?></li>
 			<?php } ?>
 		</ul>
 	</div><br>
 	<center>
 		<?php
 			if (isset($_GET['msg'])) {
 				$msg = $_GET['msg'];
 				echo "<span style='color:green;font-size:20px'>".$msg."</span>";
 			}
 		 ?>

	<form action="post_comment.php" method="post">
 		<table>
 			<tr>
 				<td>Your Name:</td>
 				<td><input style="width: 230px;height: 30px;" type="" name="name" placeholder="Please enter your name" required=""></td>
 			</tr>
 			<tr>
 				<td>Comment:</td>
 				<td>
 					<textarea name="comment" rows="5" cols="30" placeholder="Please enter your comment" required=""></textarea>
 				</td>
 			</tr>
 			<tr>
 				<td></td>
 				<td><input style="width: 235px;height: 40px;" type="submit" name="submit" value="Post"></td>
 			</tr>
 		</table>
 	</form>
 	<center>
 </body>

 </html>
