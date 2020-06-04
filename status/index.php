<?php
// define variables and set to empty values
require_once('../admin/cn.php');
require_once('../admin/header.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$status = test_input($_POST["stat"]);
	$cart = test_input($_POST["cart"]);
	$adress = test_input($_POST["adress"]);


	
	?>
	<section class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.5" style="background-image: url('../images/bg_4.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<?php
					//$status=1;
					if ($status==1) {
						echo '<h1 class="mb-2 bread">Gracias por tu compra</h1>
								<script type="text/javascript">
									window.localStorage.clear();
								</script>';
						$sql = "UPDATE orders SET complete='1', id_adress='".$adress."' WHERE id_orders=".$cart."";

						if ($conn->query($sql) === TRUE) {
						    //echo "Record updated successfully";
						} else {
						    //echo "Error updating record: " . $conn->error;
						}
					}elseif ($status==2) {
						echo '<h1 class="mb-2 bread">Tu pago ha sido declinado</h1>';
					}elseif ($status==3) {
						echo '<h1 class="mb-2 bread">Se interrumpio tu conexion</h1>';
					}elseif ($status==4) {
						echo '<h1 class="mb-2 bread">Se interrumpio tu conexion</h1>';
					}elseif ($status==5) {
						echo '<h1 class="mb-2 bread">Se interrumpio tu conexion</h1>';
					}elseif ($status==6) {
						echo '<h1 class="mb-2 bread">Se interrumpio tu conexion</h1>';
					}elseif ($status==10) {
						echo '<h1 class="mb-2 bread">Tu subscripcion esta completa</h1>
								<script type="text/javascript">
									window.localStorage.clear();
								</script>';
					}else{
						echo '<h1 class="mb-2 bread">Se interrumpio tu conexion</h1>';
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-section">
		<div class="container">
		    <div class="row">
		        <div class="col-sm-12">
		        	<div class="jumbotron">
		        		<?php
		        		if ($status==1) {
		        			echo '<h1 class="display-4"><i class="fas fa-check-circle fa-2x text-success"></i> Tu pago ha sido procesado</h1>
								  <p class="lead">En breve recibirás un correo electrónico con el número de guía, con el cual podras hacer el seguimiento de tu pedido.</p>
								  <hr class="my-4">
								  <p>Nº de pedido: <b>'.$cart.'</b>
								  <br>Pago con: <b>Tarjeta</b></p>
								  <h4>Envio:</h4>
								  	<table class="table">
									  <thead class="thead-dark">
									    <tr>
									      <th scope="col">Producto</th>
									      <th scope="col">Cantidad</th>
									      <th scope="col">Precio</th>
									    </tr>
									  </thead>
									  <tbody>
									  ';
									  $sql = "SELECT b.id_carts, b.id_products, b.quantity, b.id_orders, e.price, d.name FROM carts as b INNER JOIN orders as c on c.id_orders=b.id_orders INNER JOIN products as d on d.id_products=b.id_products INNER JOIN (SELECT a.id_prices, a.id_products, a.price FROM prices AS a WHERE date = ( SELECT MAX(date) FROM prices AS b WHERE a.id_products = b.id_products )) as e on d.id_products=e.id_products WHERE c.id_orders=".$cart."";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
										    // output data of each row
										    while($row = $result->fetch_assoc()) {
										        echo '<tr>
													      <th scope="row">'.$row["name"].'</th>
													      <td>'.$row["quantity"].'</td>
													      <td>'.$row["price"].'</td>
													    </tr>';
										    }
										} else {
										    echo "0 results";
										}
									 echo '</tbody>
									</table>
								  </p>
								  <p>¿Tienes más preguntas?
									Visita nuestro Centro de ayuda</p>
								  <p>
								  <p class="lead">
								    <a class="btn btn-primary btn-lg" href="#" role="button">Regresar</a>
								  </p>';
						}elseif ($status==2) {
		        			echo '<h1 class="display-4"><i class="fas fa-times-circle fa-2x text-danger"></i> Tu pago no fue procesado</h1>
								  <p class="lead">Intenta con otro medio de pago.</p>
								  <hr class="my-4">
								  <p>¿Tienes más preguntas?
									Visita nuestro Centro de ayuda</p>
								  <p>
								  <p class="lead">
								    <a class="btn btn-primary btn-lg" href="#" role="button">Regresar</a>
								  </p>';
						}elseif ($status==10) {
		        			echo '<h1 class="display-4"><i class="fas fa-check-circle fa-2x text-success"></i> Tu sueño de recibir cafe todos los meses esta completo</h1>
								  <p class="lead">En breve recibirás un correo electrónico con el número de guía, con el cual podras hacer el seguimiento de tu primer pedido.</p>
								  <hr class="my-4">
								  <p>¿Tienes más preguntas?
									Visita nuestro Centro de ayuda</p>
								  <p>
								  <p class="lead">
								    <a class="btn btn-primary btn-lg" href="#" role="button">Regresar</a>
								  </p>';
						}else{
		        			echo '<h1 class="display-4"><i class="fas fa-times-circle fa-2x text-danger"></i> Tu sueño de recibir cafe todos los meses esta completo</h1>
								  <p class="lead">Intentalo de nuevo.</p>
								  <hr class="my-4">
								  <p>¿Tienes más preguntas?
									Visita nuestro Centro de ayuda</p>
								  <p>
								  <p class="lead">
								    <a class="btn btn-primary btn-lg" href="#" role="button">Regresar</a>
								  </p>';
						}
		        		?>
					</div>
		        </div>
		    </div>
		</div>

	</section>
	<?php
	
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

require_once('../admin/footer.php');
?>
