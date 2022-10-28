<?php 
function renderCard($pizza) {
    echo '<!-- START CARD -->
    <div class="card bg-base-100 shadow hover:shadow-xl ease-in-out duration-300">
        <figure>
            <img src="'.$pizza['image_card'].'" alt="'.$pizza['name'].'" class="w-full" />
        </figure>
        <div class="card-body p-4 justify-between">
            <div class="p-1">
                <h2 class="card-title text-lg font-bold">
                    '.$pizza['name'].'
                </h2>
                <div class="text-sm mt-1" x-data="{ open: false }">
                <p class="font-light" :class="open || `description-hidden`">'.$pizza['description'].'</p>
                <p class="mt-1 underline underline-offset-2" x-on:click="open = !open">View more</p>
            </div>
            </div>
            <div class="card-actions mt-10 w-full">
                <label for="'.$pizza['slug'].'" class="btn btn-ghost bg-red-600 text-white w-full modal-button">View details</label>
            </div>
        </div>
    </div>
    <!-- END CARD -->
    ';
}?>