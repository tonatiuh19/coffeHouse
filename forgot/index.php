<?php
require_once('../admin/header.php');
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('../images/bg_4.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread">Olvidé mi contraseña</h1>
			</div>
		</div>
	</div>
</section>
<section class="ftco-section bg-light">
<div class="container">
    <div class="row">
        <div class="col-sm-12" style="width:100px;">
        	<form action="../validate/" method="post">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Ingresa tu correo electronico con el que te registraste:</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" name="email_f" aria-describedby="emailHelp" placeholder="correo@dominio.com" required>
			  
			  </div>
			  
			  <button type="submit" class="btn btn-primary">Continuar</button>
			</form>
        </div>
    </div>
</div>
</section>

<?php
require_once('../admin/footer.php');
?>