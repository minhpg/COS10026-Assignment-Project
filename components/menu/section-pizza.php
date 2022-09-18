<?php include('pizza-data.php'); ?>
<section class="mx-2 md:mx-0 my-5">
    <div class="flex justify-center mb-4">
        <h1 class="menu-section text-3xl font-black strikethrough-title">
            Premium
        </h1>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
        <?php 
        foreach ($pizzas as $pizza) {
            if($pizza['taxonomy'] == "no.taxonomy.selected"){
                include('card.php');
                include('detail.php');
            }
        } ?>
    </div>
</section>
<section class="mx-2 md:mx-0 my-5">
    <div class="flex justify-center mb-4">
        <h1 class="menu-section text-3xl font-black strikethrough-title">
            Loaded
        </h1>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
    <?php 
        foreach ($pizzas as $pizza) {
            if($pizza['taxonomy'] == "None"){
                include('card.php');
                include('detail.php');
            }
        } ?>
    </div>
</section>
<section class="mx-2 md:mx-0 my-5">
    <div class="flex justify-center mb-4">
        <h1 class="menu-section text-3xl font-black strikethrough-title">
            Personal Pan
        </h1>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
    <?php 
        foreach ($pizzas as $pizza) {
            if($pizza['taxonomy'] == "pizza.personalpan"){
                include('card.php');
                include('detail.php');
            }
        } ?>
    </div>
</section>
<section class="mx-2 md:mx-0 my-5">
    <div class="flex justify-center mb-4">
        <h1 class="menu-section text-3xl font-black strikethrough-title">
            Sauce of Origin
        </h1>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
    <?php 
        foreach ($pizzas as $pizza) {
            if($pizza['taxonomy'] == "pizza.sauceoforigin"){
                include('card.php');
                include('detail.php');
            }
        } ?>
    </div>
</section>