<?php
    include "connection.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Books</title>
    <style type="text/css">
    table {
        border-collapse: collapse;
        width: 100%;
      }
      th, td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
      }
      th {
        background-color: #4CAF50;
        color: white;
      }
      tr:hover {
        background-color: #f5f5f5;
      }
    .srch{
      padding-left: 900px;
    }
    body {
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
  .h:hover
  {
  	color:white;
  	width: 350px;
  	height: 50px;
  	background-color: #00544c;
  }
  .container {
      height: 450px;
      background-color: black;
      opacity: .8;
      color: white;
  }
  .scroll {
    height: 350px; /* set the height of the scrollable area */
    overflow-y: scroll; /* enable vertical scrolling */
    display: block;
  }

  .table-header {
    position: sticky; /* make the header stick to the top of the scrollable area */
    top: 0;
    background-color: #fff; /* add a white background color to the header */
  }
    </style>

</head>
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

</body>
    <div class="container">

    <center><p style="font-size: 30px;">Book Issued List</p></center>
    <center><p style="font-size: 15px;">Here you can see all students that request books</p></center><br>
    <center><p style="font-size: 15px;">Expired - book is due but not returned</p></center>
    <center><p style="font-size: 15px;">Returned - book is returned</p></center>

    <?php
      // Connect to the database
      $db = mysqli_connect("localhost","root","","library");
      if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
      }

      // Fetch data from the database
      $query = "SELECT approve, issue, return_, username, bid FROM issue_book";
      $result = mysqli_query($db, $query);

      // Display the table
      echo '<div class="scroll">';
      echo '<table>';
      echo '<thead class="table-header">';
      echo '<tr>';
      echo '<th>Username</th>';
      echo '<th>Bid</th>';
      echo '<th>Approve</th>';
      echo '<th>Issue</th>';
      echo '<th>Return</th>';
      echo '</tr>';
      echo '</thead>';
      echo '<tbody>';

      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['bid'] . '</td>';
        echo '<td>' . $row['approve'] . '</td>';
        echo '<td>' . $row['issue'] . '</td>';
        echo '<td>' . $row['return_'] . '</td>';
        echo '</tr>';
      }

      echo '</tbody>';
      echo '</table>';
      echo '</div>';

      // Close the database connection
      mysqli_close($db);
    ?>
<html>
