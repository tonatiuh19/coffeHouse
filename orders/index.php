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
				<h1 class="mb-2 bread">Mis Pedidos</h1>
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
		$sql = "SELECT a.id_orders, a.id_adress, a.date, a.complete, b.street, b.number, b.cp, b.colony, b.city, a.track_id FROM orders as a INNER JOIN adresses as b on b.id_adresses=a.id_adress WHERE a.complete <> '0' AND a.email_user='".$_SESSION['email']."' ORDER by a.date DESC";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  echo '<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Pedido</th>
		      <th scope="col">Direccion</th>
		      <th scope="col">Fecha</th>
		      <th scope="col">Status</th>
		      <th scope="col">ID de seguimiento</th>
		      <th scope="col">Factura</th>
		    </tr>
		  </thead>
		  <tbody>';
		  while($row = $result->fetch_assoc()) {
		    echo '<tr>
		      <th scope="row">'.$row["id_orders"].'</th>
		      <td>'.$row["street"].' '.$row["number"].'<br>'.$row["colony"].',CP: '.$row["cp"].'<br>'.$row["city"].'</td>
		      <td>'.$row["date"].'</td>
		      <td>';
		      if ($row["complete"]=="1") {
		      	echo '<button type="button" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Pagado</button>';
		      }elseif ($row["complete"]=="2") {
		      	echo '<button type="button" class="btn btn-warning btn-sm"><i class="fas fa-exclamation-circle"></i> Pendiente de pago</button>';
		      }
		      echo '</td>
		      <td>';
		      if ($row["track_id"]=='' && $row["complete"]=="1") {
		      	echo '<button type="button" class="btn btn-success btn-sm"><i class="fas fa-gift"></i> Empaquetando</button>';
		      }else{
		      	echo $row["track_id"];
		      }
		      echo'</td>';
		      if ($row["complete"]=="1") {
		      	$sqlu = "SELECT complete FROM invoices WHERE id_orders=".$row["id_orders"]."";
				$resultu = $conn->query($sqlu);

				if ($resultu->num_rows > 0) {
				  // output data of each row
				  while($rowu = $resultu->fetch_assoc()) {
				    if ($rowu["complete"]=="1") {
				    	echo '<td><button type="button" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Factura entregada</button></td>';
				    }else{
				    	echo '<td><button type="button" class="btn btn-success btn-sm"><i class="fas fa-hourglass-half"></i> En proceso</button></td>';
				    }
				  }
				} else {
				  echo '<td><!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#factura'.$row["id_orders"].'">
					  Solicitar
					</button>

					<!-- Modal -->
					<div class="modal fade" id="factura'.$row["id_orders"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Pedido #'.$row["id_orders"].'</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <form action="request_invoice/" method="post">
							  <div class="form-group">
							    <label for="exampleInputEmail1">RFC:</label>
							    <input type="text" class="form-control" name="rfc" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Razón Social o Nombre:</label>
							    <input type="text" class="form-control" name="razon" id="exampleInputPassword1" placeholder="" required>
							    <input type="hidden" class="form-control" name="email" id="exampleInputPassword1" value="'.$_SESSION['email'].'">
							    <input type="hidden" class="form-control" name="order" id="exampleInputPassword1" value="'.$row["id_orders"].'">
							  </div>
					      </div>
					      <div class="modal-footer">
					        <button type="submit" class="btn btn-primary">Enviar</button>
					        </form>
					      </div>
					    </div>
					  </div>
					</div>
					</td>';
				}
		      }
		    echo '</tr>';
		  }
		  echo '</tbody>
		</table>';
		} else {
		  echo "0 results";
		}
		$conn->close();
		?>
		</div>
    </div>
    
</div>

</section>
<?php
require_once('../admin/footer.php');
?>