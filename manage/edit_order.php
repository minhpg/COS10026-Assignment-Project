<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Dashboard";
    include('includes/shared/head.inc')
    ?>

    <?php
    $order_schema = new Order();
    $order = $order_schema->findById($_GET['order_id'])[0];
    $status = [
        'pending',
        'fulfilled',
        'paid',
        'archived'
    ];

    function ifStatusSelected($status, $status_)
    {
        if ($status == $status_) {
            return 'selected';
        }
        return '';
    }
    function renderOrderStatus($current_status)
    {
        global $status;
        foreach ($status as $status_) {
            echo '<option value="' . $status_ . '" ' . ifStatusSelected($status_, $current_status) . '>' . $status_ . '</option>';
        }
    } ?>
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
                    <h1 class="h3 mb-2 text-gray-800 text-capitalize">Edit order</h1>
                    <div class="card shadow mb-4 p-4">
                        <?php
                        $items_schema = new CartItem();

                        $checked_out_cart_items = $items_schema->findItems($order['cart_id']);

                        $total_price = 0;

                        function renderOrderItem($item)
                        {
                            echo '<tr>
                                <th colspan="2">
                                    ' . $item['name'] . ' - ' . floatToDollar($item['price']) . '
                                </th>
                        </tr>';
                        }

                        function renderOptions($options_json)
                        {
                            global $size, $base, $sauce;
                            $options = json_decode($options_json, true);
                            echo '<tr><td class="font-weight-bold">Base</td>
                            <td>' . $base[$options['base']] . '</td></tr>';
                            echo '<tr><td class="font-weight-bold">Sauce</p>
                            <td>' . $sauce[$options['sauce']] . '</td></tr>';
                            echo '<tr><td class="font-weight-bold">Size</p>
                            <td>' . $size[$options['size']] . '</td></tr>';
                            echo '<tr><td colspan="2" class="font-weight-bold">Additional Ingredients</td></tr>';
                            foreach ($options['ingredients'] as $ingredient) {
                                if ($ingredient['value'] > 1) {
                                    echo '<td>' . $ingredient['name'] . ' <span class="italic">x ' . $ingredient['value'] . '</span></td><td> +' . floatToDollar($ingredient['price'] * ($ingredient['value'] - 1)) . '</td>';
                                }
                            }
                            echo '<tr><td colspan="2" class="font-weight-bold">Additional Toppings</td></tr>';
                            foreach ($options['toppings'] as $topping) {
                                if ($topping['value'] > 0) {
                                    echo '<td>' . $topping['name'] . ' <span class="italic">x ' . $topping['value'] . '</span></td><td> +' . floatToDollar($topping['price'] * ($topping['value'])) . '</td>';
                                }
                            }
                            echo '
                        </div>';
                        }

                        $now = new DateTime('now');
                        $current_month = $now->format('m');
                        $current_year = $now->format('Y');
                        ?>
                        <div>
                            <h2>Order #<?php echo $order['id'] ?> - </h2>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <?php
                                foreach ($checked_out_cart_items as $item) {
                                    renderOrderItem($item);
                                    renderOptions($item['options']);
                                    $total_price += $item['price'];
                                }
                                ?>
                                <tr>
                                    <td class="font-weight-bold">Total
                                    </td>
                                    <td> <?php echo floatToDollar($total_price) ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <form class="col-sm-12 col-md-6 col-6" method="post" action="api/orders/update_order.php">
                            <input type="hidden" name="order_id" value="<?php echo $order['id'] ?>">
                            <div class="form-group">
                                <label for="order-status">Status</label>
                                <select name="status" id="order-status">
                                    <?php renderOrderStatus($order['order_status']); ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

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