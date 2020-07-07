<?php
session_start();
include_once("../classes/conexoes/conexao.php");

$customer_name = filter_input(INPUT_POST, 'customer_name', FILTER_SANITIZE_STRING);
$addres = filter_input(INPUT_POST, 'addres', FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
$zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_STRING);



//echo  "customer_name: $customer_name <br>";
//echo  "addres: $addres <br>";
//echo  "city: $city <br>";
//echo  "state: $state <br>";
//echo  "zip: $zip <br>";


$result_calibration_report = "INSERT INTO customer (customer_name,
addres, city, state, zip, created) VALUES ('$customer_name', '$addres', '$city', '$state', 
'$zip', NOW())";
$resultado_calibration_report = mysqli_query($conn, $result_calibration_report);

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "Customer successfully registered";
    header("Location: cad_customer.php");
} else {
    $_SESSION['msg'] = "Error registering Customer";
    header("Location: cad_customer.php");
}