<?php
// define variables and set to empty values
session_start();
require_once('../../../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = test_input($_POST["id"]);
	$id_campaign = test_input($_POST["id_campaign"]);

	$sql = "DELETE FROM campaigns_product  WHERE id_products=".$id." AND id_campaign=".$id_campaign."";

	if ($conn->query($sql) === TRUE) {
	  echo ("<SCRIPT LANGUAGE='JavaScript'>

		window.location.href='../../campaigns/';
		</SCRIPT>");
	} else {
	  echo "Error deleting record: " . $conn->error;
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