<!doctype html>
<html data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.22.0/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
  <?php include('components/shared/navbar.php') ?>
  <div class="container mx-auto">
    <?php include('components/home/hero.php') ?>
    <?php include('components/home/order.php') ?>
    <?php include('components/home/deals.php') ?>
    <?php include('components/home/categories.php') ?>
    <?php include('components/home/carousel.php') ?>
  </div>
  <?php include('components/shared/footer.php') ?>

</body>
</html>