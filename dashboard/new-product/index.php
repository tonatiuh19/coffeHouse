<?php
require_once('../admin/header.php');
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Nuevo Producto</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
				<!--<a href="new-product/" class="btn btn-sm btn-outline-success"><i class="fas fa-plus-square"></i>Producto</a>--> 
			</div>

		</div>
	</div>
	<form method="post" action="add/">
		<div class="form-group">
			<label for="exampleInputEmail1">Nombre del Producto:</label>
			<input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Cafe de los Alpes" required>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Precio:</label>
			<input type="text" class="form-control" id="exampleInputEmail1" name="price" aria-describedby="emailHelp" placeholder="$850" required>
		</div>
		<div class="form-group">
			<label for="sel1">¿Que tipo de producto es?</label>
			<select class="form-control" id="sel1" name="product_type">
				<?php
				$sql = "SELECT id_product_types, product_type FROM product_types WHERE id_product_types NOT IN ( SELECT id_product_types FROM product_types WHERE id_product_types = 3 )";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
    // output data of each row
					while($row = $result->fetch_assoc()) {
						echo '<option value="'.$row["id_product_types"].'">'.$row["product_type"].'</option>';
					}
				} else {
					echo "0 results";
				}
				?>
				
			</select>
		</div>
		<div class="form-group">
			<label for="exampleFormControlTextarea1">Descripcion corta del producto:</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" name="s_desc" rows="2" placeholder="Cafe elaborado en Suiza con la mas alta calidad." required></textarea>
		</div>
		<div class="form-group">
			<label for="exampleFormControlTextarea1">Descripcion extensa del producto:</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" name="l_desc" rows="5" placeholder="Descripcion detallada, especificaciones, caracteriztifcas, informacion importante, etc." required></textarea>
		</div>
		<div class="form-group">
			<label for="exampleFormControlSelect1">Sabor/Aroma del Cafe:</label>
			<select class="form-control" id="exampleFormControlSelect1" name="sabor" required>
				<?php
					echo '<option value="">None</option>';
					$sqlx = "SELECT id_product_f_sabor_types, value FROM product_f_sabor_types";
					$resultx = $conn->query($sqlx);

					if ($resultx->num_rows > 0) {
					  // output data of each row
					  while($rowx = $resultx->fetch_assoc()) {
					    echo '<option value="'.$rowx["id_product_f_sabor_types"].'">'.$rowx["value"].'</option>';
					  }
					} else {
					  echo "0 results";
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleFormControlSelect1">Cuerpo del Cafe:</label>
			<select class="form-control" id="exampleFormControlSelect1" name="cuerpo" required>
				<?php
					echo '<option value="">None</option>';
					$sqlx = "SELECT id_product_f_cuerpo_types, value FROM product_f_cuerpo_types";
					$resultx = $conn->query($sqlx);

					if ($resultx->num_rows > 0) {
					  // output data of each row
					  while($rowx = $resultx->fetch_assoc()) {
					    echo '<option value="'.$rowx["id_product_f_cuerpo_types"].'">'.$rowx["value"].'</option>';
					  }
					} else {
					  echo "0 results";
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleFormControlSelect1">Acidez del Cafe:</label>
			<select class="form-control" id="exampleFormControlSelect1" name="acidez" required>
				<?php
					echo '<option value="">None</option>';
					$sqlx = "SELECT id_product_f_acidez_types, value FROM product_f_acidez_types";
					$resultx = $conn->query($sqlx);

					if ($resultx->num_rows > 0) {
					  // output data of each row
					  while($rowx = $resultx->fetch_assoc()) {
					    echo '<option value="'.$rowx["id_product_f_acidez_types"].'">'.$rowx["value"].'</option>';
					  }
					} else {
					  echo "0 results";
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="sel1">¿De que lugar es?</label>
			<select class="form-control" id="sel1" name="country">
				<?php
				$sql = "SELECT id_country, country FROM countries WHERE id_country NOT IN ( SELECT id_country FROM countries WHERE id_country=10 OR id_country=1)";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
    // output data of each row
					while($row = $result->fetch_assoc()) {
						echo '<option value="'.$row["id_country"].'">'.$row["country"].'</option>';
					}
				} else {
					echo "0 results";
				}
				
				?>
				
			</select>
		</div>
		<p><small id="emailHelp" class="form-text text-muted">Imagenes pueden ser incluidas una vez el producto exista.</small></p>
		<button type="submit" class="btn btn-primary">Subir</button>
	</form>

</main>
</div>
</div>

