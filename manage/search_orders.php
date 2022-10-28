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
                    <h1 class="h3 mb-2 text-gray-800 text-capitalize">Search order</h1>
                    <div class="card shadow mb-4 p-4">
                        <div class="row justify-content-center">
                            <form class="col-sm-12 col-md-6 col-6" action="orders.php">
                                <div class="form-group">
                                    <label for="input-value">Query</label>
                                    <input type="text" name="query" class="form-control" id="input-value" placeholder="Enter query">
                                </div>
                                <div class="form-group">
                                    <label for="input-field">Field</label>
                                    <select name="field" id="">
                                        <option value="first_name">
                                            Order First name
                                        </option>
                                        <option value="last_name">
                                            Order Last name
                                        </option>
                                        <option value="id">
                                            Order ID
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="input-field">Sort by</label>
                                    <select name="field_to_order" id="">
                                        <option value="order_cost">
                                            Cost
                                        </option>
                                        <option value="first_name">
                                            Order First name
                                        </option>
                                        <option value="last_name">
                                            Order Last name
                                        </option>
                                        <option value="id">
                                            Order ID
                                        </option>
                                        <option value="order_timestamp">
                                            Order Time
                                        </option>
                                    </select>
                                    <select name="order_by" id="">
                                        <option value="DESC">
                                            Descending
                                        </option>
                                        <option value="ASC">
                                            Ascending
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="input-field">Order Status</label>
                                    <select name="order_status" id="">
                                        <option value="pending">
                                            Pending
                                        </option>
                                        <option value="fulfilled">
                                            Fulfilled
                                        </option>
                                        <option value="paid">
                                            Paid
                                        </option>
                                        <option value="archived">
                                            Archived
                                        </option>
                                    </select>
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