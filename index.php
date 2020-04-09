<?php
 require_once('admin/cn.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CoffeHouse</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="css/fontawesome/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Coffee<small>Blend</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <!--<li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>-->
	          <li class="nav-item"><a href="menu.html" class="nav-link">CoffePacks</a></li>
	          <li class="nav-item"><a href="services.html" class="nav-link">Para tu negocio</a></li>
	          <!--<li class="nav-item"><a href="blog.html" class="nav-link">Para tu negocio</a></li>-->
	          <!--<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>-->
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">El mejor Cafe</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.html">Tienda</a>
                <!--<a class="dropdown-item" href="product-single.html">Single Product</a>-->
                <a class="dropdown-item" href="room.html">Mi Carrito</a>
                <!--<a class="dropdown-item" href="checkout.html">Checkout</a>-->
              </div>
            </li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Suscríbete</a></li>
	          <li class="nav-item cart"><a href="cart.html" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>0</small></span></a></li>
	        </ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->

    <section class="home-slider owl-carousel">
      <?php
      $sql = "SELECT id_campaigns, name, description, start_date, end_date FROM campaigns where active=1";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="slider-item"';
            foreach(glob('campaigns/'.$row["id_campaigns"].'/*.{jpg,png}', GLOB_BRACE) as $file) {
              if (preg_match('/(\.jpg|\.png|\.bmp)$/', $file)) {
                echo 'style="background-image: url('.$file.');"';
              }
            }
              echo '>
              	<div class="overlay"></div>
                <div class="container">
                  <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    	<!--<span class="subheading">Welcome</span>-->
                      <h1 class="mb-4">'.$row["name"].'</h1>
                      <p class="mb-4 mb-md-5">'.$row["description"].'</p>
                      <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Conocer Mas</a> <!--<a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a>--></p>
                    </div>

                  </div>
                </div>
              </div>';
          }
      } else {
          echo "0 results";
      }
       ?>


    </section>

    <section class="ftco-section ftco-services">
    	<div class="container">
    		<div class="row">
          <div class="col-md-3 ftco-animate">
            <div class="media d-block text-center block-6 services">
              	<i class="fas fa-medal fa-5x mb-5"></i>
              <div class="media-body">
                <h3 class="heading">Seleccion unica</h3>
                <p>Contamos con las mejores marcas alrededor del mundo para ti.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 ftco-animate">
            <div class="media d-block text-center block-6 services">
              	<i class="fas fa-shipping-fast fa-5x mb-5"></i>
              <div class="media-body">
                <h3 class="heading">Envios a todo México</h3>
                <p>Facil y rapido hasta la puerta de tu casa.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 ftco-animate">
            <div class="media d-block text-center block-6 services">
              	<i class="fas fa-cash-register fa-5x mb-5"></i>
              <div class="media-body">
                <h3 class="heading">Aceptamos todos los pagos</h3>
                <p>Pagalo como tu decidas.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 ftco-animate">
            <div class="media d-block text-center block-6 services">
              	<i class="fas fa-mug-hot fa-5x mb-5"></i>
              <div class="media-body">
                <h3 class="heading">Suscribete y recibe Cafe</h3>
                <p>Por $200 pesos mensuales recibiras cafe aleatorio y tendras el beneficio de probar diferentes tipos de cafe del mundo.</p>
              </div>
            </div>
          </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 pr-md-5">
            <div class="heading-section text-md-right ftco-animate">
              <!--<span class="subheading">Discover</span>-->
              <h2 class="mb-4">Suscribete</h2>
              <p class="mb-4">Recibe Cafe todos los meses de diferentes marcas de diferentes pasises con envio gratis. <h3>Por solo $200</h3></p>
              <p><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">Suscribirme</a></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <div class="menu-entry">
                  <a href="#" class="img" style="background-image: url(images/menu-1.jpg);"></a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="menu-entry mt-lg-4">
                  <a href="#" class="img" style="background-image: url(images/menu-2.jpg);"></a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="menu-entry">
                  <a href="#" class="img" style="background-image: url(images/menu-3.jpg);"></a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="menu-entry mt-lg-4">
                  <a href="#" class="img" style="background-image: url(images/menu-4.jpg);"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<!--<span class="subheading">Discover</span>-->
            <h2 class="mb-4">Lo que no te puedes perder</h2>
            <p>Las mejores marcas para la mejor temporada</p>
          </div>
        </div>
        <div class="row">
          <?php
          $sql = "SELECT a.id_products, a.id_product_type, a.id_country, a.name, a.description, b.product_type, c.country, d.price FROM products as a INNER JOIN product_types as b on a.id_product_type=b.id_product_types INNER JOIN countries as c on a.id_country=c.id_country INNER JOIN (SELECT A.id_prices, A.price, A.id_products, MAX(A.date) AS 'date' FROM prices AS A GROUP BY A.id_products) as d on a.id_products=d.id_products";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  echo '<div class="col-md-3">
                		<div class="menu-entry">
            					<a href="#" class="img" ';
                      foreach(glob('products/'.$row["id_products"].'/main/*.{jpg,png}', GLOB_BRACE) as $file) {
                        if (preg_match('/(\.jpg|\.png|\.bmp)$/', $file)) {
                          echo 'style="background-image: url('.$file.');"';
                        }
                      }
                      echo '></a>
            					<div class="text text-center pt-4">
            						<h3><a href="#">'.$row["name"].'</a></h3>
            						<p>'.$row["description"].'</p>
            						<p class="price"><span>$'.$row["price"].'</span></p>
            						<p><a href="#" class="btn btn-primary btn-outline-primary">Agregar</a></p>
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




    <section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="#" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-1.jpg);">
							<!--<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>-->
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="#" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-2.jpg);">
							<!--<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>-->
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="#" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-3.jpg);">
							<!--<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>-->
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="#" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-4.jpg);">
							<!--<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>-->
						</a>
					</div>
        </div>
    	</div>
    </section>

		<section class="ftco-menu">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<!--<span class="subheading">Discover</span>-->
            <h2 class="mb-4">El mejor Cafe a tu mesa</h2>
            <p>Conoce las diferentes promociones que tenemos disponibles en este momento.</p>
          </div>
        </div>
    		<div class="row d-md-flex">
	    		<div class="col-lg-12 ftco-animate p-md-5">
		    		<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Main Dish</a>

		              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>

		              <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Desserts</a>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex align-items-center">

		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

		              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
		              	<div class="row">
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/dish-1.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">Grilled Beef</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/dish-2.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">Grilled Beef</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/dish-3.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">Grilled Beef</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
		                <div class="row">
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/drink-1.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">Lemonade Juice</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/drink-2.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">Pineapple Juice</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/drink-3.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">Soda Drinks</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
		                <div class="row">
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/dessert-1.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">Hot Cake Honey</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/dessert-2.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">Hot Cake Honey</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/dessert-3.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">Hot Cake Honey</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              	</div>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section>

    <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-10">
        		<div class="row">
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="100">0</strong>
		              	<span>Coffee Branches</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="85">0</strong>
		              	<span>Number of Awards</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="10567">0</strong>
		              	<span>Happy Customer</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="900">0</strong>
		              	<span>Staff</span>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
        </div>
      </div>
    </section>

    <section class="ftco-section img" id="ftco-testimony" style="background-image: url(images/bg_1.jpg);"  data-stellar-background-ratio="0.5">
    	<div class="overlay"></div>
	    <div class="container">
	      <div class="row justify-content-center mb-5">
	        <div class="col-md-7 heading-section text-center ftco-animate">
	        	<span class="subheading">Testimony</span>
	          <h2 class="mb-4">Customers Says</h2>
	          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
	        </div>
	      </div>
	    </div>
	    <div class="container-wrap">
	      <div class="row d-flex no-gutters">
	        <div class="col-lg align-self-sm-end ftco-animate">
	          <div class="testimony">
	             <blockquote>
	                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small.&rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="image mr-3 align-self-center">
	                  <img src="images/person_1.jpg" alt="">
	                </div>
	                <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="col-lg align-self-sm-end">
	          <div class="testimony overlay">
	             <blockquote>
	                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="image mr-3 align-self-center">
	                  <img src="images/person_2.jpg" alt="">
	                </div>
	                <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="col-lg align-self-sm-end ftco-animate">
	          <div class="testimony">
	             <blockquote>
	                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small  line of blind text by the name. &rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="image mr-3 align-self-center">
	                  <img src="images/person_3.jpg" alt="">
	                </div>
	                <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="col-lg align-self-sm-end">
	          <div class="testimony overlay">
	             <blockquote>
	                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however.&rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="image mr-3 align-self-center">
	                  <img src="images/person_2.jpg" alt="">
	                </div>
	                <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="col-lg align-self-sm-end ftco-animate">
	          <div class="testimony">
	            <blockquote>
	              <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small  line of blind text by the name. &rdquo;</p>
	            </blockquote>
	            <div class="author d-flex mt-4">
	              <div class="image mr-3 align-self-center">
	                <img src="images/person_3.jpg" alt="">
	              </div>
	              <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>

    <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">




          <div class="col-lg-5 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">¿Tienes alguna pregunta?</h2>

	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">Contacto</a></li>
	                <li><a href="#" class="py-2 d-block">Registate aqui si eres proveedor</a></li>
	                <li><a href="#" class="py-2 d-block">Terminos y Condiciones</a></li>
	                <li><a href="#" class="py-2 d-block">Politicas de Privacidad</a></li>
	                <li><a href="#" class="py-2 d-block">CoffeHouse para tu negocio</a></li>
	              </ul>

            </div>
          </div>

           <div class="col-lg-5 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Acerca de Nosotros</h2>

              <ul class="list-unstyled">
	            <li><a href="#">
	            	<b>Escribenos: </b><br>dihola@coffehouse.mx</span></a></li>
	          </ul>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>
