<?php
 require_once('admin/cn.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CoffeHouse</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Miss+Fajardose&display=swap" rel="stylesheet">

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
    <link href="css/fontawesome/css/all.css" rel="stylesheet">
  </head>
  <body>
    <div class="py-1 bg-black top">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<!--<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>-->
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<!--<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">youremail@email.com</span>-->
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
						    <p class="mb-0 register-link"><span><i class="fas fa-dolly"></i> Envios gratis </span> <span>a partir de <b class="text-white">$600.00</b></span></p>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Appetizer</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item <!--active-->"><a href="index.html" class="nav-link">CoffePacks</a></li>
	        	<li class="nav-item"><a href="about.html" class="nav-link">Para tu Negocio</a></li>
	        	<li class="nav-item"><a href="menu.html" class="nav-link">El <i class="fas fa-globe-americas"></i> en tu casa</a></li>
	        	<li class="nav-item"><a href="menu.html" class="nav-link">Suscribete</a></li>
	          <li class="nav-item"><a href="reservation.html" class="nav-link btn btn-warning btn-sm" data-toggle="tooltip" title="Tu bolsa de compras"><i class="fas fa-shopping-bag fa-1x"></i> 1 </a></li>
	          <li class="nav-item"><a href="reservation.html" class="nav-link btn btn-warning btn-sm" data-toggle="tooltip" title="Inicia Sesion"><i class="fas fa-user-astronaut fa-1x"></i></a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="home-slider owl-carousel js-fullheight">
      <?php
      $sql = "SELECT id_campaigns, name, description, start_date, end_date, start_date FROM campaigns";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo '      <div class="slider-item js-fullheight" style="background-image: url(images/bg_1.jpg);">
                            <div class="overlay"></div>
                            <div class="container">
                              <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

                                <div class="col-md-12 col-sm-12 text-center ftco-animate">
                                  <h1 class="mb-4 mt-5">'.$row["name"].'</h1>
                                  <p>'.$row["description"].'<br><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Añadir a bolsa</a></p>
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
	
	
		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          
        </div>
        <div class="row">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate text-center">
            <div class="media block-6 services d-block">
              <div class="icon d-flex justify-content-center align-items-center">
            		<i class="fas fa-medal fa-4x text-white"></i>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Seleccion Unica</h3>
                <p>Contamos con las mejores marcas alrededor del mundo para ti.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate text-center">
            <div class="media block-6 services d-block">
              <div class="icon d-flex justify-content-center align-items-center">
            		<i class="fas fa-truck fa-4x text-white"></i>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Envios a todo Mexico</h3>
                <p>Facil y rapido hasta la puerta de tu casa.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate text-center">
            <div class="media block-6 services d-block">
              <div class="icon d-flex justify-content-center align-items-center">
            		<i class="fas fa-cash-register fa-4x text-white"></i>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Aceptamos todos los pagos</h3>
                <p>Pagalo como tu decidas.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate text-center">
            <div class="media block-6 services d-block">
              <div class="icon d-flex justify-content-center align-items-center">
            		<i class="fas fa-mug-hot fa-4x text-white"></i>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">¡Suscribete y recibe Cafe!</h3>
                <p>Por $200 pesos mensuales recibiras cafe aleatorio y tendras el beneficio de probar diferentes tipos de cafe del mundo.</p>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>
		<section class="ftco-section ftco-wrap-about ftco-no-pb bg-dark text-white">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-sm-10 wrap-about ftco-animate text-center">
	          <div class="heading-section mb-4 text-center">
	          	
	            <h2 class="mb-4 text-white">Suscribete por $200.00</h2>
	          </div>
						<p>Recibe Cafe todos los meses de diferentes marcas de diferentes pasises con <b>envio gratis.</b></p>

						<div class="video justify-content-center">
							<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
  							<span class="ion-ios-play"></span>
	  					</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	<!--<section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container-fluid px-0">
				<div class="row d-flex no-gutters">
          <div class="col-md-6 ftco-animate makereservation p-4 p-md-5 pt-5 pt-md-0">
          	<div class="heading-section ftco-animate mb-5">
	         
	            <h2 class="mb-4">Suscribete por $200.00</h2>
	          </div>
				Recibe Cafe
          </div>
          <div class="col-md-6 d-flex align-items-stretch pb-5 pb-md-0">
						<div id="map"></div>
					</div>
        </div>
			</div>
		</section>-->
		<!---->
    <section class="ftco-section">
    	<div class="container-fluid px-4">
    		<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	
            <h2 class="mb-4">Lo que no te puedes perder</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-6 col-lg-4 menu-wrap">
        		<div class="heading-menu text-center ftco-animate">
        			<h3>Mexico</h3>
        		</div>
            <?php
            $sql = "SELECT id_products, name, description, id_product_type, id_product_type, id_country, date FROM products wHERE id_country=1 and id_product_type=1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="menus d-flex ftco-animate">
              <div class="menu-img img" style="background-image: url(images/breakfast-1.jpg);"></div>
              <div class="text">
                <div class="d-flex">
                  <div class="one-half">
                    <h3>'.$row["name"].'</h3>
                  </div>
                  <div class="one-forth">
                    <span class="price">$29</span>
                  </div>
                </div>
                <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
              </div>
            </div>';;
                }
            } else {
                echo "0 results";
            }
            ?>
        	</div>
        	
        	<div class="col-md-6 col-lg-4 menu-wrap">
        		<div class="heading-menu text-center ftco-animate">
        			<h3>Colombia</h3>
        		</div>

            <?php
            $sql = "SELECT id_products, name, description, id_product_type, id_product_type, id_country, date FROM products wHERE id_country=2 and id_product_type=1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="menus d-flex ftco-animate">
              <div class="menu-img img" style="background-image: url(images/breakfast-1.jpg);"></div>
              <div class="text">
                <div class="d-flex">
                  <div class="one-half">
                    <h3>'.$row["name"].'</h3>
                  </div>
                  <div class="one-forth">
                    <span class="price">$29</span>
                  </div>
                </div>
                <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
              </div>
            </div>';;
                }
            } else {
                echo "0 results";
            }
            ?>
        	</div>

        	<div class="col-md-6 col-lg-4 menu-wrap">
        		<div class="heading-menu text-center ftco-animate">
        			<h3>Accesorios</h3>
        		</div>
            <?php
            $sql = "SELECT id_products, name, description, id_product_type, id_country, date FROM products wHERE id_product_type=2";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="menus d-flex ftco-animate">
              <div class="menu-img img" style="background-image: url(images/breakfast-1.jpg);"></div>
              <div class="text">
                <div class="d-flex">
                  <div class="one-half">
                    <h3>'.$row["name"].'</h3>
                  </div>
                  <div class="one-forth">
                    <span class="price">$29</span>
                  </div>
                </div>
                <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
              </div>
            </div>';;
                }
            } else {
                echo "0 results";
            }
            ?>
        	</div>
        </div>
    	</div>
    </section>

    <!---->
    
		<!--<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Chef</span>
            <h2 class="mb-4">Our Master Chef</h2>
          </div>
        </div>	
				<div class="row">
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img" style="background-image: url(images/chef-4.jpg);"></div>
							<div class="text pt-4">
								<h3>John Smooth</h3>
								<span class="position mb-2">Restaurant Owner</span>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
								<div class="faded">
									<!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> 
									<ul class="ftco-social d-flex">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img" style="background-image: url(images/chef-2.jpg);"></div>
							<div class="text pt-4">
								<h3>Rebeca Welson</h3>
								<span class="position mb-2">Head Chef</span>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
								<div class="faded">
									<!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> 
									<ul class="ftco-social d-flex">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img" style="background-image: url(images/chef-3.jpg);"></div>
							<div class="text pt-4">
								<h3>Kharl Branyt</h3>
								<span class="position mb-2">Chef</span>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
								<div class="faded">
									<!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> 
									<ul class="ftco-social d-flex">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img" style="background-image: url(images/chef-1.jpg);"></div>
							<div class="text pt-4">
								<h3>Luke Simon</h3>
								<span class="position mb-2">Chef</span>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
								<div class="faded">
									<!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social d-flex">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>-->
		
		<!-- <section class="ftco-section testimony-section" style="background-image: url(images/bg_5.jpg);" data-stellar-background-ratio="0.5"> -->

		<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);" data-stellar-background-ratio="0.5">
		<!-- <section class="ftco-section ftco-counter img ftco-no-pt" id="section-counter"> -->
    	<div class="container">
    		<div class="row d-md-flex align-items-center justify-content-center">
    			<div class="col-lg-10">
    				<div class="row d-md-flex align-items-center">
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="18">0</strong>
		                <span>Years of Experienced</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="15000">0</strong>
		                <span>Happy Customers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="100">0</strong>
		                <span>Menus</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="20">0</strong>
		                <span>Staffs</span>
		              </div>
		            </div>
		          </div>
	          </div>
          </div>
        </div>
    	</div>
    </section>		
		<section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container-fluid px-0">
				<div class="row no-gutters">
					<div class="col-md">
						<a href="#" class="instagram img d-flex align-items-center justify-content-center" style="background-image: url(images/insta-1.jpg);">
							<span class="ion-logo-instagram"></span>
						</a>
					</div>
					<div class="col-md">
						<a href="#" class="instagram img d-flex align-items-center justify-content-center" style="background-image: url(images/insta-2.jpg);">
							<span class="ion-logo-instagram"></span>
						</a>
					</div>
					<div class="col-md">
						<a href="#" class="instagram img d-flex align-items-center justify-content-center" style="background-image: url(images/insta-3.jpg);">
							<span class="ion-logo-instagram"></span>
						</a>
					</div>
					<div class="col-md">
						<a href="#" class="instagram img d-flex align-items-center justify-content-center" style="background-image: url(images/insta-4.jpg);">
							<span class="ion-logo-instagram"></span>
						</a>
					</div>
					<div class="col-md">
						<a href="#" class="instagram img d-flex align-items-center justify-content-center" style="background-image: url(images/insta-5.jpg);">
							<span class="ion-logo-instagram"></span>
						</a>
					</div>
				</div>
			</div>
		</section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container-fluid px-md-5 px-3">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-4">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Acerca de Nosotros</h2>
              <p><b>Escribenos: </b><br>dihola@coffehouse.mx</span></a></p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">

                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">¿Tienes alguna pregunta?</h2>
              <ul class="list-unstyled open-hours">
                <li class="d-flex"><a href="#">Contacto</a></li>
                <li class="d-flex"><a href="#">Registate aqui si eres proveedor</a></li>
                <li class="d-flex"><a href="#">Terminos y Condiciones</a></li>
                <li class="d-flex"><a href="#">Politicas de Privacidad</a></li>
                <li class="d-flex"><a href="#">CoffeHouse para tu negocio</a></li>
              </ul>
            </div>
          </div>
         
          <div class="col-md-6 col-lg-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Instagram</h2>
              <div class="thumb d-sm-flex">
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/insta-1.jpg);">
	            	</a>
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/insta-2.jpg);">
	            	</a>
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/insta-3.jpg);">
	            	</a>
	            </div>
	            <div class="thumb d-flex">
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/insta-4.jpg);">
	            	</a>
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/insta-5.jpg);">
	            	</a>
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/insta-6.jpg);">
	            	</a>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> CoffeHouse All rights reserved </a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>