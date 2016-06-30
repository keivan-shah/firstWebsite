<?php
	session_start();
if (!isset($_SESSION["username"])) {
        header('Location: ../index.php');
}
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
    $stmt="UPDATE likes SET viewed='1' WHERE postid=".$result['postID'];
    $query= mysqli_query($conn, $stmt);
  }
}
header('Location: alerts.php');
?>