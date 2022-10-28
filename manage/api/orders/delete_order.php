<?php 
include('imports.php');

if(!$_GET) header('location: ../../index.php');
$id = $_GET['order_id'];
$order_schema = new Order();
$order_schema->deleteById($id);
header('location: '.$_SERVER['HTTP_REFERER']);

?>