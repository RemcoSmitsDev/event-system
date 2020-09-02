<?php
$dotenv = Dotenv\Dotenv::createImmutable("./");
$dotenv->load();
  function payment($email, $event_date, $aantal) {
    $stripe = new \Stripe\StripeClient($_ENV['STRIPE_SECRET_KEY']);
    $session = $stripe->checkout->sessions->create([
        'success_url' => 'https://event-system.rswebdevelopment.nl/succes.php?email=' . $email . '&event_date='. $event_date.'&session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => 'https://event-system.rswebdevelopment.nl/',
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
      return $sessId = ($stripeSession[0]['id']);
  }