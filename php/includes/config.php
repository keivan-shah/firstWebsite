<?php
ob_start();
//session_start();

define('DBHOST','localhost');
define('DBUSER','test');
define('DBPASS','12345');
define('DBNAME','data');

$db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME,DBUSER,DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if(!$db)
{
	try
	{
	$sql = "CREATE DATABASE data";
    $conn->exec($sql);
     $sql = "CREATE TABLE list (
  postID INT(6) UNSIGNED PRIMARY KEY, 
  type VARCHAR(255) NOT NULL,
  title VARCHAR(255) NOT NULL,
  content TEXT,
  postdesc TEXT,
  authorid INT(6) UNSIGNED, 
  date TIMESTAMP
  )";
$conn->exec($sql);
	}
catch(PDOException $e)
    {
    // echo $sql . "<br>" . $e->getMessage();
    	echo 'Problem!!!!!!!';
    }
}

date_default_timezone_set('Asia/Kolkata');

function __autoload($class){
    $class = strtolower($class);
    $classpath = 'classes/class.'.$class.'.php';
    if ( file_exists($classpath)) {
      require_once $classpath;
    }    

   $classpath = '../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
    }
        
     
}

?>