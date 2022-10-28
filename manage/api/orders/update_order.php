<?php 
include('../../../db.php');
include('../../../models/model.php');
include('../../../models/order.php');

if(!$_POST) header('location: ../../index.php');
$id = $_POST['order_id'];
$status = $_POST['status'];
$order_schema = new Order();
$order_schema->updateOne($id, [
    'order_status' => $status
]
);
header('location: '.$_SERVER['HTTP_REFERER'])
?>