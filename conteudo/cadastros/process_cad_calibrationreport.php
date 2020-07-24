<?php

session_start();
include_once("../classes/conexoes/conexao.php");

$dtmeasurement = filter_input(INPUT_POST, 'dtmeasurement', FILTER_SANITIZE_STRING);
$customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_SANITIZE_STRING);
$techid = filter_input(INPUT_POST, 'techid', FILTER_SANITIZE_STRING);
$location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
$control = filter_input(INPUT_POST, 'control', FILTER_SANITIZE_STRING);
$manufacturer = filter_input(INPUT_POST, 'manufacturer', FILTER_SANITIZE_STRING);
$model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
$sn = filter_input(INPUT_POST, 'sn', FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
$capacity = filter_input(INPUT_POST, 'capacity', FILTER_SANITIZE_STRING);
$nmincapacity = filter_input(INPUT_POST, 'nmincapacity', FILTER_SANITIZE_STRING);
$nmeasure = filter_input(INPUT_POST, 'nmeasure', FILTER_SANITIZE_STRING);
$preweight = filter_input(INPUT_POST, 'preweight', FILTER_SANITIZE_STRING);
$preerror = filter_input(INPUT_POST, 'preerror', FILTER_SANITIZE_STRING);
$ndif = filter_input(INPUT_POST, 'ndif', FILTER_SANITIZE_STRING);
$comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
$preweight1 = filter_input(INPUT_POST, 'preweight1', FILTER_SANITIZE_STRING);
$preweight2 = filter_input(INPUT_POST, 'preweight2', FILTER_SANITIZE_STRING);
$preweight3 = filter_input(INPUT_POST, 'preweight3', FILTER_SANITIZE_STRING);
$preweight4 = filter_input(INPUT_POST, 'preweight4', FILTER_SANITIZE_STRING);
$preweight5 = filter_input(INPUT_POST, 'preweight5', FILTER_SANITIZE_STRING);
$preerror1 = filter_input(INPUT_POST, 'preerror1', FILTER_SANITIZE_STRING);
$preerror2 = filter_input(INPUT_POST, 'preerror2', FILTER_SANITIZE_STRING);
$preerror3 = filter_input(INPUT_POST, 'preerror3', FILTER_SANITIZE_STRING);
$preerror4 = filter_input(INPUT_POST, 'preerror4', FILTER_SANITIZE_STRING);
$preerror5 = filter_input(INPUT_POST, 'preerror5', FILTER_SANITIZE_STRING);
$afterweight1 = filter_input(INPUT_POST, 'afterweight1', FILTER_SANITIZE_STRING);
$afterweight2 = filter_input(INPUT_POST, 'afterweight2', FILTER_SANITIZE_STRING);
$afterweight3 = filter_input(INPUT_POST, 'afterweight3', FILTER_SANITIZE_STRING);
$afterweight4 = filter_input(INPUT_POST, 'afterweight4', FILTER_SANITIZE_STRING);
$afterweight5 = filter_input(INPUT_POST, 'afterweight5', FILTER_SANITIZE_STRING);
$aftererror1 = filter_input(INPUT_POST, 'aftererror1', FILTER_SANITIZE_STRING);
$aftererror2 = filter_input(INPUT_POST, 'aftererror2', FILTER_SANITIZE_STRING);
$aftererror3 = filter_input(INPUT_POST, 'aftererror3', FILTER_SANITIZE_STRING);
$aftererror4 = filter_input(INPUT_POST, 'aftererror4', FILTER_SANITIZE_STRING);
$aftererror5 = filter_input(INPUT_POST, 'aftererror5', FILTER_SANITIZE_STRING);
$dtcalibration = filter_input(INPUT_POST, 'dtcalibration', FILTER_SANITIZE_STRING);
$dtdue = filter_input(INPUT_POST, 'dtdue', FILTER_SANITIZE_STRING);

$nistid = filter_input(INPUT_POST, 'nistid', FILTER_SANITIZE_STRING);
$stdcert = filter_input(INPUT_POST, 'stdcert', FILTER_SANITIZE_STRING);
$stdcertdate = filter_input(INPUT_POST, 'stdcertdate', FILTER_SANITIZE_STRING);
$stdcertdue = filter_input(INPUT_POST, 'stdcertdue', FILTER_SANITIZE_STRING);
$nistid2 = filter_input(INPUT_POST, 'nistid2', FILTER_SANITIZE_STRING);
$stdcert2 = filter_input(INPUT_POST, 'stdcert2', FILTER_SANITIZE_STRING);
$stdcertdate2 = filter_input(INPUT_POST, 'stdcertdate2', FILTER_SANITIZE_STRING);
$stdcertdue2 = filter_input(INPUT_POST, 'stdcertdue2', FILTER_SANITIZE_STRING);

$result_calibration_report = "INSERT INTO reports (dtmeasurement,
customer_id, techid, location, control, manufacturer, model, sn, type, 
capacity, nmincapacity, nmeasure, preweight, preerror, ndif, comment, preweight1, 
preweight2, preweight3, preweight4, preerror5, preerror1, preerror2, preerror3, 
preerror4, preweight5, afterweight1, afterweight2, afterweight3, afterweight4, 
afterweight5, aftererror1, aftererror2, aftererror3, aftererror4, aftererror5, 
dtcalibration, dtdue, nistid, stdcert, stdcertdate, stdcertdue, nistid2, stdcert2, 
stdcertdate2, stdcertdue2, created) VALUES ('$dtmeasurement', '$customer_id', '$techid', 
'$location', '$control', '$manufacturer', '$model', '$sn', '$type', '$capacity', 
'$nmincapacity', '$nmeasure', '$preweight', '$preerror', '$ndif', '$comment', '$preweight1', 
'$preweight2', '$preweight3', '$preweight4', '$preerror5', '$preerror1', 
'$preerror2', '$preerror3', '$preerror4', '$preweight5', '$afterweight1', 
'$afterweight2', '$afterweight3', '$afterweight4', '$afterweight5', 
'$aftererror1', '$aftererror2', '$aftererror3', '$aftererror4', 
'$aftererror5', '$dtcalibration', '$dtdue', '$nistid', '$stdcert',
'$stdcertdate', '$stdcertdue', '$nistid2', '$stdcert2', '$stdcertdate2', '$stdcertdue2', NOW())";
$resultado_calibration_report = mysqli_query($conn, $result_calibration_report);


