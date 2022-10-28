<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Dashboard";
    include('includes/shared/head.inc')
    ?>
</head>
<?php
    $users_schema = new User();
    $users = $users_schema->getAll();
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
                    <h1 class="h3 mb-2 text-gray-800 text-capitalize">Users</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <?php include('includes/users/users_table.inc') ?>
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