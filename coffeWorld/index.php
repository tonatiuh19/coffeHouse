<?php
require_once('../admin/header.php');
?>

<!-- JavaScript -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('../images/bg_4.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread">El <i class="fas fa-mug-hot"></i> en tu casa</h1>
			</div>
		</div>
	</div>
</section>

<style type="text/css">
	.card-product .img-wrap {
		border-radius: 3px 3px 0 0;
		overflow: hidden;
		position: relative;
		height: 220px;
		text-align: center;
	}
	.card-product .img-wrap img {
		max-height: 100%;
		max-width: 100%;
		object-fit: cover;
	}
	.card-product .info-wrap {
		overflow: hidden;
		padding: 15px;
		border-top: 1px solid #eee;
	}
	.card-product .bottom-wrap {
		padding: 15px;
		border-top: 1px solid #eee;
	}

	.label-rating { margin-right:10px;
		color: #333;
		display: inline-block;
		vertical-align: middle;
	}

	.card-product .price-old {
		color: #999;
	}
	.pager div
	{
		float: left;
		border: 1px solid gray;
		margin: 5px;
		padding: 10px;
	}

	.pager div.disabled
	{
		opacity: 0.25;
	}

	.pager .pageNumbers a
	{
		display: inline-block;
		padding: 0 10px;
		color: gray;
	}

	.pager .pageNumbers a.active
	{
		color: orange;
	}

	.pager 
	{
		overflow: hidden;
	}

	.paginate-no-scroll .items div
	{
		height: 250px;
	}
</style>
<section class="ftco-section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3">
				<div class="form-group">
				    <label for="exampleFormControlSelect1">Ordenar por:</label>
				    <select class="form-control product-check" id="product_order">
				      <option value="1">Precio: de más bajo a más alto</option>
				      <option value="2">Precio: de más alto a más bajo</option>
				      <option value="3" selected>Lo mas nuevo</option>
				    </select>
				  </div>
				<hr>
				<label>Tipo:</label>
				<ul class="list-group">
					<?php
					$sqlx = "SELECT id_product_types, product_type FROM product_types WHERE id_product_types NOT IN ( SELECT id_product_types FROM product_types WHERE id_product_types=3 )";
					$resultx = $conn->query($sqlx);

					if ($resultx->num_rows > 0) {
				  // output data of each row
						while($rowx = $resultx->fetch_assoc()) {
							echo '<li class="list-group-item">
							<div class="form-check">
							<label class="form-check-label" >
							<input class="form-check-input product-check" type="checkbox" id="id_product_types" value="'.$rowx["id_product_types"].'" >';
							if ($rowx["id_product_types"]=="1") {
								echo '<i class="fas fa-mug-hot"></i>&nbsp;';
							}elseif ($rowx["id_product_types"]=="2") {
								echo '<i class="fas fa-gifts"></i>&nbsp;';
							}
							echo $rowx["product_type"].'
							</label>
							</div>
							</li>';
						}
					} else {
						echo "0 results";
					}
					?>
				</ul>
				<hr>
				<label>Pais/Region:</label>
				<ul class="list-group">
					<?php
					$sqlx = "SELECT id_country, country FROM countries WHERE id_country NOT IN ( SELECT id_country FROM countries WHERE id_country=10 OR id_country=1)";
					$resultx = $conn->query($sqlx);

					if ($resultx->num_rows > 0) {
				  // output data of each row
						while($rowx = $resultx->fetch_assoc()) {
							$id_country = $rowx["id_country"];
							echo '<li class="list-group-item">
							<div class="form-check">
							<label class="form-check-label" >
							<input class="form-check-input product-check" type="checkbox" id="id_country" value="'.$rowx["id_country"].'" >'; 
							if ($id_country=="1" || ($id_country>="100" && $id_country<="199")) {
								echo '<i class="mexico flag"></i>';
							}elseif ($id_country=="2") {
								echo '<i class="colombia flag"></i>';
							}elseif ($id_country=="3") {
								echo '<i class="united states flag"></i>';
							}elseif ($id_country=="4") {
								echo '<i class="canada flag"></i>';
							}
							echo $rowx["country"].'
							</label>
							</div>
							</li>';
						}
					} else {
						echo "0 results";
					}
					?>
				</ul>
				<hr>


			</div>

			<div class="col-lg-9 " id="result">
				<?php

				$sql2 = "SELECT d.id_products, e.price, d.name, d.description, d.id_country FROM products as d INNER JOIN (SELECT a.id_prices, a.id_products, a.price FROM prices AS a WHERE date = ( SELECT MAX(date) FROM prices AS b WHERE a.id_products = b.id_products )) as e on d.id_products=e.id_products WHERE d.active=1 and d.id_country NOT IN ( SELECT id_country FROM countries WHERE id_country=10 )";
				$result2 = $conn->query($sql2);

				if ($result2->num_rows > 0) {
					
					echo '<div class="paginate">';
					echo '<div class="row items" >';
					while($row2 = $result2->fetch_assoc()) {
						$id_country = $row2["id_country"];
						echo '<div class="col-md-4">
						<figure class="card card-product">
						<a href="../product/?product_sku='.$row2["id_products"].'"><div class="img-wrap"><img src="';
						foreach(glob('../dashboard/user/'.$row2["id_products"].'/profile/*.{jpg,pdf,png}', GLOB_BRACE) as $file) {
							echo $file;
						}
						echo '"></div>
						<figcaption class="info-wrap">
						<h4 class="title">'.$row2["name"].'';

						echo '</h4>
						<p class="desc">'.$row2["description"].'</p>
						<!--<div class="rating-wrap">
						<div class="label-rating">132 reviews</div>
						<div class="label-rating">154 orders </div>
						</div>  rating-wrap.// -->
						</figcaption></a>
						<div class="bottom-wrap">
						<div class="product" data-name="'.$row2["name"].'" data-price="'.$row2["price"].'" data-id="'.$row2["id_products"].'">
						<input type="number" class="count float-right form-control" value="1" min="1" />
						<button class="tiny btn btn-sm btn-primary float-right" id="modalButton">Soltar en mi bolsa</button>
						</div>	
						<div class="price-wrap h5">
						';
						$percentage = $row2["price"]+20;
						echo '<span class="price-new"><b>$'.$row2["price"].'</b></span> <del class="price-old">$'.$percentage.'</del>
						</div> <!-- price-wrap.// -->
						</div> <!-- bottom-wrap.// -->
						</figure>
						</div>';
					}


					echo '</div>';
					echo '<div class="pager">
					<div class="firstPage">&laquo;</div>
					<div class="previousPage">&lsaquo;</div>
					<div class="pageNumbers"></div>
					<div class="nextPage">&rsaquo;</div>
					<div class="lastPage">&raquo;</div>
					</div>';
					echo '</div>';
				} else {
					echo "";
				}
				
				?>
			</div>
		</div>
	</div>
</section>

<?php
require_once('../admin/footer.php');
?>
<script src="../js/buzina-pagination.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		$(".product-check").click(function(){
			//$("").show();
			var action = 'data';
			var country = get_filter_text('id_country');
			var product_type = get_filter_text('id_product_types');
			var product_order = get_filter_text('product_order');

			$.ajax({
				url:'action.php',
				method:'POST',
				data:{action:action, country:country, product_type:product_type},
				success:function(response){
					$("#result").html(response);

				}
			});
		});

		function get_filter_text(text_id){
			var filterData = [];
			$('#'+text_id+':checked').each(function(){
				filterData.push($(this).val());
			});

			return filterData;
		}

	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".paginate").paginga({
			//scrollToTop: false,
			itemsPerPage: 10
		});
	});
</script>