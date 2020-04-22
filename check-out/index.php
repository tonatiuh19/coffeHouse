<?php
require_once('../admin/header.php');
if (!(isset($_SESSION['email']))){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.location.href='../sign-in/';
		</SCRIPT>");
}
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
				<table class="table" id="cartItems">
				</table>
				
				<li class="list-group-item d-flex justify-content-between">
					<span>Precio Total (MXN)</span>
					<strong id="totalPrice">0 $</strong>
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
<script type="text/template" id="cartT">
	<% _.each(items, function (x) { %> 
	<li class="list-group-item d-flex justify-content-between lh-condensed">
		<div>
			<h6 class="my-0"><%= x.name %></h6>
			<small class="text-muted">Cantidad: <%= x.count %></small>
		</div>
		<span class="text-muted">$<%= x.total %></span>
	</li>
	<% }); %>
</script>
<script  src="js/cart_checkout.js"></script>
<?php
require_once('../admin/footer.php');
?>