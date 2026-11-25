<?php
    include "connection.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    .srch{
      padding-left:950px;
      overflow: hidden;
    }
    body {
      background-color: #73a580;
    font-family: "Lato", sans-serif;
    transition: background-color .5s;
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
.book{
  width: 400px;
  margin: 0px auto;
}
.form-control{/* color of text box*/
  background-color: black;
  color: white;
  height: 35px;
}
.h:hover
{
	color:white;
	width: 350px;
	height: 50px;
	background-color: #00544c;
}
    </style>
</head>
<body>
  <!--_____________________ side nav___________________-->


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div style="color: white; margin-left:80px; font-size:20px; ">

    <?php
    if(isset($_SESSION['login_user'])){
    echo "<img class='img-circle profile_img'  height=120 width=120 src='img/".$_SESSION['pic']."'>";
    echo "<br><br>";
    echo "Welcome ".$_SESSION['login_user'];
  }?>

  </div>
      <br><br>
      <div class="h"><a href="add.php">Add Books</a></div>
      <div class="h"><a href="delete_books.php"> Delete Books</a></div>
      <div class="h"><a href="request.php">Books Request</a></div>
      <div class="h"><a href="all_issue.php">All Request Book</a></div>
      <div class="h"><a href="issue_info.php">Issue Information</a></div>
      <div class="h"><a href="expired.php">Returned and Expired List</a></div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776; open</span>
<div class="container">
  <h2 style="color:black; font-size:30px; text-align:center; font-weight:700;">Add New Books</h2><br>

  <form class="book" action="" method="post" style="text-align: center;">
    <input type="text" name="bid" class="form-control" placeholder="Book Id" required="">
    <br>
    <input type="text" name="name" class="form-control" placeholder="Book Name" required="">
    <br>
    <input type="text" name="authors" class="form-control" placeholder="Author Name" required="">
    <br>
    <input type="text" name="edition" class="form-control" placeholder="Edition" required="">
    <br>
    <input type="text" name="status" class="form-control" placeholder="Status" required="">
    <br>
    <input type="text" name="category" class="form-control" placeholder="Category" required="">
    <br>

    <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">ADD</button>

  </form>
</div>
<?php
if (isset($_POST['submit'])) // adding books
{
if (isset($_SESSION['login_user']))
{
  $bid = mysqli_real_escape_string($db, $_POST['bid']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $authors = mysqli_real_escape_string($db, $_POST['authors']);
  $edition = mysqli_real_escape_string($db, $_POST['edition']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $category = mysqli_real_escape_string($db, $_POST['category']);

  // check if bid already exists
  $result = mysqli_query($db, "SELECT * FROM books WHERE bid = '$bid'");
  if (mysqli_num_rows($result) > 0) {
    ?>
    <script type="text/javascript">
      alert("Bid number already exists.");
    </script>
    <?php
  } else {
    // insert new record
    mysqli_query($db, "INSERT INTO books (bid, name, authors, edition, status, category)
                       VALUES ('$bid', '$name', '$authors', '$edition', '$status', '$category')");
    ?>
    <script type="text/javascript">
      alert("Book added successfully.");
    </script>
    <?php
  }
} else {
  ?>
  <script type="text/javascript">
    alert("You need to log in first.");
  </script>
  <?php
}
}

 ?>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "350px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "#73a580";
}
</script>
</body>
