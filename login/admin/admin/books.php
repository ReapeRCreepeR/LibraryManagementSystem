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
      padding-left:960px;
      overflow: hidden;
    }
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
</head>
<body>
  <!--_____________________ side nav___________________-->


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
      <br><br>

      <?php
      if(isset($_SESSION['login_user'])){
      ?>
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

  <!--__________________serach bar__________________________-->

<div class="srch">
  <form class="navbar-form" method="post" name="form1">
        <input class="form-control" type="text" name="search" placeholder="search books..." required="">
        <button style="background-color:#67b9ff" type="submit" name="submit" class="btn btn-default">
          <span class="glyphicon glyphicon-search"></span>
        </button>
   </form>
</div>
<!-- search bar-->
  <div class="container">


<p style="font-size: 30px;">List Of Books</p>
<!-- finding books search bar -->
    <?php
    if (isset($_POST['submit']))
    {
        $search = mysqli_real_escape_string($db, $_POST['search']);
        $q = mysqli_query($db, "SELECT * FROM books WHERE name LIKE '%$search%'");

        if(mysqli_num_rows($q) == 0)
        {
            echo "Sorry, No books found.";
        }
        else {
            echo "<div class='scroll'>";
            echo '<table class="table table-bordered table-hover">';
            echo '<thead class="table-header">';
            echo '<tr style="background-color: #67b9ff;">';
            echo '<th>ID</th>';
            echo '<th>Book-Name</th>';
            echo '<th>Authors Name</th>';
            echo '<th>Edition</th>';
            echo '<th>Status</th>';
            echo '<th>Category</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while($row=mysqli_fetch_assoc($q))
            {
                echo "<tr>";
                echo "<td>{$row['bid']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['authors']}</td>";
                echo "<td>{$row['edition']}</td>";
                echo "<td>{$row['status']}</td>";
                echo "<td>{$row['category']}</td>";
                echo "</tr>";
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }
    }
    else {
        $res=mysqli_query($db, "SELECT * FROM books ORDER BY name ASC");

        echo '<div class="scroll">';
        echo '<table class="table table-bordered table-hover">';
        echo '<thead class="table-header">';
        echo '<tr style="background-color: #67b9ff;">';
        echo '<th>ID</th>';
        echo '<th>Book-Name</th>';
        echo '<th>Authors Name</th>';
        echo '<th>Edition</th>';
        echo '<th>Status</th>';
        echo '<th>Category</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while($row=mysqli_fetch_assoc($res))
        {
            echo "<tr>";
            echo "<td>{$row['bid']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['authors']}</td>";
            echo "<td>{$row['edition']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td>{$row['category']}</td>";
            echo "</tr>";
        }
      }
    }


else{
  ?>
      <script type="text/javascript">
          window.location.assign("admin_login.php")


      </script>
    <?php
    echo "</div>";
}
