<?php
function random_ticket_number()
{
    $characters = '0123456789';
    $randstring = '';
    $stringlengte = strlen($characters);
    for ($i = 0; $i < 10; $i++) {
        $randstring .= $characters[rand(0, $stringlengte - 1)];
    }
    return $randstring;
}

function send_tickets($first_name, $last_name, $email, $persons, $date, $codes, $session_id) {
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'Bcc: info@pedicurepraktijkpapendrecht.nl' . "\r\n";
    $headers .= 'From: info@rswebdevelopment.nl' . "\r\n" .
      'Reply-To: info@rswebdevelopment.nl' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();
    $message = "<p>Beste $first_name,</p>";
    $message .= "<p>You have have orderd a ticket for Intens festivals on $date</p>";
    foreach($codes as $code){
        $message .= "<a href='http://localhost/event-system/succes.php?email=
        ". $email . "&session_id=".$session_id."'><img style='height:100px; width:100px;'
        src='https://chart.googleapis.com/chart?cht=qr&chl=http://localhost/event-system/succes.php?email=
        ". $email . "&session_id=".$session_id."&chs=180x180&choe=UTF-8&chld=L|2'></a>";
$message .= "\n" . $code;
}
try
{
mail($email, "Intens festivals tickets for $persons persons",$message, $headers);
echo"<script>
console.log('email had been sended');
</script>";

}catch(Exeption $e){
echo"<script>
console.log('".$e."');
</script>";

}
}

?>