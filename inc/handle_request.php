<?php
include_once "./config/init.php";
require_once "./inc/handle_ticket.php";
include_once "./inc/handle_payment.php";

$tickets = new Ticket();

function validate_requests($request)
{
    foreach ($request as $key => $item) {
        if ($item == "") {
            return false;
        }
    }
}
if (isset($_REQUEST)) {
    if (validate_requests($_REQUEST)) {
        $sessId = make_payment($_POST['email'], $_POST['event_date'], $_POST['persons']);
    } else {
        header("location: ./index.php");
    }
}