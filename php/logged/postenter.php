<?php
$conn=mysqli_connect("localhost","test","12345");
if(!$conn)
{
  die('Could not Connect:'. mysqli_error($conn));
}
mysqli_select_db($conn,"posts");

 ?>
 <?php
  $title=$_POST['title'];
  $type=$_POST['type'];
  $content=$_POST['content'];
  $postdesc=$_POST['postdesc'];
  $d=date("Y-m-d H:i:s");
  $sql="INSERT INTO list (`postID`, `type`, `title`, `postdesc`, `content`, `date`) VALUES ('NULL','$type', '$title', '$postdesc', '$content','$d')";
  //$sql="SELECT count(*) FROM list WHERE(title='".$title."'and content='".$content."'and postdesc='".$postdesc."')";
  $qury=mysqli_query($conn,$sql);
  //$result=mysql_fetch_array($qury);
    if(!$qury)
  echo "Failed!!!!!!!!!!!!" .mysqli_error($conn);
else
  header('Location: index.php?message=post');
  //if( $_POST["title"] || $_POST["content"] ) {
    //  if (preg_match("/[^A-Za-z'-]/",$_POST['title'] )) {
      //   die ("invalid title  should be alpha");
      //}


?>
