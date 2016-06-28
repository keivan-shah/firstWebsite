<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION["username"])) {
        header('Location: ../index.php');
}
$alerts=0;
$conn = mysqli_connect("localhost", "test", "12345");
if (!$conn) {
    die('Could not Connect:' . mysqli_error($conn));
}
$db = mysqli_select_db($conn, 'data');
$sql    = "SELECT postID FROM list WHERE authorid='" . $_SESSION['username']."'";
$qury   = mysqli_query($conn, $sql);
if($qury!=NULL && mysqli_num_rows($qury)>0)
{
  while($result = mysqli_fetch_assoc($qury))
  {
    $stmt="SELECT count(*) AS 'like' FROM likes WHERE postid=".$result['postID'];
    $query= mysqli_query($conn, $stmt);
    $row=mysqli_fetch_assoc($query);
    $alerts+=$row['like'];
  }
}
?>
<?php
require('../includes/config.php');
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/login-register.css" rel="stylesheet">
    <script src="../js/login-register.js" type="text/javascript"></script>
        <style>
    .logo {font-size: 30px;}
    body{font-family: sans-serif;}
    nav li{padding-right: 10px;}
    </style>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#example" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand logo" href="#">V.J.T.I.</a>
    </div>

    <div class="collapse navbar-collapse" id="example">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="post.php">Post</a></li>
        <li><a href="../about.html">About Us</a></li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Buy</a></li>
            <li><a href="#">Sell</a></li>
            <li><a href="#">Ask Seniors</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">FAQs</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Suggestions</a></li>
          </ul>
        </li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
        <li>
          <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
      </form>
        </li>
<!--        <li>
          <form action="logout.php" class="navbar-right">
          <input class="btn btn-primary navbar-btn" type="submit" value="Log Out">
          </form>
        </li>
 -->         <?php
echo '<li class="dropdown">';
echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>' . $_SESSION["username"] . '<span class="caret"></span></b></a>';
echo '<ul class="dropdown-menu">';
echo '<li><a href="#profile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
      <li role="separator" class="divider"></li>';
echo '<li><a href="#notification"><span class="glyphicon glyphicon-bell"></span>   Alerts   <span class="badge">'.$alerts.'</span></a></li>
      <li role="separator" class="divider"></li>';
 echo'            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="post.php"><span class="glyphicon glyphicon-pencil"></span> Write a post</a></li>';
echo '</ul></li>';
?>
      </ul>
      
    </div>
  </div>
</nav>
      <?php
if (isset($_GET['message'])) {
        $message = $_GET['message'];
        if ($message == "logged") {
                echo '<div class="alert alert-success alert-dismissible" role="alert">';
                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                echo '<strong><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
  <span class="sr-only">Success:</span>
  Successfully Logged In!</strong>';
                echo '</div>';
        } else if ($message == "post") {
                echo '<div class="alert alert-success alert-dismissible" role="alert">';
                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                echo '<strong><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
  <span class="sr-only">Success:</span>
  Successfully Posted!</strong>';
                echo '</div>';
        }
}
echo '<div class="container">';
try {
        $pages = new Paginator('6', 'p');
        $stmt  = $db->query('SELECT postID FROM list');
        $pages->set_total($stmt->rowCount());
        $stmt = $db->query('SELECT postID, type, title, postdesc, date, authorid FROM list ORDER BY date DESC ' . $pages->get_limit());
        while ($row = $stmt->fetch()) {
                echo '<div>';
                echo '<h1><a href="viewpost.php?id=' . $row['postID'] . '">' . "[" . $row['type'] . "] " . $row['title'] . '</a></h1>';
                echo '<p>Posted on ' . date('jS M Y H:i', strtotime($row['date'])) . ' by <b>' . $row['authorid'] . '</b></p>';
                echo '<p>' . $row['postdesc'] . '</p>';
                echo '<p><a href="viewpost.php?id=' . $row['postID'] . '">Read More</a></p>';
                echo '</div>';
        }
        echo '<nav>' . $pages->page_links() . '</nav>';
}
catch (PDOException $e) {
        echo $e->getMessage();
}
?>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
   
  </body>
</html>