<?php
require('includes/config.php'); 
$stmt = $db->prepare('SELECT postID, title, content, date FROM list WHERE postID = :postID');
$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();

if($row['postID']==''){
    header('Location; ./');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MySite - <?php echo $row['title'];?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

	<div class="container">

		<h1>V.J.T.I</h1>
		<hr />
		<p><a href="./">Main Page</a></p>


		<?php	
echo '<div>';
    echo '<h1>'.$row['title'].'</h1>';
    echo '<p>Posted on '.date('jS M Y', strtotime($row['date'])).'</p>';
    echo '<p>'.$row['content'].'</p>';                
echo '</div>';


?>
        </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
     
</body>
</html>