<?php
require_once('../admin/header.php');
if (!(isset($_SESSION['email']))){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.location.href='../sign-in/';
		</SCRIPT>");
}
$precioTotal = 0;
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('../images/bg_4.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread">Mi Bolsa</h1>
			</div>
		</div>
	</div>
</section>
<link rel="stylesheet" href="css/checkout.css">
<div class="container">
	<div class="py-5 text-center">

	</div>

	<div class="row">
		<div class="col-md-4 order-md-2 mb-4">
			<h4 class="d-flex justify-content-between align-items-center mb-3">
				<span class="text-muted">Tu Bolsa</span>
				
			</h4>
			<ul class="list-group mb-3">
				<?php
				$correo= $_SESSION["email"];
				$sql = "SELECT b.id_carts, b.id_products, b.quantity, b.id_orders, e.price, d.name FROM carts as b INNER JOIN (SELECT max(a.id_orders) as 'id_orders' FROM orders as a where email_user='".$correo."' ) as c on c.id_orders=b.id_orders INNER JOIN products as d on d.id_products=b.id_products INNER JOIN (SELECT a.id_prices, a.id_products, a.price FROM prices AS a WHERE date = ( SELECT MAX(date) FROM prices AS b WHERE a.id_products = b.id_products )) as e on d.id_products=e.id_products";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo '<li class="list-group-item d-flex justify-content-between lh-condensed">
						          <div>
						            <h6 class="my-0">'.$row["name"].'</h6>
						            <small class="text-muted">Cantidad '.$row["quantity"].'</small>
						          </div>
						          <span class="text-muted">$'.$row["price"].'</span>
						        </li>';
						        $precioTotal += $row["price"];
				    }
					if ($precioTotal >= 600) {
						echo '<li class="list-group-item d-flex justify-content-between lh-condensed">
							          <div>
							            <h6 class="my-0">Envio gratis</h6>
							            <small class="text-muted"></small>
							          </div>
							          <span class="text-muted">$0</span>
							        </li>';
					}else{
						$precioAlcanzar = 600-$precioTotal;
						echo '<li class="list-group-item d-flex justify-content-between lh-condensed">
							          <div>
							            <h6 class="my-0">Envio</h6>
							            <small class="text-muted"><b>$'.$precioAlcanzar.' y tu envio es gratis </b></small>
							          </div>
							          <span class="text-muted">$99</span>
							        </li>';
						$precioTotal += 99;					
					}
				    
				} else {
				    echo "No hay productos";
				}
				?>
				
				
				<li class="list-group-item d-flex justify-content-between">
					<span>Precio Total (MXN)</span>
					<strong>$<?php echo $precioTotal;?></strong>
				</li>
			</ul>

			<!--<form class="card p-2">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Promo code">
					<div class="input-group-append">
						<button type="submit" class="btn btn-secondary">Redeem</button>
					</div>
				</div>
			</form>-->
		</div>
		<div class="col-md-8 order-md-1">
			<h4 class="mb-3">Añadir Domicilio</h4>
			<form class="needs-validation" novalidate>
				
				
				<div class="row">
					<div class="col-md-5 mb-3">
						<label for="country">Country</label>
						<select class="custom-select d-block w-100" id="country" required>
							<option value="">Choose...</option>
							<option>United States</option>
						</select>
						<div class="invalid-feedback">
							Please select a valid country.
						</div>
					</div>
				</div>
				<h4 class="mb-4"></h4>

				<h4 class="mb-3">Pago</h4>

				<div class="d-block my-3">
					<div class="custom-control custom-radio">
						<input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
						<label class="custom-control-label" for="credit">Credito / Debito</label>
					</div>
					<div class="custom-control custom-radio">
						<input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
						<label class="custom-control-label" for="paypal">Paypal</label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="cc-name">Nombre en tarjeta</label>
						<input type="text" class="form-control" id="cc-name" placeholder="" required>
						<small class="text-muted">Como aparece en tu tarjeta</small>
						<div class="invalid-feedback">
							Name on card is required
						</div>
					</div>
					<div class="col-md-6 mb-3">
						<label for="cc-number">Numero de Tarjeta</label>
						<input type="text" class="form-control" id="cc-number" placeholder="" required>
						<div class="invalid-feedback">
							Credit card number is required
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 mb-3">
						<label for="cc-expiration">Expiracion</label>
						<input type="text" class="form-control" id="cc-expiration" placeholder="" required>
						<div class="invalid-feedback">
							Expiration date required
						</div>
					</div>
					<div class="col-md-3 mb-3">
						<label for="cc-expiration">CVV</label>
						<input type="text" class="form-control" id="cc-cvv" placeholder="" required>
						<div class="invalid-feedback">
							Security code required
						</div>
					</div>
				</div>
				<hr class="mb-4">
				<button class="btn btn-primary btn-lg btn-block" type="submit"><i class="fas fa-lock"></i> Pagar</button>
			</form>
		</div>
	</div>

	<footer class="my-5 pt-5 text-muted text-center text-small">
		<p class="mb-1"><i class="fas fa-truck"></i> Envio completamente seguro.</p>
		
	</footer>
</div>

<?php
require_once('../admin/footer.php');
?>
