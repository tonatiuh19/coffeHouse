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
				    	echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
										  Añadir Direccion
										</button>';
				    	$sql2 = "SELECT id_adresses, street, number, cp, colony, city, state FROM adresses where email_user="."'".$mail."'"."";
						$result2 = $conn->query($sql2);
						
						if ($result2->num_rows > 0) {
						    while($row2 = $result2->fetch_assoc()) {
						        echo '<div class="col-sm-6"></div>';
						    }
						}
				    	?>
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