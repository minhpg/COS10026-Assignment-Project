<!doctype html>
<html data-theme="light" lang="en">

<head>
  <?php
  $title = "Finalize your order";
  include('./includes/shared/head.inc')
  ?>
</head>

<body>
  <div class="drawer drawer-end">
    <input id="order-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
      <div class="mx-auto container">
        <?php include('./includes/shared/navbar.inc') ?>
        <?php include('./includes/fix_order/hero.inc') ?>
        <?php include('./includes/fix_order/form.inc') ?>
        <?php include('./includes/shared/footer.inc') ?>
      </div>
    </div>
    <div class="drawer-side">
      <label for="order-drawer" class="drawer-overlay"></label>
      <?php include('./includes/shared/drawer.inc') ?>
    </div>
  </div>
</body>

</html>