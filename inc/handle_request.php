<?php
include_once("./config/init.php");
require_once("./inc/handle_ticket.php");
include_once("./inc/handle_payment.php");

$tickets = new Ticket();

if(isset($_POST['first_name'],$_POST['last_name'], $_POST['email'],$_POST['persons'],$_POST['event_date'], $_POST['price'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $aantal = $_POST['persons'];
    $event_date = $_POST['event_date'];
    $price = $_POST['price'];
    $sessId = payment($email, $event_date, $aantal);
}

?>