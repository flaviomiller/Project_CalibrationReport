<?php
session_start();
include_once("../classes/conexoes/conexao.php");

$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
    include_once '../classes/conexoes/conexao.php';
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);

    $erro = false;

    $dados_st = array_map('strip_tags', $dados_rc);
    $dados = array_map('trim', $dados_st);
    if(in_array('',$dados)){
        $erro = true;
        $_SESSION['msg'] = "All fields must be filled";
    }elseif((strlen($dados['password']))< 6){
        $erro = true;
        $_SESSION['msg'] = "Password must be at least 6 characters";
    }elseif(stristr($dados['password'], "'")){
        $erro = true;
        $_SESSION['msg'] = "The character ( ' ) used in the password is invalid";
    }else{
        $result_usuario = "SELECT user_id FROM user WHERE user ='". $dados['user'] ."' ";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
            $erro = true;
            $_SESSION['msg'] = "This user is already registered, please use another user";
        }
        
        $result_usuario = "SELECT user_id FROM user WHERE email ='". $dados['email'] ."' ";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
            $erro = true;
            $_SESSION['msg'] = "This E-mail is already registered, please use another E-mail";
        }
        
        $result_usuario = "SELECT user_id FROM user WHERE techid ='". $dados['techid'] ."' ";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
            $erro = true;
            $_SESSION['msg'] = "This technical id is already registered, please use another technical id";
        }
    }
    
   //var_dump($dados);
    if(!$erro){
        $dados['password'] = password_hash($dados['password'], PASSWORD_DEFAULT);
        $result_usuario = "INSERT INTO user (name, email, user, password, techid, created) VALUES ("
                . "'".$dados['name']."',"
                . "'".$dados['email']."',"
                . "'".$dados['user']."',"
                . "'".$dados['password']."',"
                . "'".$dados['techid']."', "
                . "NOW())";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        if(mysqli_insert_id($conn)){
            $_SESSION['msgcad'] = "User successfully registered";
            header("Location: cad_user.php");
        } else {
            $_SESSION['msg'] = "Error when registering the user";
        }
    }
}
