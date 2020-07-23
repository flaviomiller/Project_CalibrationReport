<?php
session_start();
include_once ("../classes/conexoes/conexao.php");
$btnSelectCompany = filter_input(INPUT_POST, 'btnSelectCompany', FILTER_SANITIZE_STRING);

if(!$btnSelectCompany){

    $meses = filter_input(INPUT_POST, 'dtdue', FILTER_SANITIZE_STRING);
    $dataAtual = filter_input(INPUT_POST, 'dtmeasurement', FILTER_SANITIZE_STRING);
    $dataRetorno = new DateTime($dataAtual);
    $dataRetorno      -> modify("+$meses Month");

    $_SESSION['customer_id'] = filter_input(INPUT_POST, 'customer_id', FILTER_SANITIZE_STRING);
    $_SESSION['techid'] = filter_input(INPUT_POST, 'techid', FILTER_SANITIZE_STRING);
    $_SESSION['dtmeasurement'] = $dataAtual; 
    $_SESSION['dtdue'] = $dataRetorno -> format('Y-m'); 

    header("Location: ../cadastros/cad_calibration_report.php");

    }else{
        $_SESSION['msg'] = "Selection of data"; 
        header("Location: ../administracao/select_company.php");
    }
    