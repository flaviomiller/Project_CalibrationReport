<?php
session_start();
include_once("../classes/conexoes/conexao.php");

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$techid = filter_input(INPUT_POST, 'techid', FILTER_SANITIZE_STRING);



echo  "name: $name <br>";
echo  "E-Mail: $email <br>";
echo  "User: $user <br>";
echo  "Password: $password <br>";
echo  "Tech: $techid <br>";


$result_user = "INSERT INTO user (name,
email, user, password, techid, created) VALUES ('$name', '$email', '$user', '$password', 
'$techid', NOW())";
$resultado_user = mysqli_query($conn, $result_user);

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "User successfully registered";
    header("Location: cad_user.php");
} else {
    $_SESSION['msg'] = "Error registering User";
    header("Location: cad_user.php");
}