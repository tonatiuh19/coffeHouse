<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../../admin/mailer/src/Exception.php';
require '../../admin/mailer/src/PHPMailer.php';
require '../../admin/mailer/src/SMTP.php';

session_start();
require_once('../../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$mail_i = test_input($_POST["email_f"]);
	$name = test_input($_POST["first_n"]);
	$lastname = test_input($_POST["last_n"]);
	$pwd = test_input($_POST["pwd_f"]);
	
	/*if (!isset($_POST['im_busi'])) {
        // checkbox was not checked...do something
		$type = "1";
	} else {
        // checkbox was checked. Rock on!
		$type = "2";
	}*/
 //
	$today = date("Y-m-d H:i:s");

	$sql = "SELECT email FROM users where email='$mail_i'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('¡Este usuario ya existe!')
			window.location.href='../';
			</SCRIPT>");
	} else {
		$sql = "INSERT INTO users (email, name, last_name, pwd, type, date)
		VALUES ('$mail_i', '$name', '$lastname', '$pwd', '1', '$today')";

		if ($conn->query($sql) === TRUE) {
      sendmail($mail_i, $name);
      $_SESSION["email"] =	$mail_i;
      $_SESSION["type_user"] =	$type;
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.location.href='../../';
        </SCRIPT>");

    } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
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


function sendmail($addReplyToEmail, $name){
  $mail = new PHPMailer(true);
  $mess = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml"> <head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <meta name="viewport" content="width=device-width, initial-scale=1" /> <title>Bienvenido</title> <style type="text/css"> /* Take care of image borders and formatting */ img {max-width: 600px; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; } a {border: 0; outline: none; } a img {border: none; } /* General styling */ td, h1, h2, h3  {font-family: Helvetica, Arial, sans-serif; font-weight: 400; } td {font-size: 13px; line-height: 150%; text-align: left; } body {-webkit-font-smoothing:antialiased; -webkit-text-size-adjust:none; width: 100%; height: 100%; color: #37302d; background: #ffffff; } table {border-collapse: collapse !important; } h1, h2, h3 {padding: 0; margin: 0; color: #444444; font-weight: 400; line-height: 110%; } h1 {font-size: 35px; } h2 {font-size: 30px; } h3 {font-size: 24px; } h4 {font-size: 18px; font-weight: normal; } .important-font {color: #21BEB4; font-weight: bold; } .hide {display: none !important; } .force-full-width {width: 100% !important; } </style> <style type="text/css" media="screen"> @media screen {@import url(http://fonts.googleapis.com/css?family=Open+Sans:400); /* Thanks Outlook 2013! */ td, h1, h2, h3 {font-family: "Open Sans", "Helvetica Neue", Arial, sans-serif !important; } } </style> <style type="text/css" media="only screen and (max-width: 600px)"> /* Mobile styles */ @media only screen and (max-width: 600px) {table[class="w320"] {width: 320px !important; } table[class="w300"] {width: 300px !important; } table[class="w290"] {width: 290px !important; } td[class="w320"] {width: 320px !important; } td[class~="mobile-padding"] {padding-left: 14px !important; padding-right: 14px !important; } td[class*="mobile-padding-left"] {padding-left: 14px !important; } td[class*="mobile-padding-right"] {padding-right: 14px !important; } td[class*="mobile-block"] {display: block !important; width: 100% !important; text-align: left !important; padding-left: 0 !important; padding-right: 0 !important; padding-bottom: 15px !important; } td[class*="mobile-no-padding-bottom"] {padding-bottom: 0 !important; } td[class~="mobile-center"] {text-align: center !important; } table[class*="mobile-center-block"] {float: none !important; margin: 0 auto !important; } *[class*="mobile-hide"] {display: none !important; width: 0 !important; height: 0 !important; line-height: 0 !important; font-size: 0 !important; } td[class*="mobile-border"] {border: 0 !important; } } </style> </head> <body class="body" style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none" bgcolor="#ffffff"> <table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%"> <tr> <td align="center" valign="top" bgcolor="#ffffff"  width="100%"> <table cellspacing="0" cellpadding="0" width="100%"> <tr> <td style="background:#1f1f1f" width="100%"> <center> <table cellspacing="0" cellpadding="0" width="600" class="w320"> <tr> <td valign="top" class="mobile-block mobile-no-padding-bottom mobile-center" width="270" style="background:#1f1f1f;padding:10px 10px 10px 20px;"> <!--<a href="#" style="text-decoration:none;"> <img src="../../images/logo.png" width="142"  alt="Your Logo"/> </a>--> </td> <td valign="top" class="mobile-block mobile-center" width="270" style="background:#1f1f1f;padding:10px 15px 10px 10px"> </td> </tr> </table> </center> </td> </tr> <tr> <td style="border-bottom:1px solid #e7e7e7;"> <center> <table cellpadding="0" cellspacing="0" width="600" class="w320"> <tr> <td align="left" class="mobile-padding" style="padding:20px"> <br class="mobile-hide" /> <h2>Bienvenido :)</h2><br> Hola '.$name.',<br> <b>Felicidades!</b> Tu cuenta ha sido creada satisfactoriamente. Ahora tu sueño de adquirir cafe de todo el mundo esta a punto de convertirse en una realidad.<br> <br> <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff"> <tr> <td style="width:100px;background:#D84A38;"> <div> <!--[if mso]> <v:rect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:33px;v-text-anchor:middle;width:100px;" stroke="f" fillcolor="#D84A38"> <w:anchorlock/> <center> <![endif]--> <!--<a href="#"style="background-color:#D84A38;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:13px;font-weight:bold;line-height:33px;text-align:center;text-decoration:none;width:100px;-webkit-text-size-adjust:none;">My Order</a>--> <!--[if mso]> </center> </v:rect> <![endif]--> </div> </td> <td width="281" style="background-color:#ffffff; font-size:0; line-height:0;">&nbsp;</td> </tr> </table> </td> <td class="mobile-hide" style="padding-top:20px;padding-bottom:0; vertical-align:bottom;" valign="bottom"> <table cellspacing="0" cellpadding="0" width="100%"> <tr> <td align="right" valign="bottom" style="padding-bottom:0; vertical-align:bottom;"> <!--<img  style="vertical-align:bottom;" src="https://www.filepicker.io/api/file/9f3sP1z8SeW1sMiDA48o"  width="174" height="294" />--> </td> </tr> </table> </td> </tr> </table> </center> </td> </tr> <tr> <td valign="top" style="background-color:#f8f8f8;border-bottom:1px solid #e7e7e7;"> <center> <table border="0" cellpadding="0" cellspacing="0" width="600" class="w320" style="height:100%;"> <tr> <td valign="top" class="mobile-padding" style="padding:20px;"> <!--<table cellspacing="0" cellpadding="0" width="100%"> <tr> <td style="padding-right:20px"> <b>Shipping Date</b> </td> <td> <b>Shipping Address</b> </td> </tr> <tr> <td style="padding-top:5px; padding-right:20px; border-top:1px solid #E7E7E7; vertical-align:top; "> Monday, 13th November 2014 </td> <td style="padding-top:5px; border-top:1px solid #E7E7E7;"> Lavender St.<br> Victoria, B.C.<br> V8P 2P2 </td> </tr> </table>--> <table cellspacing="0" cellpadding="0" width="100%"> <tr> <td style="padding-top:50px;"> <table cellpadding="0" cellspacing="0" width="100%"> <tr> <td width="350" style="vertical-align:top;"> Cualquier duda no dudes en contestar este correo<br> <h4>Equipo TienditaCafe<h4> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </center> </td> </tr> <tr> <td style="background-color:#1f1f1f;"> <center> <table border="0" cellpadding="0" cellspacing="0" width="600" class="w320" style="height:100%;color:#ffffff" bgcolor="#1f1f1f" > <tr> <td align="right" valign="middle" class="mobile-padding" style="font-size:12px;padding:20px; background-color:#1f1f1f; color:#ffffff; text-align:left; "> <!--<a style="color:#ffffff;"  href="#">Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;--> <a style="color:#ffffff;" href="#">Facebook</a>&nbsp;&nbsp;|&nbsp;&nbsp; <a style="color:#ffffff;" href="#">Twitter</a>&nbsp;&nbsp;|&nbsp;&nbsp; <a style="color:#ffffff;" href="#">Soportet</a> </td> </tr> </table> </center> </td> </tr> </table> </td> </tr> </table> </body> </html>';

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
        $mail->setFrom('noreply@tienditacafe.com', 'Bienvenido - Tiendita Cafe');
        $mail->addAddress(''.$addReplyToEmail.'', ''.$name.'');     // Add a recipient

        $mail->addReplyTo('dihola@tienditacafe.com', 'Informacion');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('info@agromotics.com', 'Info');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Bienvenido | TienditaCafe';
        $mail->Body    = $mess;

        $mail->send();


      } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
    }

    ?>
