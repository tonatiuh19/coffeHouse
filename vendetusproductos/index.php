<?php
require_once('../admin/header.php');
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('../images/bg_4.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread">Incrementa tus ventas</h1>
			</div>
		</div>
	</div>
</section>
<section class="ftco-section ">
	<div class="container">
		<div class="row text-center p-5">
			<div class="col-sm-12"><h4>¿Ya tienes cuenta?</h4></div>
			<div class="col-sm-12"><a class="btn btn-primary" href="../proveedores/">Ingresa al portal</a></div>
		</div>
		<div class="row">
			<div class="col-sm-12"><h4><i class="far fa-hand-point-right"></i> ¿Te gustaria vender tus productos con nosotros? Registrate aqui:</h4></div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<p>
					<form method="post" action="new-supplier/">
						<div class="form-group">
							<input type="email" class="form-control" id="exampleInputEmail1" name="email_f" aria-describedby="emailHelp" placeholder="Correo Electronico" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="exampleInputPassword1" name="first_n" placeholder="Nombre" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="exampleInputPassword1" name="last_n" placeholder="Apellido" required>
						</div>
						<div class="form-group">
							<label for="exampleFormControlTextarea1"></label>
							<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Describe brevemenete que productos te gustaria mostrar con nosotros :)" name="txt" required></textarea>
						</div>
					<!--<div class="form-check">
						<input type="checkbox" class="form-check-input" name="im_busi" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1"><small>Soy Negocio</small></label>
					</div>-->
					<small id="emailHelp" class="form-text text-muted text-center">Al registrarme acepto los <a href="../terminosycondiciones/" target="_blank">Términos y Condiciones</a> y <a href="../politicasdeprivacidad" target="_blank">Políticas de Privacidad</a><!-- y <a href="#">Términos de Promociones</a>  --> de TienditaCafe.</a></small>


					<button type="submit" class="btn btn-primary">Enviar</button>
				</form>
			</p>
		</div>
	</div>
</div>
</section>
<?php
require_once('../admin/footer.php');
?>