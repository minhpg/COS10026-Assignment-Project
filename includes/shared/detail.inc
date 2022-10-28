<?php
function defaultIfFirstIndex($index){
    if($index == 0) return 'selected';
    return '';
}

function renderPizzaOptions($option) {
    $index = 0;
    $string = '';
    foreach($option as $key=>$value){
        $string = $string.'<option value="'.$key.'" '.defaultIfFirstIndex($index).'>'.$value.'</option>';
        $index += 1;
    }
    return $string;
}

function renderDetail($pizza, $ingredients, $toppings) {
    global $current_cart, $size, $base, $sauce;
    echo '<!-- START MODAL -->
    <input type="checkbox" id="'.$pizza['slug'].'" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box flex p-0 max-w-3xl">
            <aside class="hidden md:block">
                <img class="h-full" src="'.$pizza['image_detail'].'" alt="pizza" />
            </aside>
            <div>
                <div class="h-full overflow-x-scroll p-4">
                    <div class="my-5">
                        <div class="flex justify-between">
                            <div>
                                <h2 class="text-3xl font-black">'.$pizza['name'].'</h2>
                                <p class="font-light text-xs mb-3">Images and contents from <a href="https://www.pizzahut.com.au/menu/pizza/" target="_blank" class="underline">PizzaHut</a></p>
                            </div>
                            <label for="'.$pizza['slug'].'" class="btn btn-ghost btn-round pb-5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </label>
                        </div>
    
                        <p class="font-light text-sm ">'.$pizza['description'].'</p>
                    </div>
                    <hr>
                    <form id="product-'.$pizza['id'].'" method="post" action="api/cart/add_cart.php">
                    <input class="hidden" type="hidden" name="product_id" value="'.$pizza['id'].'">
                    <input class="hidden" type="hidden" name="cart_id" value="'.$current_cart['id'].'">
                    <div class="my-5">
                        <table class="table table-compact w-full">
                            <tbody>
                                <tr>
                                    <th class="w-full">
                                        <p>Size</p>
                                    </th>
                                    <td>
                                        <select name="size" class="select select-sm select-bordered w-50">
                                            '.renderPizzaOptions($size).'
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-full">
                                        <p>Base</p>
                                    </th>
                                    <td>
                                        <select name="base" class="select select-sm select-bordered w-50">
                                        '.renderPizzaOptions($base).'
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-full">
                                        <p>Sauce</p>
                                    </th>
                                    <td>
                                        <select name="sauce" class="select select-sm select-bordered w-50">
                                        '.renderPizzaOptions($sauce).'
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="my-5">
                        <h3 class="text-xl mb-2">Ingredients</h3>
                        <table class="table table-compact table-no-border w-full">
                            <tbody>
                                '.renderIngredients($ingredients).'
                            </tbody>
                        </table>
                    </div>
                    <div class="my-5">
                        <h3 class="text-xl mb-2">Toppings</h3>
                        <table class="table table-compact table-no-border w-full">
                            <tbody>
                            '.renderIngredients($toppings).'
                            </tbody>
                        </table>
                        <div class="mt-5">
                            <input class="btn btn-ghost bg-red-600 text-white w-full" value="Add to order" type="submit">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->
    ';
}

function renderIngredients($ingredients){
    $string = '';
    foreach ($ingredients as $ingredient) {
        $string = $string.'
            <tr>
            <th class="w-full">
                <p class="capitalize">' . $ingredient['name'] . '</p><span class="text-gray-400 font-light">$' . number_format($ingredient['price'], 2) . '</span>
            </th>
            <td>
                <div class="form-control">
                        <div class="input-group"  x-data="{ ingredient: {
                            value: '.$ingredient['value'].',
                            min_value: '.$ingredient['min_value'].',
                            max_value: '.$ingredient['max_value'].',
                        } }">
                        <div @click="ingredient.value -= 1" class="btn btn-square btn-sm" :class="ingredient.value <= ingredient.min_value ? `btn-disabled` : ``">-</div>
                        <input name="'.$ingredient['post_name'].'" type="number" max="' . $ingredient['max_value'] . '" min="' . $ingredient['min_value'] . '" class="input input-sm input-bordered text-center w-10" :value="ingredient.value" />
                        <div @click="ingredient.value += 1" class="btn btn-square btn-sm" :class="ingredient.value >= ingredient.max_value ? `btn-disabled` : ``">+</div>
                    </div>
                    </div>
                </div>
            </td>
        </tr>
        ';
    }
    return $string;
}
?>