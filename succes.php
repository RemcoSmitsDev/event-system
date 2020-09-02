<?php
include_once "./config/init.php";
include_once "./inc/handle_ticket.php";
include_once "./inc/handle_request.php";
if (validate_requests($_REQUEST)) {
    $tickets = new Ticket();
    if (!$ticketsByCustomer = $tickets->get_tickets_by_customer($_GET['session_id'])) {
        header("location: ./index.php");
    }
    if ($ticketsByCustomer[0]->betaald == 'false') {
        $codes = [];
        $i = 0;
        foreach ($ticketsByCustomer as $ticket) {
            array_push($codes, $ticket->code);
            $i++;
        }
        send_tickets($ticketsByCustomer[0]->first_name, $ticketsByCustomer[0]->last_name, $ticketsByCustomer[0]->email, $i, $ticketsByCustomer[0]->event_date, $codes, $_GET['session_id']);
    }
    $tickets->update_ticket_paid($_GET['session_id']);
} else {
    header("location: ./index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all" href="./css/tailwindcss.css">
    <title>Document</title>
</head>

<body
    class="w-screen h-screen flex items-center justify-center antialiased bg-cover bg-no-repeat bg-center overflow-hidden"
    style="background-image: url('https://www.thisisourhouse.nl/wp-content/uploads/2016/12/Intents-Festival-2016.jpg')">
    <div class="-mt-16 sm:mt-0 space-y-6 px-2 py-6 md:p-12 container mx-auto max-w-2xl bg-white">
        <h1 class="text-3xl text-center font-bold">Your tickets, <span
                class="text-lg md:text-xl"><?=$ticketsByCustomer[0]->first_name . " " . $ticketsByCustomer[0]->last_name?></span>
        </h1>
        <div class="px-4 h-92 overflow-y-auto overflow-x-visible">
            <?php
$i = 0;
foreach ($ticketsByCustomer as $ticket):
    $i++;
    ?>
            <div class="my-4 relative pl-8 pr-4 py-4 rounded shadow">
                <span
                    class="absolute inline-flex items-center justify-center h-6 w-6 flex-grow-0 -ml-11 rounded-full text-green-500 bg-green-300 font-semibold"><?=$i;?></span>
                <div class="flex justify-between">
                    <div>
                        <h2 class="text-xl font-semibold">Intens festivals <span
                                class="hidden sm:block text-xs font-medium"><?=$ticket->event_date;?></span>
                        </h2>
                        <span class="-mt-10 sm:hidden text-xs font-medium"><?=$ticket->event_date;?></span>
                        <p><?=$ticket->first_name . " " . $ticket->last_name;?></p>
                    </div>
                    <div>
                        <a class="inline-block h-20 w-20" rel='nofollow' style='cursor:default'><img
                                src='https://chart.googleapis.com/chart?cht=qr&chl=http://localhost/event-system/succes.php?email=
									                                <?=$ticket->email?>&event_date=<?=$ticket->event_date?>&session_id=<?=$ticket->session_id?>&chs=180x180&choe=UTF-8&chld=L|2'></a>
                        <p class="text-sm"><?=$ticket->code;?></p>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="./js/app.js"></script>
</body>

</html>