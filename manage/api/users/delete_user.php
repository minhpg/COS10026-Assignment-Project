<?php 
include('../../../db.php');
include('../../../models/model.php');
include('../../../models/users.php');

$id = $_GET['user_id'];
$user_schema = new User();
$user_schema->deleteById($id);
header('location: '.$_SERVER['HTTP_REFERER'])
?>