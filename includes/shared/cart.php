<?php 

  $cart_schema = new Cart();
  $current_cart = $cart_schema->findCart($current_session['id']);
  if (!$current_cart) {
      $current_cart = $cart_schema->createCart($current_session['id'])[0];
  }   
  if ($current_cart['checked_out']) {
    $current_cart = $cart_schema->createCart($current_session['id'])[0];
}   

  $cart_id = $current_cart['id'];

  $item_schema = new CartItem();
  $cart_items = $item_schema->findItems($cart_id);
 

?>