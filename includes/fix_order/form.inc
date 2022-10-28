<!-- START FORM -->
<?php
if(!isset($_GET)){
    header('location: index.php');
}
if(!isset($_GET['data'])){
    header('location: index.php');
}

$data = json_decode(base64_decode($_GET['data']), true);


$states = ["VIC",
"NSW",
"QLD",
"NT",
"WA",
"SA",
"TAS",
"ACT"];

$total_price = 0;

function highlightIfError($field){
    global $data;
    if($data[$field]['validated']) echo '';
    else echo 'text-red-600';
}

function renderOrderItem($item)
{
    echo '<li>
    <div class="block ml-4 mr-2 my-4">
      <div class="flex justify-between">
        <h3 class="text-md font-bold">
          ' . $item['name'] . '
        </h3>
        <div class="flex justify-end gap-2">
          <p class="text-right tet-gray-500 font-light">
            ' . floatToDollar($item['price']) . '
          </p>
        </div>
      </div>
    </div>
  </li>';
}

function renderOptions($options_json)
{
    global $size, $base, $sauce;
    echo '<div class="mx-4 text-xs font-light">';
    $options = json_decode($options_json, true);
    echo '<h4 class="font-bold mt-2">Base</h4><p>' . $base[$options['base']] . '</p>';
    echo '<h4 class="font-bold mt-2">Sauce</h4><p>' . $sauce[$options['sauce']] . '</p>';
    echo '<h4 class="font-bold mt-2">Size</h4><p>' . $size[$options['size']] . '</p>';
    echo '<h4 class="font-bold mt-2">Additional Ingredients</h4>';
    foreach ($options['ingredients'] as $ingredient) {
        if ($ingredient['value'] > 1) {
            echo '<p>' . $ingredient['name'] . ' <span class="italic">x ' . $ingredient['value'] . '</span> +' . floatToDollar($ingredient['price'] * ($ingredient['value'] - 1)) . '</p>';
        }
    }
    echo '<h4 class="font-bold mt-2">Additional Toppings</h4>';
    foreach ($options['toppings'] as $topping) {
        if ($topping['value'] > 0) {
            echo '<p>' . $topping['name'] . ' <span class="italic">x ' . $topping['value'] . '</span> +' . floatToDollar($topping['price'] * $topping['value']) . '</p>';
        }
    }
    echo '</div>';
}

