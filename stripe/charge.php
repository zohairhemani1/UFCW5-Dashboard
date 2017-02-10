<?php
  require_once('config.php');
	

  $token  = $_POST['stripeToken'];
  $planArray = $_POST['plan'];
  $planArray = unserialize($planArray);
  //var_dump($plan);
  $price = $planArray['amount']*100;
  $planID = $planArray['plan_id'];
  $months = $planArray['months'];
  
  $customer = \Stripe\Customer::create(array(
      'email' => 'union@myunionapp.com',
      'card'  => $token
  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $price,
      'currency' => 'usd'
  ));

  	
	$customerID = $customer->id;
	$customerEmail = $customer->email;
	$expMonth = $charge->source->exp_month;
	$expYear = $charge->source->exp_year;
	$name = $charge->source->name;
	$lastFour = $charge->source->last4;
	$status = $charge->status;
	$country = $charge->source->country;
	$brand = $charge->source->brand;
	
	include '../headers/connect_to_mysql.php';
	include '../headers/_user-details.php';
	
	$query = "SELECT * from `maintainence_log` where app_id = 1 order by id desc limit 1";
	$result = mysqli_query($con,$query);
	$count = mysqli_num_rows($result);
	if($count==0)
	{
		$validUpto = $_app_publish_date;
	}
	else
	{
		$row = mysqli_fetch_assoc($result);
		$validUpto = $row['validUpto'];
	}
	
	echo "last payment detail: {$validUpto}";
	
	$validUpto = strtotime(date("Y-m-d", strtotime($validUpto)) . " +{$months} month");
	$validUpto = date('Y/m/d', $validUpto);
	
	echo "VALID UPTO time: " . $validUpto . "<br/>";
	
	$price = $price/100;
	$query = "INSERT INTO maintainence_log(app_id,user_id,paymentDate,validUpto,transactionID,email,lastFour,customerID,amount,exp_month,exp_year,name,status,country,brand,plan_id)
			  	VALUES ('$appID','$user_id',now(),'$validUpto','123','$customerEmail','$lastFour','$customerID','$price','$expMonth','$expYear','$name','$status','$country','$brand','$planID')";
	$result = mysqli_query($con,$query);
	
  	echo "<h1>Successfully charged $ {$price}</h1>";
	
?>