<?php
require_once("Openpay.php");

Openpay::setId('mrnlrokkehg1vqbwx9x3');
Openpay::setApiKey('sk_1c29e17ce09b46f99dcb0c82bdf99b11');
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
try {
	//Openpay::setProductionMode(false);
	$openpay = Openpay::getInstance('mrnlrokkehg1vqbwx9x3', 'sk_1c29e17ce09b46f99dcb0c82bdf99b11');
	$charge = $openpay->charges->create($chargeData);
	echo $charge->id;
	echo "<br>";
	echo $charge->status;
	echo "<br>";


} catch (OpenpayApiTransactionError $e) {
	echo error_log('ERROR on the transaction: ' . $e->getMessage() .
		' [error code: ' . $e->getErrorCode() .
		', error category: ' . $e->getCategory() .
		', HTTP code: '. $e->getHttpCode() .
		', request ID: ' . $e->getRequestId() . ']', 0);

} catch (OpenpayApiRequestError $e) {
	echo error_log('ERROR on the request: ' . $e->getMessage(), 0);

} catch (OpenpayApiConnectionError $e) {
	echo error_log('ERROR while connecting to the API: ' . $e->getMessage(), 0);

} catch (OpenpayApiAuthError $e) {
	echo error_log('ERROR on the authentication: ' . $e->getMessage(), 0);

} catch (OpenpayApiError $e) {
	echo error_log('ERROR on the API: ' . $e->getMessage(), 0);

} catch (Exception $e) {
	echo error_log('Error on the script: ' . $e->getMessage(), 0);
}
?>
