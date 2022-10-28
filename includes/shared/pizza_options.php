<?php
$ingredients = array(
  0 =>
  array(
      'name' => 'Beef',
      'post_name' => 'ingredient_beef',
      'value' => 1,
      'price' => 3.5,
      'max_value' => 2,
      'min_value' => 1,
  ),
  1 =>
  array(
      'name' => 'Prawns',
      'post_name' => 'ingredient_prawns',
      'value' => 1,
      'price' => 3.5,
      'max_value' => 2,
      'min_value' => 1,
  ),
  2 =>
  array(
      'name' => 'Steak',
      'post_name' => 'ingredient_steak',
      'value' => 1,
      'price' => 3.5,
      'max_value' => 2,
      'min_value' => 1,
  ),
  3 =>
  array(
      'name' => 'Diced Tomato',
      'post_name' => 'ingredient_diced_tomato',
      'value' => 1,
      'price' => 3.5,
      'max_value' => 2,
      'min_value' => 1,
  ),
  4 =>
  array(
      'name' => 'Onion',
      'post_name' => 'ingredient_onion',
      'value' => 1,
      'price' => 3.5,
      'max_value' => 2,
      'min_value' => 1,
  ),
  5 =>
  array(
      'name' => 'Mozzarella',
      'post_name' => 'ingredient_mozzarella',
      'value' => 1,
      'price' => 3.5,
      'max_value' => 2,
      'min_value' => 1,
  ),
);
$toppings = array (
  0 => 
  array (
    'name' => 'Beef',
    'post_name' => 'topping_beef',
    'value' => 0,
    'price' => 3.5,
    'max_value' => 2,
    'min_value' => 0,
  ),
  1 => 
  array (
    'name' => 'Prawns',
    'post_name' => 'topping_prawns',
    'value' => 0,
    'price' => 3.5,
    'max_value' => 2,
    'min_value' => 0,
  ),
  2 => 
  array (
    'name' => 'Steak',
    'post_name' => 'topping_steak',
    'value' => 0,
    'price' => 3.5,
    'max_value' => 2,
    'min_value' => 0,
  ),
  3 => 
  array (
    'name' => 'Diced Tomato',
    'post_name' => 'topping_diced_tomato',
    'value' => 0,
    'price' => 3.5,
    'max_value' => 2,
    'min_value' => 0,
  ),
  4 => 
  array (
    'name' => 'Onion',
    'post_name' => 'topping_onion',
    'value' => 0,
    'price' => 3.5,
    'max_value' => 2,
    'min_value' => 0,
  ),
  5 => 
  array (
    'name' => 'Mozzarella',
    'post_name' => 'topping_mozzarella',
    'value' => 0,
    'price' => 3.5,
    'max_value' => 2,
    'min_value' => 0,
  ),
);

$size = [
  "large" => "Large",
  "medium" => "Medium",
  "stuffed_crust" => "Stuffed Crust",
  "gluten_free" => "Gluten Free",
  "medium" => "Medium"
];

$base = [
  "original" => "Original Pan",
  "traditional" => "Traditional",
  "stuffed_crust" => "Stuffed Crust",
  "gluten_free" => "Gluten Free",
  "thin" => "Thin"
];

$sauce = [
  "alfredo_sauce" => "Alfredo Sauce",
  "tomato_sauce" => "Tomato Sauce",
  "bbq_sauce" => "BBQ Sauce",
  "no_sauce" => "No Sauce",
];


function findPostnameMatch($postname){
  global $ingredients, $toppings;
  foreach($ingredients as $ingredient){
      if($ingredient['post_name'] == $postname){
          return $ingredient;
      }
  }
  foreach($toppings as $topping){
      if($topping['post_name'] == $postname){
          return $topping;
      }
  }
  return null;
}

?>