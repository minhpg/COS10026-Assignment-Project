<!-- START DRAWER -->
<div class="overflow-y-auto w-80 bg-base-100 text-base-content relative">
  <div class="m-4">
    <h2 class="m-3 text-3xl font-black text-center">
      Your Cart
    </h2>
    <hr>
    <ul x-data="{ cart_items : cart_items }" x-init="$watch('cart_items', value => console.log(value))">
      <template x-for="item in cart_items">
        <li>
        <div class="block ml-4 mr-2 my-4">
          <div class="flex justify-between">
            <h3 class="text-md font-bold" x-text="item.name">

            </h3>
            <div class="flex justify-end gap-2">
              <p class="text-right text-gray-500 font-light" x-text="item.price">
        
              </p>
              <a class="flex"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 self-center">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </a>
            </div>

          </div>
          <span class="text-xs text-gray-500">2244kJ</span>
        </div>
      </li>
      </template>

    </ul>

  </div>
  <div class="fixed bottom-0 w-full">
    <hr>
    <div class="m-4 justify-between">
      <h3 class="my-2 font-bold text-sm">Do you have a coupon?</h3>
      <input type="text" placeholder="Coupons" class="input input-bordered w-full" />
    </div>
    <div class="m-4 text-2xl font-black flex justify-between">
      Total: <div class="block">
        <p class="text-xl text-gray-500 font-light text-right">dasdasdasd></p>
        <p class="text-xs text-gray-500 font-light text-right">~4488kJ</p>
      </div>
    </div>
    <div class="m-4">
      <a class="btn bg-red-600 text-white border-0 w-full" href="#">
        Proceed to order
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
        </svg>
      </a>

    </div>
  </div>

</div>
<!-- END DRAWER -->