<?php 
include('imports.php');



if(!$_POST) header('location: ../../index.php');
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$user_schema = new User();
$user_schema->createUser(
    $name,
    $username,
    $password
);
header('location: '.$_SERVER['HTTP_REFERER'])
?>