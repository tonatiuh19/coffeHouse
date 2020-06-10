<?php
// define variables and set to empty values
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../admin/mailer/src/Exception.php';
require '../admin/mailer/src/PHPMailer.php';
require '../admin/mailer/src/SMTP.php';
require_once('../admin/cn.php');
require_once('../admin/header.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$status = test_input($_POST["stat"]);
	$cart = test_input($_POST["cart"]);
	$adress = test_input($_POST["adress"]);


	
	?>
	<section class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.5" style="background-image: url('../images/bg_4.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<?php
					//$status=1;
					if ($status==1) {
						echo '<h1 class="mb-2 bread">Gracias por tu compra</h1>
								<script type="text/javascript">
									window.localStorage.clear();
								</script>';
						$sql = "UPDATE orders SET complete='1', id_adress='".$adress."' WHERE id_orders=".$cart."";

						if ($conn->query($sql) === TRUE) {
						    //echo "Record updated successfully";
						} else {
						    //echo "Error updating record: " . $conn->error;
						}
					}elseif ($status==2) {
						echo '<h1 class="mb-2 bread">Tu pago ha sido declinado</h1>';
					}elseif ($status==3) {
						echo '<h1 class="mb-2 bread">Se interrumpio tu conexion</h1>';
					}elseif ($status==4) {
						echo '<h1 class="mb-2 bread">Se interrumpio tu conexion</h1>';
					}elseif ($status==5) {
						echo '<h1 class="mb-2 bread">Se interrumpio tu conexion</h1>';
					}elseif ($status==6) {
						echo '<h1 class="mb-2 bread">Se interrumpio tu conexion</h1>';
					}elseif ($status==10) {
						echo '<h1 class="mb-2 bread">Tu subscripcion esta completa</h1>
								';
					}else{
						echo '<h1 class="mb-2 bread">Se interrumpio tu conexion</h1>';
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-section">
		<div class="container">
		    <div class="row">
		        <div class="col-sm-12">
		        	<div class="jumbotron">
		        		<?php
		        		if ($status==1) {
		        			echo '<h1 class="display-4"><i class="fas fa-check-circle fa-2x text-success"></i> Tu pago ha sido procesado</h1>
								  <p class="lead">En breve recibirás un correo electrónico con el número de guía, con el cual podras hacer el seguimiento de tu pedido.</p>
								  <hr class="my-4">
								  <p>Nº de pedido: <b>'.$cart.'</b>
								  <br>Pago con: <b>Tarjeta</b></p>
								  <h4>Envio:</h4>
								  	<table class="table">
									  <thead class="thead-dark">
									    <tr>
									      <th scope="col">Producto</th>
									      <th scope="col">Cantidad</th>
									      <th scope="col">Precio</th>
									    </tr>
									  </thead>
									  <tbody>
									  ';
									  $sql = "SELECT b.id_carts, b.id_products, b.quantity, b.id_orders, e.price, d.name FROM carts as b INNER JOIN orders as c on c.id_orders=b.id_orders INNER JOIN products as d on d.id_products=b.id_products INNER JOIN (SELECT a.id_prices, a.id_products, a.price FROM prices AS a WHERE date = ( SELECT MAX(date) FROM prices AS b WHERE a.id_products = b.id_products )) as e on d.id_products=e.id_products WHERE c.id_orders=".$cart."";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
										    // output data of each row
										    while($row = $result->fetch_assoc()) {
										        echo '<tr>
													      <th scope="row">'.$row["name"].'</th>
													      <td>'.$row["quantity"].'</td>
													      <td>'.$row["price"].'</td>
													    </tr>';
										    }
										} else {
										    echo "0 results";
										}
									 echo '</tbody>
									</table>
								  </p>
								  <p>¿Tienes más preguntas?
									Visita nuestro Centro de ayuda</p>
								  <p>
								  <p class="lead">
								    <a class="btn btn-primary btn-lg" href="#" role="button">Regresar</a>
								  </p>';
						}elseif ($status==2) {
		        			echo '<h1 class="display-4"><i class="fas fa-times-circle fa-2x text-danger"></i> Tu pago no fue procesado</h1>
								  <p class="lead">Intenta con otro medio de pago.</p>
								  <hr class="my-4">
								  <p>¿Tienes más preguntas?
									Visita nuestro Centro de ayuda</p>
								  <p>
								  <p class="lead">
								    <a class="btn btn-primary btn-lg" href="#" role="button">Regresar</a>
								  </p>';
						}elseif ($status==10) {
							$sqla = "SELECT a.street, a.number, a.cp, a.colony, a.city, a.state, b.name FROM adresses as a INNER JOIN users as b on a.email_user=b.email WHERE a.id_adresses='".$adress."'";
							$resulta = $conn->query($sqla);

							if ($resulta->num_rows > 0) {
							  echo '<h1 class="display-4"><i class="fas fa-check-circle fa-2x text-success"></i> Tu sueño de recibir cafe todos los meses esta completo</h1>
								  <p class="lead">En breve recibirás un correo electrónico con instrucciones  de tu primer pedido y asi cada mes.</p>
								  <hr class="my-4">
								  <p>¿Tienes más preguntas?
									Visita nuestro Centro de ayuda</p>
								  <p>
								  <p class="lead">
								    <a class="btn btn-primary btn-lg" href="#" role="button">Regresar</a>
								  </p>';
							  while($rowa = $resulta->fetch_assoc()) {
							  	if ($cart=="1") {
							  		sendmail($_SESSION['email'], $rowa["name"], $rowa["street"], $rowa["number"], $rowa["cp"], $rowa["colony"], $rowa["city"], $rowa["state"], "Barista", "199");
							  	}elseif ($cart=="2") {
							  		sendmail($_SESSION['email'], $rowa["name"], $rowa["street"], $rowa["number"], $rowa["cp"], $rowa["colony"], $rowa["city"], $rowa["state"], "Barista Pro", "299");
							  	}elseif ($cart=="3") {
							  		sendmail($_SESSION['email'], $rowa["name"], $rowa["street"], $rowa["number"], $rowa["cp"], $rowa["colony"], $rowa["city"], $rowa["state"], "Barista Dios", "399");
							  	}
							    
							  }
							} else {
							  echo "0 results";
							}
		        			
							
						}else{
		        			echo '<h1 class="display-4"><i class="fas fa-times-circle fa-2x text-danger"></i> Tu sueño de recibir cafe todos los meses esta completo</h1>
								  <p class="lead">Intentalo de nuevo.</p>
								  <hr class="my-4">
								  <p>¿Tienes más preguntas?
									Visita nuestro Centro de ayuda</p>
								  <p>
								  <p class="lead">
								    <a class="btn btn-primary btn-lg" href="#" role="button">Regresar</a>
								  </p>';
						}
		        		?>
					</div>
		        </div>
		    </div>
		</div>

	</section>
	<?php
	
}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.location.href='../../';
		</SCRIPT>");
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function sendmail($addReplyToEmail, $name, $street, $number, $cp, $colony, $city, $state, $plan, $costo){
	$todayVisit = date("Y-m-d");
  $mail = new PHPMailer(true);
  $mess = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml"> <head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <meta name="viewport" content="width=device-width, initial-scale=1" /> <title>TienditaCafe</title> <style type="text/css"> /* Take care of image borders and formatting */ img {max-width: 600px; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; } a {border: 0; outline: none; } a img {border: none; } /* General styling */ td, h1, h2, h3  {font-family: Helvetica, Arial, sans-serif; font-weight: 400; } td {font-size: 13px; line-height: 150%; text-align: left; } body {-webkit-font-smoothing:antialiased; -webkit-text-size-adjust:none; width: 100%; height: 100%; color: #37302d; background: #ffffff; } table {border-collapse: collapse !important; } h1, h2, h3 {padding: 0; margin: 0; color: #444444; font-weight: 400; line-height: 110%; } h1 {font-size: 35px; } h2 {font-size: 30px; } h3 {font-size: 24px; } h4 {font-size: 18px; font-weight: normal; } .important-font {color: #21BEB4; font-weight: bold; } .hide {display: none !important; } .force-full-width {width: 100% !important; } td.desktop-hide {font-size: 0; height: 0; display: none; color: #ffffff; } </style> <style type="text/css" media="screen"> @media screen {@import url(http://fonts.googleapis.com/css?family=Open+Sans:400); /* Thanks Outlook 2013! */ td, h1, h2, h3 {font-family: "Open Sans", "Helvetica Neue", Arial, sans-serif !important; } } </style> <style type="text/css" media="only screen and (max-width: 600px)"> /* Mobile styles */ @media only screen and (max-width: 600px) {table[class="w320"] {width: 320px !important; } table[class="w300"] {width: 300px !important; } table[class="w290"] {width: 290px !important; } td[class="w320"] {width: 320px !important; } td[class~="mobile-padding"] {padding-left: 14px !important; padding-right: 14px !important; } td[class*="mobile-padding-left"] {padding-left: 14px !important; } td[class*="mobile-padding-right"] {padding-right: 14px !important; } td[class*="mobile-block"] {display: block !important; width: 100% !important; text-align: left !important; padding-left: 0 !important; padding-right: 0 !important; padding-bottom: 15px !important; } td[class*="mobile-no-padding-bottom"] {padding-bottom: 0 !important; } td[class~="mobile-center"] {text-align: center !important; } table[class*="mobile-center-block"] {float: none !important; margin: 0 auto !important; } *[class*="mobile-hide"] {display: none !important; width: 0 !important; height: 0 !important; line-height: 0 !important; font-size: 0 !important; } td[class*="mobile-border"] {border: 0 !important; } td[class*="desktop-hide"] {display: block !important; font-size: 13px !important; height: 61px !important; padding-top: 10px !important; padding-bottom: 10px !important; color: #444444 !important; } body {background-color: #ffffff; } } </style> </head> <body class="body" style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none" bgcolor="#ffffff"> <table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%"> <tr> <td align="center" valign="top" bgcolor="#ffffff"  width="100%"> <table cellspacing="0" cellpadding="0" width="100%"> <tr> <td style="background:#1f1f1f" width="100%"> <center> <table cellspacing="0" cellpadding="0" width="600" class="w320"> <tr> <td valign="top" class="mobile-block mobile-no-padding-bottom mobile-center" width="270" style="background:#1f1f1f;padding:10px 10px 10px 20px;"> <!--<a href="#" style="text-decoration:none;">--> <img src="../images/logo.jpg" width="142" height="30" alt="Your Logo"/> <!--</a>--> </td> <td valign="top" class="mobile-block mobile-center" width="270" style="background:#1f1f1f;padding:10px 15px 10px 10px"> </td> </tr> </table> </center> </td> </tr> <tr> <td style="border-bottom:1px solid #e7e7e7;"> <center> <table cellpadding="0" cellspacing="0" width="600" class="w320"> <tr> <td align="left" class="mobile-padding" style="padding:20px"> <br class="mobile-hide" /> <p><h2>Tu subcripcion esta completa.</h2></p> <div> <b>Direccion:</b><br> '.$street.' '.$number.'.<br> '.$colony.', '.$state.'<br> '.$cp.', '.$city.' '.$state.'<br> <br> <br> <b>Enseguida recibiras otro correo con tu ID de seguimiento de tu primer pedido y asi cada mes.</b> </div> <br> <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff"> <tr> <td style="width:100px;background:#D84A38;"> <div> <!--[if mso]> <v:rect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:33px;v-text-anchor:middle;width:100px;" stroke="f" fillcolor="#D84A38"> <w:anchorlock/> <center> <![endif]--> <a href="https://tienditacafe.com/subscription/"style="background-color:#D84A38;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:13px;font-weight:bold;line-height:33px;text-align:center;text-decoration:none;width:100px;-webkit-text-size-adjust:none;">Mi subcripcion</a> <!--[if mso]> </center> </v:rect> <![endif]--> </div> </td> <td width="281" style="background-color:#ffffff; font-size:0; line-height:0;">&nbsp;</td> </tr> </table> </td> <td class="mobile-hide" style="padding-top:20px;padding-bottom:0; vertical-align:bottom;" valign="bottom"> <table cellspacing="0" cellpadding="0" width="100%"> <tr> <td align="right" valign="bottom" style="padding-bottom:0; vertical-align:bottom;"> <img  style="vertical-align:bottom;" src="https://www.filepicker.io/api/file/9f3sP1z8SeW1sMiDA48o"  width="174" height="294" /> </td> </tr> </table> </td> </tr> </table> </center> </td> </tr> <tr> <td valign="top" style="background-color:#f8f8f8;border-bottom:1px solid #e7e7e7;"> <center> <table border="0" cellpadding="0" cellspacing="0" width="600" class="w320" style="height:100%;"> <tr> <td valign="top" class="mobile-padding" style="padding:20px;"> <table cellspacing="0" cellpadding="0" width="100%"> <tr> <td style="padding-right:20px"> <b>Plan</b> </td> <td style="padding-right:20px"> <b>Inicio de plan</b> </td> <td> <b>Costo</b> </td> </tr> <tr> <td style="padding-top:5px;padding-right:20px; border-top:1px solid #E7E7E7; "> '.$plan.' </td> <td style="padding-top:5px;padding-right:20px; border-top:1px solid #E7E7E7;"> '.$todayVisit.' </td> <td style="padding-top:5px; border-top:1px solid #E7E7E7;" class="mobile"> $'.$costo.'.00 </td> </tr> </table> <table cellspacing="0" cellpadding="0" width="100%"> <tr> <td style="padding-top:35px;"> <table cellpadding="0" cellspacing="0" width="100%"> <tr> <td width="350" class="mobile-hide" style="vertical-align:top;"> Cualquier duda que tengas no dudes en contestar este correo.<br> <h4>Equipo TienditaCafe<h4> </td> <td style="padding:0px 0 15px 30px;" class="mobile-block"> </td> </tr> <tr> <td style="vertical-align:top;" class="desktop-hide"> Cualquier duda que tengas no dudes en contestar este correo.<br> <h4>Equipo TienditaCafe<h4> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </center> </td> </tr> <tr> <td style="background-color:#1f1f1f;"> <center> <table border="0" cellpadding="0" cellspacing="0" width="600" class="w320" style="height:100%;color:#ffffff" bgcolor="#1f1f1f" > <tr> <td align="right" valign="middle" class="mobile-padding" style="font-size:12px;padding:20px; background-color:#1f1f1f; color:#ffffff; text-align:left; "> <a style="color:#ffffff;"  href="#">Contactanos</a>&nbsp;&nbsp;|&nbsp;&nbsp; <a style="color:#ffffff;" href="#">Facebook</a>&nbsp;&nbsp;|&nbsp;&nbsp; <a style="color:#ffffff;" href="#">Twitter</a>&nbsp;&nbsp;|&nbsp;&nbsp; <a style="color:#ffffff;" href="#">Support</a> </td> </tr> </table> </center> </td> </tr> </table> </td> </tr> </table> </body> </html>';

  try {
        //Server settings
       $mail->SMTPDebug = 2;                                       // Enable verbose debug output
       // $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'mail.tienditacafe.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'dihola@tienditacafe.com';                     // SMTP username
        $mail->Password   = 'JulioBanda93';                               // SMTP password
        $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 469;                                    // TCP port to connect to


        //Recipients
        $mail->setFrom('noreply@tienditacafe.com', 'Tu subscripcion - Tiendita Cafe');
        $mail->addAddress(''.$addReplyToEmail.'', ''.$name.'');     // Add a recipient

        $mail->addReplyTo('dihola@tienditacafe.com', 'Informacion');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('info@agromotics.com', 'Info');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Tu subscripcion | TienditaCafe';
        $mail->Body    = $mess;

        $mail->send();


      } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
    }

require_once('../admin/footer.php');
?>
