<?php 
    include('import.php');

    header('content-type: application/json');
    
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        header('location: index.php');
    }
    if(!$_POST){
        echo '{"status":"failed","message":"No POST data sent!"}';
    }
    else {
        try {
            $cart_schema = new CartItem();
            $cart_id = intval($_POST['cart_id']);
            $data = $cart_schema->findItems($cart_id);
            echo '{"status":"success", "data": '.json_encode($data).'}';
        }
        catch(Exception $e){
            echo '{"status":"failed","message":"'.$e->getMessage().'"}';
        }
    }
?>