<?php
require_once "./vendor/autoload.php";
include_once "./inc/handle_request.php";
$dotenv = Dotenv\Dotenv::createImmutable("./");
$dotenv->load();

$stripe = new \Stripe\StripeClient($_ENV['STRIPE_SECRET_KEY']);
if (validate_requests($_REQUEST)) {
    $session_id = $stripe->checkout->sessions->retrieve($sessId)->id;
    $sessId = make_payment($_POST['email'], $_POST['event_date'], $_POST['persons']);

    for ($i = 0; $i < $_POST['persons']; $i++) {
        $tickets->create_ticket($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['event_date'], random_ticket_number(), $session_id);
    }
} else {
    header("location: ./index.php");
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="./js/config.js"></script>
    <script>
    var elements = stripe.elements();
    var ssId = "<?php echo $session_id; ?>";
    const checkout_Id = ssId;
    stripe.redirectToCheckout({
        sessionId: checkout_Id
    }).then(function(result) {

    });
    </script>
</body>

</html>