$now = new DateTime('now');
$current_month = $now->format('m');
$current_year = $now->format('Y');
?>
<div class="rounded-box bg-base-200 my-5 p-5 md:p-8 lg:p-10 max-w-none">
    <h1 class="text-4xl font-black">Your cart #<?php echo $cart_id ?></h1>
    <ul class="md:mx-20 mt-10 mb-5 rounded-box bg-white p-5">
        <?php
        if ($cart_items) {
            foreach ($cart_items as $item) {
                renderOrderItem($item);
                renderOptions($item['options']);
                $total_price += $item['price'];
            }
        } else {
            echo '<div class="my-4 text-md font-light text-center">
                <i>
                Your cart is empty!
                </i>
            </div>';
        }
        ?>
        <li>
            <div class="block ml-4 mr-2 my-4">
                <div class="flex justify-between">
                    <h3 class="text-xl font-black text-right">
                        Total:
                    </h3>
                    <div class="flex justify-end gap-2">
                        <p class="text-right tet-gray-500 font-bold">
                            <?php echo floatToDollar($total_price) ?>
                        </p>
                    </div>

                </div>
        </li>
    </ul>
    <form class="mx-0 md:mx-20 mt-10 mb-5 font-light" method="post" novalidate="novalidate" action="process_order.php">
        <p class="italic my-5 font-bold text-red-600">Please fix highlighted fields!</p>
        <label for="notes" class="<?php highlightIfError('notes')?>">Notes:</label>
        <textarea name="notes" id="notes" class="my-3 textarea w-full h-20" placeholder="Notes"><?php echo $data['notes']['value']?></textarea>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div>
                <label for="first-name" class="<?php highlightIfError('first_name')?>">First name: <b class="text-red-600">*</b></label>
                <input type="text" name="first_name" id="first-name" maxlength="25" pattern="[a-zA-Z\s]*" placeholder="Enter first name" autocomplete="off" class="my-3 input w-full" required value="<?php echo $data['first_name']['value']?>">
            </div>
            <div>
                <label for="last-name" class="<?php highlightIfError('last_name')?>">Last name: <b class="text-red-600">*</b></label>
                <input type="text" name="last_name" id="last-name" maxlength="25" pattern="[a-zA-Z\s]*" placeholder="Enter last name" autocomplete="off" class="my-3 input w-full" required value="<?php echo $data['last_name']['value']?>">
            </div>
        </div>
        <label for="mobile-number" class="<?php highlightIfError('mobile_number')?>">Mobile Number: <b class="text-red-600">*</b></label>
        <input type="text" name="mobile_number" id="mobile-number" maxlength="10" pattern="\d{10}" placeholder="Enter mobile number" autocomplete="off" class="my-3 input w-full" required value="<?php echo $data['mobile_number']['value']?>">
        <label for="email-address" class="<?php highlightIfError('email')?>">Email Address: <b class="text-red-600">*</b></label>
        <input type="email" name="email" id="email-address" placeholder="Enter email address" autocomplete="off" class="my-3 input w-full" required value="<?php echo $data['email']['value']?>">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 my-3">
            <div>
                <label for="street-address" class="<?php highlightIfError('street_address')?>">Street address: <b class="text-red-600">*</b></label>
                <input type="text" name="street_address" id="street-address" maxlength="40" pattern="[0-9a-zA-Z\s]*" placeholder="Enter street address" autocomplete="off" class="my-3 input w-full" required value="<?php echo $data['street_address']['value']?>">
            </div>
            <div>
                <label for="suburb" class="<?php highlightIfError('suburb')?>">Suburb: <b class="text-red-600">*</b></label>
                <input type="text" name="suburb" id="suburb" maxlength="20" pattern="[a-zA-Z\s]*" placeholder="Enter suburb" autocomplete="off" class="my-3 input w-full" required value="<?php echo $data['suburb']['value']?>">
            </div>
            <div>
                <label for="state" class="<?php highlightIfError('state')?>">State: <b class="text-red-600">*</b></label>
                <select name="state" id="state" class="my-3 select w-full font-light" required>
                    <option selected disabled value>Select one</option>
                    <?php 
                    function ifStateSelected($state){
                        global $data;
                        if($state == $data['state']['value']){
                            return 'selected';
                        }
                        return '';
                    }
                    foreach($states as $state) {
                        echo '<option value="'.$state.'" '.ifStateSelected($state).'>'.$state.'</option>';
                    }?>

                </select>
            </div>
            <div>
                <label for="postcode" class="<?php highlightIfError('postcode')?>">Postcode: <b class="text-red-600">*</b></label>
                <input type="text" name="postcode" id="postcode" maxlength="4" pattern="\d{4}" placeholder="Enter postcode" autocomplete="off" class="my-3 input w-full" required value="<?php echo $data['postcode']['value']?>">
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 my-3">
            <div>
                <label for="card-holder" class="<?php highlightIfError('card_holder')?>">Card holder: <b class="text-red-600">*</b></label>
                <input type="text" name="card_holder" id="card-holder" maxlength="40" pattern="[0-9a-zA-Z\s]*" placeholder="Enter card holder's name" autocomplete="off" class="my-3 input w-full" required>
            </div>
            <div>
                <label for="card_number" class="<?php highlightIfError('card_number')?>">Card number: <b class="text-red-600">*</b></label>
                <input type="text" name="card_number" id="card-number" placeholder="xxxx xxxx xxxx xxxx" autocomplete="off" class="my-3 input w-full" required>
            </div>
            <div>
                <label for="expiry" class="<?php highlightIfError('card_expiry_month')?>">Expiry: <b class="text-red-600">*</b></label>
                <div class="grid grid-cols-2 gap-4">

                    <select name="card_expiry_month" id="expiry-month" class="my-3 select w-full font-light" required>
                        <option selected disabled value>Select month</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <select name="card_expiry_year" id="expiry-year" class="my-3 select w-full font-light" required>
                        <option selected disabled value>Select year</option>
                        <?php
                        for ($i; $i < 5; $i++) {
                            $year = $current_year + $i;
                            echo '<option value="' . $year . '">' . $year . '</option>';
                        }
                        ?>
                    </select>
                </div>

            </div>
            <div>
                <label for="cvv" class="<?php highlightIfError('card_cvv')?>">CVV: <b class="text-red-600">*</b></label>
                <input type="password" name="card_cvv" id="card_cvv" maxlength="3" pattern="\d{4}" placeholder="Enter security code" autocomplete="off" class="my-3 input w-full" required>
            </div>
        </div>
        <div class="flex justify-between w-full text-sm mb-4">
            <p>Required field.<b class="text-red-600">*</b></p>
            <p>We'll never share your details with anyone else.</p>
        </div>
        <label for="submit"></label>
        <input type="hidden" name="cart_id" class="hidden" value="<?php echo $current_cart['id'] ?>">
        <input type="submit" id="submit" class="my-3 btn btn-ghost text-white w-full lg:w-32 
        <?php
            if ($cart_items == null) {
                echo 'btn-disabled';
            } else {
                echo 'bg-red-600';
            }
            ?>" value="Check out" />
    </form>
</div>
<!-- END FORM -->