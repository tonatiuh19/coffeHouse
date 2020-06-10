<?php
// define variables and set to empty values
session_start();
require_once('../../../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = test_input($_POST["name"]);
	$type = test_input($_POST["product_type"]);
	$short = test_input($_POST["s_desc"]);
	$long = test_input($_POST["l_desc"]);
	$country = test_input($_POST["country"]);
	$price = test_input($_POST["price"]);
	$sabor = test_input($_POST["sabor"]);
	$cuerpo = test_input($_POST["cuerpo"]);
	$acidez = test_input($_POST["acidez"]);

	$today = date("Y-m-d H:i:s");
	$sql = "INSERT INTO products (name, id_product_type, id_country, date, long_description, description)
	VALUES ('$name', '$type', '$country', '$today', '$long', '$short')";

	if ($conn->query($sql) === TRUE) {
		$sql2 = "SELECT id_products FROM products WHERE name='".$name."' and id_product_type='".$type."' and id_country='".$country."' and date='".$today."' and description='".$short."'";
		$result2 = $conn->query($sql2);

		if ($result2->num_rows > 0) {
    		
			while($row2 = $result2->fetch_assoc()) {
				$sql = "INSERT INTO prices (id_products, price, date)
				VALUES ('".$row2["id_products"]."', '".$price."', '".$today."')";

				if ($conn->query($sql) === TRUE) {
					$sqlx = "INSERT INTO product_f_acidez (value, id_product)
				VALUES ('".$acidez."', '".$row2["id_products"]."')";

				if ($conn->query($sqlx) === TRUE) {
					$sqly = "INSERT INTO product_f_cuerpo (value, id_product)
					VALUES ('".$cuerpo."', '".$row2["id_products"]."')";

					if ($conn->query($sqly) === TRUE) {
						$sqlz = "INSERT INTO product_f_sabor (value, id_product)
						VALUES ('".$sabor."', '".$row2["id_products"]."')";

						if ($conn->query($sqlz) === TRUE) {
						  echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.location.href='../../';
							</SCRIPT>");
						} else {
						  //echo "Error: " . $sql . "<br>" . $conn->error;
						}
					  
					} else {
					  //echo "Error: " . $sql . "<br>" . $conn->error;
					}
				  
				} else {
				  //echo "Error: " . $sql . "<br>" . $conn->error;
				}
					
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
		} else {
			echo "0 results";
		}
		
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
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
