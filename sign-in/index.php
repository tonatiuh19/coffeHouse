<?php
require_once('../admin/header.php');
if (isset($_SESSION['email'])){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href='../profile/';
    </SCRIPT>");
}
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('../images/bg_4.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Inicia Sesion</h1>
          </div>
        </div>
      </div>
    </section>
<link rel="stylesheet" href="css/signin.css">
<section class="ftco-section bg-light">
	<form class="form-signin" method="post" action="log-in/">
		
		<h1 class="h3 mb-3 font-weight-normal">Inicia Sesion</h1>
		<label for="inputEmail" class="sr-only">Correo Electronico</label>
		<input type="email" id="inputEmail" class="form-control" name="email_i" placeholder="Correo Electronico" required autofocus>
		<label for="inputPassword" class="sr-only">Contraseña</label>
		<input type="password" id="inputPassword" class="form-control" name="pwd_i" placeholder="Contraseña" required>
		<div class="checkbox mb-3">
			<a href="../forgot/">¿Olvidaste tu contraseña?</a>
		</div>
		
		<button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesion</button>
		<p class="mt-5 mb-3 text-muted">¿No tienes cuenta? <a data-toggle="modal" href="#sign-up">Registrate</a>.</p>
	</form>
</section>

<div class="modal fade" id="sign-up" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Bienvenido</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="new-user/">
					<div class="form-group">
						<input type="email" class="form-control" id="exampleInputEmail1" name="email_f" aria-describedby="emailHelp" placeholder="Correo Electronico" required>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="exampleInputPassword1" name="pwd_f" placeholder="Contraseña" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="exampleInputPassword1" name="first_n" placeholder="Nombre" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="exampleInputPassword1" name="last_n" placeholder="Apellido" required>
					</div>
					<!--<div class="form-check">
						<input type="checkbox" class="form-check-input" name="im_busi" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1"><small>Soy Negocio</small></label>
					</div>-->
					<small id="emailHelp" class="form-text text-muted text-center">Al registrarme acepto los <a href="../terminosycondiciones/" target="_blank">Términos y Condiciones</a> y <a href="../politicasdeprivacidad" target="_blank">Políticas de Privacidad</a><!-- y <a href="#">Términos de Promociones</a>  --> de TienditaCafe.</a></small>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Crear mi cuenta</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
require_once('../admin/footer.php');
?>