<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title><?php echo $title ?></title>

<!-- Custom fonts for this template-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">

<?php
include('settings.php');
include(__DIR__ . '../../../../settings.php');
include(__DIR__ . '../..//../../db.php');
include(__DIR__ . '../..//../../password.php');
include(__DIR__ . '../../../../models/model.php');
include(__DIR__ . '../../../../models/product.php');
include(__DIR__ . '../../../../models/enquiry.php');
include(__DIR__ . '../../../../models/cart.php');
include(__DIR__ . '../../../../models/order.php');
include(__DIR__ . '../../../../models/users.php');
include(__DIR__ . '../../../../includes/shared/pizza_options.php');


$users_schema = new User();
$current_user = null;

if (!isset($_COOKIE[$ADMIN_SESSION_NAME])) {
    header('location: login.php');
} else {
    $current_user = $users_schema->getCurrentSession($_COOKIE[$ADMIN_SESSION_NAME]);
    if(!$current_user) header('location: login.php');
}

function floatToDollar($num)
{
    return '$' . number_format((float)$num, 2, '.', '');
}
?>