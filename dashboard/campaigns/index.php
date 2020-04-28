<?php
require_once('../admin/header.php');
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Campañas</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
				<a href="../new-campaign/" class="btn btn-sm btn-outline-success"><i class="fas fa-plus-square"></i> Campaña</a>
			</div>

		</div>
	</div>
	<?php
	$sql = "SELECT d.id_products, e.price, d.name, d.description, d.id_product_type, d.id_country, d.active, d.long_description, m.country FROM products as d INNER JOIN (SELECT a.id_prices, a.id_products, a.price FROM prices AS a WHERE date = ( SELECT MAX(date) FROM prices AS b WHERE a.id_products = b.id_products )) as e on d.id_products=e.id_products INNER JOIN countries as m on m.id_country=d.id_country WHERE d.id_product_type=3";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    echo '<table class="table text-center">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">Nombre</th>
			      <th scope="col">Precio</th>
			      <th scope="col">Region</th>
			      <th scope="col">Descripcion</th>
			      <th scope="col">Descripcion extensa</th>
			      <th scope="col">Status</th>
			      <th scope="col">Suspender/Activar</th>
			      <th scope="col">Editar</th>
			    </tr>
			  </thead>
			  <tbody>';
		while($row = $result->fetch_assoc()) {
			if($row["id_product_type"] ==3){
				echo '<tr>
			      <th scope="row">'.$row["id_products"].'</th>
			      <td>'.$row["name"].'</td>
			      <td>$'.$row["price"].'</td>
			      <td>'.$row["country"].'</td>
			      <td>'.substr($row["description"],0,12)."...".'</td>
			      <td>'.substr($row["long_description"],0,12)."...".'</td>';
			      if ($row["active"]==1) {
			      	echo '<td><i class="fas fa-check-circle text-success"></i></td>';
			      	echo '<td><form action="../activate/" method="post">
								<input type="hidden" name="act" value="'.$row["active"].'">
								<input type="hidden" name="id" value="'.$row["id_products"].'">
								<input type="hidden" name="type" value="3">
								<button type="submit" class="btn btn-danger"><i class="fas fa-times-circle"></i></button>
							</form></td>';
			      }else{
			      	echo '<td><i class="fas fa-times-circle text-danger"></i></td>';
			      	echo '<td><form action="../activate/" method="post">
								<input type="hidden" name="act" value="'.$row["active"].'">
								<input type="hidden" name="id" value="'.$row["id_products"].'">
								<input type="hidden" name="type" value="3">
								<button class="btn btn-success" type="submit"><i class="fas fa-check-circle"></i></button>
							</form></td>';
			      }
			      echo '<td><form action="../edit/" method="post">
								<input type="hidden" name="id" value="'.$row["id_products"].'">
								<button class="btn btn-primary"><i class="fas fa-edit"></i></button>
							</form></td>';
			    echo '</tr>';
			}

		}
	echo '</tbody>
		</table>';
	} else {
		echo "0 results";
	}
	$conn->close();
	?>

</main>
</div>
</div>

