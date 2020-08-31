<?php
include_once("./config/init.php");
$tickets = new Ticket();

require_once("./inc/handle_ticket.php");

if(isset($_POST['first_name'],$_POST['last_name'], $_POST['email'],$_POST['persons'],$_POST['event_date'], $_POST['price'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $aantal = $_POST['persons'];
    $event_date = $_POST['event_date'];
    $price = $_POST['price'];
    include_once("./inc/handle_payment.php");
}

?>