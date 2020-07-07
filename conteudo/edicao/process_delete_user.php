<?php
session_start();
include_once("../classes/conexoes/conexao.php");

 $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_STRING);
 
//var_dump($result_usuario);

if(!empty($user_id)){
    $result_usuario = "DELETE FROM `user` WHERE `user`.`user_id` = '$user_id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "User successfully deleted!";
        header("Location: ../consultas/consult_user.php");
    } else {
        $_SESSION['msg'] = "Error deleting the user";
        header("Location: ../consultas/consult_user.php");
    }
}else {
        $_SESSION['msg'] = "Need to select a user";
        header("Location: ../consultas/consult_user.php");
}