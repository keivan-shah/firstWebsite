<?php 
$conn=mysqli_connect("localhost","test","12345");
if(!$conn)
{
  die('Could not Connect:'. mysqli_error($conn));
}
$db=mysqli_select_db($conn,"data");

  $uname=$_POST['name'];
  $pass=$_POST['pwd'];
  $sql="SELECT count(*) FROM phplogin WHERE(user='".$uname."'and pass='".$pass."')";
  $qury=mysqli_query($conn,$sql);
  $result=mysqli_fetch_array($qury);

if($result[0]>0)
{
	echo "Successfully logged in";
	session_start();
	$_SESSION["username"]=$uname;
	mysqli_close($conn);
	header('Location: logged/index.php?message=logged');
}
else{
	header('Location: index.php?message=loginfailed');
}

  ?>