<?php
// define variables and set to empty values
session_start();
require_once('../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$qty_arr = $_POST["qty"];
	$product_arr = $_POST['productId'];
	$todayVisit = date("Y-m-d H:i:s");
	$correo= $_SESSION["email"];
	
	$sql = "INSERT INTO orders (email_user,  date)
	VALUES ('$correo', '$todayVisit')";

	if ($conn->query($sql) === TRUE) {
	    $sql = "SELECT id_orders FROM orders WHERE date='".$todayVisit."' and email_user='".$_SESSION["email"]."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$idOrder = $row["id_orders"];
		    	foreach(array_keys($product_arr) as $key) {
			    // do something with $array_one[$key] and $array_two[$key]
		    		$idProduct = $product_arr[$key];
		    		$quantity = $qty_arr[$key];
		    		$sql = "INSERT INTO carts (id_products, quantity, id_orders)
					VALUES ('$idProduct', '$quantity', '$idOrder')";


					if ($conn->query($sql) === TRUE) {
					    //echo "New record created successfully";
					} else {
					    //echo "Error: " . $sql . "<br>" . $conn->error; 
					}
				}
				echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.location.href='../check-out/';
				</SCRIPT>");
		    }
		} else {
		    echo "0 results";
		}
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();


}else{
	/*echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.location.href='../';
		</SCRIPT>");*/
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


?>
