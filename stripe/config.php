<?php
require_once('init.php');

$stripe = array(
  secret_key      => "sk_test_4aZGpv5nUUYMM58ffIdzhbJf",
  publishable_key => "pk_test_4aZGrvpQMLXfIobQl9vvfKEb"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);


?>