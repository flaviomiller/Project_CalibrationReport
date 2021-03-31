<?php

session_start();
include_once("../classes/conexoes/conexao.php");

$scale_id = filter_input(INPUT_POST, 'scale_id', FILTER_SANITIZE_STRING);
$sn = filter_input(INPUT_POST, 'sn', FILTER_SANITIZE_STRING);
$model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
$manufacturer = filter_input(INPUT_POST, 'manufacturer', FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
$capacity = filter_input(INPUT_POST, 'capacity', FILTER_SANITIZE_STRING);
$nmincapacity = filter_input(INPUT_POST, 'nmincapacity', FILTER_SANITIZE_STRING);
$nmeasure = filter_input(INPUT_POST, 'nmeasure', FILTER_SANITIZE_STRING);
$location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
$control = filter_input(INPUT_POST, 'control', FILTER_SANITIZE_STRING);
$customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_SANITIZE_STRING);




$result_scale = "UPDATE `scales` SET `sn` = '$sn', `model` = '$model', `manufacturer` = '$manufacturer', `type` = '$type', `capacity` = '$capacity', `nmincapacity` = '$nmincapacity', `nmeasure` = '$nmeasure', `location` = '$location', `control` = '$control', `customer_id` = '$customer_id', `modified` = NOW() WHERE `scales`.`scale_id` = '$scale_id'";
$resultado_scale = mysqli_query($conn, $result_scale);

if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "Scale updated successfully!";
    header("Location: ../administracao/valida_select_scale.php?id=$scale_id");
    echo $_SESSION['msg'];
} else {
    $_SESSION['msg'] = "Error updating Scale";
    header("Location: edit_scale.php?scale_id=$scale_id");
    echo $_SESSION['msg'];
}


//echo  "scale_id: $scale_id <br>";
//echo  "sn: $sn <br>";
//echo  "model: $model <br>";
//echo  "manufacturer: $manufacturer <br>";
//echo  "type: $type <br>";
//echo  "capacity: $capacity <br>";
//echo  "nmincapacity: $nmincapacity <br>";
//echo  "nmeasure: $nmeasure <br>";
//echo  "location: $location <br>";
//echo  "control: $control <br>";
//echo  "customer_id: $customer_id <br>";