if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "Report inserted successfully";
    //$_SESSION['empresa'] = $customer_id;
    //$_RETORNA_ID['rtid'] = mysqli_insert_id($conn);
    //echo "$retorna_id";
    header("Location: ../cadastros/cad_calibration_report.php");
    
    
} else {
    $_SESSION['msg'] = "Error inserting the report";
    header("Location: cad_calibration_report.php");
}


//echo "comment: $comment <br>";
//echo  "dtmeasurement: $dtmeasurement <br>";
//echo  "customer_id: $customer_id <br>";
//echo  "techid: $techid <br>";
//echo  "location: $location <br>";
//echo  "control: $control <br>";
//echo  "manufacturer: $manufacturer <br>";
//echo  "model: $model <br>";
//echo  "sn: $sn <br>";
//echo  "type: $type <br>";
//echo  "capacity: $capacity <br>";
//echo  "nmincapacity: $nmincapacity <br>";
//echo  "nmeasure: $nmeasure <br>";
//echo  "preweight: $preweight <br>";
//echo  "preerror  : $preerror   <br>";
//echo  "ndif  : $ndif   <br>";
//echo  "preweight1: $preweight1 <br>";
//echo  "preweight2: $preweight2 <br>";
//echo  "preweight3: $preweight3 <br>";
//echo  "preweight4: $preweight4 <br>";
//echo  "preerror5: $preerror5 <br>";
//echo  "preerror1: $preerror1 <br>";
//echo  "preerror2: $preerror2 <br>";
//echo  "preerror3: $preerror3 <br>";
//echo  "preerror4: $preerror4 <br>";
//echo  "preweight5: $preweight5 <br>";
//echo  "afterweight1: $afterweight1 <br>";
//echo  "afterweight2: $afterweight2 <br>";
//echo  "afterweight3: $afterweight3 <br>";
//echo  "afterweight4: $afterweight4 <br>";
//echo  "afterweight5: $afterweight5 <br>";
//echo  "aftererror1: $aftererror1 <br>";
//echo  "aftererror2: $aftererror2 <br>";
//echo  "aftererror3: $aftererror3 <br>";
//echo  "aftererror4: $aftererror4 <br>";
//echo  "aftererror5: $aftererror5 <br>";
//echo  "dtcalibration: $dtcalibration <br>";
//echo  "dtdue: $dtdue <br>";