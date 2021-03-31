<?php

session_start();
include_once("../classes/conexoes/conexao.php");

$scale_id = filter_input(INPUT_GET, 'scale_id', FILTER_SANITIZE_STRING);

//echo $scale_id;

if(!empty($scale_id)){
    $result_scale = "DELETE FROM `scales` WHERE `scales`.`scale_id` = '$scale_id';";
    $resultado_scale = mysqli_query($conn, $result_scale);
    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "Scale successfully deleted!";
        header("Location: ../administracao/select_scale.php");
        echo $_SESSION['msg'];
    } else {
        $_SESSION['msg'] = "Error deleting the scale";
        header("Location: ../administracao/select_scale.php?customer_id=$scale_id");
        echo $_SESSION['msg'];
    }
}else{
    $_SESSION['msg'] = "Need to select a scale";
    header("Location: ../administracao/select_scale.php?customer_id=$scale_id");
    echo $_SESSION['msg'];
}
