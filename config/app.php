<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'csc');

define('SITE_URL', 'http://localhost/csc-application/');

include_once 'DatabaseConnection.php';
$db = new DatabaseConnection();

function base_url($slug){
    echo SITE_URL.$slug;
}

function valideteInput($dbcon,$input){
    return mysqli_real_escape_string($dbcon,$input);
}

function redirect($message,$page){
    $redirectTO = SITE_URL.$page;
    $_SESSION['message'] = "$message";
    header("Location: $redirectTO");
    exit(0);
}
