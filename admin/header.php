<?php
require_once('../admin/cn.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>TienditaCafe</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Monoton&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Miss+Fajardose&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="../css/animate.css">

  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../css/magnific-popup.css">

  <link rel="stylesheet" href="../css/aos.css">
  <link rel="stylesheet" href="../css/flag.min.css">

  <link rel="stylesheet" href="../css/ionicons.min.css">

  <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="../css/jquery.timepicker.css">


  <link rel="stylesheet" href="../css/flaticon.css">
  <link rel="stylesheet" href="../css/icomoon.css">
  <link rel="stylesheet" href="../css/style.css">
  <link href="../css/fontawesome/css/all.css" rel="stylesheet">
  <style type="text/css">
    .alerti {
      position: fixed;
      bottom: 0;
      width: 40%;
      z-index: 1000;
    }
  </style>
  <style type="text/css">
    .owl-carousel .owl-stage, .owl-carousel.owl-drag .owl-item{
      -ms-touch-action: auto;
      touch-action: auto;
    }
  </style>
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
      <a class="navbar-brand" href="../"><img src="../images/logo.png" alt="Cinque Terre" width="182"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">

            <div class="row">
              <div class="col-sm-12"><form class="form-inline" action="../catalogo/" method="post">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Buscar..." aria-label="Username" id="search" name="search" aria-describedby="basic-addon1" autocomplete="off">
                  <div class="input-group-prepend">
                    <button type="submit" class="input-group-text btn btn-primary" id="basic-addon1" ><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-sm-3" style="position: absolute; top:100%;">
              <div class="list-group" id="show-list">
              </div>
            </div>
          </div>


        </li>
        <li class="nav-item <!--active-->"><a href="../coffePack/" class="nav-link">CoffePacks</a></li>
        <!--<li class="nav-item"><a href="../yourBusiness/" class="nav-link">Para tu Negocio</a></li>-->
        <li class="nav-item"><a href="../catalogo/" class="nav-link">Catalogo</a></li>
        <li class="nav-item"><a href="../vendetusproductos/" class="nav-link">Vende con nosotros</a></li>
        <li class="nav-item"><a href="../suscribete/" class="nav-link">Suscribete</a></li>
        <li class="nav-item"><a data-toggle="modal" href="#myCart" class="nav-link btn btn-warning btn-sm" data-toggle="tooltip" title="Tu bolsa de compras"><i class="fas fa-shopping-bag fa-1x"></i><span id="countCart"></span></a></li>
        <?php
        if (isset($_SESSION['email'])){

          /*echo '<li class="nav-item"><a href="profile/" class="nav-link btn btn-success btn-sm" data-toggle="tooltip" title="Inicia Sesion"><i class="fas fa-user-astronaut fa-1x"></i></a></li>';*/
          echo '<li class="nav-item"><button data-toggle="collapse" data-target="#demo" class="nav-link btn btn-success btn-sm"><i class="fas fa-user-astronaut fa-1x"></i></button></li>

          <div id="demo" class="collapse">
          <div class="btn-group-vertical">
          <a href="../sign-in/fin.php" class="btn btn-success btn-sm"><i class="fas fa-times-circle"></i> sesion</a>
          <a href="../profile/" class="btn btn-success btn-sm">Mi Perfil</a>
          <a href="../orders/" class="btn btn-success btn-sm">Mis Pedidos</a>
          <a href="../subscription/" class="btn btn-success btn-sm">Mi Subscripción</a>
          </div>
          </div>';

        }else{
          echo '<li class="nav-item"><a href="../sign-in/" class="nav-link btn btn-warning btn-sm" data-toggle="tooltip" title="Inicia Sesion"><i class="fas fa-user-astronaut fa-1x"></i></a></li>';
        }
        ?>
      </ul>
    </div>
  </div>
</nav>

  <!-- END nav -->

