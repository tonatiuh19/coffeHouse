<?php
require_once("Openpay.php");

Openpay::setId('my5osdjarjverf8pvgd7');
Openpay::setApiKey('sk_9252628a92d04854b9602f975da5da78');


if ($_POST["payType"]=="1") {	
	$customer = array(
		'name' => $_POST["name"],
		'last_name' => $_POST["last"],
		'phone_number' => $_POST["number"],
		'email' => $_POST["email"]);

		//$customer = $openpay->customers->add($customer);

	$chargeData = array(
		'method' => 'card',
		'source_id' => $_POST["token_id"],
		    'amount' => $_POST["amount"], // formato númerico con hasta dos dígitos decimales.
		    'description' => $_POST["description"],
		    'device_session_id' => $_POST["deviceIdHiddenFieldName"],
		    'customer' => $customer
		);
	$status=0;
	try {
		//Openpay::setProductionMode(false);
		$openpay = Openpay::getInstance('my5osdjarjverf8pvgd7', 'sk_9252628a92d04854b9602f975da5da78');
		$charge = $openpay->charges->create($chargeData);
		$charge->id;
		//echo "<br>";
		$charge->status;
		//echo "<br>";

		$status=1;
	} catch (OpenpayApiTransactionError $e) {
		/*echo 'ERROR on the transaction: ' . $e->getMessage() .
			' error code: ' . $e->getErrorCode() .
			', error category: ' . $e->getCategory() .
			', HTTP code: '. $e->getHttpCode() .
			', request ID: ' . $e->getRequestId();*/
		$status=2;
	} catch (OpenpayApiRequestError $e) {
		//echo 'ERROR on the request: ' . $e->getMessage();
		$status=3;
	} catch (OpenpayApiConnectionError $e) {
		//echo 'ERROR while connecting to the API: ' . $e->getMessage();
		$status=4;
	} catch (OpenpayApiAuthError $e) {
		//echo 'ERROR on the authentication: ' . $e->getMessage();
		$status=5;
	} catch (OpenpayApiError $e) {
		//echo 'ERROR on the API: ' . $e->getMessage();
		$status=6;
	} catch (Exception $e) {
		//echo 'Error on the script: ' . $e->getMessage();
	}

	echo $_POST["description"];
	echo $_POST["adres"];
	echo "Open:".$charge->id;
	echo "Desc:".$charge->description;

	echo '<form action="../../status/" id="finish" method="post">';
	if ($status==1) {
		echo '<input type="hidden" name="stat" value="1">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '<input type="hidden" name="adress" value="'.$_POST["adres"].'">';
		echo '<input type="hidden" name="idOpen" value="'.$charge->id.'">';
		echo '<input type="hidden" name="description" value="'.$charge->description.'">';
	}elseif ($status==2) {
		echo '<input type="hidden" name="stat" value="2">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '<input type="hidden" name="description" value="'.$e->getMessage().'">';
	}elseif ($status==3) {
		echo '<input type="hidden" name="stat" value="3">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '<input type="hidden" name="description" value="'.$e->getMessage().'">';
	}elseif ($status==4) {
		echo '<input type="hidden" name="stat" value="4">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '<input type="hidden" name="description" value="'.$e->getMessage().'">';
	}elseif ($status==5) {
		echo '<input type="hidden" name="stat" value="5">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '<input type="hidden" name="description" value="'.$e->getMessage().'">';
	}elseif ($status==6) {
		echo '<input type="hidden" name="stat" value="6">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '<input type="hidden" name="description" value="'.$e->getMessage().'">';
	}else{
		echo '<input type="hidden" name="stat" value="0">';
		echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
		echo '<input type="hidden" name="description" value="'.$e->getMessage().'">';
	}
	echo '</form>';
	echo '<script type="text/javascript">
	  document.getElementById("finish").submit();
	</script>';
}elseif ($_POST["payType"]=="2") {
	
	$customer = array(
		'name' => $_POST["name"],
		'last_name' => $_POST["last"],
		'phone_number' => $_POST["number"],
		'email' => $_POST["email"]);
	

	$chargeData = array(
	    'method' => 'store',
	    'amount' => $_POST["amount"],
	    'description' => $_POST["description"],
	    'customer' => $customer);
	try{
		$openpay = Openpay::getInstance('my5osdjarjverf8pvgd7', 'sk_9252628a92d04854b9602f975da5da78');
		$charge = $openpay->charges->create($chargeData);
		$status=1;
	}
	catch (OpenpayApiTransactionError $e) {
		/*echo 'ERROR on the transaction: ' . $e->getMessage() .
			' error code: ' . $e->getErrorCode() .
			', error category: ' . $e->getCategory() .
			', HTTP code: '. $e->getHttpCode() .
			', request ID: ' . $e->getRequestId();*/
		$status=2;
	} catch (OpenpayApiRequestError $e) {
		//echo 'ERROR on the request: ' . $e->getMessage();
		$status=3;
	} catch (OpenpayApiConnectionError $e) {
		//echo 'ERROR while connecting to the API: ' . $e->getMessage();
		$status=4;
	} catch (OpenpayApiAuthError $e) {
		//echo 'ERROR on the authentication: ' . $e->getMessage();
		$status=5;
	} catch (OpenpayApiError $e) {
		//echo 'ERROR on the API: ' . $e->getMessage();
		$status=6;
	} catch (Exception $e) {
		//echo 'Error on the script: ' . $e->getMessage();
	}

	if ($status==1) {
		echo '<form action="../../ticket/" id="finish_t" method="post">';
		echo '<input type="hidden" name="barcode_url" value="'.$charge->payment_method->barcode_url.'">';
		echo '<input type="hidden" name="barcode_paybin_url" value="'.$charge->payment_method->barcode_paybin_url.'">';
		echo '<input type="hidden" name="reference" value="'.$charge->payment_method->reference.'">';
		echo '<input type="hidden" name="paybin_reference" value="'.$charge->payment_method->paybin_reference.'">';
		echo '<input type="hidden" name="amount" value="'.$charge->amount.'">';
		echo '<input type="hidden" name="adress" value="'.$_POST["adres"].'">';
		echo '<input type="hidden" name="description" value="'.$_POST["description"].'">';
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
