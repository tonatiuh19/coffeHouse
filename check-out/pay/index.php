<?php
require_once("Openpay.php");

Openpay::setId('mrnlrokkehg1vqbwx9x3');
Openpay::setApiKey('sk_1c29e17ce09b46f99dcb0c82bdf99b11');

echo $_POST["token_id"];
echo $_POST["amount"];
echo $_POST["description"];
echo $_POST["deviceIdHiddenFieldName"];

try {
	Openpay::setProductionMode(false);
	$openpay = Openpay::getInstance('mrnlrokkehg1vqbwx9x3', 'sk_1c29e17ce09b46f99dcb0c82bdf99b11');

	$customerData = array(
		'name' => 'Teofilo',
		'last_name' => 'Velazco',
		'email' => 'teofilo@payments.com',
		'phone_number' => '4421112233',
		'address' => array(
			'line1' => 'Privada Rio No. 12',
			'line2' => 'Co. El Tintero',
			'line3' => '',
			'postal_code' => '76920',
			'state' => 'Querétaro',
			'city' => 'Querétaro.',
			'country_code' => 'MX'));

	$customer = $openpay->customers->add($customerData);

	$chargeData = array(
	    'method' => 'card',
	    'source_id' => $_POST["token_id"],
	    'amount' => $_POST["amount"], // formato númerico con hasta dos dígitos decimales. 
	    'description' => $_POST["description"],
	    'device_session_id' => $_POST["deviceIdHiddenFieldName"],
	    'customer' => $customer
	    );

	$charge = $openpay->charges->create($chargeData);

	print_r($charge);

} catch (OpenpayApiTransactionError $e) {
	error_log('ERROR on the transaction: ' . $e->getMessage() . 
		' [error code: ' . $e->getErrorCode() . 
		', error category: ' . $e->getCategory() . 
		', HTTP code: '. $e->getHttpCode() . 
		', request ID: ' . $e->getRequestId() . ']', 0);

} catch (OpenpayApiRequestError $e) {
	error_log('ERROR on the request: ' . $e->getMessage(), 0);

} catch (OpenpayApiConnectionError $e) {
	error_log('ERROR while connecting to the API: ' . $e->getMessage(), 0);

} catch (OpenpayApiAuthError $e) {
	error_log('ERROR on the authentication: ' . $e->getMessage(), 0);
	
} catch (OpenpayApiError $e) {
	error_log('ERROR on the API: ' . $e->getMessage(), 0);
	
} catch (Exception $e) {
	error_log('Error on the script: ' . $e->getMessage(), 0);
}
?>