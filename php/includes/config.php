<?php
ob_start();
//session_start();

define('DBHOST','localhost');
define('DBUSER','test');
define('DBPASS','12345');
define('DBNAME','data');

$db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME,DBUSER,DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

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