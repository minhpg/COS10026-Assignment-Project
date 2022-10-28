<?php 
    include('import.php');
    
    if ($_SERVER['REQUEST_METHOD'] != 'GET'){
        header('location: index.php');
    }
    if(!$_GET){
        header('location: index.php');
    }
    else {
        // try {
            $cart_schema = new CartItem();
            $item_id = intval($_GET['item_id']);
            $cart_schema->deleteItem(
                $item_id
            );
            header('location: '.$_SERVER['HTTP_REFERER']);
        // }
        // catch(Exception $e){
        //     header('location: ');
        // }
    }
?>