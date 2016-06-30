<?php
session_start();

if (!isset($_SESSION["username"]))
{
  header('Location: ../index.php');
}

$conn = mysqli_connect("localhost", "test", "12345");

if (!$conn)
{
  die('Could not Connect:' . mysqli_error($conn));
}

$db = mysqli_select_db($conn, "data");
$sql = "SELECT id, user, pass, email, num FROM phplogin WHERE user='" . $_SESSION["username"] . "'";
$qury = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($qury);

if (isset($_POST['contactnum']) && $_POST['contactnum'] != '')
{
  $num = $_POST['contactnum'];
  $num=filter_var($num, FILTER_SANITIZE_STRING);
  $sq2 = "UPDATE `phplogin` SET `num` = " . $num . " WHERE id ='" . $result['id'] . "'";
  $qury1 = mysqli_query($conn, $sq2);
  if (!$qury1) echo header('Location: profile.php?message="dupnum');
  else echo 'Success!';
}

if (isset($_POST['emailid']) && $_POST['emailid'] != '')
{
  $emailid = $_POST['emailid'];
  $emailid=filter_var($emailid, FILTER_SANITIZE_EMAIL);
  $sq2 = "UPDATE `phplogin` SET `email` = '" . $emailid . "' WHERE id ='" . $result['id'] . "'";
  $qury1 = mysqli_query($conn, $sq2);
  if (!$qury1) header('Location: profile.php?message=dupemail');
  else echo 'Success!';
}
if ((isset($_POST['opassword']) && ($_POST['opassword'] == $result['pass'])))
{
  echo "checked old pass";
  if ((isset($_POST['password']) && $_POST['password'] != '') && (isset($_POST['cpassword']) && $_POST['cpassword'] != ''))
  {
    $pass = $_POST['password'];
    $rpass = $_POST['cpassword'];
    echo "Next Checking pass with confirm";
    if ($pass === $rpass)
    {

      // ="UPDATE `phplogin` SET email='".$email."' WHERE user='".$_SESSION["username"]."'";

      $sql2 = "UPDATE `phplogin` SET `pass` = '" . $pass . "' WHERE id ='" . $result['id'] . "'";
      echo "Changing pass";

      // UPDATE  SET `email` ='".$email."' WHERE `phplogin`.`id` = 786
      $qury1 = mysqli_query($conn, $sql2);
    if (!$qury1) echo "Error!!!!!!!!!!!!" . mysqli_error($conn);
    else echo 'Success!';
    }
    else header('Location: profile.php?message=rpass');
  }
}
else header('Location: profile.php?message=pass');

?>

