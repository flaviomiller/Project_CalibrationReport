<?php
session_start();


$valor = filter_input(INPUT_POST, 'btnreset', FILTER_SANITIZE_STRING);
if(!$valor){
  //echo "primeiro if";
  $_SESSION['valor']  = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_STRING);
  
  if ($_SESSION['controle'] == ""){
  
    $_SESSION['controle'] = $_SESSION['valor'];
      header("Location: testesdefuncoes.php");
  
    }else{ 
  
      $_SESSION['controle'] = $_SESSION['controle'] . ","  . $_SESSION['valor'];
      header("Location: testesdefuncoes.php");
  
    }

}else{
    
    //echo "segundo if";
    unset($_SESSION['controle']);
    $_SESSION['controle'] = "";
    header("Location: testesdefuncoes.php");

}

$array = array($_SESSION['controle']);

$_SESSION['montagem'] = $array;


//$_SESSION['valor']  = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_STRING);
//$_SESSION['controle'] = $_SESSION['controle'] .", " . $_SESSION['valor'];
//header("Location: testesdefuncoes.php");


//echo $_SESSION['valor'] . "<br>";
//echo $_SESSION['controle'];
//echo $valor;




    