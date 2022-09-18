<input type="checkbox" id="<?php echo ($pizza['slug']) ?>" class="modal-toggle" />
<div class="modal">
    <div class="modal-box flex p-0 max-w-3xl overflow-clip">
        <aside class="hidden md:block">
            <img class="h-full" src="<?php echo ($pizza['image_detail']) ?>" alt="pizza" />
        </aside>
        <div>
            <div class="h-full overflow-x-scroll p-4">
                <div class="my-5">
                    <div class="flex justify-between">
                        <div>
                            <h2 class="text-3xl font-black"><?php echo ($pizza['name']) ?></h2>
                            <p class="font-light text-xs mb-3">Images and contents from <a href="https://www.pizzahut.com.au/menu/pizza/" target="_blank" class="underline">PizzaHut</a></p>
                        </div>
                        <label for="<?php echo ($pizza['slug']) ?>" class="btn btn-ghost btn-round pb-5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </label>
                    </div>

                    <p class="font-light text-sm "><?php echo ($pizza['description']) ?></p>
                </div>
                <hr>
                <div class="my-5">
                    <table class="table table-compact w-full">
                        <tbody>
                            <tr>
                                <th class="w-full">
                                    <p>Size</p>
                                </th>
                                <td>
                                    <select class="select select-sm select-bordered w-50">
                                        <option default>Large</option>
                                        <option>Medium</option>
                                        <option>Stuffed Crust</option>
                                        <option>Gluten Free</option>
                                        <option>Medium</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-full">
                                    <p>Base</p>
                                </th>
                                <td>
                                    <select class="select select-sm select-bordered w-50">
                                        <option>Original Pan</option>
                                        <option>Traditional</option>
                                        <option>Stuffed Crust</option>
                                        <option>Gluten Free</option>
                                        <option>Thin</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-full">
                                    <p>Sauce</p>
                                </th>
                                <td>
                                    <select class="select select-sm select-bordered w-50">
                                        <option>Alfredo Sauce</option>
                                        <option>Tomato Sauce</option>
                                        <option>BBQ Sauce</option>
                                        <option>No Sauce</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="my-5">
                    <h3 class="text-xl mb-2">Ingredients</h2>
                        <table class="table table-compact table-no-border w-full">
                            <tbody x-data="{
                            'ingredients': [
                            {
                                name: 'Beef',
                                value: 1,
                                price: 3.5,
                                max_value: 2,
                                min_value: 1
                            },
                            {
                                name: 'Prawns',
                                value: 1,
                                price: 3.5,
                                max_value: 2,
                                min_value: 1
                            },
                            {
                                name: 'Steak',
                                value: 1,
                                price: 3.5,
                                max_value: 2,
                                min_value: 1
                            },
                            {
                                name: 'Diced Tomato',
                                value: 1,
                                price: 3.5,
                                max_value: 2,
                                min_value: 1
                            },
                            {
                                name: 'Onion',
                                value: 1,
                                price: 3.5,
                                max_value: 2,
                                min_value: 1
                            },
                            {
                                name: 'Mozzarella',
                                value: 1,
                                price: 3.5,
                                max_value: 2,
                                min_value: 1
                            }
                        ]
                    }">
                                <template x-for="(ingredient, index) in ingredients">
                                    <tr>
                                        <th class="w-full">
                                            <p class="capitalize" x-html='ingredient.name'></p><span class="text-gray-400 font-light" x-html="`Included, add more for $${ingredient.price.toFixed(2)}`"></span>
                                        </th>
                                        <td>
                                            <div class="form-control">
                                                <div class="input-group">
                                                    <button @click="ingredient.value -= 1" class="btn btn-square btn-sm" :class="ingredient.value <= ingredient.min_value ? 'btn-disabled' : ''">-</button>
                                                    <input type="number" class="input input-sm input-bordered text-center w-10" :value="ingredient.value" />
                                                    <button @click="ingredient.value += 1" class="btn btn-square btn-sm" :class="ingredient.value >= ingredient.max_value ? 'btn-disabled' : ''">+</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </template>

                            </tbody>
                        </table>
                </div>
                <div class="my-5">
                    <h3 class="text-xl mb-2">Toppings</h2>
                        <table class="table table-compact table-no-border w-full">
                            <tbody x-data="{
                            'ingredients': [
                            {
                                name: 'Beef',
                                value: 0,
                                price: 3.5,
                                max_value: 2,
                                min_value: 0
                            },
                            {
                                name: 'Prawns',
                                value: 0,
                                price: 3.5,
                                max_value: 2,
                                min_value: 0
                            },
                            {
                                name: 'Steak',
                                value: 0,
                                price: 3.5,
                                max_value: 2,
                                min_value: 0
                            },
                            {
                                name: 'Diced Tomato',
                                value: 0,
                                price: 3.5,
                                max_value: 2,
                                min_value: 0
                            },
                            {
                                name: 'Onion',
                                value: 0,
                                price: 3.5,
                                max_value: 2,
                                min_value: 0
                            },
                            {
                                name: 'Mozzarella',
                                value: 0,
                                price: 3.5,
                                max_value: 2,
                                min_value: 0
                            }
                        ]
                    }">
                                <template x-for="(ingredient, index) in ingredients">
                                    <tr>
                                        <th class="w-full">
                                            <p class="capitalize" x-html='ingredient.name'></p><span class="text-gray-400 font-light" x-html="`+$${ingredient.price.toFixed(2)}`"></span>
                                        </th>
                                        <td>
                                            <div class="form-control">
                                                <div class="input-group">
                                                    <button @click="ingredient.value -= 1" class="btn btn-square btn-sm" :class="ingredient.value <= ingredient.min_value ? 'btn-disabled' : ''">-</button>
                                                    <input type="number" class="input input-sm input-bordered text-center w-10" :value="ingredient.value" />
                                                    <button @click="ingredient.value += 1" class="btn btn-square btn-sm" :class="ingredient.value >= ingredient.max_value ? 'btn-disabled' : ''">+</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </template>

                            </tbody>
                        </table>
                        <div class="mt-5">
                            <div class="btn btn-ghost bg-red-600 text-white w-full">Add to order</div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>