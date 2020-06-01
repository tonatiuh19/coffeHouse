<?php
require_once('../admin/header.php');
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('../images/bg_4.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread">¡Recibe Cafe todos los meses!</h1>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="card-deck mb-3 text-center">
			<div class="card mb-4 shadow-sm">
				<div class="card-header">
					<h4 class="my-0 font-weight-normal nuevaFont">Barista</h4>
				</div>
				<div class="card-body d-flex flex-column">
					<h1 class="card-title pricing-card-title">$199 <small class="text-muted"></small></h1>
					<ul class="list-unstyled mt-3 mb-4">
						<li><i class="fas fa-truck"></i> Envio gratis</li>
						<li><i class="fas fa-shopping-bag"></i> Bolsa de cafe</li>
						<li><i class="fas fa-gift"></i> Regalo especial</li>
					</ul>
					<button type="button" class="btn btn-lg btn-block btn-primary mt-auto" data-toggle="modal" data-target="#barista">
						Suscribete
					</button>
					<!-- Modal -->
					<div class="modal fade" id="barista" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-body">
									<div class="container">
										<style>
										    .box{
									            display: none;
									        }
										</style>
										<div class="row">
											<div class="col-md-4 order-md-2 mb-4">
												<h4 class="d-flex justify-content-between align-items-center mb-3">
													<span class="text-muted nuevaFont"><i class="fas fa-mug-hot"></i> Barista</span>

												</h4>
												<ul class="list-group mb-3">
													<li class="list-group-item d-flex justify-content-between lh-condensed">
														<div>
															<i class="fas fa-arrow-alt-circle-right"></i> Envio gratis
															
														</div>
														
													</li>
													<li class="list-group-item d-flex justify-content-between lh-condensed">
														<div>
															<i class="fas fa-arrow-alt-circle-right"></i> Bolsa de cafe
															
														</div>
														
													</li>
													<li class="list-group-item d-flex justify-content-between lh-condensed">
														<div>
															<i class="fas fa-arrow-alt-circle-right"></i> Regalo especial
															
														</div>

													</li>
													
													<li class="list-group-item d-flex justify-content-between">
														<span>Total:</span>
														<strong>$199.00</strong>
													</li>
												</ul>

												
											</div>
											<div class="col-md-8 order-md-1">
												
												<?php
												if (!(isset($_SESSION['email']))){
													echo '<div class="row h-100 justify-content-center align-items-center my-3"><a class="btn btn-primary btn-lg w-100" href="../sign-in/" role="button">Inicia Sesion</a>
													</div>';
												}else{
													echo '<h4 class="mb-3">Domicilio</h4>';
													$sql = "SELECT id_adresses, street, number, cp, state, city FROM adresses WHERE email_user='".$_SESSION['email']."'";
													$result = $conn->query($sql);

													if ($result->num_rows > 0) {
													    echo '<select class="custom-select d-block w-100" id="country" onchange="adre(event)" required>';
													    echo '<option disabled selected>Escoge el domicilio</option>';
													    while($row = $result->fetch_assoc()) {
													       echo '<option value="'.$row["id_adresses"].'">'.$row["street"].','.$row["number"].','.$row["cp"].','.$row["state"].','.$row["city"].'</option>';
													    }
													    echo '</select><br>';
													    echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Añadir domicilio</button><p></p>';
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
													        	<input type="hidden" value="3" name="type">
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
													<h4 class="mb-3">¿Cual es tu medio de pago favorito?</h4>
													<hr class="mb-4">

													<div class="d-block my-3">
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="colorRadio" value="red">
															<label class="form-check-label" for="exampleRadios1">
																Credito/Debito
															</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="colorRadio" value="blue">
															<label class="form-check-label" for="exampleRadios3">
																Paypal
															</label>
														</div>
													</div>
													<hr class="mb-4">
													<div class="red box">
													<form action="pay/" method="POST" name="Form" id="payment-form" onsubmit="return validateFormA()">
													<input type="hidden" name="token_id" id="token_id">
													<?php
														echo '<input type="hidden" name="payType" value="1">';
														echo '<input type="hidden" name="amount" id="amount" value="199">';
														echo '<input type="hidden" name="description" id="description" value="">';
														echo '<input type="hidden" name="email" value="'.$_SESSION['email'].'">';
														echo '<input type="hidden" name="name" value="Pero">';
														echo '<input type="hidden" name="last" value="Gato">';
														echo '<input type="hidden" name="number" value="1234567890">';
													?>
													<input id="myAdress1" type="hidden" name="adres" value="">
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
															<label for="cc-expiration">CVV <button class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" data-html="true" title="3 digitos atras de tu tarjeta"><i class="fas fa-question-circle"></i></button></label>
															<input class="form-control" type="text" autocomplete="off" data-openpay-card="cvv2" required>
															<div class="invalid-feedback">
																Security code required
															</div>
														</div>

													</div>
													<div class="small"><i class="fas fa-user-lock"></i> Tus pagos se realizan de forma segura con encriptación de 256 bits.</div>
													<hr class="mb-4">
													<a class="btn btn-primary btn-lg btn-block text-white" id="pay-button"><i class="fas fa-lock"></i> Suscribirme</a>
												</form>
													</div>
													<div class="blue box">You have selected <strong>blue radio button</strong> so i am here</div>
													<?php
												}

												?>

											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card mb-4 shadow-sm">
				<div class="card-header">
					<h4 class="my-0 font-weight-normal nuevaFont">Barista Pro</h4>
				</div>
				<div class="card-body d-flex flex-column">
					<h1 class="card-title pricing-card-title">$299 <small class="text-muted"></small></h1>
					<ul class="list-unstyled mt-3 mb-4">
						<li><i class="fas fa-truck"></i> Envio gratis</li>
						<li><i class="fas fa-shopping-bag"></i> 2 Bolsas de cafe</li>
						<li><i class="fas fa-gifts"></i> Regalos especiales</li>
						<li><i class="fas fa-gift"></i> Secretos exclusivos Barista</li>
					</ul>
					<button type="button" class="btn btn-lg btn-block btn-primary mt-auto" data-toggle="modal" data-target="#baristapro">
						Suscribete
					</button>
					<!-- Modal -->
					<div class="modal fade" id="baristapro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header text-center nuevaFont">
									<h5 class="modal-title" id="baristapro">Barista Pro</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									...
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Save changes</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card mb-4 shadow-sm">
				<div class="card-header">
					<h4 class="my-0 font-weight-normal nuevaFont">Barista Dios</h4>
				</div>
				<div class="card-body d-flex flex-column">
					<h1 class="card-title pricing-card-title">$399 <small class="text-muted"></small></h1>
					<ul class="list-unstyled mt-3 mb-4">
						<li><i class="fas fa-truck"></i> Envio gratis</li>
						<li><i class="fas fa-shopping-bag"></i> 4 Bolsas de cafe</li>
						<li><i class="fas fa-gifts"></i> Regalos especiales</li>
						<li><i class="fas fa-gift"></i> Secretos exclusivos Barista</li>
						<li><i class="fas fa-gift"></i> Cupones para toda la tienda</li>
					</ul>
					<button type="button" class="btn btn-lg btn-block btn-primary mt-auto" data-toggle="modal" data-target="#baristadios">
						Suscribete
					</button>
					<!-- Modal -->
					<div class="modal fade" id="baristadios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header text-center nuevaFont">
									<h5 class="modal-title" id="exampleModalLabel">Barista Dios</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									...
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Save changes</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


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
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="modal-wizard.js"></script>
<script>
  $('#myModal').modalSteps();
</script>
<script>
	function adre(e) {
		document.getElementById("myAdress1").value = e.target.value
	}

	function validateFormA() {
		var a = document.forms["Form"]["adres"].value;

		if (a == null || a == "") {
			alert("Necesitas escoger un domicilio");
			return false;
		}
	}

	
</script>