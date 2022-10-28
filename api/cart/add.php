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
            $options_json = json_encode($_POST);
            $product_id = intval($_POST['product_id']);
            $cart_id = intval($_POST['cart_id']);
            $cart_schema->createItem(
                $cart_id,
                $product_id,
                $options_json
            );
            echo '{"status":"success"}';
        }
        catch(Exception $e){
            echo '{"status":"failed","message":"'.$e->getMessage().'"}';
        }
    }
?>