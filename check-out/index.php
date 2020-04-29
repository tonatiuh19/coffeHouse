<?php
echo ("<SCRIPT LANGUAGE='JavaScript'>
		if (localStorage.getItem('cart') === null) {
		  window.location.href='../';
		}
		</SCRIPT>");

require_once('../admin/header.php');
if (!(isset($_SESSION['email']))){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.location.href='../sign-in/';
		</SCRIPT>");
}
$precioTotal = 0;
$carrito = 0;
?>
<style>
	.box{
		display: none;
	}
</style>
<script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript"
        src="https://js.openpay.mx/openpay.v1.min.js"></script>
<script type='text/javascript'
  src="https://js.openpay.mx/openpay-data.v1.min.js"></script>
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
				    	$carrito = $row["id_orders"];
				        echo '<li class="list-group-item d-flex justify-content-between lh-condensed">
						          <div>
						            <h6 class="my-0">'.$row["name"].'</h6>
						            <small class="text-muted">Cantidad '.$row["quantity"].'</small>
						          </div>
						          <span class="text-muted">$'.($row["price"])*$row["quantity"].'</span>
						        </li>';
						        $precioTotal += ($row["price"])*$row["quantity"];
				    }
					if ($precioTotal >= 600) {
						echo '<li class="list-group-item d-flex justify-content-between lh-condensed">
							          <div>
							            <h6 class="my-0"><i class="fas fa-truck"></i> Envio gratis</h6>
							            <small class="text-muted"></small>
							          </div>
							          <span class="text-muted">$0</span>
							        </li>';
					}else{
						$precioAlcanzar = 600-$precioTotal;
						echo '<li class="list-group-item d-flex justify-content-between lh-condensed">
							          <div>
							            <h6 class="my-0"><i class="fas fa-truck"></i> Envio</h6>
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
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="colorRadio" value="red">
					  <label class="form-check-label" for="exampleRadios1">
					    Credito/Debito
					  </label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="colorRadio" value="green">
					  <label class="form-check-label" for="exampleRadios2">
					    Tienda
					  </label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="colorRadio" value="blue">
					  <label class="form-check-label" for="exampleRadios3">
					    Paypal
					  </label>
					</div>
				</div>
				<div class="red box">
					<form action="pay/" method="POST" id="payment-form">
					<input type="hidden" name="token_id" id="token_id">
					<?php
						echo '<input type="hidden" name="payType" value="1">';
						echo '<input type="hidden" name="amount" id="amount" value="'.$precioTotal.'">';
						echo '<input type="hidden" name="description" id="description" value="'.$carrito.'">';
						echo '<input type="hidden" name="email" value="'.$_SESSION['email'].'">';
						echo '<input type="hidden" name="name" value="Pero">';
						echo '<input type="hidden" name="last" value="Gato">';
						echo '<input type="hidden" name="number" value="1234567890">';
					?>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="cc-name">Nombre en tarjeta</label>
							<input class="form-control" type="text" autocomplete="off" data-openpay-card="holder_name" placeholder="Como aparece en tu tarjeta" required>
							<div class="invalid-feedback">
								Name on card is required
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="cc-number">Numero de Tarjeta</label>
							<input class="form-control" type="text" autocomplete="off" data-openpay-card="card_number" required>
							<div class="invalid-feedback">
								Credit card number is required
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 mb-3">
							<label for="cc-expiration">Expiracion</label>
	                        <input type="text" class="form-control" placeholder="Mes" data-openpay-card="expiration_month">
							<div class="invalid-feedback">
								Expiration date required
							</div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="cc-expiration">&nbsp;</label>
	                        <input type="text" class="form-control" placeholder="Año" data-openpay-card="expiration_year">
							<div class="invalid-feedback">
								Expiration date required
							</div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="cc-expiration">CVV</label>
							<input class="form-control" type="text" placeholder="3 dígitos" autocomplete="off" data-openpay-card="cvv2" required>
							<div class="invalid-feedback">
								Security code required
							</div>
						</div>
					</div>
					<div class="small"><i class="fas fa-user-lock"></i> Tus pagos se realizan de forma segura con encriptación de 256 bits.</div>
					<hr class="mb-4">
					<a class="btn btn-primary btn-lg btn-block" id="pay-button"><i class="fas fa-lock"></i> Pagar</a>
				</form>
			</div>
			<div class="green box">
				<img src="../images/openpay_tiendas.jpg" alt="Cinque Terre">
				<form action="pay/" method="POST" >
					<?php
					echo '<input type="hidden" name="payType" value="2">';
					echo '<input type="hidden" name="amount" id="amount" value="'.$precioTotal.'">';
					echo '<input type="hidden" name="description" id="description" value="'.$carrito.'">';
					echo '<input type="hidden" name="email" value="'.$_SESSION['email'].'">';
					echo '<input type="hidden" name="name" value="Pero">';
					echo '<input type="hidden" name="last" value="Gato">';
					echo '<input type="hidden" name="number" value="1234567890">';
					?>
					<div class="small"><i class="fas fa-user-lock"></i> Tus pagos se realizan de forma segura con encriptación de 256 bits.</div>
					<hr class="mb-4">
					<!--<a class="btn btn-primary btn-lg btn-block" id="pay-button" target="_blank"><i class="fas fa-lock"></i> Generar ticket de Pago</a>-->
					<button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fas fa-lock"></i> Generar ticket de Pago</button>
				</form>
			</div>
    		<div class="blue box">Paypal</div>
		</div>
	</div>

	<footer class="my-5 pt-5 text-muted text-center text-small">
		<p class="mb-1"><i class="fas fa-truck"></i> Envio completamente seguro.</p>
		
	</footer>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		OpenPay.setId('my5osdjarjverf8pvgd7');
		OpenPay.setApiKey('pk_adbd72980cc14a83a9b6ede8ebe6dc5a');
		var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");
	});

	$(document).ready(function() {
		OpenPay.setId('my5osdjarjverf8pvgd7');
		OpenPay.setApiKey('pk_adbd72980cc14a83a9b6ede8ebe6dc5a');
		OpenPay.setSandboxMode(true);
	});

	$('#pay-button').on('click', function(event) {
		event.preventDefault();
		$("#pay-button").prop( "disabled", true);
		OpenPay.token.extractFormAndCreate('payment-form', success_callbak, error_callbak);              

	});

	var success_callbak = function(response) {
		var token_id = response.data.id;
		$('#token_id').val(token_id);
		$('#payment-form').submit();
	};

	var error_callbak = function(response) {
		var desc = response.data.description != undefined ?
		response.data.description : response.message;
		alert("ERROR [" + response.status + "] " + desc);
		$("#pay-button").prop("disabled", false);
	};
</script>
<?php
require_once('../admin/footer.php');
?>
<script>
	$(document).ready(function(){
		$('input[type="radio"]').click(function(){
			var inputValue = $(this).attr("value");
			var targetBox = $("." + inputValue);
			$(".box").not(targetBox).hide();
			$(targetBox).show();
		});
	});
</script>
