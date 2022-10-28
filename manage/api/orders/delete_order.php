<?php 
include('import.php');

if(!$_POST) header('location: ../../index.php');
$id = $_POST['order_id'];
$order_schema = new Order();
$order_schema->deleteById($id);
header('location: '.$_SERVER['HTTP_REFERER']);

?>