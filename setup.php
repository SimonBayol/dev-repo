<?php
session_start();
define('ROOT', realpath(__DIR__).DIRECTORY_SEPARATOR);
define('ENTITY', ROOT."entity".DIRECTORY_SEPARATOR);
define('DAO', ROOT."dao".DIRECTORY_SEPARATOR);
define('CONTROLLER', ROOT."controller".DIRECTORY_SEPARATOR);
define('VIEW', ROOT."public".DIRECTORY_SEPARATOR);
define('TEST', ROOT."test".DIRECTORY_SEPARATOR);
define('CONF', ROOT."conf".DIRECTORY_SEPARATOR);
define('PUBLICDIR','/');
define('PHOTO_DIR', PUBLICDIR."images/photos/");
define('BACK_DIR', VIEW."private".DIRECTORY_SEPARATOR);

$conf = parse_ini_file(CONF."configurationDEV.ini");
define('DB_NAME' , $conf['DB_NAME']);
define('DB_HOST' , $conf['DB_HOST']);
define('DB_USER' , $conf['DB_USER']);
define('DB_PASSWORD' , $conf['DB_PASSWORD']);
$PRIVATE_CONTROLLERS = array('BackOffice');

function myAutoload($class){
    $className = str_replace("\\", "/", $class);
    include "$className.php";
}

spl_autoload_register('myAutoload');

// var_dump('Hello');

?>

