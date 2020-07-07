<?php
session_start();
include_once("../classes/conexoes/conexao.php");

$customer_id = filter_input(INPUT_GET, 'customer_id', FILTER_SANITIZE_STRING);

if(!empty($customer_id)){
    $result_customer = "DELETE FROM `customer` WHERE `customer`.`customer_id` = '$customer_id'";
    $resultado_customer = mysqli_query($conn, $result_customer);
    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "Customer successfully deleted!";
        header("Location: ../consultas/consult_customer.php");
    } else {
        $_SESSION['msg'] = "Error deleting the Customer!";
        header("Location: ../consultas/consult_customer.php?customer_id=$customer_id");
    }
}else{
    $_SESSION['msg'] = "Need to select a Customer!";
     header("Location: ../consultas/consult_customer.php?customer_id=$customer_id");
}
