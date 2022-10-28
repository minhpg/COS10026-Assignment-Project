<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Dashboard";
    include('includes/shared/head.inc')
    ?>
</head>
<?php
$order_status = 'pending';
if(isset($_GET['status'])){
    $order_status = $_GET['status'];
}
$order_schema = new Order();
$orders = $order_schema->findByField('order_status', $order_status);
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include('includes/shared/sidebar.inc') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php include('includes/shared/navbar.inc') ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pending Orders</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <?php include('includes/orders/orders_table.inc') ?>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include('includes/shared/footer.inc') ?>


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <?php
    include('includes/shared/logout.inc')
    ?>
    <?php
    include('includes/shared/scripts.inc')
    ?>
</body>

</html>