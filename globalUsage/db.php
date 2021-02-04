<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!defined('DB_HOST')) define('DB_HOST', 'localhost');
if (!defined('DB_USER')) define('DB_USER', 'root');
if (!defined('DB_PASS')) define('DB_PASS', 'root');
if (!defined('DB_NAME')) define('DB_NAME', 'labsession4_enescu_victor');

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($link->connect_error){
    die('Database error:' . $link->connect_error);
}

