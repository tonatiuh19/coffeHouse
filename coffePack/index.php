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


<section class="ftco-section">
	<div class="container">
		<div class="row">
			<?php
			$sql = "SELECT id_campaigns, name, description, start_date, end_date, start_date FROM campaigns";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo '<div class="col-md-4 ftco-animate">
				<div class="blog-entry">
					<a href="blog-single.html" class="block-20" style="background-image: url(../images/image_2.jpg);">
					</a>
					<div class="text pt-3 pb-4">
						<div class="meta">
							<div><a href="#">A partir de: '.$row["start_date"].'9</a></div>
							
						</div>
						<h3 class="heading"><a href="#">'.$row["name"].'</a></h3>
						<p class="clearfix">
							<a href="#" class="float-left btn btn-success">Soltar en mi bolsa</a>
							
						</p>
					</div>
				</div>
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
