<?php
require_once("../conekta/conekta-php/lib/Conekta.php");
\Conekta\Conekta::setApiKey("key_r4xRrHrCWepFPgPbmiBF1Q");
\Conekta\Conekta::setApiVersion("2.0.0");
require_once('../../../admin/cn.php');

$sql = "SELECT name, last_name, conekta_id FROM users WHERE email='".$_POST["email"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
	while($row = $result->fetch_assoc()) {
		$name = $row["name"];
		$last_name = $row["last_name"];
		$conekta_id = $row["conekta_id"];
	}
} else {
	echo "0 results";
}
$full = $name." ".$last_name;
$type = $_POST["payType"];
$status=0;
$todayVisit = date("Y-m-d H:i:s");

try {

	$customer = \Conekta\Customer::find($conekta_id);
	$source = $customer->createPaymentSource([
	'token_id' => 'tok_test_visa_4242',
	'type'     => 'card'
	]);

	if ($type=="1") {
		$customer = \Conekta\Customer::find($conekta_id);
		$subscription = $customer->createSubscription(
			[
				'plan' => '1'
			]
		);
	}elseif ($type=="2") {
		$customer = \Conekta\Customer::find($conekta_id);
		$subscription = $customer->createSubscription(
			[
				'plan' => '2'
			]
		);
	}elseif ($type=="3") {
		$customer = \Conekta\Customer::find($conekta_id);
		$subscription = $customer->createSubscription(
			[
				'plan' => '3'
			]
		);
	}
	//echo $subscription;

	$sql = "INSERT INTO subscriptions (user_email, start_date, id_adresss, active, type, subs_id)
	VALUES ('".$_POST["email"]."', '".$todayVisit."', '".$_POST["adres"]."', '1', '".$type."', '".$subscription->id."')";

	if ($conn->query($sql) === TRUE) {
		echo '<form action="../../../status/" id="finish" method="post">';
		echo '<input type="hidden" name="stat" value="10">';
		echo '<input type="hidden" name="cart" value="'.$type.'">';
		echo '<input type="hidden" name="adress" value="'.$_POST["adres"].'">';
		echo '</form>';
		echo '<script type="text/javascript">
		document.getElementById("finish").submit();
		</script>';
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
  } catch (\Conekta\ProccessingError $error){
	$error->getMesage();
	echo '<form action="../../status/" id="finish" method="post">';
			echo '<input type="hidden" name="stat" value="2">';
			echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
	echo '</form>';
	echo '<script type="text/javascript">
	document.getElementById("finish").submit();
	</script>';
  } catch (\Conekta\ParameterValidationError $error){
	echo $error->getMessage();
	echo '<form action="../../status/" id="finish" method="post">';
			echo '<input type="hidden" name="stat" value="2">';
			echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
	echo '</form>';
	echo '<script type="text/javascript">
	document.getElementById("finish").submit();
	</script>';
  } catch (\Conekta\Handler $error){
	echo $error->getMessage();
	echo '<form action="../../status/" id="finish" method="post">';
			echo '<input type="hidden" name="stat" value="2">';
			echo '<input type="hidden" name="cart" value="'.$_POST["description"].'">';
	echo '</form>';
	echo '<script type="text/javascript">
	document.getElementById("finish").submit();
	</script>';
  }
		
?>
