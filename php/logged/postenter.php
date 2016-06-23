<?php
$conn=mysql_connect("localhost","test","12345");
if(!$conn)
{
  die('Could not Connect:'. mysql_error());
}
mysql_select_db("posts",$conn);

 ?>
 <?php
  $title=$_POST['title'];
  $type=$_POST['type'];
  $content=$_POST['content'];
  $postdesc=$_POST['postdesc'];
  $d=date("Y-m-d");
  $sql="INSERT INTO list (`postID`, `type`, `title`, `postdesc`, `content`, `date`) VALUES ('NULL','$type', '$title', '$postdesc', '$content','$d')";
  //$sql="SELECT count(*) FROM list WHERE(title='".$title."'and content='".$content."'and postdesc='".$postdesc."')";
  $qury=mysql_query($sql,$conn);
  //$result=mysql_fetch_array($qury);
    if(!$qury)
  echo "Failed!!!!!!!!!!!!" .mysql_error();
else
  echo "successful";
  //if( $_POST["title"] || $_POST["content"] ) {
    //  if (preg_match("/[^A-Za-z'-]/",$_POST['title'] )) {
      //   die ("invalid title  should be alpha");
      //}


?>
