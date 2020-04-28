<?php
// define variables and set to empty values
session_start();
require_once('../../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = test_input($_POST["id"]);
	$act = test_input($_POST["act"]);
	$type = test_input($_POST["type"]);
	$today = date("Y-m-d H:i:s");

	if ($act=="0") {
		$sql = "UPDATE products SET active='1', date='".$today."' WHERE id_products=".$id."";

		if ($conn->query($sql) === TRUE) {
			if ($type=="3") {
				echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.location.href='../campaigns/';
				</SCRIPT>");
			}else{
				echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.location.href='../';
				</SCRIPT>");
			}
			
		} else {
			echo "Error updating record: " . $conn->error;
		}
	}else{
		$sql = "UPDATE products SET active='0', date='".$today."' WHERE id_products=".$id."";

		if ($conn->query($sql) === TRUE) {
			if ($type=="3") {
				echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.location.href='../campaigns/';
				</SCRIPT>");
			}else{
				echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.location.href='../';
				</SCRIPT>");
			}
		} else {
			echo "Error updating record: " . $conn->error;
		}

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
