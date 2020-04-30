<?php
// define variables and set to empty values
session_start();
require_once('../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $street = test_input($_POST["street"]);
    $number = test_input($_POST["number"]);
    $colony = test_input($_POST["colony"]);
    $state = test_input($_POST["state"]);
    $city = test_input($_POST["city"]);
    $cp = test_input($_POST["cp"]);
    $desc = test_input($_POST["desc"]);
    $type = test_input($_POST["type"]);
    $todayVisit = date("Y-m-d H:i:s");

    $sql = "INSERT INTO adresses (street, number, email_user, cp, colony, city, state, descripcion)
	VALUES ('$street', '$number', '".$_SESSION['email']."', '$cp', '$colony', '$city', '$state', '$desc')";

	if ($conn->query($sql) === TRUE) {
	    if ($type=="2") {
	    	echo ("<SCRIPT LANGUAGE='JavaScript'>
	        window.location.href='../check-out/';
	        </SCRIPT>");
	    }elseif ($type=="1") {
	    	echo ("<SCRIPT LANGUAGE='JavaScript'>
	        window.location.href='../profile/';
	        </SCRIPT>");
	    }
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
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


?>