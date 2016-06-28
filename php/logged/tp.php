 <?php
 session_start();
          $conn=mysqli_connect("localhost","test","12345");
            if(!$conn)
            {
              die('Could not Connect:'. mysqli_error($conn));
            }
          $db=mysqli_select_db($conn,"data");
          $sql="SELECT id, user, pass, email, num FROM phplogin WHERE user='".$_SESSION["username"]."'";
          $qury=mysqli_query($conn,$sql);
          $result=mysqli_fetch_assoc($qury);
          echo $result["num"];
?>