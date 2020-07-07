<?php
session_start();
include_once ("../classes/conexoes/conexao.php");
$btnSelectCompany = filter_input(INPUT_POST, 'btnSelectCompany', FILTER_SANITIZE_STRING);

if($btnSelectCompany){
    $_SESSION['customer_id'] = filter_input(INPUT_POST, 'customer_id', FILTER_SANITIZE_STRING);
    $_SESSION['techid'] = filter_input(INPUT_POST, 'techid', FILTER_SANITIZE_STRING);
    $_SESSION['dtmeasurement'] = filter_input(INPUT_POST, 'dtmeasurement', FILTER_SANITIZE_STRING);
    $_SESSION['dtdue'] = filter_input(INPUT_POST, 'dtdue', FILTER_SANITIZE_STRING);
    
    //echo $_SESSION['customer_id'];
    //echo "<br><br>";
    //echo "$techid";

//echo "$user - $password";
//    if((!empty($customer_id)) AND (!empty($techid))){
        //gerar a senha criptografada
        //echo password_hash($password, PASSWORD_DEFAULT);
        //Pesquisar o usuario no db        
//        $result_usuario = "SELECT id, name, email, user, password, techid FROM user WHERE user='$user' LIMIT 1";
//		$resultado_usuario = mysqli_query($conn, $result_usuario);
//		if($resultado_usuario){
//            $row_usuario = mysqli_fetch_assoc($resultado_usuario);
//            if(password_verify($password, $row_usuario['password'])){
//                $_SESSION['id'] = $row_usuario['id'];
//		$_SESSION['name'] = $row_usuario['name'];
//		$_SESSION['email'] = $row_usuario['email'];
//              $_SESSION['techid'] = $row_usuario['techid'];
//		header("Location: administration.php");
//            } else {
//                $_SESSION['msg'] = "Incorrect username or password";
//                header("Location: login.php");
//            }    
//        }
//    } else {    
//        $_SESSION['msg'] = "Incorrect username or password";
//        header("Location: login.php");
//    }
//}else{
//    $_SESSION['msg'] = "Page not found";
//    header("Location: login.php");

    header("Location: ../cadastros/cad_calibration_report.php");
}