<?php
require_once('../admin/header.php');
if (!isset($_SESSION['email'])){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.location.href='../';
		</SCRIPT>");
}
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('../images/bg_4.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread">Mi Perfil</h1>
			</div>
		</div>
	</div>
</section>
<link rel="stylesheet" href="css/profile.css">
<section class="ftco-section bg-light">
	<div class="container sectionando">
		<div class="row">
			<?php
			$mail = $_SESSION['email'];
			$sql = "SELECT name, last_name FROM users where email="."'".$mail."'"."";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
				while($row = $result->fetch_assoc()) {
					echo '<div class="col-sm-12"><h1>¡Hola <b>'.$row["name"].' '.$row["last_name"].'</b>!<h1></div>';
				}
			} else {
				echo "0 results";
			}
			?>

			<div class="col-sm-12"><h2>Mis direcciones:</h2></div>
			<div class="col-sm-12">
				<div class="container">
					<div class="row">
						<?php
						echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						Añadir Direccion
						</button>';
						$sql2 = "SELECT id_adresses, street, number, cp, colony, city, state FROM adresses where email_user='".$mail."'";
						$result2 = $conn->query($sql2);
						
						if ($result2->num_rows > 0) {
							echo '<select class="custom-select d-block w-100" id="country" onchange="adre(event)" required>';
							    echo '<option disabled selected>Escoge el domicilio</option>';
							    while($row2 = $result2->fetch_assoc()) {
							       echo '<option value="'.$row2["id_adresses"].'">'.$row2["street"].','.$row2["number"].','.$row2["cp"].','.$row2["state"].','.$row2["city"].'</option>';
							    }
							    echo '</select><br>';
						}
						?>
					</div>
				</div>
			</div>
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
								<input type="hidden" value="1" name="type">
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
		</div>
	</div>
</section>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Nueva direccion</h5>
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
<?php
require_once('../admin/footer.php');
?>