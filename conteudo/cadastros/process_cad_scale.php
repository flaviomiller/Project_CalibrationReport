<?php
session_start();
include_once("../classes/conexoes/conexao.php");

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

//echo  "Serial Number: $sn <br>";
//echo  "Model: $model <br>";
//echo  "Manufacturer: $manufacturer <br>";
//echo  "Type: $type <br>";
//echo  "Capacity: $capacity <br>";
//echo  "Min. Capacity: $nmincapacity <br>";
//echo  "Measure: $nmeasure <br>";
//echo  "Location: $location <br>";
//echo  "Control: $control <br>";
//echo  "Customer ID: $customer_id <br>";

$result_scale = "INSERT INTO scales (sn, model, manufacturer, type, capacity, nmincapacity, nmeasure, location, control, customer_id, created) VALUES ('$sn', '$model', '$manufacturer', '$type', '$capacity', '$nmincapacity', '$nmeasure', '$location', '$control', '$customer_id', NOW())";
$resultado_scale = mysqli_query($conn, $result_scale);

if(mysqli_insert_id($conn)){
    $last_id = mysqli_insert_id($conn);
    //echo "New record created successfully. Last inserted ID is: " . $last_id;
    $_SESSION['msg'] = "Scale successfully registered";
    header("Location: ../administracao/valida_select_scale.php?id=$last_id");
} else {
    $_SESSION['msg'] = "Error registering Scale";
    header("Location: cad_scale.php");
}