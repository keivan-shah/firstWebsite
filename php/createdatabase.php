<?php
$conn=mysqli_connect("localhost","test","12345");
if(!$conn)
{
  die('Could not Connect:'. mysqli_error($conn));
}
$db=mysqli_select_db($conn,'data');
if(!$db)
{
  $sql = 'CREATE DATABASE data';
  if(!mysqli_query($conn,$sql))
     echo 'Error creating database: ' . mysqli_error($conn) . "\n";
  else
  {
  mysqli_select_db($conn,'data');
  $sql = "CREATE TABLE list (
  postID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL, 
  type VARCHAR(255) NOT NULL,
  content TEXT,
  postdesc TEXT,
  likes INT(6) DEFAULT '0',
  dislikes INT(6) DEFAULT '0',
  comments INT(6) DEFAULT '0',
  authorid VARCHAR(100) NOT NULL, 
  date TIMESTAMP
  )";
  $qury=mysqli_query($conn,$sql);
  if(!$qury)
  {
    die('Could not Create Table:'. mysqli_error($conn));    
  }
  //$db=mysqli_select_db($conn,'data');
  }
  $sql = "CREATE TABLE phplogin (
	id INT(6) UNSIGNED PRIMARY KEY, 
	user VARCHAR(100) NOT NULL UNIQUE,
	pass VARCHAR(50) NOT NULL,
	email VARCHAR(150) UNIQUE,
  num BIGINT(15) UNSIGNED UNIQUE NOT NULL,
	reg_date TIMESTAMP,
  profilepic VARCHAR(100)
	)";
	$qury=mysqli_query($conn,$sql);
	if(!$qury)
	{
		die('Could not Create Table:'. mysqli_error($conn));		
	}
   $sql = "CREATE TABLE likes (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  username VARCHAR(100) NOT NULL,
  postid INT(6) NOT NULL,
  viewed BOOLEAN DEFAULT '0',
  like_date TIMESTAMP
  )";
  $qury=mysqli_query($conn,$sql);
  if(!$qury)
  {
    die('Could not Create Table:'. mysqli_error($conn));    
  }
  $sql = "CREATE TABLE dislikes (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  username VARCHAR(100) NOT NULL,
  postid INT(6) NOT NULL,
  like_date TIMESTAMP
  )";
  $qury=mysqli_query($conn,$sql);
  if(!$qury)
  {
    die('Could not Create Table:'. mysqli_error($conn));    
  }
  $sql = "CREATE TABLE comments (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  username VARCHAR(100) NOT NULL,
  postid INT(6) NOT NULL,
  content TEXT,
  comment_date TIMESTAMP
  )";
  $qury=mysqli_query($conn,$sql);
  if(!$qury)
  {
    die('Could not Create Table:'. mysqli_error($conn));    
  }
}
echo 'Database Created Successfully!!';
?>