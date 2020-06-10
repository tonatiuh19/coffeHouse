<?php
// define variables and set to empty values
session_start();
require_once('../../../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = test_input($_POST["new"]);
	$id_campaign = test_input($_POST["id_campaign"]);
	$qty = test_input($_POST["qty"]);


	$sqlx = "SELECT id_products, id_campaign FROM campaigns_product WHERE id_products=".$id." AND id_campaign=".$id_campaign."";
	$resultx = $conn->query($sqlx);

	if ($resultx->num_rows > 0) {
	 	echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('¡Este producto ya existe en la campaña!')
			window.location.href='../';
			</SCRIPT>");
	} else {
	  	$sql = "INSERT INTO campaigns_product (id_products, id_campaign, quantity)
		VALUES ('".$id."', '".$id_campaign."', '".$qty."')";

		if ($conn->query($sql) === TRUE) {
		  echo ("<SCRIPT LANGUAGE='JavaScript'>

			window.location.href='../../campaigns/';
			</SCRIPT>");
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	

}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>

		window.location.href='../../';
		</SCRIPT>");
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}