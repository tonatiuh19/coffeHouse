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
													<form class="needs-validation" novalidate>
														<div class="row">
															<div class="col-md-6 mb-3">
																<label for="cc-name">Name on card</label>
																<input type="text" class="form-control" id="cc-name" placeholder="" required>
																<small class="text-muted">Full name as displayed on card</small>
																<div class="invalid-feedback">
																	Name on card is required
																</div>
															</div>
															<div class="col-md-6 mb-3">
																<label for="cc-number">Credit card number</label>
																<input type="text" class="form-control" id="cc-number" placeholder="" required>
																<div class="invalid-feedback">
																	Credit card number is required
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-3 mb-3">
																<label for="cc-expiration">Expiration</label>
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
														<button type="submit" class="btn btn-primary btn-lg btn-block">Suscribirme</button>
													</form>
												</div>
												<div class="blue box">You have selected <strong>blue radio button</strong> so i am here</div>
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