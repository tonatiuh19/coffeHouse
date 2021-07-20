<?php
require_once('../admin/header.php');
echo ("<SCRIPT LANGUAGE='JavaScript'>
		if (localStorage.getItem('cart') === null) {
		  window.location.href='../';
		}
		</SCRIPT>");
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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
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
			<h4 class="mb-3">Domicilio</h4>
			
				<div class="row">
					<div class="col-md-9 mb-3">
						<label for="country"><b>¿Que domicilio quieres recibir tu paquete?</b></label>
						
							<?php
							$sql = "SELECT id_adresses, street, number, cp, state, city FROM adresses WHERE email_user='".$_SESSION['email']."'";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
							    echo '<select class="custom-select d-block w-100" id="country" onchange="adre(event)" required>';
							    echo '<option disabled selected>Escoge el domicilio</option>';
							    while($row = $result->fetch_assoc()) {
							       echo '<option value="'.$row["id_adresses"].'">'.$row["street"].','.$row["number"].','.$row["cp"].','.$row["state"].','.$row["city"].'</option>';
							    }
							    echo '</select><br>';
							    echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Añadir domicilio</button>';
							} else {
								echo '<div class="form-check">';
							    echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Añadir domicilio</button>';
							    echo '</div>';
							}
							?>
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Nuevo Domicilio</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        <form action="../new-address/" method="post">
							        	<input type="hidden" value="2" name="type">
									  <div class="form-row ">
									    <div class="col-7">
									    	<label class="form-check-label" for="exampleRadios1">
											    Calle:
											</label>
									      <input type="text" class="form-control" name="street" required>
									    </div>
									    <div class="col">
									    	<label class="form-check-label" for="exampleRadios1">
											    No ext:
											</label>
									      <input type="text" class="form-control" name="number" required>
									    </div>
									  </div>	
									
									  <div class="form-row">
									    <div class="col-6">
									    	<label class="form-check-label" for="exampleRadios1">
											    Colonia:
											</label>
									      <input type="text" class="form-control" name="colony" required>
									    </div>
									    <div class="col-6">
									    	<label class="form-check-label" for="exampleRadios1">
											    Estado:
											</label>
									      <input type="text" class="form-control" name="state" required>
									    </div>
									  </div>
									
									  <div class="form-row">
									  	
									    <div class="col-8">
									    	<label class="form-check-label" for="exampleRadios1">
											    Ciudad:
											</label>
									      <input type="text" class="form-control" name="city"  required>
									    </div>
									    <div class="col-4">
									    	<label class="form-check-label" for="exampleRadios1">
											    CP:
											</label>
									      <input type="text" class="form-control" name="cp"  required>
									    </div>
									  </div>
									  
									  <div class="form-row">
									    <div class="col-12">
									    	<label class="form-check-label" for="exampleRadios1">
											    Descripcion adicional:
											</label>
									      <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3" placeholder="Descripcion opcional: Numero interior, entre calles, color fachada, etc."></textarea>
									    </div>
									   
									  </div>								
							      </div>
							      <div class="modal-footer">
							        <button type="submit" class="btn btn-primary">Guardar</button>
							        </form>
							      </div>
							    </div>
							  </div>
							</div>
						
						<div class="invalid-feedback">
							Please select a valid country.
						</div>
					</div>
				</div>
				<h4 class="mb-4"></h4>
				<?php
					$sql = "SELECT name, last_name FROM users WHERE email='".$_SESSION['email']."'";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
					// output data of each row
						while($row = $result->fetch_assoc()) {						
							$firstName = $row["name"];
							$lastName = $row["last_name"];
						}
					} 
				?>
				<div id="secondStep">
					<h4 class="mb-3">Pago</h4>
					<label for="country"><b>¿Cual es tu medio de pago favorito?</b></label>
					<div class="d-block my-3">
						<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="colorRadio" value="red" id="radioRed">
						<label class="form-check-label" for="exampleRadios1">
							Credito/Debito
						</label>
						</div>
						<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="colorRadio" value="green" id="radioGreen">
						<label class="form-check-label" for="exampleRadios2">
							Oxxo
						</label>
						</div>
						<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="colorRadio" value="blue" id="radioBlue">
						<label class="form-check-label" for="exampleRadios3">
							Paypal
						</label>
						</div>
					</div>
				</div>
				<div class="red box">
					<form action="pay/" method="POST" name="Form" id="card-form">
					<?php
						echo '<input type="hidden" name="payType" value="1">';
						echo '<input type="hidden" name="amount" value="'.$precioTotal.'">';
						echo '<input type="hidden" name="description" value="'.$carrito.'">';
						echo '<input type="hidden" name="email" value="'.$_SESSION['email'].'">';
						echo '<input type="hidden" name="name" value="'.$firstName.'">';
						echo '<input type="hidden" name="last" value="'.$lastName.'">';
						echo '<input type="hidden" name="number" value="1234567890">';
					?>
					<input id="myAdress1" type="hidden" name="adres" value="">
					<div class="row">
						<div class="col-md-6 mb-3">
							<span class="card-errors btn btn-danger" id="errorAlert"></span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="cc-name">Nombre en tarjeta</label>
							<input class="form-control" type="text" autocomplete="off" data-conekta="card[name]" placeholder="Como aparece en tu tarjeta" required>
							<div class="invalid-feedback">
								Se requiere el nombre en la tarjeta
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="cc-number">Numero de Tarjeta</label>
							<input class="form-control" type="text" autocomplete="off" data-conekta="card[number]" required>
							<div class="invalid-feedback">
								Se requiere el numero en la tarjeta
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 mb-3">
							<label for="cc-expiration">Expiracion</label>
	                        <input type="text" class="form-control" placeholder="Mes" data-conekta="card[exp_month]">
							<div class="invalid-feedback">
								Se requiere la fecha en la tarjeta
							</div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="cc-expiration">&nbsp;</label>
	                        <input type="text" class="form-control" placeholder="Año" data-conekta="card[exp_year]">
							<div class="invalid-feedback">
								Se requiere la fecha en la tarjeta
							</div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="cc-expiration">CVV <button class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" data-html="true" title="3 digitos atras de tu tarjeta"><i class="fas fa-question-circle"></i></button></label>
							<input class="form-control" type="text" autocomplete="off" data-conekta="card[cvc]" required>
							<div class="invalid-feedback">
								Se requiere el CCV en la tarjeta
							</div>
						</div>

					</div>
					<div class="small"><i class="fas fa-user-lock"></i> Tus pagos se realizan de forma segura con encriptación de 256 bits.</div>
					<hr class="mb-4">
					<!--<a class="btn btn-primary btn-lg btn-block text-white" id="pay-button"><i class="fas fa-lock"></i> Pagar</a>
					<button  id="pagando" disabled><i class="fas fa-spinner"></i> Pagando</button>-->
					<button type="submit" class="btn btn-primary btn-lg" id="pagando" disabled><i class="fas fa-spinner fa-spin"></i> Pagando</button>
					<button type="submit" class="btn btn-primary btn-lg" id="pay-button" onclick="paying()"><i class="fas fa-lock"></i> Pagar</button>
				</form>
			</div>
			<div class="green box">
				<img src="../ticket/oxxopay_brand.png" class="mb-3" alt="Cinque Terre">
				<form action="pay/" method="POST" name="Form2" onsubmit="return validateFormB()">
					<?php
					echo '<input type="hidden" name="payType" value="2">';
					echo '<input type="hidden" name="amount" id="amount" value="'.$precioTotal.'">';
					echo '<input type="hidden" name="description" value="'.$carrito.'">';
					echo '<input type="hidden" name="email" value="'.$_SESSION['email'].'">';
					echo '<input type="hidden" name="name" value="'.$firstName.'">';
					echo '<input type="hidden" name="last" value="'.$lastName.'">';
					echo '<input type="hidden" name="number" value="1234567890">';
					?>
					<input id="myAdress2" type="hidden" name="adres" value="">
					<div class="small"><i class="fas fa-user-lock"></i> Tus pagos se realizan de forma segura con encriptación de 256 bits.</div>
					<hr class="mb-4">
					<!--<a class="btn btn-primary btn-lg btn-block" id="pay-button" target="_blank"><i class="fas fa-lock"></i> Generar ticket de Pago</a>-->
					<button type="submit" class="btn btn-primary btn-lg" id="pagandoOxxo"><i class="fas fa-spinner fa-spin"></i> Generando</button>
					<button type="submit" class="btn btn-primary btn-lg" id="pay-button-oxxc" onclick="payingOxxo()"><i class="fas fa-lock"></i> Generar ticket de Pago</button>
				</form>
			</div>
    		<div class="blue box">
				<style>
					.paypal {
						padding-bottom: 40px;
					}
					.paypal button {
						display: inline-block;
						padding: 10px 20px 7px 20px;
						background-color: #FFC439;
						border-radius: 5px;
						border: none;
						cursor: pointer;
						width: 215px;
					}
					.paypal button:hover {
						background-color: #f3bb37;
					}
				</style>
				<form name="frm_customer_detail" action="https://ipnpb.paypal.com/cgi-bin/webscr" method="POST" onsubmit="return validateFormC()">
					<input type='hidden' name='business' value='pedronunez1199@gmail.com'>
					<input type='hidden' name='item_name' value="<?php echo "Orden: ".$carrito;?>"> 
					<input type='hidden' name='item_number' value="<?php echo $carrito;?>">
					<input type='hidden' name='amount' value='<?php echo $precioTotal; ?>'> 
					<input type='hidden' name='currency_code' value='MXN'>
					<input type='hidden' name='notify_url' value='https://tienditacafe.com/check-out/paypal/notify.php'>
					<input type='hidden' name='return' value='https://tienditacafe.com/gracias/'>
					<input type="hidden" name="cancel_return" value="<?php echo "https://tienditacafe.com/vuelveaintentar/?order=".$carrito;?>">
					<input type="hidden" name="cmd" value="_xclick"> 
					<input type="hidden" name="order" value="<?php echo $carrito;?>">
					<input type="hidden" id="myAdress3" name="custom" value="">
					<input type="hidden" name="payer_email" value="<?php echo $_SESSION['email'];?>">
					<div>
						<div class="paypal">
							<button type="submit" class="btn-action" name="continue_payment"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png" border="0" alt="PayPal Logo"></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<footer class="my-5 pt-5 text-muted text-center text-small">
		<p class="mb-1"><i class="fas fa-truck"></i> Envio completamente seguro.</p>
		
	</footer>
