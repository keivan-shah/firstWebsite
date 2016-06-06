<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home</title>
    
    <style>
    .logo{font-size: 40px;}
    body{font-family: 'Lobster', cursive;}
    nav li{padding-right: 10px;}
    </style>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login-register.css" rel="stylesheet">
    <link rel="stylesheet" href="style/index_style.css">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <script src="js/login-register.js" type="text/javascript"></script>


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
        <li><a href="posts.html">Posts</a></li>
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
          <button class="btn btn-primary navbar-btn" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Log in</button>
        </li>
        <li>
           <button  class="btn btn-success navbar-btn" data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();">Register</button>
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
        <div class="modal fade login" id="loginModal">
          <div class="modal-dialog login animated">
              <div class="modal-content">
                 <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
                        <h4 class="modal-title">Login</h4>
                    </div>
                    <div class="modal-body">  
                        <div class="box">
                             <div class="content">
                                
                                <div class="form loginBox">
                                    <form method="post" action="login.php" accept-charset="UTF-8">
                                    <input id="name" class="form-control" type="text" placeholder="Username" name="name">
                                    <input id="pwd" class="form-control" type="password" placeholder="Password" name="pwd">
                                    <input class="btn btn-default btn-login" type="submit" value="Login" >
                                    </form>
                                </div>
                             </div>
                        </div>
                        <div class="box">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                <form method="post" html="{:multipart=>true}" data-remote="true" action="signup.php" accept-charset="UTF-8">
                                <input id="n" class="form-control" type="text" placeholder="Username" name="n">
                                <input type="text" class="form-control" id="id" placeholder="Registration ID" name="id">
                                <input id="p" class="form-control" type="password" placeholder="Password" name="p">
                                <input id="rp" class="form-control" type="password" placeholder="Repeat Password" name="rp">
                                <input class="btn btn-default btn-register" type="submit" value="Create account" >
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <a href="#"><h4>Forgot password ?</h4></a>
                            <span>Looking to 
                                 <a href="javascript: showRegisterForm();"><h4>Signup ?</h4></a>
                            </span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                             <span>Already have an account?</span>
                             <a href="javascript: showLoginForm();"><h4>Login</h4></a>
                        </div>
                    </div>        
              </div>
          </div>
      </div>
      <div class="container">
        <?php require('includes/config.php'); ?>
        <?php
    try {
      
        $pages = new Paginator('6','p');
        $stmt = $db->query('SELECT postID FROM list');
        $pages->set_total($stmt->rowCount());
        $stmt = $db->query('SELECT postID, title, postdesc, date FROM list ORDER BY date DESC '.$pages->get_limit());
        while($row = $stmt->fetch()){
            
            echo '<div>';
                echo '<h1><a href="viewpost.php?id='.$row['postID'].'">'.$row['title'].'</a></h1>';
                echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['date'])).'</p>';
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
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   
  </body>
</html>