<?php
require_once('../admin/header.php');
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Nueva Campaña</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
				<!--<a href="new-product/" class="btn btn-sm btn-outline-success"><i class="fas fa-plus-square"></i>Producto</a>--> 
			</div>

		</div>
	</div>
	<form method="post" action="add/">
		<div class="form-group">
			<label for="exampleInputEmail1">Nombre de la campaña:</label>
			<input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Especial del Cafe Invierno" required>
			<input type="hidden" name="product_type" value="3">
			<input type="hidden" name="country" value="10">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Precio:</label>
			<input type="text" class="form-control" id="exampleInputEmail1" name="price" aria-describedby="emailHelp" placeholder="$850" required>
		</div>
		<div class="form-group">
			<label for="exampleFormControlTextarea1">Descripcion corta de la campaña:</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" name="s_desc" rows="2" placeholder="Cafe elaborado en Suiza con la mas alta calidad." required></textarea>
		</div>
		<div class="form-group">
			<label for="exampleFormControlTextarea1">Descripcion extensa de la campaña:</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" name="l_desc" rows="5" placeholder="Descripcion detallada, especificaciones, caracteriztifcas, informacion importante, etc." required></textarea>
		</div>
		
		<p><small id="emailHelp" class="form-text text-muted">Imagenes y productos pueden ser incluidos una vez la campaña exista.</small></p>
		<button type="submit" class="btn btn-primary">Subir</button>
	</form>

</main>
</div>
</div>

