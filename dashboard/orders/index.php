<?php
require_once('../admin/header.php');
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Ordenes</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
				
			</div>

		</div>
	</div>
	<?php
	$sql = "SELECT a.id_orders, a.date, a.complete, a.email_user,b.street,b.number,b.cp,b.colony,b.state,b.descripcion,b.city, c.name, c.last_name FROM orders as a INNER JOIN adresses as b on b.id_adresses=a.id_adress INNER JOIN users as c on c.email=a.email_user WHERE complete >= 1";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    echo '<table class="table text-center">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">Usuario</th>
			      <th scope="col">Status</th>
			      <th scope="col">Accion</th>
			    </tr>
			  </thead>
			  <tbody>';
		while($row = $result->fetch_assoc()) {
				echo '<tr>
			      <th scope="row">'.$row["id_orders"].'</th>';
			      echo '<td>'.$row["email_user"].'</td>';
			      if ($row["complete"]==1) {

			      	echo '<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal'.$row["id_orders"].'">
							  Ver detalle
							</button>
							<div class="modal fade" id="exampleModal'.$row["id_orders"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-lg" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Detalle</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
									<table class="table">
									  <tr>
									    <td><h5>Nombre:</h5></td>
									    <td>'.$row["name"].' '.$row["last_name"].'</td>
									    <td><h5>Correo:</h5></td>
									    <td>'.$row["email_user"].'</td>
									  </tr>
									  <tr>
									    <td><h5>Calle:</h5></td>
									    <td>'.$row["street"].'</td>
									    <td><h5>Numero:</h5></td>
									    <td>'.$row["number"].'</td>
									  </tr>
									  <tr>
									    <td><h5>Colonia:</h5></td>
									    <td>'.$row["colony"].'</td>
									    <td><h5>Estado:</h5></td>
									    <td>'.$row["state"].'</td>
									  </tr>
									  <tr>
									    <td><h5>Ciudad:</h5></td>
									    <td>'.$row["city"].'</td>
									    <td><h5>CP:</h5></td>
									    <td>'.$row["cp"].'</td>
									  </tr>
									  <tr>
									    <td rowspan="4"><h5>Descripcion:</h5></td>
									    <td colspan="3" rowspan="4">'.$row["descripcion"].'</td>
									  </tr>
									</table>';
									$sql2 = "SELECT a.id_carts, a.id_products, a.quantity, a.id_orders, b.name FROM carts as a INNER JOIN products as b on b.id_products=a.id_products WHERE a.id_orders=".$row["id_orders"]."";
									$result2 = $conn->query($sql2);

									if ($result2->num_rows > 0) {
									    echo '<table class="table">
												  <thead class="thead-dark">
												    <tr>
												      <th scope="col">ID Producto</th>
												      <th scope="col">Cantidad</th>
												      <th scope="col">Nombre</th>
												    </tr>
												  </thead>
												  <tbody>';
												
									    while($row2 = $result2->fetch_assoc()) {
									        echo '<tr>
												      <th scope="row">'.$row2["id_products"].'</th>
												      <td>'.$row2["quantity"].'</td>
												      <td>'.$row2["name"].'</td>
												    </tr>';
									    }
									    echo '    
												  </tbody>
												</table>';
									} else {
									    echo "0 results";
									}
							      echo '</div>
							     
							    </div>
							  </div>
							</div>
							</td>';
			      }elseif ($row["complete"]==2) {
			      	echo '<td><button type="button" class="btn btn-warning">Pendiente de pago</button></td>';
			      }
			      if ($row["complete"]==1) {
			      	echo '<td><button type="button" class="btn btn-success">Completar pedido</button></td>';
			      }elseif ($row["complete"]==2) {
			      	echo '<td><button type="button" class="btn btn-danger">Cancelar</button></td>';
			      }
			      
			    echo '</tr>';
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

