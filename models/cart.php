<?php 
class Cart extends Model  {
    function __construct()
    {       
        $schema = [
            "session_id" => "int NOT NULL",
            "checked_out" => "boolean NOT NULL"
        ];
        $unique_fields = [
        ];
        $table = 'carts';
        parent::__construct($table, $schema, $unique_fields);
    }

    public function createCart($session_id) {
        $id = $this->insertOne([
            "session_id" => $session_id,
            "checked_out" => false,
        ]);
        return $this->findById($id);
    }

    public function findCart($session_id) {
        $carts = $this->findByField('session_id', $session_id);
        if(count($carts) > 0){
            return $carts[0];
        }
        return;
    }
    
    public function checkoutCart($cart_id) {
        $this->updateOne($cart_id, [
            'checked_out' => true
        ]);
        return;
    }

    public function deleteCart($cart_id){
        $this->deleteById($cart_id);
        $items_schema = new CartItem();
        $items = $items_schema->findItems($cart_id);
        foreach($items as $item){
            $items_schema->deleteById($item['id']);
        }
    }
}

class CartItem extends Model  {
    function __construct()
    {       
        $schema = [
            "name" => "varchar(255) NOT NULL",
            "cart_id" => "int NOT NULL",
            "product_id" => "int NOT NULL",
            "price" => "float NOT NULL",
            "options" => "text"
        ];
        $unique_fields = [
        ];
        $table = 'cart_items';
        parent::__construct($table, $schema, $unique_fields);
    }

    private function calculateTotalPriceOptions($options_json)
    {
      $total = 0;
      
      $options = json_decode($options_json);
      $options_ingredients = $options->ingredients;
      $options_toppings = $options->toppings;
      foreach($options_toppings as $topping){
            $total += floatval($topping->value * $topping->price);
      }
      foreach($options_ingredients as $ingredient){
        if($ingredient->value > 1){
            $total += floatval(($ingredient->value - 1) * $ingredient->price);
        }
    }
      return $total;
    }

    public function createItem($cart_id, $product_id, $options) {
        $product_schema = new Product();
        $product = $product_schema->findById($product_id, ['price', 'name'])[0];
        $product_price = $product['price'];
        $options_price = $this->calculateTotalPriceOptions($options);
        echo $product_price + $options_price;
        return $this->insertOne([
            "name" => $product['name'],
            "cart_id" => $cart_id,
            "product_id" => $product_id,
            "options" => $options,
            "price" => $product_price + $options_price
        ]);
    }

    public function findItems($cart_id) {
        $items = $this->findByField('cart_id', $cart_id);
        if(count($items) > 0){
            return $items;
        }
        return;
    }

    public function deleteItem($item_id) {
        return $this->deleteById($item_id);
    }
}
?>



