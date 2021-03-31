<?php
session_start();
include_once ("../classes/conexoes/conexao.php");

/*$sn_selected = filter_input(INPUT_POST, 'campo_sn', FILTER_SANITIZE_STRING);

$result_scale_selected_cont = "SELECT * FROM scales WHERE sn = '".$sn_selected."' AND customer_id = '".$_SESSION['customer_id']."' ";

$resultado_scale_selected_cont = mysqli_query($conn, $result_scale_selected_cont);
$row_scale_selected = mysqli_fetch_assoc($resultado_scale_selected_cont);

echo $row_scale_selected['model'] . "," . 
$row_scale_selected['manufacturer'] . "," . 
$row_scale_selected['capacity'] . "," . 
$row_scale_selected['nmincapacity'] . "," . 
$row_scale_selected['type'] . "," . 
$row_scale_selected['location'] . "," . 
$row_scale_selected['control'] . "," . 
$row_scale_selected['nmeasure'];*/


$manufacturer_selected = filter_input(INPUT_POST, 'campo_manufacturer', FILTER_SANITIZE_STRING);

$result_scale_selected_cont = "SELECT * FROM scales WHERE manufacturer = '".$manufacturer_selected."' AND customer_id = '".$_SESSION['customer_id']."' ";

$resultado_scale_selected_cont = mysqli_query($conn, $result_scale_selected_cont);
$row_scale_selected = mysqli_fetch_assoc($resultado_scale_selected_cont);

echo $row_scale_selected['model'] . "," . 
//$row_scale_selected['manufacturer'] . "," . 
$row_scale_selected['capacity'] . "," . 
$row_scale_selected['nmincapacity'] . "," . 
$row_scale_selected['type'] . "," . 
$row_scale_selected['location'] . "," . 
$row_scale_selected['control'] . "," . 
$row_scale_selected['nmeasure'];
