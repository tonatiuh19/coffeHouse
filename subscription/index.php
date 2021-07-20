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
				<h1 class="mb-2 bread">Mis Suscripciones</h1>
			</div>
		</div>
	</div>
</section>
<link rel="stylesheet" href="css/profile.css">
<section class="ftco-section bg-light">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
		<?php
		$sql = "SELECT a.id_subscriptions, a.id_adresss, a.start_date, a.active, a.type, a.subs_id, b.street, b.number, b.cp, b.colony, b.city, c.conekta_id 
		FROM subscriptions as a 
		INNER JOIN adresses as b on b.id_adresses=a.id_adresss 
        INNER JOIN users as c on c.email=a.user_email
		WHERE a.user_email='".$_SESSION['email']."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  echo '<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Direccion</th>
		      <th scope="col">Dia de envio por Mes</th>
		      <th scope="col">Status</th>
		      <th scope="col">Tipo</th>
		    </tr>
		  </thead>
		  <tbody>';
		  while($row = $result->fetch_assoc()) {
		    echo '<tr>
		     
		      <td>'.$row["street"].' '.$row["number"].'<br>'.$row["colony"].',CP: '.$row["cp"].'<br>'.$row["city"].'</td>
		      <td>'.date_format( new DateTime($row['start_date']), 'd' ).'</td>
		      <td>';
		      if ($row["active"]=="1") {
		      	echo '<button type="button" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Activa</button>';
				echo '<button type="button" class="btn btn-danger btn-sm ml-1" data-toggle="modal" data-target="#cancelSub'.$row["id_subscriptions"].'"><i class="fas fa-window-close"></i></button>';

				echo '<div class="modal fade" id="cancelSub'.$row["id_subscriptions"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
				  <div class="modal-content">
				  	<form action="../subscription/cancel/" method="post">
					  <input type="hidden" value="'.$row["id_subscriptions"].'" name="id_subscriptions">
					  <input type="hidden" value="'.$row["conekta_id"].'" name="conekta_id">
					  <input type="hidden" value="3" name="type">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">¿Estas seguro de querer cancelar?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Me equivoque</button>
							<button type="submit" class="btn btn-danger">Cancelar</button>
						</div>
					</form>
				  </div>
				</div>
			  </div>';
		      }else if($row["active"]=="2"){
				echo '<span class="btn btn-warning btn-sm">Cancelado <i class="far fa-sad-tear"></i></span>';
			  }
			  else{
		      	echo '<button type="button" class="btn btn-warning btn-sm"><i class="fas fa-exclamation-circle"></i> Pendiente de pago</button>';
		      }
		      echo '</td>
		      <td>';
		      if ($row["type"]=="1") {
		      	echo '<button type="button" class="btn btn-success btn-sm"><i class="fas fa-mug-hot"></i> Barista</button>';
		      }elseif ($row["type"]=="2") {
		      	echo '<button type="button" class="btn btn-success btn-sm"><i class="fas fa-mug-hot"></i> Barista Pro</button>';
		      }elseif ($row["type"]=="3") {
		      	echo '<button type="button" class="btn btn-success btn-sm"><i class="fas fa-mug-hot"></i> Barista Dios</button>';
		      }
		      echo'</td>
		    </tr>';
		  }
		  echo '</tbody>
		</table>';
		} else {
		  echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Para ver tus suscripciones, necesitas primero tener una ;)')
			window.location.href='../suscribete/';
			</SCRIPT>");
		}
		$conn->close();
		?>
		</div>
    </div>
    
</div>
<div class="container h-100">
  <div class="row h-100 justify-content-center align-items-center">
    <i class="fas fa-truck"></i>&nbsp;El ID de seguimiento de cada uno de tus envios mensuales los podras vizualizar <a href="../orders/" role="button">&nbsp;aqui</a>.
  </div>
</div>
</section>
<?php
require_once('../admin/footer.php');
?>