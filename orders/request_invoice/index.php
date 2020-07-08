<?php

require_once('../../admin/cn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$rfc = test_input($_POST["rfc"]);
	$razon = test_input($_POST["razon"]);
	$email = test_input($_POST["email"]);
	$order = test_input($_POST["order"]);

	$sql = "INSERT INTO invoices (email_user, rfc, razon_social, id_orders)
	VALUES ('".$email."', '".$rfc."', '".$razon."', '".$order."')";

	if ($conn->query($sql) === TRUE) {
	  echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Factura en proceso. Nos pondremos en contacto contigo')
			window.location.href='../';
			</SCRIPT>");
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}


}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.location.href='../';
		</SCRIPT>");
}


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>