<?php include('pizza-data.php'); ?>
<div class="md:rounded-xl bg-base-200 p-10 my-5 shadow">
    <div class="text-base-content">
        <h2 class="text-4xl font-black uppercase">TRENDING RIGHT NOW</h2>
        <div class="mt-5">
            <div class="carousel carousel-center rounded-box">
                <div class="carousel-item">
                    <?php foreach($pizzas as $pizza) {
                        include('card.php');
                        include('detail.php');
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>