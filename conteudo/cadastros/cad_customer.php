<?php
session_start();
include_once ("../classes/conexoes/conexao.php");

if(!empty($_SESSION['name'])){ 
                echo "You are logged in as " .$_SESSION['name']. "<br><br>";
                //echo "Seu ID é: " .$_SESSION['techid']. "<br><br>" ;
                //echo "<a href='sair.php'>Sair</a>";
            } else {
                $_SESSION['msg'] = "Restricted area";
                header("Location: ../administracao/login.php");
        }
    echo "<a href='../administracao/administration.php'>Main page</a> ";
    echo "<a href='../administracao/sair.php'>Log out</a>";

?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <head>
        <meta charset="UTF-8">
        <title> Register Customers </title>
        <link rel="stylesheet" href="../classes/css/layout.css"/>
    </head>
    <body>
        <h1>Register Customers</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <p></p>
        <form method="POST" action="process_cad_customer.php">
            <label>Company</label>
            <input name="customer_name" type="text" placeholder="Enter the Company Name">
            <p class=espaco></p>
            <label>Addres</label>
            <input name="addres" type="text" placeholder="Enter full Address">
            <p class=espaco></p>
            <label>City</label>
            <input name="city" type="text" placeholder="Enter City">
            <p class=espaco></p>
            <label>State</label>
            <input name="state" type="text" placeholder="Enter the State">
            <p class=espaco></p>
            <label>Zip</label>
            <input name="zip" type="text" placeholder="Insert the Zip code">
            <p class=espaco></p>
            <p class=espaco></p>
            <input type="submit" value="Submit" name="submitcr" />
        </form>
        <p class=espaco></p>
    </body>
</html>
