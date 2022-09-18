<?php 
$query = '';
if(array_key_exists('name',$_GET)){
    $query = $_GET["name"];
}
if ($query == "pizza") {
    include('section-pizza.php');
} else {
    include('section-pizza.php');

} ?>