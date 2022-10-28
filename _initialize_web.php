<?php 
    include('settings.php');
    include('db.php');
    include('password.php');
    include('models/model.php');
    include('models/users.php');
    include('models/product.php');
?>

<?php
$pizzas = [
    [
    "name" => "Veggie Sensation Personal Pan",
    "description" => "Mushrooms, pineapple, diced tomato, green capsicum, Kalamata olives, cheddar, onion & oregano, finished with aioli drizzle",
    "image_card" => "images/veggie-sensation-personal-pan-3709/card.webp",
    "image_detail" => "images/veggie-sensation-personal-pan-3709/detail.webp",
    "slug" => "veggie-sensation-personal-pan-3709",
    "taxonomy" => "pizza.personalpan",
    "price" => 7.95,
]
,
    [
    "name" => "Pepperoni Lovers Personal Pan",
    "description" => "Lots of pepperoni & mozzarella on a Personal Pan",
    "image_card" => "images/Pepperoni-Lovers-Personal-Pan/card.webp",
    "image_detail" => "images/Pepperoni-Lovers-Personal-Pan/detail.webp",
    "slug" => "Pepperoni-Lovers-Personal-Pan",
    "taxonomy" => "pizza.personalpan",
    "price" => 7.95,
]
,
    [
    "name" => "Cheese Lovers Personal Pan",
    "description" => "Lots of tasty cheddar & mozzarella on a Personal Pan",
    "image_card" => "images/Cheese-Lovers-Personal-Pan/card.webp",
    "image_detail" => "images/Cheese-Lovers-Personal-Pan/detail.webp",
    "slug" => "Cheese-Lovers-Personal-Pan",
    "taxonomy" => "pizza.personalpan",
    "price" => 7.95,
]
,
    [
    "name" => "Garlic Prawn",
    "description" => "Succulent prawns, garlic, diced tomato, green capsicum & mozzarella finished with aioli drizzle",
    "image_card" => "images/Garlic-Prawn/card.webp",
    "image_detail" => "images/Garlic-Prawn/detail.webp",
    "slug" => "Garlic-Prawn",
    "taxonomy" => "pizza.specials",
    "price" => 7.95,
]
,
    [
    "name" => "Hot & Spicy Chicken",
    "description" => "Spicy jalapeños, tender chicken, juicy pineapple, onion, chilli flakes & mozzarella finished with aioli drizzle",
    "image_card" => "images/Hot-Spicy-Chicken/card.webp",
    "image_detail" => "images/Hot-Spicy-Chicken/detail.webp",
    "slug" => "Hot-Spicy-Chicken",
    "taxonomy" => "pizza.specials",
    "price" => 7.95,
]
,
    [
    "name" => "BBQ Chicken",
    "description" => "Tender chicken, mushrooms, onion & mozzarella on rich BBQ sauce, finished with smoky BBQ drizzle",
    "image_card" => "images/BBQ-Chicken/card.webp",
    "image_detail" => "images/BBQ-Chicken/detail.webp",
    "slug" => "BBQ-Chicken",
    "taxonomy" => "pizza.specials",
    "price" => 7.95,
]
,
    [
    "name" => "Vegan Deluxe",
    "description" => "Juicy pineapple, mushrooms, green capsicum, diced tomato, onion & vegan mozzarella, finished with oregano & garlic.",
    "image_card" => "images/vegan-deluxe-3425/card.webp",
    "image_detail" => "images/vegan-deluxe-3425/detail.webp",
    "slug" => "vegan-deluxe-3425",
    "taxonomy" => "pizza.specials",
    "price" => 7.95,
]
,
    [
    "name" => "Vegan Mediterranean ",
    "description" => "Diced tomato, mushrooms, Kalamata olives, onion & vegan mozzarella",
    "image_card" => "images/vegan-mediterranean--3423/card.webp",
    "image_detail" => "images/vegan-mediterranean--3423/detail.webp",
    "slug" => "vegan-mediterranean--3423",
    "taxonomy" => "pizza.null",
    "price" => 7.95,
]
,
    [
    "name" => "Chicken Supreme",
    "description" => "Tender chicken, mushrooms, juicy pineapple, roasted red capsicum, green capsicum, onion & mozzarella",
    "image_card" => "images/Chicken-Supreme/card.webp",
    "image_detail" => "images/Chicken-Supreme/detail.webp",
    "slug" => "Chicken-Supreme",
    "taxonomy" => "pizza.null",
    "price" => 7.95,
]
,
    [
    "name" => "Veggie Sensation",
    "description" => "Mushrooms, pineapple, diced tomato, green capsicum, Kalamata olives, cheddar, onion, oregano & mozzarella finished with aioli drizzle",
    "image_card" => "images/Veggie-Sensation/card.webp",
    "image_detail" => "images/Veggie-Sensation/detail.webp",
    "slug" => "Veggie-Sensation",
    "taxonomy" => "pizza.null",
    "price" => 7.95,
]
,
    [
    "name" => "Hawaiian",
    "description" => "Smoky honey ham, juicy pineapple & mozzarella",
    "image_card" => "images/Hawaiian/card.webp",
    "image_detail" => "images/Hawaiian/detail.webp",
    "slug" => "Hawaiian",
    "taxonomy" => "pizza.specials",
    "price" => 7.95,
]
,
    [
    "name" => "Ultimate Hot & Spicy",
    "description" => "Spicy jalapeños, beef, pepperoni, Italian sausage, diced tomato, onion, chilli flakes & mozzarella finished with aioli drizzle",
    "image_card" => "images/Ultimate-Hot-Spicy/card.webp",
    "image_detail" => "images/Ultimate-Hot-Spicy/detail.webp",
    "slug" => "Ultimate-Hot-Spicy",
    "taxonomy" => "pizza.null",
    "price" => 7.95,
]
,
    [
    "name" => "Hot & Spicy Veggie",
    "description" => "Spicy jalapeños, pineapple, roasted red capsicum, green capsicum, onion, chilli flakes & mozzarella with aioli drizzle",
    "image_card" => "images/Hot-Spicy-Veggie/card.webp",
    "image_detail" => "images/Hot-Spicy-Veggie/detail.webp",
    "slug" => "Hot-Spicy-Veggie",
    "taxonomy" => "pizza.null",
    "price" => 7.95,
]
,
    [
    "name" => "Super Supreme",
    "description" => "Smoky honey ham, pepperoni, Italian sausage, beef, mushrooms, Kalamata olives, juicy pineapple, green capsicum,  onion & mozzarella",
    "image_card" => "images/Super-Supreme/card.webp",
    "image_detail" => "images/Super-Supreme/detail.webp",
    "slug" => "Super-Supreme",
    "taxonomy" => "pizza.specials",
    "price" => 7.95,
]
,
    [
    "name" => "BBQ Cheeseburger",
    "description" => "Lightly seasoned beef, smoky honey ham & mozzarella on rich BBQ sauce, finished with smoky BBQ drizzle",
    "image_card" => "images/BBQ-Cheeseburger/card.webp",
    "image_detail" => "images/BBQ-Cheeseburger/detail.webp",
    "slug" => "BBQ-Cheeseburger",
    "taxonomy" => "pizza.null",
    "price" => 7.95,
]
,
    [
    "name" => "Ham Lovers",
    "description" => "Lots of smoky honey ham & mozzarella",
    "image_card" => "images/Ham-Lovers/card.webp",
    "image_detail" => "images/Ham-Lovers/detail.webp",
    "slug" => "Ham-Lovers",
    "taxonomy" => "pizza.null",
    "price" => 7.95,
]
,
    [
    "name" => "Vegan Margherita",
    "description" => "Diced tomato & vegan mozzarella, finished with oregano & garlic",
    "image_card" => "images/vegan-margherita-3422/card.webp",
    "image_detail" => "images/vegan-margherita-3422/detail.webp",
    "slug" => "vegan-margherita-3422",
    "taxonomy" => "pizza.null",
    "price" => 7.95,
]
,
    [
    "name" => "Vegan Cheese Lovers",
    "description" => "Lots of vegan mozzarella on a tomato base",
    "image_card" => "images/vegan-cheese-lovers-3421/card.webp",
    "image_detail" => "images/vegan-cheese-lovers-3421/detail.webp",
    "slug" => "vegan-cheese-lovers-3421",
    "taxonomy" => "pizza.null",
    "price" => 7.95,
]
,
    [
    "name" => "BBQ Meatlovers",
    "description" => "Streaky bacon rashers, smoky honey ham, pepperoni, Italian sausage, beef & mozzarella on rich BBQ sauce",
    "image_card" => "images/BBQ-Meatlovers/card.webp",
    "image_detail" => "images/BBQ-Meatlovers/detail.webp",
    "slug" => "BBQ-Meatlovers",
    "taxonomy" => "pizza.specials",
    "price" => 7.95,
]
,
    [
    "name" => "Creamy Garlic Prawn",
    "description" => "Succulent prawns, garlic, mushrooms, onion, mozzarella on a creamy alfredo base, finished with parsley.",
    "image_card" => "images/creamy-garlic-prawn-3314/card.webp",
    "image_detail" => "images/creamy-garlic-prawn-3314/detail.webp",
    "slug" => "creamy-garlic-prawn-3314",
    "taxonomy" => "pizza.specials",
    "price" => 7.95,
]
,
    [
    "name" => "Creamy Chicken & Bacon",
    "description" => "Tender chicken, streaky bacon rashers, mushroom, onion, mozzarella on an alfredo base finished with parsley",
    "image_card" => "images/creamy-chicken--bacon-34189/card.webp",
    "image_detail" => "images/creamy-chicken--bacon-34189/detail.webp",
    "slug" => "creamy-chicken--bacon-34189",
    "taxonomy" => "pizza.specials",
    "price" => 7.95,
]
,
    [
    "name" => "BBQ Beef",
    "description" => "Lightly seasoned beef & mozzarella on rich BBQ sauce",
    "image_card" => "images/BBQ-Beef/card.webp",
    "image_detail" => "images/BBQ-Beef/detail.webp",
    "slug" => "BBQ-Beef",
    "taxonomy" => "pizza.null",
    "price" => 7.95,
]
,
    [
    "name" => "Pepperoni Lovers",
    "description" => "Lots of pepperoni & mozzarella",
    "image_card" => "images/Pepperoni-Lovers/card.webp",
    "image_detail" => "images/Pepperoni-Lovers/detail.webp",
    "slug" => "Pepperoni-Lovers",
    "taxonomy" => "pizza.specials",
    "price" => 7.95,
]
,
    [
    "name" => "Cheese Lovers",
    "description" => "Lots of mozzarella & tasty cheddar",
    "image_card" => "images/Cheese-Lovers/card.webp",
    "image_detail" => "images/Cheese-Lovers/detail.webp",
    "slug" => "Cheese-Lovers",
    "taxonomy" => "pizza.null",
    "price" => 7.95,
]
,
    [
    "name" => "Surf & Turf",
    "description" => "Succulent prawns, tender steak, lightly seasoned beef, diced tomato, onion & mozzarella on a tomato base.

",
    "image_card" => "images/surf--turf-3315/card.webp",
    "image_detail" => "images/surf--turf-3315/detail.webp",
    "slug" => "surf--turf-3315",
    "taxonomy" => "pizza.specials",
    "price" => 7.95,
]
,
    [
    "name" => "Create Your Own",
    "description" => "Choose your favourite 3 toppings, we’ll get you started with a pizza base topped with mozzarella & your choice of tomato or smoky BBQ sauce",
    "image_card" => "images/Create-Your-Own/card.webp",
    "image_detail" => "images/Create-Your-Own/detail.webp",
    "slug" => "Create-Your-Own",
    "taxonomy" => "pizza.null",
    "price" => 7.95,
]
,
    [
    "name" => "Butcher's Block",
    "description" => "Steak, streaky bacon rashers, pepperoni, smoky honey ham, tender chicken, Italian sausage & mozzarella on rich BBQ sauce with hollandaise drizzle",
    "image_card" => "images/Butchers-Block/card.webp",
    "image_detail" => "images/Butchers-Block/detail.webp",
    "slug" => "Butchers-Block",
    "taxonomy" => "pizza.specials",
    "price" => 7.95,
]
,
    [
    "name" => "Mega Meatlovers",
    "description" => "Steak, streaky bacon rashers, smoky honey ham, pepperoni, Italian sausage, lightly seasoned beef & mozzarella on a BBQ base with a Sweet Baby Ray's Hickory & Brown Sugar drizzle",
    "image_card" => "images/mega-meatlovers-3419/card.webp",
    "image_detail" => "images/mega-meatlovers-3419/detail.webp",
    "slug" => "mega-meatlovers-3419",
    "taxonomy" => "pizza.null",
    "price" => 7.95,
]
,
    [
    "name" => "Margherita",
    "description" => "Diced tomato & mozzarella, finished with oregano & garlic",
    "image_card" => "images/Margherita/card.webp",
    "image_detail" => "images/Margherita/detail.webp",
    "slug" => "Margherita",
    "taxonomy" => "pizza.null",
    "price" => 7.95,
]
,
    [
    "name" => "BBQ Meatlovers Personal Pan",
    "description" => "Streaky bacon rashers, smoky honey ham, pepperoni, Italian sausage, lightly seasoned beef on rich BBQ sauce on a Personal Pan",
    "image_card" => "images/BBQ-Meatlovers-Personal-Pan/card.webp",
    "image_detail" => "images/BBQ-Meatlovers-Personal-Pan/detail.webp",
    "slug" => "BBQ-Meatlovers-Personal-Pan",
    "taxonomy" => "pizza.personalpan",
    "price" => 7.95,
]
,
    [
    "name" => "Super Supreme Personal Pan",
    "description" => "Smoky honey ham, pepperoni, Italian sausage, lightly seasoned beef, mushrooms, Kalamata olives, juicy pineapple, green capsicum & onion on a Personal Pan",
    "image_card" => "images/Super-Supreme-Personal-Pan/card.webp",
    "image_detail" => "images/Super-Supreme-Personal-Pan/detail.webp",
    "slug" => "Super-Supreme-Personal-Pan",
    "taxonomy" => "pizza.personalpan",
    "price" => 7.95,
]
,
    [
    "name" => "Vegan Mediterranean Personal Pan",
    "description" => "Diced tomato, mushrooms, Kalamata olives, onion & vegan mozzarella",
    "image_card" => "images/vegan-mediterranean-personal-pan-3721/card.webp",
    "image_detail" => "images/vegan-mediterranean-personal-pan-3721/detail.webp",
    "slug" => "vegan-mediterranean-personal-pan-3721",
    "taxonomy" => "pizza.personalpan",
    "price" => 7.95,
]
,
    [
    "name" => "Hawaiian Personal Pan",
    "description" => "Smoky honey ham, juicy pineapple & mozzarella on a Personal Pan",
    "image_card" => "images/Hawaiian-Personal-Pan/card.webp",
    "image_detail" => "images/Hawaiian-Personal-Pan/detail.webp",
    "slug" => "Hawaiian-Personal-Pan",
    "taxonomy" => "pizza.personalpan",
    "price" => 7.95,
]
,
    [
    "name" => "Super Supreme With Blue Ranch",
    "description" => "Smoky honey ham, pepperoni, Italian sausage, beef, mushrooms, Kalamata olives, juicy pineapple, green capsicum,  onion & mozzarella",
    "image_card" => "images/super-supreme-with-blue-ranch-3251/card.webp",
    "image_detail" => "images/super-supreme-with-blue-ranch-3251/detail.webp",
    "slug" => "super-supreme-with-blue-ranch-3251",
    "taxonomy" => "pizza.sauceoforigin",
    "price" => 7.95,
]
,
    [
    "name" => "Super Supreme With Maroon Ranch",
    "description" => "Smoky honey ham, pepperoni, Italian sausage, beef, mushrooms, Kalamata olives, juicy pineapple, green capsicum,  onion & mozzarella",
    "image_card" => "images/super-supreme-with-maroon-ranch-3252/card.webp",
    "image_detail" => "images/super-supreme-with-maroon-ranch-3252/detail.webp",
    "slug" => "super-supreme-with-maroon-ranch-3252",
    "taxonomy" => "pizza.sauceoforigin",
    "price" => 7.95,
]
,
    [
    "name" => "Hawaiian With Blue Ranch",
    "description" => "Smoky honey ham, juicy pineapple & mozzarella",
    "image_card" => "images/hawaiian-with-blue-ranch-3141/card.webp",
    "image_detail" => "images/hawaiian-with-blue-ranch-3141/detail.webp",
    "slug" => "hawaiian-with-blue-ranch-3141",
    "taxonomy" => "pizza.sauceoforigin",
    "price" => 7.95,
]
,
    [
    "name" => "Hawaiian With Maroon Ranch",
    "description" => "Smoky honey ham, juicy pineapple & mozzarella",
    "image_card" => "images/hawaiian-with-maroon-ranch-3142/card.webp",
    "image_detail" => "images/hawaiian-with-maroon-ranch-3142/detail.webp",
    "slug" => "hawaiian-with-maroon-ranch-3142",
    "taxonomy" => "pizza.sauceoforigin",
    "price" => 7.95,
]
,
    [
    "name" => "Cheese Lovers with Blue Ranch",
    "description" => "Lots of mozzarella & tasty cheddar",
    "image_card" => "images/cheese-lovers-with-blue-ranch-3081/card.webp",
    "image_detail" => "images/cheese-lovers-with-blue-ranch-3081/detail.webp",
    "slug" => "cheese-lovers-with-blue-ranch-3081",
    "taxonomy" => "pizza.sauceoforigin",
    "price" => 7.95,
]
,
    [
    "name" => "Cheese Lovers with Maroon Ranch",
    "description" => "Lots of mozzarella & tasty cheddar",
    "image_card" => "images/cheese-lovers-with-maroon-ranch-3082/card.webp",
    "image_detail" => "images/cheese-lovers-with-maroon-ranch-3082/detail.webp",
    "slug" => "cheese-lovers-with-maroon-ranch-3082",
    "taxonomy" => "pizza.sauceoforigin",
    "price" => 7.95,
]
,
    [
    "name" => "Pepperoni Lovers with Blue Ranch",
    "description" => "Lots of pepperoni & mozzarella",
    "image_card" => "images/pepperoni-lovers-with-blue-ranch-3231/card.webp",
    "image_detail" => "images/pepperoni-lovers-with-blue-ranch-3231/detail.webp",
    "slug" => "pepperoni-lovers-with-blue-ranch-3231",
    "taxonomy" => "pizza.sauceoforigin",
    "price" => 7.95,
]
,
    [
    "name" => "Pepperoni Lovers with Maroon Ranch",
    "description" => "Lots of pepperoni & mozzarella",
    "image_card" => "images/pepperoni-lovers-with-maroon-ranch-3232/card.webp",
    "image_detail" => "images/pepperoni-lovers-with-maroon-ranch-3232/detail.webp",
    "slug" => "pepperoni-lovers-with-maroon-ranch-3232",
    "taxonomy" => "pizza.sauceoforigin",
    "price" => 7.95,
]
,
    [
    "name" => "BBQ Meatlovers with Blue Ranch",
    "description" => "Streaky bacon rashers, smoky honey ham, pepperoni, Italian sausage, beef & mozzarella on rich BBQ sauce",
    "image_card" => "images/bbq-meatlovers-with-blue-ranch-3052/card.webp",
    "image_detail" => "images/bbq-meatlovers-with-blue-ranch-3052/detail.webp",
    "slug" => "bbq-meatlovers-with-blue-ranch-3052",
    "taxonomy" => "pizza.sauceoforigin",
    "price" => 7.95,
]
,
    [
    "name" => "BBQ Meatlovers with Maroon Ranch",
    "description" => "Streaky bacon rashers, smoky honey ham, pepperoni, Italian sausage, beef & mozzarella on rich BBQ sauce",
    "image_card" => "images/bbq-meatlovers-with-maroon-ranch-3053/card.webp",
    "image_detail" => "images/bbq-meatlovers-with-maroon-ranch-3053/detail.webp",
    "slug" => "bbq-meatlovers-with-maroon-ranch-3053",
    "taxonomy" => "pizza.sauceoforigin",
    "price" => 7.95,
]
]
?>

<?php 
$productSchema = new Product();
foreach($pizzas as $pizza){
    $productSchema->insertOne($pizza);
}

$user_schema = new User();

$user_schema->createUser(
    'Minh Pham',
    'minhpg',
    '1234'
)

?>