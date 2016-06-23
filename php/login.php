<?php 
$conn=mysql_connect("localhost","root","");
$db=mysql_select_db("ahg",$conn);

 ?>
 <?php 
  $uname=$_POST['name'];
  $pass=$_POST['pwd'];
  $sql="SELECT count(*) FROM phplogin WHERE(user='".$uname."'and pass='".$pass."')";
  $qury=mysql_query($sql);
  $result=mysql_fetch_array($qury);

if($result[0]>0)
{
	echo "Successfully logged in";
	session_start();
	$_SESSION["username"]=$uname;
	header('Location: logged/index.php?message=logged');
	//echo "<br/><a href='signupform.php'>Signup</a>";
	//echo "<br/><a href='signinform.php'>SignIn</a>";
}
else{
	header('Location: index.php?message=loginfailed');

}

  ?>