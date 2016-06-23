<!DOCTYPE html>
<?php
  session_start();
  if(!isset($_SESSION["username"]))
  {
    header('Location: ../index.php');
  }
?>
<?php require('../includes/config.php'); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home</title>
    
    <style>
    .logo{font-size: 40px;}
    body{font-family: sans-serif;}
    nav li{padding-right: 10px;}
    </style>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/login-register.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/index_style.css">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='st
    <script src="../js/login-register.js" type="text/javascript"></script>


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
        <li><a href="about.html">About Us</a></li>
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
        <li>
          <form action="logout.php">
          <input class="btn btn-primary navbar-btn" type="submit" value="Log Out">
          </form>
        </li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
      </form>
    </div>
  </div>
</nav>
        
        <div class="container">
        <?php
    try {
      
        $pages = new Paginator('6','p');
        $stmt = $db->query('SELECT postID FROM list');
        $pages->set_total($stmt->rowCount());
        $stmt = $db->query('SELECT postID, type, title, postdesc, date FROM list ORDER BY date DESC '.$pages->get_limit());
        while($row = $stmt->fetch()){
            
            echo '<div>';
                echo '<h1><a href="viewpost.php?id='.$row['postID'].'">'."[".$row['type']."] ".$row['title'].'</a></h1>';
                echo '<p>Posted on '.date('jS M Y', strtotime($row['date'])).'</p>';
                echo '<p>'.$row['postdesc'].'</p>';                
                echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';                
            echo '</div>';

        }
      
      echo '<nav>'.$pages->page_links().'</nav>';

    } catch(PDOException $e) {
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