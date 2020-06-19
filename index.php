<?php
require_once('admin/cn.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>TienditaCafe</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Monoton&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Miss+Fajardose&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/flag.min.css">
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
       </div>
       <div class="col-md pr-4 d-flex topper align-items-center">
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
   <a class="navbar-brand" href="/"><img src="images/logo.png" alt="Cinque Terre" width="182"></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
     <span class="oi oi-menu"></span> Menu
   </button>

   <div class="collapse navbar-collapse" id="ftco-nav">
     <ul class="navbar-nav ml-auto">
      <li class="nav-item <!--active-->"><a href="coffePack/" class="nav-link">CoffePacks</a></li>
      <!--<li class="nav-item"><a href="yourBusiness/" class="nav-link">Para tu Negocio</a></li>-->
      <li class="nav-item"><a href="catalogo/" class="nav-link"><i class="fas fa-book-open"></i> Catalogo</a></li>
      <li class="nav-item"><a href="suscribete/" class="nav-link">Suscribete</a></li>
      <li class="nav-item"><a data-toggle="modal" href="#myCart" class="nav-link btn btn-warning btn-sm" data-toggle="tooltip" title="Tu bolsa de compras"><i class="fas fa-shopping-bag fa-1x"></i><span id="countCart"></span></a></li>
      <?php
      if (isset($_SESSION['email'])){

        /*echo '<li class="nav-item"><a href="profile/" class="nav-link btn btn-success btn-sm" data-toggle="tooltip" title="Inicia Sesion"><i class="fas fa-user-astronaut fa-1x"></i></a></li>';*/
        if ($_SESSION["type_user"] == 3) {
          echo '<li class="nav-item"><button data-toggle="collapse" data-target="#demo" class="nav-link btn btn-success btn-sm"><i class="fas fa-user-astronaut fa-1x"></i></button></li>

              <div id="demo" class="collapse">
                <div class="btn-group-vertical">
                  <a href="sign-in/fin.php" class="btn btn-success btn-sm"><i class="fas fa-times-circle"></i> sesion</a>
                  <a href="profile/" class="btn btn-success btn-sm">Mi Perfil</a>
                  <a href="dashboard/" class="btn btn-success btn-sm">Admin</a>
                </div>
              </div>';
        }else{
          echo '<li class="nav-item"><button data-toggle="collapse" data-target="#demo" class="nav-link btn btn-success btn-sm"><i class="fas fa-user-astronaut fa-1x"></i></button></li>

              <div id="demo" class="collapse">
                <div class="btn-group-vertical">
                  <a href="sign-in/fin.php" class="btn btn-success btn-sm"><i class="fas fa-times-circle"></i> sesion</a>
                  <a href="profile/" class="btn btn-success btn-sm">Mi Perfil</a>
                  <a href="orders/" class="btn btn-success btn-sm">Mis Pedidos</a>
                  <a href="subscription/" class="btn btn-success btn-sm">Mi Subscripción</a>
                </div>
              </div>';
        }
        
        
      }else{
        echo '<li class="nav-item"><a href="sign-in/" class="nav-link btn btn-warning btn-sm" data-toggle="tooltip" title="Inicia Sesion"><i class="fas fa-user-astronaut fa-1x"></i></a></li>';
      }
      ?>
    </ul>
  </div>
</div>
</nav>
<!-- END nav -->

<section class="home-slider owl-carousel js-fullheight">
  <?php
  $sql = "SELECT d.id_products, e.price, d.name, d.description, d.long_description FROM products as d INNER JOIN (SELECT a.id_prices, a.id_products, a.price FROM prices AS a WHERE date = ( SELECT MAX(date) FROM prices AS b WHERE a.id_products = b.id_products )) as e on d.id_products=e.id_products WHERE d.id_product_type=3 LIMIT 3";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
          // output data of each row
    while($row = $result->fetch_assoc()) {
      echo '<div class="slider-item js-fullheight" style="background-image: url('; 
      foreach(glob('dashboard/user/'.$row["id_products"].'/profile/*.{jpg,pdf,png}', GLOB_BRACE) as $file) {
        echo $file;
      }
      echo');">
      <div class="overlay"></div>
      <div class="container">
      <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

      <div class="col-md-12 col-sm-12 text-center ftco-animate">
      <a href="../product/?product_sku='.$row["id_products"].'"><h1 class="mb-4 mt-5">'.$row["name"].'</h1>
      <p>'.$row["description"].'<br></a>
      <div class="product" data-name="'.$row["name"].'" data-price="'.$row["price"].'" data-id="'.$row["id_products"].'">
                                    <input type="hidden" class="count float-right form-control" value="1" min="1" />
                                    <button class="tiny btn btn-primary p-3 px-xl-4 py-xl-3" id="modalButton">Soltar en mi bolsa</button>
                                    </div></p>
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
          <p>Por $199 pesos mensuales recibiras cafe aleatorio y tendras el beneficio de probar diferentes tipos de cafe del mundo.</p>
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

       <h2 class="mb-4 text-white">Suscribete por $199.00</h2>
     </div>
     <p>Recibe Cafe todos los meses de diferentes marcas de diferentes pasises con <b>envio gratis.</b></p>

     <div class="video justify-content-center">
       <!--<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
         <span class="ion-ios-play"></span>
       </a>-->
       <a href="suscribete/" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
         <span class="fas fa-gift"></span>
       </a>
     </div>
   </div>
 </div>
</div>
</section>

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
     <h3>Chiapas</h3>
   </div>
   <?php
   $sql = "SELECT d.id_products, e.price, d.name FROM products as d INNER JOIN (SELECT a.id_prices, a.id_products, a.price FROM prices AS a WHERE date = ( SELECT MAX(date) FROM prices AS b WHERE a.id_products = b.id_products )) as e on d.id_products=e.id_products WHERE d.id_product_type=1 and d.id_country=106 LIMIT 3";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
                // output data of each row
    while($row = $result->fetch_assoc()) {
     echo '<div class="menus d-flex ftco-animate">
              <div class="menu-img img" style="background-image: url(';
              foreach(glob('dashboard/user/'.$row["id_products"].'/profile/*.{jpg,pdf,png}', GLOB_BRACE) as $file) {
                echo $file;
              }
              echo ');"></div>
              <div class="text">
                <div class="d-flex">
                  <div class="one-half">
                    <a href="../product/?product_sku='.$row["id_products"].'"><h3>'.$row["name"].'</h3></a>
                  </div>
                  <div class="one-forth">
                    <a href="../product/?product_sku='.$row["id_products"].'"><span class="price">$'.$row["price"].'</span></a>

                  </div>
                </div>
                <p>
                  <div class="product" data-name="'.$row["name"].'" data-price="'.$row["price"].'" data-id="'.$row["id_products"].'">
                  <input type="number" class="count" value="1" min="1" />
                  <button class="tiny btn btn-success">Soltar en mi bolsa</button>
                  </div>
                </p>
              </div>
            </div>';
      echo '<div class="modal fade" id="my'.$row["id_products"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">'.$row["name"].'</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>';
    }
  } else {
    echo "0 results";
  }
  ?>
</div>

<div class="col-md-6 col-lg-4 menu-wrap products">
  <div class="heading-menu text-center ftco-animate">
   <h3>Veracruz</h3>
 </div>

 <?php
 $sql = "SELECT d.id_products, e.price, d.name FROM products as d INNER JOIN (SELECT a.id_prices, a.id_products, a.price FROM prices AS a WHERE date = ( SELECT MAX(date) FROM prices AS b WHERE a.id_products = b.id_products )) as e on d.id_products=e.id_products WHERE d.id_product_type=1 and d.id_country=129 LIMIT 3";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
                // output data of each row
  while($row = $result->fetch_assoc()) {
    echo '<a href="../product/?product_sku='.$row["id_products"].'"><div class="menus d-flex ftco-animate">
              <div class="menu-img img" style="background-image: url(';
              foreach(glob('dashboard/user/'.$row["id_products"].'/profile/*.{jpg,pdf,png}', GLOB_BRACE) as $file) {
                echo $file;
              }
              echo ');"></div>
              <div class="text">
                <div class="d-flex">
                  <div class="one-half">
                    <a href="../product/?product_sku='.$row["id_products"].'"><h3>'.$row["name"].'</h3></a>
                  </div>
                  <div class="one-forth">
                    <a href="../product/?product_sku='.$row["id_products"].'"><span class="price">$'.$row["price"].'</span></a>
                  </div>
                </div>
                <p>
                  <div class="product" data-name="'.$row["name"].'" data-price="'.$row["price"].'" data-id="'.$row["id_products"].'">
                  <input type="number" class="count" value="1" min="1" />
                  <button class="tiny btn btn-success">Soltar en mi bolsa</button>
                  </div>
                </p>
              </div>
            </div></a>';
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
 $sql = "SELECT d.id_products, e.price, d.name FROM products as d INNER JOIN (SELECT a.id_prices, a.id_products, a.price FROM prices AS a WHERE date = ( SELECT MAX(date) FROM prices AS b WHERE a.id_products = b.id_products )) as e on d.id_products=e.id_products WHERE d.id_product_type=2";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
                // output data of each row
  while($row = $result->fetch_assoc()) {
   /*echo '<div class="product medium-4 columns menus ftco-animate text-center" data-name="'.$row["name"].'" data-price="50000" data-id="'.$row["id_products"].'">
                <img src="images/breakfast-1.jpg" alt="" width="90" />
                    <h3>'.$row["name"].'</h3>
                    <span class="price">$'.$row["price"].'</span>                
                <p></p>
                <input type="number" class="count form-control" value="1" /><br>
                <button class="tiny btn btn-success">Add to cart</button>
            </div>';*/
    echo '<a href="../product/?product_sku='.$row["id_products"].'"><div class="menus d-flex ftco-animate">
              <div class="menu-img img" style="background-image: url(';
              foreach(glob('dashboard/user/'.$row["id_products"].'/profile/*.{jpg,pdf,png}', GLOB_BRACE) as $file) {
                echo $file;
              }
              echo ');"></div>
              <div class="text">
                <div class="d-flex">
                  <a href="../product/?product_sku='.$row["id_products"].'"><div class="one-half">
                    <a href="../product/?product_sku='.$row["id_products"].'"><h3>'.$row["name"].'</h3></a>
                  </div>
                  <div class="one-forth">
                    <a href="../product/?product_sku='.$row["id_products"].'"><span class="price">$'.$row["price"].'</span></a>
                  </div>
                </div></a>
                <p>
                  <div class="product" data-name="'.$row["name"].'" data-price="'.$row["price"].'" data-id="'.$row["id_products"].'">
                  <input type="number" class="count" value="1" min="1" />
                  <button class="tiny btn btn-success">Soltar en mi bolsa</button>
                  </div>

                </p>
              </div>
            </div></a>';
  }
} else {
  echo "0 results";
}
?>
</div>
</div>
</div>
</section>

<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);" data-stellar-background-ratio="0.5">
  <!-- <section class="ftco-section ftco-counter img ftco-no-pt" id="section-counter"> -->
   <div class="container">
    <div class="row d-md-flex align-items-center justify-content-center">
     <div class="col-lg-10">
      <div class="row d-md-flex align-items-center">
        <!--<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18">
            <div class="text">
              <strong class="number" data-number="3">0</strong>
              <span>Año cumpliendo sueños</span>
            </div>
          </div>
        </div>
        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18">
            <div class="text">
              <strong class="number" data-number="15000">0</strong>
              <span>Clientes felices</span>
            </div>
          </div>
        </div>
        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18">
            <div class="text">
              <strong class="number" data-number="100">0</strong>
              <span>Nuevos paquetes</span>
            </div>
          </div>
        </div>-->
        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18">
            <div class="text-white btn btn-dark">
              <strong class="number" data-number="20">0</strong>
              <span>Crew members a tu dispocision</span>
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
          <p><b>Escribenos: </b><br>dihola@tienditacafe.com</span></a></p>
          <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">

            <!--<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>-->
            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">¿Tienes alguna pregunta?</h2>
          <ul class="list-unstyled open-hours">
            <li class="d-flex"><a href="mailto:dihola@tienditacafe.com?Subject=Contacto">Contacto</a></li>
            <li class="d-flex"><a href="suppliers/">Registate aqui si eres proveedor</a></li>
            <li class="d-flex"><a href="terminosycondiciones/">Terminos y Condiciones</a></li>
            <li class="d-flex"><a href="politicasdeprivacidad">Politicas de Privacidad</a></li>
            <li class="d-flex"><a href="yourBusiness/" target="_blank">TienditaCafe para tu negocio</a></li>
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

  </div>
</footer>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<div class="modal fade" id="myCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="cart">
            <h1>Mi Bolsa</h1>
            <form action="check-out-save/" method="post">
              <table class="table" id="cartItems">
              </table>
              <table class="table"> 
                <tr>
                  <td>&nbsp;</td>
                  <td>Precio total:</td>
                  <td><strong id="totalPrice">0 $</strong></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><button class="tiny secondary btn btn-secondary" id="clear" type="button">Limpiar mi bolsa</button></td>
                  <td id="checkoutBtn"></td>
                </tr>
              </table>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>



<script type="text/template" id="cartT">
  <% _.each(items, function (item) { %> 
     <tr class = "panel">
      <td><%= item.name %></td>
      <td class="label"> <%= item.count %> </td>
      <td>  $<%= item.total %></td>
      <input type="hidden" id="custId" name="productId[]" value="<%= item.id %>">
      <input type="hidden" id="custId" name="qty[]" value="<%= item.count %>">
    </tr>
  <% }); %>
</script>

<script  src="js/cart.js"></script>
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js'></script>
<script src="js/main.js"></script>


</body>
</html>