<meta charset="UTF-8">
<title>4A1A Pizza - <?php echo $title?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styles/tailwind.css"/>
<link rel="stylesheet" href="styles/style.css"/>
<script defer src="js/alpine.js"></script>
<script defer src="js/cart.js"></script>
<script defer src="js/creditcard.js"></script>
<?php 
    include('settings.php');
    include(__DIR__.'/../../password.php');
    include(__DIR__.'/../../db.php');
    include(__DIR__.'/../../models/model.php');
    include(__DIR__.'/../../models/product.php');
    include(__DIR__.'/../../models/enquiry.php');
    include(__DIR__.'/../../models/cart.php');
    include(__DIR__.'/../../models/order.php');
    include(__DIR__.'/../../models/session.php');
    include('pizza_options.php');
    include('detail.inc');

    //session
    $session = new Session();

    //get session token from cookie
    if(!isset($_COOKIE[$SESSION_NAME])){
        $current_session = null;
    }
    else {
        $current_session = $session->getSession($_COOKIE[$SESSION_NAME]);
    }
    if(!$current_session) {
        $current_session = $session->createSession();
        $session_token = $current_session['token'];
        setcookie($SESSION_NAME, $session_token);
    }

    include('cart.php');
    function floatToDollar($num){
        return '$'.number_format((float)$num, 2, '.', '');
    }

    $total_price = 0;
?>

<script>
    const cart_id = '<?php echo $current_cart['id'] ?>'
</script>


