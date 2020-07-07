<?php

session_start();
include_once("../classes/conexoes/conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

if(!empty($id)){
    $result_calibration_report = "DELETE FROM `reports` WHERE `reports`.`id` = '$id';";
    $resultado_calibration_report = mysqli_query($conn, $result_calibration_report);
    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "Report successfully deleted!";
        header("Location: ../consultas/consult_calibration_report.php");
        echo $_SESSION['msg'];
    } else {
        $_SESSION['msg'] = "Error deleting the report";
        header("Location: ../consultas/consult_calibration_report.php?customer_id=$id");
        echo $_SESSION['msg'];
    }
}else{
    $_SESSION['msg'] = "Need to select a report";
    header("Location: ../consultas/consult_calibration_report.php?customer_id=$id");
    echo $_SESSION['msg'];
}
