<?php 
$conn=mysqli_connect("localhost","test","12345");
if(!$conn)
{
  die('Could not Connect:'. mysqli_error($conn));
}
$db=mysqli_select_db($conn,"database");
 ?>
<?php 
$user=$_POST['n'];
$pass=$_POST['p'];
$rpass=$_POST['rp'];
$id=$_POST['id'];
if($pass==$rpass)
{
$sql="INSERT into phplogin values(".$id.",'".$user."','".$pass."')";
$qury=mysqli_query($conn,$sql);
	if(!$qury)
		echo "Failed" .mysqli_error($conn);
	else
		header('Location: index.php?message=signedup');
}
else
{
	header('Location: index.php?message=rpass');
}
 ?>