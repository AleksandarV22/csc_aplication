<?php
include 'config/app.php';
include 'controllers/AuthenticationController.php';
$authenticated = new AuthenticationController($db);
$authenticated->admin();
 
include ('codes/authentication_code.php');
//include_once 'controllers/DatabaseCrudController.php';
include 'includes/header.php';
include 'includes/navbar.php';

include 'database/csc_param.php';
 
include 'includes/footer.php';
?>