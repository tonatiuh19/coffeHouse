<?php
require_once('../admin/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$mail_i = test_input($_POST["email"]);
	$x = test_input($_POST["code"]);
	$x_to = test_input($_POST["code_to"]);

	if ($x!=$x_to) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('El codigo no coincide. Intenta de nuevo.')
			window.location.href='../forgot/';
			</SCRIPT>");
	}
	

}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.location.href='../';
		</SCRIPT>");
}


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

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
			<div class="col-sm-12 h-100 d-inline-block">
				<form action="update/" method="POST" onsubmit="return myFunction()">
					<div class="form-group">
						<label for="exampleInputEmail1">Actualizar contraseña:</label>
						<input type="password" class="form-control" id="pass1" name="pwd_1" placeholder="Contraseña">
						</small>
					</div>
					<div class="form-group">
						<?php
						 echo '<input type="hidden" name="email" value="'.$mail_i.'" >';						
						?>
						<input type="password" class="form-control" id="pass2" name="pwd_2" placeholder="Vuelve a escribir la contraseña" required>
					</div>
					
					<button type="submit" class="btn btn-primary">Guardar</button>
				</form>
			</div>
		</div>
	</div>
</section>

<?php
require_once('../admin/footer.php');
?>
<script type="text/javascript">
	function myFunction() {
	    var pass1 = document.getElementById("pass1").value;
	    var pass2 = document.getElementById("pass2").value;
	    var ok = true;
	    if (pass1 != pass2) {
	        //alert("Passwords Do not match");
	        document.getElementById("pass1").style.borderColor = "#E34234";
	        document.getElementById("pass2").style.borderColor = "#E34234";
	        alert("Las contraseñas no coinciden");
	        return false;
	    }
	    return ok;
	}
</script>