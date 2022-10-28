<?php 
    include('import.php');    
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        header('location: index.php');
    }
    if(!$_POST){
        header('location: index.php');
    }
    else {
        // try {
            $cart_schema = new CartItem();
            $parsed_option = [
                'ingredients'=> [],
                'toppings' => []
            ];
            foreach($_POST as $key=>$value) {
                if(strpos($key, 'ingredient_') !== false){
                    $item = findPostnameMatch($key);
                    array_push($parsed_option['ingredients'], [
                        'name' => $item['name'],
                        'price' => $item['price'],
                        'value' => $value
                    ]);
                }   
                if(strpos($key, 'topping_') !== false){
                    $item = findPostnameMatch($key);
                    array_push($parsed_option['toppings'], [
                        'name' => $item['name'],
                        'price' => $item['price'],
                        'value' => $value
                    ]);
                }
            }
            $parsed_option['base'] = $_POST['base'];
            $parsed_option['sauce'] = $_POST['sauce'];
            $parsed_option['size'] = $_POST['size'];
            $options_json = json_encode($parsed_option);
            $product_id = intval($_POST['product_id']);
            $cart_id = intval($_POST['cart_id']);
            $cart_schema->createItem(
                $cart_id,
                $product_id,
                $options_json
            );
            header('location: '.$_SERVER['HTTP_REFERER']);
        // }
        // catch(Exception $e){
        //     header('location: ');
        // }
    }
