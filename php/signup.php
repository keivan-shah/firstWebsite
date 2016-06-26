<?php 
$conn=mysqli_connect("localhost","test","12345");
if(!$conn)
{
  die('Could not Connect:'. mysqli_error($conn));
}
$db=mysqli_select_db($conn,'data');

$user=$_POST['n'];
$pass=$_POST['p'];
$rpass=$_POST['rp'];
$emailid=$_POST['emailid'];
$id=$_POST['id'];
if($pass==$rpass)
{
$d=date("Y-m-d H:i:s");
$sql="INSERT INTO phplogin (`id`, `email`, `user`, `pass`, `reg_date`) VALUES ('$id','$emailid', '$user', '$pass','$d')";
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