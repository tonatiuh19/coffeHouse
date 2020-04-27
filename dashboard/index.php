<?php
session_start();
require_once('../admin/cn.php');
if ($_SESSION["type_user"] != 3){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href='../';
    </SCRIPT>");
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="css/dashboard.css">
<link href="../../css/fontawesome/css/all.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
	<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><img src="../../images/logo.png" width="62" ></a>
	<ul class="navbar-nav px-3">
		<li class="nav-item text-nowrap">
			<a class="nav-link" href="../../sign-in/fin.php">Cerrar sesion</a>
		</li>
	</ul>
</nav>

<div class="container-fluid">
	<div class="row">
		<nav class="col-md-2 d-none d-md-block bg-light sidebar">
			<div class="sidebar-sticky">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link" href="#">
							<span data-feather="home"></span>
							Productos <span class="sr-only"></span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
							<span data-feather="file"></span>
							Campañas
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
							<span data-feather="shopping-cart"></span>
							Usuarios
						</a>
					</li>
				</ul>
			</div>
		</nav>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Productos</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
				<a href="new-product/" class="btn btn-sm btn-outline-success"><i class="fas fa-plus-square"></i> Producto</a>
			</div>

		</div>
	</div>

	<?php
	$sql = "SELECT id_products, name, description, id_product_type, id_country, active, long_description FROM products";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    echo '<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">Nombre</th>
			      <th scope="col">Descripcion</th>
			      <th scope="col">Descripcion extensa</th>
			      <th scope="col">Status</th>
			      <th scope="col">Suspender/Activar</th>
			      <th scope="col">Editar</th>
			    </tr>
			  </thead>
			  <tbody>';
		while($row = $result->fetch_assoc()) {
			echo '<tr>
			      <th scope="row">'.$row["id_products"].'</th>
			      <td>'.$row["name"].'</td>
			      <td>'.substr($row["description"],0,12)."...".'</td>
			      <td>'.substr($row["long_description"],0,12)."...".'</td>';
			      if ($row["active"]==1) {
			      	echo '<td><i class="fas fa-check-circle text-success"></i></td>';
			      	echo '<td><form action="activate/" method="post">
								<input type="hidden" name="act" value="'.$row["active"].'">
								<input type="hidden" name="id" value="'.$row["id_products"].'">
								<button type="submit" class="btn btn-danger"><i class="fas fa-times-circle"></i></button>
							</form></td>';
			      }else{
			      	echo '<td><i class="fas fa-times-circle text-danger"></i></td>';
			      	echo '<td><form action="activate/" method="post">
								<input type="hidden" name="act" value="'.$row["active"].'">
								<input type="hidden" name="id" value="'.$row["id_products"].'">
								<button class="btn btn-success" type="submit"><i class="fas fa-check-circle"></i></button>
							</form></td>';
			      }
			      echo '<td><form action="edit/" method="post">
								<input type="hidden" name="id" value="'.$row["id_products"].'">
								<button class="btn btn-primary"><i class="fas fa-edit"></i></button>
							</form></td>';
			    echo '</tr>';
		}
	echo '</tbody>
		</table>';
	} else {
		echo "0 results";
	}
	$conn->close();
	?>

</main>
</div>
</div>

