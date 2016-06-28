<?php
  session_start();
  if(!isset($_SESSION["username"]))
  {
    header('Location: ../index.php');
  }
$conn=mysqli_connect("localhost","test","12345");
if(!$conn)
{
  die('Could not Connect:'. mysqli_error($conn));
}
$db=mysqli_select_db($conn,'data');
  $authorid=$_SESSION["username"];
  $content=$_POST['content'];
  $postid=$_POST['postid'];
  $d=date("Y-m-d H:i:s");
  $sql="INSERT INTO comments (`postid`, `username`, `content`, `comment_date`) VALUES ('$postid','$authorid', '$content','$d')";
  $qury=mysqli_query($conn,$sql);
if(!$qury)
  echo "Failed!!!!!!!!!!!!" .mysqli_error($conn);
else
  $url="viewpost.php?id=".$postid;
  mysqli_close($conn);
  header('Location: ' .$url);
?>
