<!doctype html>
<html data-theme="light">
<head>
<head>
<?php 
$title = "Pizza";
include('../components/shared/head.php')
 ?>
</head>
<div class="drawer drawer-end">
  <input id="order-drawer" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content">
    <div class="mx-auto container">
    <?php include('../components/shared/navbar.php') ?>
    <?php include('../components/menu/navbar.php') ?>
    <!-- <?php include('../components/menu/filters.php') ?> -->
    <?php include('../components/menu/hero.php') ?>
    <?php include('../components/menu/section.php') ?>

    <?php include('../components/shared/footer.php') ?>

    </div>
  </div> 
  <div class="drawer-side">
    <label for="order-drawer" class="drawer-overlay"></label>
    <?php include('../components/shared/drawer.php') ?>
  </div>
</div>

</body>
</html>