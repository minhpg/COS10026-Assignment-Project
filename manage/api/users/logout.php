<?php 
include('imports.php');


$users_schema = new User();

// if(isset($_COOKIE[$ADMIN_SESSION_NAME])){
$users_schema->logoutSession($_COOKIE[$ADMIN_SESSION_NAME]);


setcookie($ADMIN_SESSION_NAME, '', time() - 3600);

header('location: ../../login.php');

?>