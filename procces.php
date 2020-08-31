<?php
require_once("./vendor/autoload.php");
include_once("./inc/handle_request.php");
if(isset($_POST['first_name'],$_POST['last_name'], $_POST['email'],$_POST['persons'],$_POST['event_date'], $_POST['price'])){
$session_id = $stripe->checkout->sessions->retrieve($sessId)->id;
$price = $_POST['price'];
for($i = 0; $i < $_POST['persons']; $i++){
    $tickets->create_ticket($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['event_date'], random_ticket_number(), $session_id);
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
    var stripe = Stripe(
        "pk_test_51Gs6KjG5u9h18At4KiiKkD4DWRya6yGXhymeDyOwdF728FuDcqbRtJkNHfJG2GLiJlPyvMGZe8p9fe2Ho2obdaIH00POOU5VKD"
    );
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
<?php
 }else{
header("location: ./index.php");
 }