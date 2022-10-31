<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Order time</th>
                <th>Order cost</th>
                <th>Status</th>
                <th>Delete</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Order ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Order time</th>
                <th>Order cost</th>
                <th>Status</th>
                <th>Delete</th>
                <th></th>


            </tr>
        </tfoot>
        <tbody>
            <?php
            function disableIfPending($status){
                if($status != 'pending'){
                    return 'disabled';
                }
                return '';

            }
            foreach ($orders as $order) {
                echo "
                    <tr>
                        <td>{$order['id']}</td>
                        <td>{$order['first_name']} {$order['last_name']}</td>
                        <td>{$order['street_address']}, {$order['suburb']}, {$order['state']}, {$order['postcode']}</td>
                        <td>{$order['order_timestamp']}</td>
                        <td>" . floatToDollar($order['order_cost']) . "</td>
                        <td class='text-capitalize'>
                        " . $order['order_status'] . "
                        </td>
                        <td><a class='btn btn-danger w-100 ".disableIfPending($order['order_status'])."' href='api/orders/delete_order.php?order_id={$order['id']}'><i class='fas fa-xmark'></i></a></td>
                        <td><a href='edit_order.php?order_id={$order['id']}'>Edit order</a></td>
                    </tr>
                    ";
            }
            ?>
        </tbody>
    </table>
</div>