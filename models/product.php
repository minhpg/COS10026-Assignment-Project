<?php 
// require('../db.php');
// require('model.php');
class Product extends Model  {
    function __construct()
    {       
        $schema = [
            "name" => "varchar(255) NOT NULL",
            "description" => "text",
            "image_card" => "varchar(255) NOT NULL",
            "image_detail" => "varchar(255) NOT NULL",
            "slug" => "varchar(255) NOT NULL",
            "taxonomy" => "varchar(255) NOT NULL",
            "price" => "float NOT NULL"
        ];
        $unique_fields = [
            "name", "slug"
        ];
        $table = 'products';
        parent::__construct($table, $schema, $unique_fields);
    }
    
}
// $productSchema = new Product();
// foreach($pizzas as $pizza){
//     $productSchema->insertOne($pizza);
// }
// $results = $productSchema->getByField('taxonomy','pizza.personalpan');

?>

