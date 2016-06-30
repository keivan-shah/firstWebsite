<?php 
$conn=mysqli_connect("localhost","test","12345");
if(!$conn)
{
  die('Could not Connect:'. mysqli_error($conn));
}
$db=mysqli_select_db($conn,'data');
$int_options= array
	(
	"options"=>array
	(
		"min_range"=>100000000, "max_range"=>9000000000
		)
	);

$user=$_POST['n'];
$pass=$_POST['p'];
$rpass=$_POST['rp'];
$num=$_POST['num'];
$emailid=$_POST['emailid'];
$id=$_POST['id'];
$sql="SELECT * FROM phplogin WHERE user='".$_SESSION['username']."'";
$qury=mysqli_query($conn,$sql);
if($qury)
	header('Location: index.php?message=userexists');
$emailid=filter_var($emailid, FILTER_SANITIZE_EMAIL);
if(!filter_var($emailid, FILTER_VALIDATE_EMAIL))
{
	header('Location: index.php?message=email');
	exit;
}
if(strlen($num)<7)
{
	header('Location: index.php?message=num');
}
if($pass==$rpass)
{
$sql="INSERT INTO phplogin (`id`, `email`, `user`, `pass`,`num`) VALUES ('$id','$emailid', '$user', '$pass','$num')";
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