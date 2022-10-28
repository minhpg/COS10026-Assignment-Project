<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $title = "Dashboard";
        include('includes/shared/head.inc')
    ?>
</head>

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
                    <h1 class="h3 mb-2 text-gray-800 text-capitalize">Edit user</h1>
                    <div class="card shadow mb-4 p-4">
                        <div class="row justify-content-center">
                            <?php 
                            if(!isset($_GET['user_id'])) $user = $current_user;
                            $user = $users_schema->findById($_GET['user_id'])[0];
                            if(!$user) $user = $current_user;
                            ?>
                            <form class="col-sm-12 col-md-6 col-6" method="post" action="api/users/update_user.php">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']?>">
                                <div class="form-group">
                                    <label for="input-name">Name</label>
                                    <input type="text" name="name" class="form-control" id="input-name" placeholder="Enter name" pattern="[0-9a-zA-Z\s]*" value="<?php echo $user['name']?>">
                                </div>
                                <div class="form-group">
                                    <label for="input-username">Username</label>
                                    <input type="text" name="username" class="form-control" id="input-username" placeholder="Enter username" pattern="[0-9a-zA-Z\s]*" value="<?php echo $user['username']?>">
                                </div>
                                <div class="form-group">
                                <label for="input-password">Password (min. 8 characters, 1 letter and 1 number)</label>
                                    <input type="password" name="password" class="form-control" id="input-password" placeholder="Password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
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