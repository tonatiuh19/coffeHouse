<?php
require_once('../admin/header.php');
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('../images/bg_4.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread">Compra mas, paga menos</h1>
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
</style>
<section class="ftco-section">
	<div class="container">
		<div class="row">
			<?php
			$sql = "SELECT d.id_products, e.price, d.name, d.description, y.quantity FROM products as d INNER JOIN (SELECT a.id_prices, a.id_products, a.price FROM prices AS a WHERE date = ( SELECT MAX(date) FROM prices AS b WHERE a.id_products = b.id_products )) as e on d.id_products=e.id_products INNER JOIN stock as y on y.id_products=d.id_products WHERE d.id_product_type=3 and d.active=1";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
									echo '<div class="col-md-4">
											<figure class="card card-product">
												<a href="../product/?product_sku='.$row["id_products"].'"><div class="img-wrap"><img src="';
												foreach(glob('../dashboard/user/'.$row["id_products"].'/profile/*.{jpg,pdf,png}', GLOB_BRACE) as $file) {
									                echo $file;
									              }
												echo '"></div></a>
												<a href="../product/?product_sku='.$row["id_products"].'"><figcaption class="info-wrap">
														<h4 class="title">'.$row["name"].' <small><br>Disponible: <b>'.$row["quantity"].'</b></small></h4>
														<p class="desc">'.$row["description"].'</p>
														<!--<div class="rating-wrap">
															<div class="label-rating">132 reviews</div>
															<div class="label-rating">154 orders </div>
														</div>  rating-wrap.// -->
												</figcaption></a>
												<div class="bottom-wrap">
													  <div class="product" data-name="'.$row["name"].'" data-price="'.$row["price"].'" data-id="'.$row["id_products"].'">
									                  <input type="number" class="count float-right form-control" value="1" min="1" max="'.$row["quantity"].'" />';
									                  if($row["quantity"]<="0"){
									                  	echo '<button class="tiny btn btn-sm btn-secondary float-right" onclick="alertii()" disabled>Agotado por el momento <i class="fas fa-frown-open"></i></button>';
									                  }else{
									                  	echo '<button class="tiny btn btn-sm btn-primary float-right" onclick="alertii()">Soltar en mi bolsa</button>';
									                  }
									                  echo '</div>	
													<div class="price-wrap h5">
													';
													$percentage = $row["price"]+20;
													echo '<span class="price-new"><b>$'.$row["price"].'</b></span> 
													<!--<del class="price-old">$'.$percentage.'</del>-->
													</div> <!-- price-wrap.// -->
												</div> <!-- bottom-wrap.// -->
											</figure>
										</div>';
			    }
			} else {
			    echo "0 results";
			}
			?>


			
			

		</div>

	</div>
</section>

<?php
require_once('../admin/footer.php');
?>
