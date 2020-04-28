<?php
// define variables and set to empty values
session_start();
require_once('../admin/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = test_input($_POST["id"]);

	/*$sql = "SELECT a.id_products, a.name, a.description, a.long_description, a.id_country, a.id_product_type, b.country, c.product_type FROM products as a INNER JOIN countries as b on b.id_country=a.id_country INNER JOIN product_types as c on c.id_product_types=a.id_product_type WHERE a.id_products=".$id."";*/
	$sql = "SELECT d.id_products, e.price, d.name, d.description, d.id_product_type, d.id_country, d.active, d.long_description, m.country, n.product_type FROM products as d INNER JOIN (SELECT a.id_prices, a.id_products, a.price FROM prices AS a WHERE date = ( SELECT MAX(date) FROM prices AS b WHERE a.id_products = b.id_products )) as e on d.id_products=e.id_products INNER JOIN countries as m on m.id_country=d.id_country INNER JOIN product_types as n on n.id_product_types=d.id_product_type WHERE d.id_products=".$id."";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo '	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
						<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
							<h1 class="h2">Editar '.$row["name"].'</h1>
							<div class="btn-toolbar mb-2 mb-md-0">
								<div class="btn-group mr-2">
								</div>
							</div>
						</div>';?>
							<style type="text/css">
									hr.style5 {
										background-color: #fff;
										border-top: 2px dashed #8c8b8b;
									}
									.upload-button {
							    padding: 4px;
							    border: 1px solid black;
							    border-radius: 5px;
							    display: block;
							    float: left;
							}

							.profile-pic {
							    max-width: 200px;
							    max-height: 200px;
							    display: block;
							}

							.file-upload {
							    display: none;
							}
							#logout_sidebar_button {
							    position: absolute;
							    display: inline-block;
							    bottom: 0;
							    left: 15px;
							}

							#csvfile {
							  display: none;
							}
								</style>
						<script src="js/principal_image.js"></script>

						<div class="container">
						    <div class="row">
						        <div class="col-sm-6">
						        	<?php
						        	if ($row["id_product_type"]==3) {
						        		echo '<h5>Foto principal de la campaña</h5>';
						        	}else{
						        		echo '<h5>Foto principal de producto</h5>';
						        	}
						        	?>
													<form action="file_image.php" method="post" enctype="multipart/form-data">
														<div class="form-group">
															<input type="hidden" name="folderId" value="<?php echo $row["id_products"]; ?>" id="exampleFormControlFile1">

															<!--<label for="exampleFormControlFile1">Portfolio:</label>-->
															<?php

															$folder_path = "../user/".$row["id_products"]."/profile/";
															if (!file_exists($folder_path)) {
																echo '<img class="profile-pic" src="../user/product.png" height="80" width="80"/><br>
																<div class="upload-button btn btn-info btn-sm" id="firstbtn">Actualizar imagen</div>
																<input class="file-upload" id="filename" name="fileToUpload" type="file" accept="image/*"/>';
															}else{
																foreach(glob('../user/'.$row["id_products"].'/profile/*.{jpg,png}', GLOB_BRACE) as $file) {
																	if (preg_match('/(\.jpg|\.png|\.bmp)$/', $file)) {
																		echo '<img class="profile-pic" src="'.$file.'" height="80" width="80"/><br>';
																	}
																}
																echo '
																<div class="upload-button btn btn-info btn-sm" id="firstbtn">Actualizar imagen</div>
																<input class="file-upload" id="filename" name="fileToUpload" type="file" accept="image/*"/>';
															}
															 ?>

														</div>
														<button type="submit" id="csvfile" class="btn btn-success">Actualizar</button>
													</form>
						        </div>
						        <div class="col-sm-6">
						        	<h5>Galeria de imagenes</h5>
															<?php
															echo '<table class="table">

																			<tbody>';
															foreach(glob('../user/'.$row["id_products"].'/*.{jpg,pdf,png}', GLOB_BRACE) as $file) {

																if (preg_match('/(\.jpg|\.png|\.bmp)$/', $file)) {
																	echo '<tr>
																					<td>';
																					echo '<a class="btn btn-light" href="'.$file.'" target="_blank" role="button"><i class="far fa-file-image"></i> '.substr($file, strrpos($file, '/') + 1).'</a><br>';
																					echo '</td>';
																					//echo '<td><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>';
																					echo "<td><form action=\"delete.php\"  method=\"post\">\n";
																					echo "  <input type=\"hidden\"  name=\"file\" value=\"".$file."\">\n";
																					echo "  <input type=\"hidden\"  name=\"folderId\" value=\"".$row["id_products"]."\">\n";
																					echo '<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>';
																					echo "</form></td>\n";
																				echo '</tr>';
																}

															}
															echo '</tbody>
																	</table>';

															 ?>
													<form action="file.php" method="post" enctype="multipart/form-data">
														<div class="form-group">
															<input type="hidden" name="folderId" value="<?php echo $row["id_products"]; ?>" id="exampleFormControlFile1">
														</div><br>
														<input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload"><br>
														<button type="submit" class="btn btn-success">Actualizar</button>
													</form>
						        </div>
						    </div>
						</div><p></p>
						<?php echo '<form method="post" action="../update/">
							<div class="form-group">';
								if ($row["id_product_type"]==3) {
									echo '<label for="exampleInputEmail1">Nombre de la Campaña:</label>';
								}else{
									echo '<label for="exampleInputEmail1">Nombre del Producto:</label>';
								}
								echo '<input type="hidden" name="id" value="'.$row["id_products"].'" >
								<input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="'.$row["name"].'" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Precio:</label>
								<input type="text" class="form-control" id="exampleInputEmail1" name="price" aria-describedby="emailHelp" value="'.$row["price"].'" required>
							</div>';
							if ($row["id_product_type"]!=3) {
								echo '<div class="form-group">
									<label for="sel1">¿Que tipo de producto es?</label>
									<select class="form-control" id="sel1" name="product_type">';
									$sql2 = "SELECT id_product_types, product_type FROM product_types WHERE id_product_types NOT IN ( SELECT id_product_types FROM product_types WHERE id_product_types = 3 )";
									$result2 = $conn->query($sql2);

									if ($result2->num_rows > 0) {
					    // output data of each row
										while($row2 = $result2->fetch_assoc()) {
											if ($row2["id_product_types"]==$row["id_product_types"]) {
												echo '<option value="'.$row2["id_product_types"].'" selected>'.$row2["product_type"].'</option>';
											}else{
												echo '<option value="'.$row2["id_product_types"].'">'.$row2["product_type"].'</option>';
											}
										}
									} else {
										echo "0 results";
									}
									echo '</select>
								</div>';
							}else{
								echo '<input type="hidden" name="product_type" value="3">';
							}
							echo '<div class="form-group">';
								if ($row["id_product_type"]!=3) {
									echo '<label for="exampleFormControlTextarea1">Descripcion corta del producto:</label>';
								}else{
									echo '<label for="exampleFormControlTextarea1">Descripcion corta de la campaña:</label>';
								}
								echo '<textarea class="form-control" id="exampleFormControlTextarea1" name="s_desc" rows="2"  required>'.$row["description"].'</textarea>
							</div>
							<div class="form-group">';
								if ($row["id_product_type"]!=3) {
									echo '<label for="exampleFormControlTextarea1">Descripcion extensa del producto:</label>';
								}else{
									echo '<label for="exampleFormControlTextarea1">Descripcion extensa de la campaña:</label>';
								}
								echo '<textarea class="form-control" id="exampleFormControlTextarea1" name="l_desc" rows="5"  required>'.$row["long_description"].'</textarea>
							</div>';
							if ($row["id_product_type"]!=3) {
								echo '<div class="form-group">
									<label for="sel1">¿De que lugar es?</label>
									<select class="form-control" id="sel1" name="country">';
									$sql2 = "SELECT id_country, country FROM countries";
									$result2 = $conn->query($sql2);

									if ($result2->num_rows > 0) {
					    // output data of each row
										while($row2 = $result2->fetch_assoc()) {
											if ($row2["id_country"]==$row["id_country"]) {
												echo '<option value="'.$row["id_country"].'" selected>'.$row["country"].'</option>';
											}else{
												echo '<option value="'.$row2["id_country"].'">'.$row2["country"].'</option>';
											}
										}
									} else {
										echo "0 results";
									}
									echo '</select>
								</div>';
							}else{
								echo '<input type="hidden" name="country" value="10">';
							}
							echo '<button type="submit" class="btn btn-primary">Actualizar</button>
						</form>

					</main>
					</div>
					</div>';
	    }
	} else {
	    echo "0 results";
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
<script type="text/javascript">
		$('#btnClick').on('click',function(){
		if($('#1').css('display')!='none'){
			$('#2').show().siblings('div').hide();
		}else if($('#2').css('display')!='none'){
			$('#1').show().siblings('div').hide();
		}
	});

	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})

	$("#filename").change(function (e) {
		if (this.files.length > 0) {
			$("#csvfile").show();
			$("#firstbtn").hide();
		} else {
			$("#firstbtn").show();
			$("#csvfile").hide();
		}
	});

	$("#csvfile").change(function (e) {

	});

	$(document).ready(function() {


		var readURL = function(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('.profile-pic').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}


		$(".file-upload").on('change', function(){
			readURL(this);
		});

		$(".upload-button").on('click', function() {
			$(".file-upload").click();
		});
	});
</script>