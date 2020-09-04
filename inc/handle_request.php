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
        return true;
    }
}