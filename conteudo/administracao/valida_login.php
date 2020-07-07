<?php
session_start();
include_once ("../classes/conexoes/conexao.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

if($btnLogin){
    $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    //echo "$user - $password";
    if((!empty($user)) AND (!empty($password))){
        //gerar a senha criptografada
        //echo password_hash($password, PASSWORD_DEFAULT);
        //Pesquisar o usuario no db        
        $result_usuario = "SELECT user_id, name, email, user, password, techid FROM user WHERE user='$user' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if($resultado_usuario){
            $row_usuario = mysqli_fetch_assoc($resultado_usuario);
            if(password_verify($password, $row_usuario['password'])){
                $_SESSION['user_id'] = $row_usuario['id'];
		$_SESSION['name'] = $row_usuario['name'];
		$_SESSION['email'] = $row_usuario['email'];
                $_SESSION['techid'] = $row_usuario['techid'];
		header("Location: administration.php");
            } else {
                $_SESSION['msg'] = "Incorrect username or password";
                header("Location: login.php");
            }    
        }
    } else {    
        $_SESSION['msg'] = "Incorrect username or password";
        header("Location: login.php");
    }
}else{
    $_SESSION['msg'] = "Page not found";
    header("Location: login.php");
}