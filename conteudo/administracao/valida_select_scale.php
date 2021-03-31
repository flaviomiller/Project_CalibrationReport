<?php
session_start();
include_once ("../classes/conexoes/conexao.php");

$btnSelectScale = filter_input(INPUT_POST, 'btnSelectScale', FILTER_SANITIZE_STRING);

if(!$btnSelectScale){
    
    $scale = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

    $cutomer_id = $_SESSION['customer_id'];

    $result_scale = "SELECT * FROM scales WHERE scale_id = '$scale'";
    $resultado_scale = mysqli_query($conn, $result_scale);

    if(($resultado_scale) AND ($resultado_scale->num_rows != 0 )){
        while($row_scale = mysqli_fetch_assoc($resultado_scale)){

            echo "<b>Manufacturer: </b>" . $row_scale['manufacturer']. "<br>"
                    . "<b>Model: </b>" .$row_scale['model']. "<br>"
                    . "<b>Capacity: </b>" .$row_scale['capacity']. "<br>"
                    . "<b>Capacity Min: </b>" .$row_scale['nmincapacity']. "<br>"
                    . "<b>Serial Number: </b>" .$row_scale['sn']. "<br>"
                    . "<b>Type: </b>" .$row_scale['type']. "<br>"
                    . "<b>Location: </b>" .$row_scale['location']. "<br>"
                    . "<b>Measure: </b>" .$row_scale['nmeasure']. "<br>"
                    . "<b>Control: </b>" .$row_scale['control']. "<br>";

            $_SESSION['manufacturer'] = $row_scale['manufacturer'];
            $_SESSION['model'] = $row_scale['model'];
            $_SESSION['capacity'] = $row_scale['capacity'];
            $_SESSION['nmincapacity'] = $row_scale['nmincapacity'];
            $_SESSION['sn'] = $row_scale['sn'];
            $_SESSION['type'] = $row_scale['type'];
            $_SESSION['location'] = $row_scale['location'];
            $_SESSION['nmeasure'] = $row_scale['nmeasure'];
            $_SESSION['control'] = $row_scale['control'];

            header("Location: ../cadastros/cad_calibration_report.php");
        }
    }else{

    }
    
    //$_SESSION['customer_id'] = filter_input(INPUT_POST, 'customer_id', FILTER_SANITIZE_STRING);
    //$_SESSION['techid'] = filter_input(INPUT_POST, 'techid', FILTER_SANITIZE_STRING);
    //$_SESSION['dtmeasurement'] = $dataAtual; 
    //$_SESSION['dtdue'] = $dataRetorno -> format('Y-m'); 

    //header("Location: ../administracao/select_scale.php");

}else{

    //$_SESSION['msg'] = "Selection of data"; 
    //header("Location: ../administracao/select_company.php");

}