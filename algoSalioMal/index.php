<?php
// define variables and set to empty values
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../admin/mailer/src/Exception.php';
require '../admin/mailer/src/PHPMailer.php';
require '../admin/mailer/src/SMTP.php';
require_once('../admin/header.php');
if (true) {
	?>
	<section class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.5" style="background-image: url('../images/bg_4.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<?php
					//$status=1;
					echo '<h1 class="mb-2 bread">Tu pago ha sido declinado</h1>';
					?>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-section">
		<div class="container">
		    <div class="row">
		        <div class="col-sm-12">
		        	<div class="">
		        		<?php
		        		echo '<h1 class="display-4"><i class="fas fa-times-circle fa-2x text-danger"></i> Tu pago no fue procesado</h1>
                        <p class="lead">Intenta con otro medio de pago o prueba de nuevo.</p>
                        <hr class="my-4">
                        <p>¿Tienes más preguntas?
                          Visita nuestro Centro de ayuda</p>
                        <p>
                        <p class="lead">
                          <a class="btn btn-primary btn-lg" href="#" role="button">Regresar</a>
                        </p>';
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

require_once('../admin/footer.php');
?>
