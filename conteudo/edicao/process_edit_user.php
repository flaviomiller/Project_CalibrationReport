<?php
session_start();
include_once("../classes/conexoes/conexao.php");

 $user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_STRING);
 $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
 $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
 $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
 $techid = filter_input(INPUT_POST, 'techid', FILTER_SANITIZE_STRING);

 
//var_dump($result_usuario);


$result_usuario = "UPDATE `user` SET `name` = '$name', `email` = '$email', `user` = '$user', `techid` = '$techid', `modified` = NOW() WHERE `user`.`user_id` = '$user_id'";

$resultado_usuario = mysqli_query($conn, $result_usuario);
if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "User updated successfully!";
    header("Location: ../consultas/consult_user.php");
} else {
    $_SESSION['msg'] = "User has not been updated!";
    header("Location: edit_user.php?user_id=$user_id");
}
