<?php
session_start();
include_once("../classes/conexoes/conexao.php");

$customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_SANITIZE_STRING);
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



$result_customer = "UPDATE `customer` SET `customer_name` = '$customer_name', `addres` = '$addres',"
        . " `city` = '$city', `state` = '$state', `zip` = '$zip', `modified` = NOW() WHERE `customer`.`customer_id` = '$customer_id'";


$resultado_customer = mysqli_query($conn, $result_customer);
if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "Customer updated successfully!";
    header("Location: ../consultas/consult_customer.php");
} else {
    $_SESSION['msg'] = "Customer has not been updated!";
    header("Location: edit_customer.php?customer_id=$customer_id");
}
