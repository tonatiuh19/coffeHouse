<?php
require_once("Openpay.php");

Openpay::setId('my5osdjarjverf8pvgd7');
Openpay::setApiKey('sk_9252628a92d04854b9602f975da5da78');
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
	echo $charge->id;
	echo "<br>";
	echo $charge->status;
	echo "<br>";

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

echo '<form action="../../status/" id="finish" method="post">';
if ($status==1) {
	echo '<input type="hidden" name="stat" value="1">';
	echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
}elseif ($status==2) {
	echo '<input type="hidden" name="stat" value="2">';
	echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
}elseif ($status==3) {
	echo '<input type="hidden" name="stat" value="3">';
	echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
}elseif ($status==4) {
	echo '<input type="hidden" name="stat" value="4">';
	echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
}elseif ($status==5) {
	echo '<input type="hidden" name="stat" value="5">';
	echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
}elseif ($status==6) {
	echo '<input type="hidden" name="stat" value="6">';
	echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
}else{
	echo '<input type="hidden" name="stat" value="0">';
	echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
}
echo '</form>';
echo '<script type="text/javascript">
  document.getElementById("finish").submit();
</script>';
?>
