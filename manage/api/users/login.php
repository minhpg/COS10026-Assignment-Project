<?php 
include('imports.php');


if(!$_POST) header('location: ../../login.php');
$username = $_POST['username'];
$password = $_POST['password'];

$user_schema = new User();
$session_token = $user_schema->authenticateUser(
    $username,
    $password
);

if($session_token){
    setcookie($ADMIN_SESSION_NAME, $session_token, time() + 60*60*24*30, '/');
    // echo $session_token;
    header('location: ../../index.php');
}
else {
    header('location: '.$_SERVER['HTTP_REFERER']);
}

?>