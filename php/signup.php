<?php 
$conn=mysql_connect("localhost","root","");
$db=mysql_select_db("ahg",$conn);
 ?>
<?php 
$user=$_POST['n'];
$pass=$_POST['p'];
$rpass=$_POST['rp'];
$id=$_POST['id'];
if($pass==$rpass)
{
$sql="INSERT into phplogin values(".$id.",'".$user."','".$pass."')";
$qury=mysql_query($sql);
	if(!$qury)
		echo "Failed" .mysql_error();
	else
		header('Location: index.php?message=signedup');
}
else
{
	header('Location: index.php?message=rpass');
}
 ?>