<?php
// define variables and set to empty values
session_start();
require_once('cn.php');

if (isset($_POST['query'])) {
	$inpText = $_POST['query'];
	$sql = "SELECT a.name, a.id_products FROM products as a WHERE a.active=1 and a.name LIKE '%$inpText%' LIMIT 5";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
  // output data of each row
		while($row = $result->fetch_assoc()) {
			echo '<a href="https://coffehouse.mx/product/?product_sku='.$row["id_products"].'" class="list-group-item list-group-item-action"><i class="far fa-hand-point-right"></i> '.$row["name"].'</a>';
		}
	} else {
		echo '<a href="https://coffehouse.mx/catalogo/" class="list-group-item list-group-item-action"><i class="far fa-hand-point-right"></i> Ver catalogo</a>';
	}
}
?>