<?php
$stripe = new \Stripe\StripeClient(
    'sk_test_51Gs6KjG5u9h18At48xrVcRP5aW6Co3oukDTBt1Xcg6wuZ1fjA9pDFitHAqnQ8FrcbrDeNxPXW8POhIW0vDiu6GvA007jIsSrem'
  );
$session = $stripe->checkout->sessions->create([
    'success_url' => 'http://6027dc55fedc.ngrok.io/event-system/succes.php?email=' . $email . '&event_date='. $event_date.'&session_id={CHECKOUT_SESSION_ID}',
    'cancel_url' => 'http://6027dc55fedc.ngrok.io/event-system/',
    'payment_method_types' => ['ideal'],
    'line_items' => [
      [
        'name' => "intens festivals",
        'description' => "intens festivals tickets for ".$aantal." persons",
        'images' => [],
        'amount' => 1999,
        'currency' => 'eur',
        'quantity' => $aantal
      ],
    ],
    'mode' => 'payment',
  ]);
  $stripeSession = array($session);
  $sessId = ($stripeSession[0]['id']);