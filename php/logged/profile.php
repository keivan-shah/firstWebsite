<?php
session_start();
 if(!isset($_SESSION["username"]))
  {
    header('Location: ../index.php');
  }
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
          <?php
            echo '<li class="dropdown">';
            echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>'.$_SESSION["username"].'<span class="caret"></span></b></a>';
            echo '<ul class="dropdown-menu">';
            echo '<li><a href="#profile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="post.php"><span class="glyphicon glyphicon-pencil"></span> Write a post</a></li>';
            echo '</ul></li>';
          ?>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>


        <div class="container">
  <div class="row">
    <div class="col-md-8">
      <section>      
        <h1 class="title"><span>Profile</span> </h1>
        <hr>
            <form class="form-horizontal" method="post" name="post" action="postenter.php" id="post" enctype="multipart/form-data" >        
        <div class="form-group">

                   <div class="col-md-7 col-sm-9">
              <div class="input-group">
              
         <?php
          $conn=mysqli_connect("localhost","test","12345");
            if(!$conn)
            {
              die('Could not Connect:'. mysqli_error($conn));
            }
          $db=mysqli_select_db($conn,"data");
          $sql="SELECT id, user, pass, email, num FROM phplogin WHERE user='".$_SESSION["username"]."'";
          $qury=mysqli_query($conn,$sql);
          $result=mysqli_fetch_assoc($qury);
?>
              

            </div>
           </div>
        </div>
        
      
      <div class="form-group">
      
          <div class="col-xs-8">
            <div class="form-inline">
              <div class="form-group">
              </div>
            </div>
          </div>
        </div> 
         <div class="form-group">
          <label class="control-label col-sm-3">username<span class="text-danger">*</span></label>
          <div class="col-md-6 col-sm-9">
            <?php echo $result["user"];?>
                      
            <button><span class="glyphicon glyphicon-pencil"></span></button>
          
            </div>
        </div>
         <div class="form-group">
          
          <label class="control-label col-sm-3">password<span class="text-danger">*</span></label>
          <div class="col-md-6 col-sm-9">
          <?php echo $result["pass"];?>  
          <button><span class="glyphicon glyphicon-pencil"></span></button>
           </div>
        </div>
          
          <div class="form-group">
          
          <label class="control-label col-sm-3">email id<span class="text-danger">*</span></label>
          <div class="col-md-6 col-sm-9">
          <?php echo $result["email"];?>  
          <button><span class="glyphicon glyphicon-pencil"></span></button>
          
            </div>
        </div>
          <div class="form-group">
          
          <label class="control-label col-sm-3">phone number<span class="text-danger">*</span></label>
          <div class="col-md-6 col-sm-9">
          <?php echo $result["num"];?>  
    <button><span class="glyphicon glyphicon-pencil"></span></button>           </div>
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