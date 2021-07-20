<?php
require_once("conekta/conekta-php/lib/Conekta.php");
\Conekta\Conekta::setApiKey("key_r4xRrHrCWepFPgPbmiBF1Q");
\Conekta\Conekta::setApiVersion("2.0.0");


if ($_POST["payType"]=="1") {	
	$fullName = $_POST["name"].' '.$_POST["name"];
	$status=0;

	//echo "monto: ".$_POST["amount"];
	try{
		$order = \Conekta\Order::create(
		  [
			"line_items" => [
			  [
				"name" => $_POST["description"],
				"unit_price" => $_POST["amount"]*100,
				"quantity" => 1
			  ]
			  ],
			"currency" => "MXN",
			"customer_info" => [
			  "name" => $fullName,
			  "email" => $_POST["email"],
			  "phone" => "5512345678"
			],
			
			"metadata" => ["reference" => "12987324097", "more_info" => "lalalalala"],
			"charges" => [
			  [
				"payment_method" => [
					'token_id' => "tok_test_visa_4242",
					'type' => "card"
				] //payment_method - use customer's default - a card
				  //to charge a card, different from the default,
				  //you can indicate the card's source_id as shown in the Retry Card Section
			  ]
			]
		  ]
		);

		$status=1;

		$details = "CODE:". $order->charges[0]->payment_method->auth_code." Card info:".
			"- ". $order->charges[0]->payment_method->name .
			"- ". $order->charges[0]->payment_method->last4 .
			"- ". $order->charges[0]->payment_method->brand .
			"- ". $order->charges[0]->payment_method->type;

	  } catch (\Conekta\ProcessingError $error){
		$error->getMessage();
		$status=2;
	  } catch (\Conekta\ParameterValidationError $error){
		$error->getMessage();
		$status=3;
	  } catch (\Conekta\Handler $error){
		$error->getMessage();
		$status=3;
	  }


	echo '<form action="../../status/" id="finish" method="post">';
	if ($status==1) {
		echo '<input type="hidden" name="stat" value="1">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '<input type="hidden" name="adress" value="'.$_POST["adres"].'">';
		echo '<input type="hidden" name="idOpen" value="'.$order->id.'">';
		echo '<input type="hidden" name="description" value="'.$details.'">';
	}elseif ($status==2) {
		echo '<input type="hidden" name="stat" value="2">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '<input type="hidden" name="description" value="'.$error->getMessage().'">';
	}elseif ($status==3) {
		echo '<input type="hidden" name="stat" value="3">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '<input type="hidden" name="description" value="'.$error->getMessage().'">';
	}elseif ($status==4) {
		echo '<input type="hidden" name="stat" value="4">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '<input type="hidden" name="description" value="'.$error->getMessage().'">';
	}elseif ($status==5) {
		echo '<input type="hidden" name="stat" value="5">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '<input type="hidden" name="description" value="'.$error->getMessage().'">';
	}elseif ($status==6) {
		echo '<input type="hidden" name="stat" value="6">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '<input type="hidden" name="description" value="'.$error->getMessage().'">';
	}else{
		echo '<input type="hidden" name="stat" value="0">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '<input type="hidden" name="description" value="'.$error->getMessage().'">';
	}
	echo '</form>';
	echo '<script type="text/javascript">
	  document.getElementById("finish").submit();
	</script>';
}elseif ($_POST["payType"]=="2") {
	$fullName = $_POST["name"].' '.$_POST["name"];
	$status=0;
	try{
		$thirty_days_from_now = (new DateTime())->add(new DateInterval('P30D'))->getTimestamp(); 
	  
		$order = \Conekta\Order::create(
		  [
			"line_items" => [
			  [
				"name" => $_POST["description"],
				"unit_price" => $_POST["amount"]*100,
				"quantity" => 1
			  ]
			  ],
			"currency" => "MXN",
			"customer_info" => [
				"name" => $fullName,
				"email" => $_POST["email"],
				"phone" => "5512345678"
			],
			"charges" => [
			  [
				"payment_method" => [
				  "type" => "oxxo_cash",
				  "expires_at" => $thirty_days_from_now
				]
			  ]
			]
		  ]
		);
		$status=1;
		$details = "Reference: ". $order->charges[0]->payment_method->reference." Order ".$order->line_items[0]->quantity .
			"-". $order->line_items[0]->name .
			"- $". $order->line_items[0]->unit_price/100;

	  } catch (\Conekta\ParameterValidationError $error){
		$error->getMessage();
		$status=2;
	  } catch (\Conekta\Handler $error){
		$error->getMessage();
		$status=3;
	  }
	

	if ($status==1) {
		echo '<form action="../../ticket/" id="finish_t" method="post">';
		echo '<input type="hidden" name="reference" value="'.$order->charges[0]->payment_method->reference.'">';
		echo '<input type="hidden" name="amount" value="'.$order->amount.'">';
		echo '<input type="hidden" name="adress" value="'.$_POST["adres"].'">';
		echo '<input type="hidden" name="description" value="'.$_POST["description"].'">';
		echo '<input type="hidden" name="details" value="'.$details.'">';
		echo '<input type="hidden" name="idOpen" value="'.$order->id.'">';
		echo '<form>';
		echo '<script type="text/javascript">
		document.getElementById("finish_t").submit();
		</script>';
	}elseif ($status==2) {
		echo '<form action="../../status/" id="finish" method="post">';
		echo '<input type="hidden" name="stat" value="2">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '</form>';
		echo '<script type="text/javascript">
		document.getElementById("finish").submit();
		</script>';
	}elseif ($status==3) {
		echo '<form action="../../status/" id="finish" method="post">';
		echo '<input type="hidden" name="stat" value="2">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '</form>';
		echo '<script type="text/javascript">
		  document.getElementById("finish").submit();
		</script>';
	}elseif ($status==4) {
		echo '<form action="../../status/" id="finish" method="post">';
		echo '<input type="hidden" name="stat" value="2">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '</form>';
		echo '<script type="text/javascript">
		  document.getElementById("finish").submit();
		</script>';
	}elseif ($status==5) {
		echo '<form action="../../status/" id="finish" method="post">';
		echo '<input type="hidden" name="stat" value="2">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '</form>';
		echo '<script type="text/javascript">
		  document.getElementById("finish").submit();
		</script>';
	}elseif ($status==6) {
		echo '<form action="../../status/" id="finish" method="post">';
		echo '<input type="hidden" name="stat" value="2">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '</form>';
		echo '<script type="text/javascript">
		  document.getElementById("finish").submit();
		</script>';
	}else{
		echo '<form action="../../status/" id="finish" method="post">';
		echo '<input type="hidden" name="stat" value="2">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '</form>';
		echo '<script type="text/javascript">
		  document.getElementById("finish").submit();
		</script>';
	}

}

?>
