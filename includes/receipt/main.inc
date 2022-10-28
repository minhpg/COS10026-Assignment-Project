<!-- START FORM -->
<?php

function cardMasking($number, $maskingCharacter = 'X') {
    return substr($number, 0, 4) . str_repeat($maskingCharacter, strlen($number) - 8) . substr($number, -4);
}

if (!isset($_GET)) {
    header('location: index.php');
}
if (!isset($_GET['order_id'])) {
    header('location: index.php');
}

$order_schema = new Order();

$order = $order_schema->findById($_GET['order_id'])[0];
if (!$order) header('location: index.php');
$items_schema = new CartItem();

$cart_items = $items_schema->findItems($order['cart_id']);

$total_price = 0;

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
    <h1 class="text-4xl font-black">Receipt - Order #<?php echo $order['id'] ?></h1>
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
        <label for="notes">Notes:</label>
        <textarea name="notes" id="notes" class="my-3 textarea w-full h-20" placeholder="Notes" disabled><?php echo $order['notes'] ?></textarea>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div>
                <label for="first-name">First name:</label>
                <input type="text" name="first_name" id="first-name" maxlength="25" pattern="[a-zA-Z\s]*" placeholder="Enter first name" autocomplete="off" class="my-3 input w-full" disabled value="<?php echo $order['first_name'] ?>">
            </div>
            <div>
                <label for="last-name">Last name:</label>
                <input type="text" name="last_name" id="last-name" maxlength="25" pattern="[a-zA-Z\s]*" placeholder="Enter last name" autocomplete="off" class="my-3 input w-full" disabled value="<?php echo $order['last_name'] ?>">
            </div>
        </div>
        <label for="mobile-number">Mobile Number:</label>
        <input type="text" name="mobile_number" id="mobile-number" maxlength="10" pattern="\d{10}" placeholder="Enter mobile number" autocomplete="off" class="my-3 input w-full" disabled value="<?php echo $order['mobile_number'] ?>">
        <label for="email-address">Email Address:</label>
        <input type="email" name="email" id="email-address" placeholder="Enter email address" autocomplete="off" class="my-3 input w-full" disabled value="<?php echo $order['email'] ?>">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 my-3">
            <div>
                <label for="street-address">Street address:</label>
                <input type="text" name="street_address" id="street-address" maxlength="40" pattern="[0-9a-zA-Z\s]*" placeholder="Enter street address" autocomplete="off" class="my-3 input w-full" disabled value="<?php echo $order['street_address'] ?>">
            </div>
            <div>
                <label for="suburb">Suburb:</label>
                <input type="text" name="suburb" id="suburb" maxlength="20" pattern="[a-zA-Z\s]*" placeholder="Enter suburb" autocomplete="off" class="my-3 input w-full" disabled value="<?php echo $order['suburb'] ?>">
            </div>
            <div>
                <label for="state">State:</label>
                <select name="state" id="state" class="my-3 select w-full font-light" disabled>
                    <?php

                    echo '<option value="' . $order['state'] . '">' . $order['state'] . '</option>';
                    ?>

                </select>
            </div>
            <div>
                <label for="postcode">Postcode:</label>
                <input type="text" name="postcode" id="postcode" maxlength="4" pattern="\d{4}" placeholder="Enter postcode" autocomplete="off" class="my-3 input w-full" disabled value="<?php echo $order['postcode'] ?>">
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 my-3">
            <div>
                <label for="card-holder">Card holder:</label>
                <input type="text" name="card_holder" id="card-holder" maxlength="40" pattern="[0-9a-zA-Z\s]*" placeholder="Enter card holder's name" autocomplete="off" class="my-3 input w-full" disabled value="<?php echo $order['card_holder'] ?>">
            </div>
            <div>
                <label for="card_number">Card number:</label>
                <input type="text" name="card_number" id="card-number" placeholder="xxxx xxxx xxxx xxxx" autocomplete="off" class="my-3 input w-full" disabled value="<?php echo chunk_split(cardMasking($order['card_number']), 4, ' '); ?>">
            </div>
        </div>
    </form>
</div>
<!-- END FORM -->