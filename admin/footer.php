    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container-fluid px-md-5 px-3">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-4">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Acerca de Nosotros</h2>
              <p><b>Escribenos: </b><br><a href="mailto:dihola@tienditacafe.com?Subject=Contacto">dihola@tienditacafe.com</span></a></p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">

                <!--<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>-->
                <li class="ftco-animate"><a href="https://www.facebook.com/Tiendita-Caf%C3%A9-114440876982576" target="_blank"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/tienditacafe/?hl=es-la" target="_blank"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">¿Tienes alguna pregunta?</h2>
              <ul class="list-unstyled open-hours">
                <li class="d-flex"><a href="mailto:dihola@tienditacafe.com?Subject=Contacto">Contacto</a></li>
                <li class="d-flex"><a href="../vendetusproductos/">Registate aqui si eres proveedor</a></li>
                <li class="d-flex"><a href="../terminosycondiciones/" target="_blank">Terminos y Condiciones</a></li>
                <li class="d-flex"><a href="../politicasdeprivacidad/" target="_blank">Politicas de Privacidad</a></li>
                <li class="d-flex"><a href="../yourBusiness/">TienditaCafe para tu negocio</a></li>
              </ul>
            </div>
          </div>
         
          <div class="col-md-6 col-lg-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Instagram</h2>
              <div class="thumb d-sm-flex">
                <a href="#" class="thumb-menu img" style="background-image: url(../images/insta-1.jpg);">
                </a>
                <a href="#" class="thumb-menu img" style="background-image: url(../images/insta-2.jpg);">
                </a>
                <a href="#" class="thumb-menu img" style="background-image: url(../images/insta-3.jpg);">
                </a>
              </div>
              <div class="thumb d-flex">
                <a href="#" class="thumb-menu img" style="background-image: url(../images/insta-4.jpg);">
                </a>
                <a href="#" class="thumb-menu img" style="background-image: url(../images/insta-5.jpg);">
                </a>
                <a href="#" class="thumb-menu img" style="background-image: url(../images/insta-6.jpg);">
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
              <form action="../check-out-save/" method="post">
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

  <script  src="../js/cart.js"></script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/jquery.timepicker.min.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js'></script>
  <script src="../js/main.js"></script>
  <script src="../js/paginga.jquery.js"></script> 
  <script type="text/javascript">
    $(function() {
      var alert = $('div.alert[auto-close]');
      alert.each(function() {
        var that = $(this);
        var time_period = that.attr('auto-close');
        setTimeout(function() {
          that.alert('close');
        }, time_period);
      });
    });

    $(document).ready(function(){
      $('#prdAlert').click(function(){
        $('#moo').show()
      }) 
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#search").keyup(function(){     
        var searchText = $(this).val();
        if (searchText != '') {
          $.ajax({
            url: '../admin/action_search.php',
            method: 'post',
            data:{query:searchText},
            success:function(response){
              $("#show-list").html(response);
            }
          });
        }else{
          $("#show-list").html('');
        }
      });

    });
  </script>

</body>
</html>

<div class="alert alert-success alert-dismissible fade show alerti" role="alert" id="passwordsNoMatchRegister">
  <strong>¡Añadido!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#passwordsNoMatchRegister').hide();
  });
  function alertii(){
    $('#passwordsNoMatchRegister').show();
    setTimeout(closeAlert, 1000);
  }

  function closeAlert(){
    $('#passwordsNoMatchRegister').hide();
  }

  if (navigator.appName == 'Microsoft Internet Explorer' ||  !!(navigator.userAgent.match(/Trident/) || navigator.userAgent.match(/rv:11/)) || (typeof $.browser !== "undefined" && $.browser.msie == 1))
  {
    alert("TienditaCafe por el momento no es compatible con Internet Explorer.");
  }
</script>

