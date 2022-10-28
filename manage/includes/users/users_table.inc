<?php
$status = [
    'pending',
    'fulfilled',
    'paid',
    'archived'
]
?>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Delete</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) {
                echo "
                    <tr>
                        <td>{$user['id']}</td>
                        <td>{$user['name']}</td>
                        <td>{$user['username']}</td>
                        <td><a class='btn btn-danger w-100' href='api/users/delete_user.php?user_id={$user['id']}'><i class='fas fa-xmark'></i></a></td>
                        <td><a href='edit_user.php?user_id={$user['id']}'>Edit user</a></td>
                    </tr>
                    ";
            }
            ?>
        </tbody>
    </table>
</div>