<!-- START MENU -->
<?php
include('card.inc');
$product_schema = new Product();
?>
<section class="mx-2 md:mx-0 my-5">
    <div class="flex justify-center mb-4">
        <h2 class="menu-section text-3xl font-black strikethrough-title">
            Premium
        </h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
        <?php
        $pizzas = $product_schema->findByField('taxonomy', 'pizza.null');
        printBrowserConsole($pizzas);
        foreach ($pizzas as $pizza) {
            renderCard($pizza);
            renderDetail($pizza, $ingredients, $toppings);
        } ?>
    </div>
</section>
<section class="mx-2 md:mx-0 my-5">
    <div class="flex justify-center mb-4">
        <h2 class="menu-section text-3xl font-black strikethrough-title">
            Loaded
        </h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
        <?php
        $pizzas = $product_schema->findByField('taxonomy', 'pizza.specials');
        foreach ($pizzas as $pizza) {
            renderCard($pizza);
            renderDetail($pizza, $ingredients, $toppings);
        }
        ?>
    </div>
</section>
<section class="mx-2 md:mx-0 my-5">
    <div class="flex justify-center mb-4">
        <h2 class="menu-section text-3xl font-black strikethrough-title">
            Personal Pan
        </h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
        <?php
        $pizzas = $product_schema->findByField('taxonomy', 'pizza.personalpan');
        foreach ($pizzas as $pizza) {
            renderCard($pizza);
            renderDetail($pizza, $ingredients, $toppings);
        }
        ?>
    </div>
</section>
<section class="mx-2 md:mx-0 my-5">
    <div class="flex justify-center mb-4">
        <h2 class="menu-section text-3xl font-black strikethrough-title">
            Sauce of Origin
        </h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
        <?php
        $pizzas = $product_schema->findByField('taxonomy', 'pizza.sauceoforigin');
        foreach ($pizzas as $pizza) {
            renderCard($pizza);
            renderDetail($pizza, $ingredients, $toppings);
        }
        ?>
    </div>
</section>
<!-- END MENU -->