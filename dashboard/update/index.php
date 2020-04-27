<?php
// define variables and set to empty values
session_start();
require_once('../../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = test_input($_POST["id"]);
	$name = test_input($_POST["name"]);
	$type = test_input($_POST["product_type"]);
	$short = test_input($_POST["s_desc"]);
	$long = test_input($_POST["l_desc"]);
	$country = test_input($_POST["country"]);

	$today = date("Y-m-d H:i:s");
	
	$sql = "UPDATE products SET name='".$name."', id_product_type='".$type."', id_country='".$country."', date='".$today."', description='".$short."', long_description='".$long."' WHERE id_products=".$id."";

	if ($conn->query($sql) === TRUE) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
					window.location.href='../';
					</SCRIPT>");
	} else {
		echo "Error updating record: " . $conn->error;
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


?>
