<?php
require_once('../admin/header.php');
?>
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


<section class="ftco-section">
	<?php
	$sql = "SELECT id_country, country FROM countries";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo '	<div class="container">
						<div class="heading-menu text-center ftco-animate">
							<h3>'.$row["country"].'</h3>
						</div>
						<div class="row">';

							$sql2 = "SELECT d.id_products, e.price, d.name FROM products as d INNER JOIN (SELECT a.id_prices, a.id_products, a.price FROM prices AS a WHERE date = ( SELECT MAX(date) FROM prices AS b WHERE a.id_products = b.id_products )) as e on d.id_products=e.id_products WHERE d.id_product_type=1 and d.id_country=".$row["id_country"]."";
							$result2 = $conn->query($sql2);

							if ($result2->num_rows > 0) {
							    // output data of each row
							    while($row2 = $result2->fetch_assoc()) {
							        echo '
									<div class="col-sm-4 menus d-flex ftco-animate"><div class="menu-img img" style="background-image: url(images/drink-1.jpg);"></div>
										<div class="text">
											<div class="d-flex">
												<div class="one-half">
													<h3>'.$row2["name"].'</h3>
												</div>
												<div class="one-forth">
													<span class="price">$'.$row2["price"].'</span>
												</div>
											</div>
											<p>
												<div class="product" data-name="'.$row2["name"].'" data-price="'.$row2["price"].'" data-id="'.$row2["id_products"].'">
								                  <input type="number" class="count" value="1" min="1" />
								                  <button class="tiny btn btn-success">Soltar en mi bolsa</button>
								                  </div>
											</p>
										</div>
									</div>';
							    }
							} else {
							    echo "";
							}
							

							echo '
						</div>
					</div>';
	    }
	} else {
	    echo "0 results";
	}
	?>
</section>

<?php
require_once('../admin/footer.php');
?>
