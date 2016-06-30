<?php
session_start();

if (!isset($_SESSION["username"]))
{
  header('Location: ../index.php');
}

$alerts = 0;
$conn = mysqli_connect("localhost", "test", "12345");

if (!$conn)
{
  die('Could not Connect:' . mysqli_error($conn));
}

$db = mysqli_select_db($conn, 'data');
$sql = "SELECT postID FROM list WHERE authorid='" . $_SESSION['username'] . "'";
$qury = mysqli_query($conn, $sql);

if ($qury != NULL && mysqli_num_rows($qury) > 0)
{
  while ($result = mysqli_fetch_assoc($qury))
  {
    $stmt = "SELECT count(*) AS 'like' FROM likes WHERE postid=" . $result['postID']." and viewed='0'";
    $query = mysqli_query($conn, $stmt);
    $row = mysqli_fetch_assoc($query);
    $alerts+= $row['like'];
  }
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
    <link href="../css/profile.css" rel="stylesheet">
   
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
        <li><a href="index.php">Home</a></li>
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
echo '<li class="active"><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
      <li role="separator" class="divider"></li>';
echo '<li><a href="alerts.php"><span class="glyphicon glyphicon-bell"></span>   Alerts   <span class="badge">' . $alerts . '</span></a></li>
      <li role="separator" class="divider"></li>';
echo '            <li><a href="myposts.php"><span class="glyphicon glyphicon-pencil"></span> My posts</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="post.php"><span class="glyphicon glyphicon-pencil"></span> Write a post</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
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
        <h1 class="title"><span>Profile</span> </h1>
        <hr>
            <form class="form-horizontal" method="post" name="profile" action="profileupdate.php" id="profile" enctype="multipart/form-data" >        
        
         
          
            <div class="form-group">

                   <div class="col-md-7 col-sm-9">
              <div class="input-group">
              
         <?php
$conn = mysqli_connect("localhost", "test", "12345");

if (!$conn)
{
  die('Could not Connect:' . mysqli_error($conn));
}

$db = mysqli_select_db($conn, "data");
$sql = "SELECT id, user, pass, email, num FROM phplogin WHERE user='" . $_SESSION["username"] . "'";
$qury = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($qury);
?>
              

            </div>
           </div>
        </div>
        
    
             
<!--<div class="form-group">
      
          <div class="col-xs-8">
            <div class="form-inline">
              <div class="form-group">
              </div>
            </div>
          </div>
        </div> 
         <div>
                <ul class="social">
                    <li class="entypo-twitter"></li>
                    <li class="entypo-facebook"></li>
                    <li class="entypo-gplus"></li>
                    <li class="entypo-linkedin"></li>
                    <li class="entypo-instagrem"></li>
                    <li class="entypo-skype"></li>
                </ul>
            </div>-->
      
      <div class="profile">
              
       <img src="profile.jpg" class="profile-photo">
                </div>

         <div class="form-group">
          <label class="control-label col-sm-3">username<span class="text-danger">*</span></label>
          <div class="col-md-6 col-sm-9">
            <?php
echo $result["user"];
?>
          
            </div>
        </div>


<div class="form-group">
         
         <div class="form-group">
          
          <label class="control-label col-sm-3">password<span class="text-danger">*</span></label>
          <div class="col-md-6 col-sm-9">
          **********
          <button data-toggle="collapse" href="#collapse1"><span class="glyphicon glyphicon-pencil"></span> </button>            
           <div class="panel-group">
 <!-- <div class="panel panel-default">
    <div class="panel-heading">-->
          <!--<a data-toggle="collapse" href="#collapse1">Collapsible panel</a>-->
            <div id="collapse1" class="panel-collapse collapse">
      <div class="panel-body">
        
        <div class="form-group">
          <label class="control-label col-sm-3">old Password <span class="text-danger">*</span></label>
                      <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" class="form-control" name="opassword" id="opassword" placeholder="Confirm your password" >
           </div>   
          </div>
        </div>
         <div class="form-group">
          <label class="control-label col-sm-3">Set new Password <span class="text-danger">*</span></label>
                      <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" class="form-control" name="password" id="password" placeholder="Choose password (5-15 chars)" >
           
            </div>
</div>
        <div class="form-group">
          <label class="control-label col-sm-3">Confirm Password <span class="text-danger">*</span></label>
                      <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm your password" >
           
            </div>
</div>
            <div class="form-group">
         
            <input name="Submit" type="submit" value="update" target="profileupdate.php"class="btn btn-primary">
          </div>  
                  </div>
      <!--<div class="panel-footer">Panel Footer</div>-->
  <!--  </div>
  </div>-->
</div> 
</div>
        </div>




          <div class="form-group">
          
          <label class="control-label col-sm-3">email id<span class="text-danger">*</span></label>
          <div class="col-md-6 col-sm-9">
          <?php
echo $result["email"];
?>  
                    <button data-toggle="collapse" href="#collapse2"><span class="glyphicon glyphicon-pencil"></span> </button>            
           <div class="panel-group">
 <!-- <div class="panel panel-default">
    <div class="panel-heading">-->
          <!--<a data-toggle="collapse" href="#collapse1">Collapsible panel</a>-->
            <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
        <div class="form-group">
          <label class="control-label col-sm-3">Email ID <span class="text-danger">*</span></label>
               <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              <input type="text" class="form-control" name="emailid" id="emailid" placeholder="Enter your Email ID" >
            </div>
           </div>
        </div>
        <!--  <div class="panel-footer">Panel Footer</div>-->
  <!--  </div>
  </div>-->
  <div class="form-group">
         
            <input name="Submit" type="submit" value="update" target="profileupdate.php" class="btn btn-primary">
          </div>
</div> </div>
          
            </div>
        </div>



          <div class="form-group">
          
          <label class="control-label col-sm-3">phone number<span class="text-danger">*</span></label>
          <div class="col-md-6 col-sm-9">
          <?php
echo $result["num"];
?>  
           <button data-toggle="collapse" href="#collapse3"><span class="glyphicon glyphicon-pencil"></span> </button>            
           <div class="panel-group">
 <!-- <div class="panel panel-default">
    <div class="panel-heading">-->
          <!--<a data-toggle="collapse" href="#collapse1">Collapsible panel</a>-->
            <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">
        <div class="form-group">
          <label class="control-label col-sm-3">Contact No. <span class="text-danger">*</span></label>
             <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
            <input type="text" class="form-control" name="contactnum" id="contactnum" placeholder="Enter your Primary contact no." >
            </div>
          </div>
        </div>
        <!--  <div class="panel-footer">Panel Footer</div>-->
  <!--  </div>
  </div>-->
  <div class="form-group">
         
            <input name="Submit" type="submit" value="update" target="profileupdate.php" class="btn btn-primary">
          </div>
</div> </div>    </div></div>









<div class="form-group">
          <label class="control-label col-sm-3">Vjti Rollno <span class="text-danger">*</span></label>
          <div class="col-md-6 col-sm-9">
           <?php
echo $result["id"];
?>  
          </div>
        </div>

        
        <div class="form-group">
          <div class="col-xs-offset-3 col-xs-10">
            <input name="Submit" type="submit" value="post" formtarget="profileupdate.php" class="btn btn-primary">
          </div>
        </div>
      </div>
      </form>
    </div>
</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>