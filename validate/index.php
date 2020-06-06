<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../admin/mailer/src/Exception.php';
require '../admin/mailer/src/PHPMailer.php';
require '../admin/mailer/src/SMTP.php';
require_once('../admin/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$mail_i = test_input($_POST["email_f"]);
	$x = rand(1000,9999);;
	$sql = "SELECT email FROM users WHERE email='".$mail_i."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  	$sql2 = "SELECT code FROM users_code WHERE email_user='".$mail_i."'";
		$result2 = $conn->query($sql2);

		if ($result2->num_rows > 0) {
		  	$sql3 = "UPDATE users_code SET code='".$x."' WHERE email_user='".$mail_i."'";

			if ($conn->query($sql3) === TRUE) {
			  //echo "Enviar Correo";
				sendmail($mail_i, $x);
			} else {
			  echo "Error updating record: " . $conn->error;
			}
		} else {
			$sql3 = "INSERT INTO users_code (code, email_user)
			VALUES ('".$x."', '".$mail_i."')";

			if ($conn->query($sql3) === TRUE) {
			  //echo "Enviar Correo";
				sendmail($mail_i, $x);
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
		  
		}
	} else {
	  echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('El correo no existe. Por favor ingresa un correo valido.')
			window.location.href='../forgot/';
			</SCRIPT>");
	}

}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.location.href='../';
		</SCRIPT>");
}


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('../images/bg_4.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread">Olvidé mi contraseña</h1>
			</div>
		</div>
	</div>
</section>
<section class="ftco-section bg-light">
<div class="container">
    <div class="row">
        <div class="col-sm-12 h-100 d-inline-block">
        	<form action="../reset/" method="post">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Ingresa el codigo que enviamos a tu correo:</label>
			    <input type="text" class="form-control" id="exampleInputEmail1" name="code_to" aria-describedby="emailHelp" placeholder="XXXX">
			    <?php
			    	echo '<input type="hidden" name="code" value="'.$x.'">';
			    	echo '<input type="hidden" name="email" value="'.$mail_i.'">';
			    ?>
			  
			  </div>
			  
			  <button type="submit" class="btn btn-primary">Continuar</button>
			</form>
        </div>
    </div>
</div>
</section>

<?php
require_once('../admin/footer.php');

function sendmail($addReplyToEmail, $x){
	    $mail = new PHPMailer(true);

    try {
        //Server settings
       $mail->SMTPDebug = 2;                                       // Enable verbose debug output
       // $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'mail.coffehouse.mx';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'dihola@coffehouse.mx';                     // SMTP username
        $mail->Password   = 'Julio.Banda93';                               // SMTP password
        $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 469;                                    // TCP port to connect to


        //Recipients
        $mail->setFrom('noreply@coffehouse.mx', 'Codigo - CoffeHouse');
        $mail->addAddress(''.$addReplyToEmail.'', 'Usuario Distinguido');     // Add a recipient

        $mail->addReplyTo('dihola@coffehouse.mx', 'Informacion');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('info@agromotics.com', 'Info');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Codigo | Recuperar contraseña | CoffeHouse';
        $mail->Body    = '<p>¡Hola!</p> <p>Enseguida encuentra el codigo para reiniciar tu contraseña:</p> 
        <p>Codigo: <b>'.$x.'</b></p>
        <p>Saludos cordiales.<br>Equipo CoffeHouse. <br>dihola@coffehouse.mx</p>';
        $mail->AltBody = 'Bienvenido';

        $mail->send();

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>