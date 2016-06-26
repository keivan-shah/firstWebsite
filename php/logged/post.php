<?php
  session_start();
  if(!isset($_SESSION["username"]))
  {
    header('Location: ../index.php');
  }
?>

<html>
         <head>
          <link rel="stylesheet" href="../css/bootstrap.min.css">
           <link rel="stylesheet" href="../css/post.css">

  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
 <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine">
          <style>
    .logo {font-size: 30px;}
    body{font-family: sans-serif;}
    nav li{padding-right: 10px;}
    </style>
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
        <li><a href="index.php">Home</a></li>
        <li class="active"><a href="post.php">Post</a></li>
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
            echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>'.$_SESSION["username"].'<span class="caret"></span></b></a>';
            echo '<ul class="dropdown-menu">';
            echo '<li><a href="#profile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="active"><a href="post.php"><span class="glyphicon glyphicon-pencil"></span> Write a post</a></li>';
            echo '</ul></li>';
          ?>
      </ul>
      
    </div>
  </div>
</nav>


        <div class="container">
  <div class="row">
    <div class="col-md-8">
      <section>      
        <h1 class="title"><span>Post</span> </h1>
        <hr>
            <form class="form-horizontal" method="post" name="post" action="postenter.php" id="post" enctype="multipart/form-data" >        
        <div class="form-group">

          <label class="control-label col-sm-3">Title<span class="text-danger">*</span></label>
          <div class="col-md-7 col-sm-9">
              <div class="input-group">
              <input type="title" class="form-control" name="title" id="title
              " placeholder="Title" >
            </div>
           </div>
        </div>
        
      
      <div class="form-group">
          <label class="control-label col-sm-3">Type<span class="text-danger">*</span></label>
          <div class="col-xs-8">
            <div class="form-inline">
              <div class="form-group">
              <div class="form-group">
                <select name="type" id="type" class="form-control">
                  <option >Type</option>
                  <option value="Buy">Buy</option><option value="Sell">Sell</option><option value="Notification">Notification</option><option value="Others">Others</option>                </select>
              </div>
              </div>
            </div>
          </div>
        </div>  <div class="form-group">
          <label class="control-label col-sm-3">Description<span class="text-danger">*</span></label>
          <div class="col-md-6 col-sm-9">
            <input type="text" class="form-control" name="postdesc" id="postdesc" placeholder="Enter post description" >
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Post <span class="text-danger">*</span></label>
          <div class="col-md-6 col-sm-9">
           <textarea placeholder="Post Here!" name="content" id="content"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">File Upload <br>
          <small>(optional)</small></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group"> <span class="input-group-addon" id="file_upload"><i class="glyphicon glyphicon-upload"></i></span>
              <input type="file" name="file_nm" id="file_nm" class="form-control upload" placeholder="" aria-describedby="file_upload">
            </div>
          </div>
        <div class="form-group">
          <div class="col-xs-offset-3 col-xs-10">
            <input name="Submit" type="submit" value="post" class="btn btn-primary">
          </div>
        </div>
      </form>
    </div>
</div>
</div>
</body>
</html>