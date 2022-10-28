<!-- START DRAWER -->
<div class="overflow-y-hidden w-80 bg-base-100 text-base-content relative">
  <?php
  $total_price = 0;
  function renderItem($item)
  {
    echo '<li>
  <div class="block ml-4 mr-2 my-4">
    <div class="flex justify-between">
      <h3 class="text-md font-bold">
        ' . $item['name'] . '
      </h3>
      <div class="flex justify-end gap-2">
        <p class="text-right text-gray-500 font-light">
          ' . floatToDollar($item['price']) . '
        </p>
        <a class="flex" href="api/cart/remove_item.php?item_id='.$item['id'].'"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 self-center">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </a>
      </div>

    </div>
    <span class="text-xs text-gray-500">2244kJ</span>
  </div>
</li>';
  }

  ?>
  <div class="m-4 overflow-y-auto">
    <h2 class="m-3 text-3xl font-black text-center">
      Your Cart
    </h2>
    <hr>
    <ul>
      <?php
        if($cart_items > 0){
          foreach ($cart_items as $item) {
            renderItem($item);
            $total_price += $item['price'];
          }
        }
        else {
          echo '<div class="my-4 text-md font-light text-center">
            <i>
            Your cart is empty!
            </i>
          </div>';
        }
      ?>
    </ul>

  </div>
  <div class="fixed bottom-0 w-full z-10 bg-white">
    <hr>
    <div class="m-4 justify-between">
      <h3 class="my-2 font-bold text-sm">Do you have a coupon?</h3>
      <input type="text" placeholder="Coupons" class="input input-bordered w-full" />
    </div>
    <div class="m-4 text-2xl font-black flex justify-between">
      Total: <div class="block">
        <p class="text-xl text-gray-500 font-light text-right"><?php echo floatToDollar($total_price); ?></p>
        <p class="text-xs text-gray-500 font-light text-right">~<?php if($cart_items) {
          echo 2244 * count($cart_items);
        };?>kJ</p>
      </div>
    </div>
    <div class="m-4">
        <a class="btn bg-red-600 text-white border-0 w-full" href="payment.php">Proceed to order</a>
    </div>
  </div>

</div>
<!-- END DRAWER -->