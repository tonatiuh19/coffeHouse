<?php
session_start();
require_once('../../admin/cn.php');
require_once("../../check-out/pay/conekta/conekta-php/lib/Conekta.php");
\Conekta\Conekta::setApiKey("key_r4xRrHrCWepFPgPbmiBF1Q");
\Conekta\Conekta::setApiVersion("2.0.0");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_subscriptions = test_input($_POST["id_subscriptions"]);
    $conekta_id = test_input($_POST["conekta_id"]);
    $todayVisit = date("Y-m-d H:i:s");

    $sql = "UPDATE subscriptions SET end_date='".$todayVisit."', active='2' WHERE id_subscriptions=".$id_subscriptions."";

    if ($conn->query($sql) === TRUE) {
        try {
            $customer = \Conekta\Customer::find($conekta_id);
            $subscription = $customer->subscription->cancel();

            echo ("<SCRIPT LANGUAGE='JavaScript'>

        window.location.href='../../subscription/';
        </SCRIPT>");
          } catch (\Conekta\ProccessingError $error){
            echo $error->getMesage();
          } catch (\Conekta\ParameterValidationError $error){
            echo $error->getMessage();
          } catch (\Conekta\Handler $error){
            echo $error->getMessage();
          }
    } else {
        //echo "Error updating record: " . $conn->error;
    }

}else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>

        window.location.href='../../subscription/';
        </SCRIPT>");
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>