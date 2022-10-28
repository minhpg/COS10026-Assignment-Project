<?php 
class Order extends Model  {
    function __construct()
    {       
        $schema = [
            "notes" => "text",
            "first_name" => "varchar(255) NOT NULL",
            "last_name" => "varchar(255) NOT NULL",
            "mobile_number" => "varchar(255) NOT NULL",
            "email" => "varchar(255) NOT NULL",
            "street_address" => "varchar(255) NOT NULL",
            "suburb" => "varchar(255) NOT NULL",
            "state" => "varchar(3) NOT NULL",
            "postcode" => "varchar(32) NOT NULL",
            "state" => "varchar(3) NOT NULL",
            "postcode" => "varchar(32) NOT NULL",
            "card_holder" => "varchar(255) NOT NULL",
            "card_number" => "varchar(255) NOT NULL",
            "card_type" => "varchar(255) NOT NULL",
            "card_cvv" => "varchar(3) NOT NULL",
            "card_expiry_month" => "varchar(2) NOT NULL",
            "card_expiry_year" => "varchar(4) NOT NULL",
            "order_timestamp" => "datetime NOT NULL",
            "order_status" => "varchar(255) NOT NULL",
            "order_cost" => "float NOT NULL",
            "cart_id" => "int NOT NULL"
        ];
        $unique_fields = [
        ];
        $table = 'orders';
        parent::__construct($table, $schema, $unique_fields);
    }

    function deleteOrder($id){
        $this->deleteById($id);
    }

    function sumOfMonth($month, $year){
        
    }

    function searchOrder($query_field, $query, $order_by, $order_by_field, $order_status) {
        // $query = $_GET['query'];
        // $query_field = $_GET['field'];
        // $order_by = $_GET['order_by'];
        // $field_to_order = $_GET['field_to_order'];
        // $order_status = $_GET['order_status'];

        return $this->findLike([
            $query_field => "%$query%",
            'order_status' => $order_status,
        ], ['*'], $order_by_field, $order_by);
    }
}
?>

