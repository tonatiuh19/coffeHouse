<?php
//https://coffehouse.mx/product/?product_sku=7
//localhost/product/?product_sku=7
if(!isset($_GET['product_sku']) || $_GET['product_sku']=='') {
	echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.location.href='../';
		</SCRIPT>");
}else{
	$id_product = $_GET['product_sku'];
}




require_once('../admin/header.php');
$sql = "SELECT d.id_products, e.price, d.name, d.description, d.long_description, d.id_country, d.id_product_type FROM products as d INNER JOIN (SELECT a.id_prices, a.id_products, a.price FROM prices AS a WHERE date = ( SELECT MAX(date) FROM prices AS b WHERE a.id_products = b.id_products )) as e on d.id_products=e.id_products WHERE d.id_products=".$id_product."";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
	while($row = $result->fetch_assoc()) {
		$name = $row["name"];
		$price = $row["price"];
		$description = $row["description"];
		$long_description = $row["long_description"];
		$id_country = $row["id_country"];
		$type = $row["id_product_type"];
	}
} else {
	echo "0 results";
}
?>
<script src="package/js-image-zoom.js" type="application/javascript"></script>
<section class="hero-wrap hero-wrap-2" style="background-image: url('../images/bg_4.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread"><?php echo $name; ?></h1>
			</div>
		</div>
	</div>
</section>

<style type="text/css">
	.img-wrap img {
	    max-height: 100%;
	    max-width: 100%;
	    object-fit: cover;
	}
	.price-old {
	    color: #999;
	}
