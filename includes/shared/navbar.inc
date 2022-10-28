<?php include(__DIR__ . '/../../settings.php') ?>
<!-- START NAVBAR -->
<div class="navbar navbar-main bg-red-600 sm:container sm:mx-auto sm:rounded-xl sm:my-4 shadow text-primary-content">
  <div class="navbar-start">
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost btn-circle">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
        </svg>
      </label>
      <ul tabindex="0" class="text-base-content menu menu-compact menu-ghost dropdown-content mt-3 p-2 bg-base-200 rounded-box w-52 shadow-xl font-bold">
        <li><a href="index.php">Home</a></li>
        <li><a href="product.php">Menu</a></li>
        <li><a href="enhancements.php">Enhancements - HTML & CSS</a></li>
        <li><a href="enhancements2.php">Enhancements - PHP</a></li>
        <li><a href="enquiry.php">Enquiries</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="manager.php">Management</a></li>
      </ul>
    </div>
  </div>
  <div class="navbar-center">
    <a class="font-black text-lg ml-2" href="index.php"><?php echo $WEBSITE_NAME ?></a>
  </div>
  <div class="navbar-end">
    <label for="order-drawer" class="drawer-button btn btn-ghost btn-circle">
      <a class="indicator">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
        </svg> <span class="badge badge-xs badge-alert indicator-item"><?php 
            if($cart_items){
              echo count($cart_items);
            }
            else {
              echo 0;
            }
         ?></span>
      </a>
    </label>
  </div>
</div>
<!-- END NAVBAR -->
