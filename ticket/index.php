<?php
session_start();
require_once('../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reference = test_input($_POST["reference"]);
    $amount = test_input($_POST["amount"]);
    $cart = test_input($_POST["description"]);
    $adres = test_input($_POST["adress"]);
    $details = test_input($_POST["details"]);
    $idOpen = test_input($_POST["idOpen"]);
    $todayVisit = date("Y-m-d H:i:s");

    $sql = "UPDATE orders SET complete='2', id_adress='".$adres."', description='".$details."', track_id='".$idOpen."' WHERE id_orders=".$cart."";

    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">
        window.localStorage.clear();
    </script>';
    } else {
        //echo "Error updating record: " . $conn->error;
    }

}else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>

        window.location.href='../sign-in/';
        </SCRIPT>");
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<html>
	<head>
		<link href="../ticket/style.css" media="all" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
	</head>
	<body>
		<div class="opps">
			<div class="opps-header">
				<div class="opps-reminder">Ficha digital. No es necesario imprimir.</div>
				<div class="opps-info">
					<div class="opps-brand"><img src="../images/logo.png" alt="OXXOPay"><img src="../ticket/oxxopay_brand.png" alt="OXXOPay"></div>
					<div class="opps-ammount">
						<h3>Monto a pagar</h3>
						<h2> 
                            <?php
                            $number = number_format($amount,2,",",".");
                            echo $number;
                            ?> 
                            <sup>MXN</sup>
                        </h2>
						<p>OXXO cobrará una comisión adicional al momento de realizar el pago.</p>
					</div>
				</div>
				<div class="opps-reference">
					<h3>Referencia</h3>
					<h1>
                        <?php
                            echo $reference;
                        ?>
                    </h1>
				</div>
			</div>
			<div class="opps-instructions">
				<h3>Instrucciones</h3>
				<ol>
					<li>Acude a la tienda OXXO más cercana. <a href="https://www.google.com.mx/maps/search/oxxo/" target="_blank">Encuéntrala aquí</a>.</li>
					<li>Indica en caja que quieres realizar un pago de <strong>OXXOPay</strong>.</li>
					<li>Dicta al cajero el número de referencia en esta ficha para que tecleé directamete en la pantalla de venta.</li>
					<li>Realiza el pago correspondiente con dinero en efectivo.</li>
					<li>Al confirmar tu pago, el cajero te entregará un comprobante impreso. <strong>En el podrás verificar que se haya realizado correctamente.</strong> Conserva este comprobante de pago.</li>
				</ol>
				<div class="opps-footnote">Al completar estos pasos recibirás un correo confirmando tu pago.</div>
                <div class="opps-footnote"><button class="btn" onclick="returning()">Regresar</button></div>
			</div>
		</div>
        <script type="text/javascript" >
            function returning(){
                window.location.href='../';
            }
        </script>	
	</body>
</html>
