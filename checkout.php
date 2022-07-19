<?php

require "vendor/autoload.php";

\Stripe\Stripe::setApiKey('YOUR_SK');

$session = \Stripe\Checkout\Session::create([
  'success_url' => 'http://localhost:8000/success.php',
  'cancel_url' => 'http://localhost:8000/cancel.php',
  'mode' => 'subscription',
  'line_items' => [[
    'price' => 'YOUR_PRODUCT_ID',
    // For metered billing, do not pass quantity
    'quantity' => 1,
  ]],
]);

?>

<head>
    <title>Stripe Subscription Checkout</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <script>
        var stripe = Stripe('YOUR_SK');
        stripe.redirectToCheckout({
            sessionId: <?= json_encode($session["id"]); ?>
        })
    </script>
</body>