</style>
<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 ftco-animate">
				<div class="img-wrap d-flex align-items-center justify-content-center">
					<?php
						echo '<img src="';
						foreach(glob('../dashboard/user/'.$id_product.'/profile/*.{jpg,pdf,png}', GLOB_BRACE) as $file) {
							echo $file;
						}
						echo '" width="172">';
					?>
				</div>
				<h4 id="zoomOptions"></h4>
				<div class="wrapper">

				    <div class="imageblock">
				        <div id="container"></div>
				    </div>
				</div>
								
				
				<div class="tag-widget post-tag-container mb-5 mt-5">
					<div class="tagcloud">
						<h2>Acerca de:</h2>
					</div>
				</div>

				<div class="about-author d-flex p-4 bg-light">
					<div class="bio mr-5">
						<i class="fas fa-mug-hot fa-4x"></i>
					</div>
					<div class="desc">
						<h3><?php echo $name; ?></h3>
						<p><?php echo $long_description ?></p>
					</div>
				</div>


				<!--<div class="pt-5 mt-5">
					<h3 class="mb-5 h4 font-weight-bold p-4 bg-light">07 Feedbacks</h3>
					<ul class="comment-list">
						<li class="comment">
							<div class="vcard bio">
								<img src="images/person_1.jpg" alt="Image placeholder">
							</div>
							<div class="comment-body">
								<h3>John Doe</h3>
								<div class="meta mb-2">June 26, 2019 at 2:21pm</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
								<p><a href="#" class="reply">Reply</a></p>
							</div>
						</li>

						<li class="comment">
							<div class="vcard bio">
								<img src="images/person_1.jpg" alt="Image placeholder">
							</div>
							<div class="comment-body">
								<h3>John Doe</h3>
								<div class="meta mb-2">June 26, 2019 at 2:21pm</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
								<p><a href="#" class="reply">Reply</a></p>
							</div>

							<ul class="children">
								<li class="comment">
									<div class="vcard bio">
										<img src="images/person_1.jpg" alt="Image placeholder">
									</div>
									<div class="comment-body">
										<h3>John Doe</h3>
										<div class="meta mb-2">June 26, 2019 at 2:21pm</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
										<p><a href="#" class="reply">Reply</a></p>
									</div>


									<ul class="children">
										<li class="comment">
											<div class="vcard bio">
												<img src="images/person_1.jpg" alt="Image placeholder">
											</div>
											<div class="comment-body">
												<h3>John Doe</h3>
												<div class="meta mb-2">June 26, 2019 at 2:21pm</div>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
												<p><a href="#" class="reply">Reply</a></p>
											</div>

											<ul class="children">
												<li class="comment">
													<div class="vcard bio">
														<img src="images/person_1.jpg" alt="Image placeholder">
													</div>
													<div class="comment-body">
														<h3>John Doe</h3>
														<div class="meta mb-2">June 26, 2019 at 2:21pm</div>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
														<p><a href="#" class="reply">Reply</a></p>
													</div>
												</li>
											</ul>
										</li>
									</ul>
								</li>
							</ul>
						</li>

						<li class="comment">
							<div class="vcard bio">
								<img src="images/person_1.jpg" alt="Image placeholder">
							</div>
							<div class="comment-body">
								<h3>John Doe</h3>
								<div class="meta mb-2">June 26, 2019 at 2:21pm</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
								<p><a href="#" class="reply">Reply</a></p>
							</div>
						</li>
					</ul>-->
					<!-- END comment-list 


					</div>-->
				</div> <!-- .col-md-8 -->

				<div class="col-lg-4 sidebar ftco-animate">

					<div class="sidebar-box ftco-animate">
						<div class="bottom-wrap">
							<?php
							echo '<div class="product" data-name="'.$name.'" data-price="'.$price.'" data-id="'.$id_product.'">
								<input type="number" class="count float-right form-control" value="1" min="1" />
								<button class="tiny btn btn-sm btn-primary float-right">Soltar en mi bolsa</button>
							</div>	
							<div class="price-wrap h5">
								';
								$percentage = $price+20;
								echo '<span class="price-new"><b>$'.$price.'</b></span> 
								<del class="price-old">$'.$percentage.'</del>
							</div> <!-- price-wrap.// -->';
							?>
						</div>
					</div>

					<div class="sidebar-box ftco-animate">
						<?php
						
						if ($type == '1') {
							$sql2 = "SELECT ax.value as 'sabor', bx.value as 'cuerpo', cx.value as 'acidez' FROM product_f_sabor as a INNER JOIN product_f_sabor_types as ax on a.id_product_f_sabor_types=ax.id_product_f_sabor_types INNER JOIN product_f_cuerpo as b on b.id_product=a.id_product INNER JOIN product_f_cuerpo_types as bx on b.id_product_f_cuerpo_types=bx.id_product_f_cuerpo_types INNER JOIN product_f_acidez as c on c.id_product=a.id_product INNER JOIN product_f_acidez_types as cx on c.id_product_f_acidez_types=cx.id_product_f_acidez_types WHERE a.id_product=".$id_product."";
							$result2 = $conn->query($sql2);

							if ($result2->num_rows > 0) {
							  
							  while($row2 = $result2->fetch_assoc()) {
							    echo '<table class="table">
										  <tbody>
										    <tr>
										      <th scope="row"><i class="fas fa-mug-hot"></i> Sabor y Aroma:</th>
										      <td>'.$row2["sabor"].'</td>
										    </tr>
										    <tr>
										      <th scope="row"><i class="fas fa-leaf"></i> Cuerpo:</th>
										      <td>'.$row2["cuerpo"].'</td>
										    </tr>
										    <tr>
										      <th scope="row"><i class="fas fa-glass-whiskey"></i> Acidez:</th>
										      <td>';

										      if ($row2["acidez"]=='5') {
										      	echo '<i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i>';
										      }elseif ($row2["acidez"]=='4') {
										      	echo '<i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i>';
										      }elseif ($row2["acidez"]=='3') {
										      	echo '<i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i>';
										      }elseif ($row2["acidez"]=='2') {
										      	echo '<i class="far fa-star"></i> <i class="far fa-star"></i>';
										      }elseif ($row2["acidez"]=='1') {
										      	echo '<i class="far fa-star"></i>';
										      }elseif ($row2["acidez"]=='4.5') {
										      	echo '<i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star-half"></i>';
										      }elseif ($row2["acidez"]=='3.5') {
										      	echo '<i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star-half"></i>';
										      }elseif ($row2["acidez"]=='2.5') {
										      	echo '<i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star-half"></i>';
										      }elseif ($row2["acidez"]=='1.5') {
										      	echo '<i class="far fa-star"></i> <i class="far fa-star-half"></i>';
										      }
										      echo '</td>
										    </tr>
										    <tr>
										      <th scope="row"><i class="fas fa-globe-americas"></i> Pais:</th>
										      <td>';
											if ($id_country=="1") {
									      	echo '<i class="mexico flag"></i>';
									      }elseif ($id_country=="2") {
									      	echo '<i class="colombia flag"></i>';
									      }elseif ($id_country=="3") {
									      	echo '<i class="united states flag"></i>';
									      }elseif ($id_country=="4") {
									      	echo '<i class="canada flag"></i>';
									      }
										      echo '</td>
										    </tr>
										  </tbody>
										</table>';     
							  }
							 
							} else {
							  echo "";
							}
						}elseif ($type == '2') {
							# code...
						}elseif ($type == '3') {
							$sql2 = "SELECT b.name, b.id_country, a.quantity FROM campaigns_product as a INNER JOIN products as b on b.id_products=a.id_products WHERE a.id_campaign=".$id_product."";
							$result2 = $conn->query($sql2);
							echo "Incluye:";
							if ($result2->num_rows > 0) {
							  echo '<table class="table">
									  
									  </thead><tbody>';
							  while($row2 = $result2->fetch_assoc()) {
							    echo '<tr>
							    		  <td>'.$row2["quantity"].'x</td>
									      <th scope="row">'.$row2["name"].'</th>
									      <td>';
									      if ($row2["id_country"]=="1") {
									      	echo '<i class="mexico flag"></i>';
									      }elseif ($row2["id_country"]=="2") {
									      	echo '<i class="colombia flag"></i>';
									      }elseif ($row2["id_country"]=="3") {
									      	echo '<i class="united states flag"></i>';
									      }elseif ($row2["id_country"]=="4") {
									      	echo '<i class="canada flag"></i>';
									      }
									      echo'</td>

									    </tr>';     
							  }
							 	echo '</tbody>
									</table>';
							} else {
							  echo "0 results";
							}
						}
						?>
					</div>


					<div class="sidebar-box ftco-animate">
						<h3>Productos similares</h3>
						<ul class="tagcloud m-0 p-0">
							<?php
							$sql5 = "SELECT a.name, a.id_country, a.id_products FROM products as a WHERE a.active=1 and a.id_product_type=".$type." LIMIT 4";
							$result5 = $conn->query($sql5);

							if ($result5->num_rows > 0) {
							  // output data of each row
							  while($row5 = $result5->fetch_assoc()) {
							    echo '<a href="../product/?product_sku='.$row5["id_products"].'" class="tag-cloud-link">';
							    echo $row5["name"]." ";
							    if ($row5["id_country"]=="1") {
									      	echo '<i class="mexico flag"></i>';
									      }elseif ($row5["id_country"]=="2") {
									      	echo '<i class="colombia flag"></i>';
									      }elseif ($row5["id_country"]=="3") {
									      	echo '<i class="united states flag"></i>';
									      }elseif ($row5["id_country"]=="4") {
									      	echo '<i class="canada flag"></i>';
									      }
							    echo '</a>';
							  }
							} else {
							  echo "0 results";
							}
							?>
							
							
						</ul>
					</div>

				</div><!-- END COL -->
			</div>
		</div>
	</section>

	<?php
	require_once('../admin/footer.php');
	?>
