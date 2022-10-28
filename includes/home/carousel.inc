<!-- START CAROUSEL -->
<?php 
    include('card.inc')
?>
<div class="md:rounded-xl bg-base-200 p-10 my-5 shadow">
    <div class="text-base-content">
        <h2 class="text-4xl font-black uppercase">TRENDING RIGHT NOW</h2>
        <div class="mt-5">
            <div class="carousel carousel-center rounded-box">
                <div class="carousel-item">
                    <?php 
                    $product_schema = new Product();
                    $pizzas = $product_schema->findByField('taxonomy','pizza.specials');
                    foreach($pizzas as $pizza) {
                        renderCard($pizza);
                        renderDetail($pizza, $ingredients, $toppings);
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CAROUSEL -->