</div>


<script type="text/javascript" >
  Conekta.setPublicKey('key_eop46ZMg4dAnCT1qeV9AeTg');


  var conektaSuccessResponseHandler = function(token) {
    var $form = $('form[name="Form"]');
    //Inserta el token_id en la forma para que se envíe al servidor
     $form.append($('<input type="hidden" name="conektaTokenId" id="conektaTokenId">').val(token.id));
    $form.get(0).submit(); //Hace submit
  };
  var conektaErrorResponseHandler = function(response) {
    var $form = $('form[name="Form"]');
	$("#errorAlert").show();
	$("#pay-button").show();
	$("#pagando").hide();
    $form.find(".card-errors").text(response.message_to_purchaser);
    $form.find("button").prop("disabled", false);
  };


  //jQuery para que genere el token después de dar click en submit
  $(function () {
    $('form[name="Form"]').submit(function(event) {
      var $form = $(this);
      // Previene hacer submit más de una vez
      $form.find("button").prop("disabled", true);
      Conekta.Token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
      return false;
    });
  });
</script>
<?php
require_once('../admin/footer.php');
?>
<script>
	//$("#pay-button").hide();
	$("#errorAlert").hide();
	$("#pagando").hide();
	$("#pagandoOxxo").hide();
	$("#secondStep").hide();
	/*document.getElementById("radioRed").disabled=true;
	document.getElementById("radioGreen").disabled=true;
	document.getElementById("radioBlue").disabled=true;*/

	$(document).ready(function(){
		$('input[type="radio"]').click(function(){
			var inputValue = $(this).attr("value");
			var targetBox = $("." + inputValue);
			$(".box").not(targetBox).hide();
			$(targetBox).show();
		});
	});

	function adre(e) {
		document.getElementById("myAdress1").value = e.target.value;
		document.getElementById("myAdress2").value = e.target.value;
		document.getElementById("myAdress3").value = e.target.value;

		$("#secondStep").show();
	}

	function validateFormA(e) {
		e.preventDefault();
		let a = document.forms["Form"]["adres"].value;

		if (a == null || a == "") {
			alert("Necesitas escoger un domicilio");
			return false;
		}
		$("#pay-button").hide();
		$("#pagando").show();
	}

	function paying(){
		$("#pay-button").hide();
		$("#pagando").show();
	}

	function payingOxxo(){
		$("#pay-button-oxxc").hide();
		$("#pagandoOxxo").show();
		
	}

	function validateFormB() {
		var a = document.forms["Form2"]["adres"].value;

		if (a == null || a == "") {
			alert("Necesitas escoger un domicilio");
			return false;
		}
	}


	function validateFormC() {
		var a = document.forms["frm_customer_detail"]["custom"].value;

		if (a == null || a == "") {
			alert("Necesitas escoger un domicilio");
			return false;
		}
	}
</script>
