<?php
/**
 * Created by PhpStorm.
 * User: loser
 * Date: 16-Apr-17
 * Time: 2:41 PM
 */
$DB_HOST = 'localhost';
$DB_NAME = 'astechvn';
$DB_USER = 'root';
$DB_PASS = '';

$ROOT_URL = 'http://localhost:8081';

define('DB_HOST', 'localhost');
define('DB_NAME', 'astechvn');
define('DB_USER', 'root');
define('DB_PASS', '');

function write($text){
    $myfile = fopen("log.txt", "a") or die("Unable to open file!");
    fwrite($myfile, $text);
    fclose($myfile);
}
?>