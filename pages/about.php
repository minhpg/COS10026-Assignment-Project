<!doctype html>
<html data-theme="light">

<head>
<?php 
$title = "About us";
include('../components/shared/head.php')
 ?>
</head>

<body>
  <div class="drawer drawer-end">
    <input id="order-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
      <div class="mx-auto container">
        <?php include('../components/shared/navbar.php') ?>
        <?php include('../components/about/hero.php') ?>
        <?php include('../components/about/members.php') ?>

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