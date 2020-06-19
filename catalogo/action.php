<?php
require_once('../admin/cn.php');

if (isset($_POST["action"])) {
	$sql2 = "SELECT d.id_products, e.price, d.name, d.description, d.id_country FROM products as d INNER JOIN (SELECT a.id_prices, a.id_products, a.price FROM prices AS a WHERE date = ( SELECT MAX(date) FROM prices AS b WHERE a.id_products = b.id_products )) as e on d.id_products=e.id_products WHERE d.active=1 and d.id_country NOT IN ( SELECT id_country FROM countries WHERE id_country=10 )";
	
	if (isset($_POST["country"])){
		$country = implode("','", $_POST['country']);
		$sql2 .= "AND d.id_country IN('".$country."')";
	}

	if (isset($_POST["product_type"])){
		$product_type = implode("','", $_POST['product_type']);
		$sql2 .= "AND d.id_product_type IN('".$product_type."')";
	}	


	$result2 = $conn->query($sql2);
	$output = '';

	if ($result2->num_rows > 0) {
		
		echo '<div class="paginate">';
		echo '<div class="row items isotope-grid" >';
		while($row2 = $result2->fetch_assoc()) {
			$id_country = $row2["id_country"];
			echo '<div class="col-md-4 grid-item">
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
			<div class="product product-card" data-name="'.$row2["name"].'" data-price="'.$row2["price"].'" data-id="'.$row2["id_products"].'">
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
		echo '<script type="text/javascript">
					$(document).ready(function(){
						$(".paginate").paginga({
							//scrollToTop: false,
							itemsPerPage: 10
						});
					});
				</script>';
		/*echo '<script type="text/javascript">
				$(document).on("change", ".form-control-select", function() {
					var sortingMethod = $(this).val();

					if(sortingMethod == "l2h") {
						sortProductsPriceAscending();
					} else if (sortingMethod == "h2l") {
						sortProductsPriceDescending();
					}
				});

				function sortProductsPriceAscending() {
					var gridItems = $(".grid-item");

					gridItems.sort(function(a, b) {
						return $(".product-card", a).data("price") - $(".product-card", b).data("price");
					});

					$(".isotope-grid").append(gridItems);
				}

				function sortProductsPriceDescending() {
					var gridItems = $(".grid-item");

					gridItems.sort(function(a, b) {
						return $(".product-card", b).data("price") - $(".product-card", a).data("price");
					});

					$(".isotope-grid").append(gridItems);
				}
			</script>';*/
	}else{
		echo '<h3>Sin producto todavia</h3>';
	}
}
?>