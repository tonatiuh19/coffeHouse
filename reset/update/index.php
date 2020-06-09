<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../../admin/mailer/src/Exception.php';
require '../../admin/mailer/src/PHPMailer.php';
require '../../admin/mailer/src/SMTP.php';
require '../../admin/cn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$mail_i = test_input($_POST["email"]);
	$x = test_input($_POST["pwd_2"]);
	
	$sql = "UPDATE users SET pwd='".$x."' WHERE email='".$mail_i."'";

	if ($conn->query($sql) === TRUE) {
	  echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Contraseña actualizada correctamente.')
			window.location.href='../../sign-in/';
			</SCRIPT>");
	  sendmail($mail_i);
	} else {
	  echo "Error updating record: " . $conn->error;
	}

	$conn->close();
	

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

function sendmail($addReplyToEmail){
	$mail = new PHPMailer(true);

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
        $mail->setFrom('noreply@tienditacafe.com', 'Contraseña actualizada - TienditaCafe');
        $mail->addAddress(''.$addReplyToEmail.'', 'Usuario Distinguido');     // Add a recipient

        $mail->addReplyTo('dihola@tienditacafe.com', 'Informacion');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('info@agromotics.com', 'Info');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Contraseña actualizada | TienditaCafe';
        $mail->Body    = '<p>¡Hola!</p> <p>Tu contraseña ha sido actualizada correctamente.</p> 
        
        <p>Saludos cordiales.<br>Equipo TienditaCafe. <br>dihola@tienditacafe.com</p>';
        $mail->AltBody = 'Bienvenido';

        $mail->send();

    } catch (Exception $e) {
    	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>