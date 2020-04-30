
<?php
// define variables and set to empty values
session_start();
require_once('../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $barcode_url = test_input($_POST["barcode_url"]);
    $barcode_paybin_url = test_input($_POST["barcode_paybin_url"]);
    $reference = test_input($_POST["reference"]);
    $paybin_reference = test_input($_POST["paybin_reference"]);
    $amount = test_input($_POST["amount"]);
    $cart = test_input($_POST["description"]);
    $adres = test_input($_POST["adress"]);
    $todayVisit = date("Y-m-d H:i:s");

    $sql = "UPDATE orders SET complete='2', id_adress='".$adres."' WHERE id_orders=".$cart."";

    if ($conn->query($sql) === TRUE) {
        //echo "Record updated successfully";
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


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CoffeHouse</title>
<link href="pago.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="whitepaper">
	<div class="Header">
	<div class="Logo_empresa">
    	<img src="../images/logo.png" alt="Logo">
    </div>
    
    </div>
    <div class="Data">
    	<div class="Big_Bullet">
        	<span></span>
        </div>
    	<div class="col1">
        	<h3>Fecha límite de pago</h3>
            <h4><?php
            $Date = "2010-09-17";
            echo date('d-m-Y H:i:s', strtotime($todayVisit. ' + 8 days'));
            ?></h4>
            <?php
                echo '<img width="300" src="'.$barcode_url.'" alt="Código de Barras">
                    <center><span>'.$reference.'</span></center>';
            ?>
            <small>En caso de que el escáner no sea capaz de leer el código de barras, escribir la referencia tal como se muestra.</small>

        </div>
        <div class="col2">
        	<h2>Total a pagar</h2>
            <?php
            $number = number_format($amount,2,",",".");
            echo ' <h1>$'.$number.'<small> MXN</small></h1>';
            ?>
            <span class="note">La comisión por recepción del pago varía de acuerdo a los términos y condiciones que cada cadena comercial establece.</span>
        </div>
    </div>
    <div class="DT-margin"></div>
    <div class="Data">
    	<div class="Big_Bullet">
        	<span></span>
        </div>
    	<div class="col1">
        	<h3>Detalles de la compra</h3>
        </div>
	</div>
    <div class="Table-Data">
    	<div class="table-row color1">
        	<div>Descripción</div>
            <span>Pedido CoffeHouse</span>
        </div>
    	<div class="table-row color2">
        	<div>Fecha y hora</div>
            <?php
            echo '<span>'.$todayVisit.'</span>';
            ?>
            
        </div>
    	<div class="table-row color1">
        	<div>Correo de un soñador CoffeHouse</div>
            <?php
            echo '<span>'.$_SESSION["email"].'</span>';
            ?>
            
        </div>
    	<div class="table-row color2"  style="display:none">
        	<div>&nbsp;</div>
            <span>&nbsp;</span>
        </div>
    	<div class="table-row color1" style="display:none">
        	<div>&nbsp;</div>
            <span>&nbsp;</span>
        </div>
    </div>
    <div class="logos-tiendas">

        <ul>
            <li><img src="images/01.png" width="100" height="50"></li>
            <li><img src="images/02.png" width="100" height="50"></li>
            <li><img src="images/03.png" width="100" height="50"></li>
            <li><img src="images/04.png" width="100" height="50"></li>
            <li><img src="images/05.png" width="100" height="50"></li>
            <li><img src="images/06.png" width="100" height="50"></li>
            <li><img src="images/07.png" width="100" height="50"></li>
            <li><img src="images/08.png" width="100" height="50"></li>
        </ul>

    </div>
    <div class="DT-margin"></div>
    <div>
        <div class="Big_Bullet">
        	<span></span>
        </div>
    	<div class="col1">
        	<h3>Como realizar el pago</h3>
            <ol>
            	<li>Acude a cualquier tienda afiliada</li>
                <li>Entrega al cajero el código de barras y menciona que realizarás un pago de servicio Paynet</li>
                <li>Realizar el pago en efectivo por $9,000.00 MXN </li>
                <li>Conserva el ticket para cualquier aclaración</li>
            </ol>
            <small>Si tienes dudas comunícate a NOMBRE TIENDA al teléfono TELEFONO TIENDA o al correo CORREO SOPORTE TIENDA</small>
        </div>
    	<div class="col1">
        	<h3>Instrucciones para el cajero</h3>
            <ol>
            	<li>Ingresar al menú de Pago de Servicios</li>
                <li>Seleccionar Paynet</li>
                <li>Escanear el código de barras o ingresar el núm. de referencia</li>
                <li>Ingresa la cantidad total a pagar</li>
                <li>Cobrar al cliente el monto total más la comisión</li>
                <li>Confirmar la transacción y entregar el ticket al cliente</li>
            </ol>
            <small>Para cualquier duda sobre como cobrar, por favor llamar al teléfono +52 (55) 5351 7371 en un horario de 8am a 9pm de lunes a domingo</small>
        </div>
    </div>

    
    <div class="Powered">
        <a id="myLink" href="#" onclick="printing();return false;">Imprimir</a>
        <a href="../">Seguir comprando</a>
    </div>
</div>
<div style="height: 40px; width: 100%; float left;"></div>
<script type="text/javascript">
    function printing(){
        window.print();
    }
</script>
<script type="text/javascript">
    window.localStorage.clear();
</script>
</body>
</html>
