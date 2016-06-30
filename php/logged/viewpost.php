<?php
session_start();
if (!isset($_SESSION["username"])) {
    header('Location: ../index.php');
}
require('../includes/config.php');
$stmt = $db->prepare('SELECT postID, title, content, date, authorid FROM list WHERE postID = :postID');
//if(!isset($_GET['id'])) header('Location: ../index.php');
$stmt->execute(array(
    ':postID' => $_GET['id']
));
$row = $stmt->fetch();

if ($row['postID'] == '') {
    header('Location; ./');
    exit;
}
$conn = mysqli_connect("localhost", "test", "12345");
if (!$conn) {
    die('Could not Connect:' . mysqli_error($conn));
}
$db = mysqli_select_db($conn, 'data');
if (isset($_GET["like"])) {
    $postID   = $_GET['id'];
    $username = $_SESSION['username'];
    if ($_GET["like"] == "true") {
        $sql    = "SELECT * FROM likes WHERE (postid='" . $postID . "' and username='" . $username . "')";
        $qury   = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($qury);
        if ($result == NULL) {
            $d    = date("Y-m-d H:i:s");
            $sql  = "INSERT INTO likes (`postid`, `username`, `like_date`) VALUES ('$postID', '$username', '$d')";
            $qury = mysqli_query($conn, $sql);
        }
    } else {
        $sql  = "DELETE FROM likes WHERE (postid='" . $postID . "' and username='" . $username . "')";
        $qury = mysqli_query($conn, $sql);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MySite - <?php
echo $row['title'];
?></title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">

        <h1>V.J.T.I</h1>
        <hr />
        <p><a href="./">Main Page</a></p>
<?php if (isset($_GET['message']) && $_GET['message'] == "posted") {
                echo '<div class="alert alert-success alert-dismissible" role="alert">';
                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                echo '<strong><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
  <span class="sr-only">Success:</span>
  Comment Posted!</strong>';
                echo '</div>';
        }
?>
<?php
$bool  = "true";
$state = "";
if (isset($_GET["like"]) && $_GET["like"] == "true") {
    $bool  = "false";
    $state = "active";
} else {
    $sql    = "SELECT * FROM likes WHERE (postid='" . $_GET['id'] . "' and username='" . $_SESSION['username'] . "')";
    $qury   = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($qury);
    if ($result != NULL) {
        $state = "active";
        $bool  = "false";
    }
}
$sql    = "SELECT count(*) AS 'like' FROM likes WHERE postid=" . $_GET['id'];
$qury   = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($qury);
echo '<div class="well well-lg">';
echo '<h1>' . $row['title'] . '</h1>';
echo '<p>Posted on ' . date('jS M Y H:i', strtotime($row['date'])) . ' by <b>' . $row['authorid'] . '</b></p>';
echo '<p>' . $row['content'] . '</p>';
if ($result['like'] > 0)
    echo $result['like'] . ' persons are interseted in this post';
echo '<div class="text-right">';
echo '<form action="viewpost.php" method="get">';
echo '<input type="hidden" name="id" id="id" value="' . $_GET['id'] . '">';
echo '<input type="hidden" name="like" id="like" value="' . $bool . '">';
echo '<input class="btn btn-default' . $state . '" type="submit" value="I' . "'" . 'm Interested!">
        </form></div>';
echo '</div>';
?>
<?php
$sql    = "SELECT count(*) AS 'comments' FROM comments WHERE postid=" . $_GET['id'];
$qury   = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($qury);
echo '<p><h3>' . $result['comments'] . ' Comments</h3></p>';
$sql  = "SELECT username, content, comment_date FROM comments WHERE postid=" . $_GET['id'] . " ORDER BY comment_date DESC";
$qury = mysqli_query($conn, $sql);
if ($qury != NULL && mysqli_num_rows($qury) > 0) {
    while ($result = mysqli_fetch_assoc($qury)) {
        $content=filter_var($result['content'], FILTER_SANITIZE_STRING);
        echo '<div class="well">
                    <h4>Posted by <b>' . $result['username'] . '</b> on ' . date('jS M Y H:i', strtotime($result['comment_date'])) . '</h4>
                    <block>' .$content. '</block>
                    </div>';
    }
}
echo '<h3>Your Comment</h3>
            <form action="commententer.php" method="post">
            <textarea name="content" id="content" cols="100%" rows="10%" placeholder="Your Comment!"></textarea>
            <input type="hidden" id="postid" name="postid" value="' . $_GET['id'] . '">
            <p>
            <input type="submit" class="btn btn-primary" name="Submit" id="comment">
            </p>
            </form>';
mysqli_close($conn);
?>
        </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>