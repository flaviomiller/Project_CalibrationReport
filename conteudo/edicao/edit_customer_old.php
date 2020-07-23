<?php
session_start();
include_once ("../classes/conexoes/conexao.php");

$customer_id = filter_input(INPUT_GET, 'customer_id', FILTER_SANITIZE_NUMBER_INT);

$result_customer = "SELECT * FROM customer WHERE customer_id = '$customer_id'";
$resultado_customer = mysqli_query($conn, $result_customer);
$row_customer = mysqli_fetch_assoc($resultado_customer);

?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <head>
        <meta charset="UTF-8">
        <title> Edit Customers </title>
        <link rel="stylesheet" href="../classes/css/layout.css"/>
        <link rel="stylesheet" href="../classes/css/bootstrap.css"/>
        
    </head>
    <body>
        <div class="container-fluid";>
        <h2>Edit Customers</h2>
        <?php
            echo "<a href='../administracao/administration.php'>Main page</a> | ";
            echo "<a href='../administracao/sair.php'>Log out</a><br>";
            if(!empty($_SESSION['name'])){ 
                echo "Connected as " .$_SESSION['name']. "<br><hr>";
            } else {
                $_SESSION['msg'] = "Restricted area";
                header("Location: ../administracao/login.php");
        }
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <p></p>
        <form method="POST" action="process_edit_customer.php">
            <input name="customer_id" type="hidden" value="<?php echo $row_customer['customer_id']; ?>">
            <label>Company</label>
            <input name="customer_name" type="text" value="<?php echo $row_customer['customer_name']; ?>">
            <p class=espaco></p>
            <label>Addres</label>
            <input name="addres" type="text" value="<?php echo $row_customer['addres']; ?>">
            <p class=espaco></p>
            <label>City</label>
            <input name="city" type="text" value="<?php echo $row_customer['city']; ?>">
            <p class=espaco></p>
            <label>State</label>
            <input name="state" type="text" value="<?php echo $row_customer['state']; ?>">
            <p class=espaco></p>
            <label>Zip</label>
            <input name="zip" type="text" value="<?php echo $row_customer['zip']; ?>">
            <p class=espaco></p>
            <p class=espaco></p>
            <input type="submit" value="Save" name="submitcr" />
        </form>
        <p class=espaco></p>
        </div>
        <script src="../classes/js/jquery-3.5.1.slim.min.js"></script>
        <script src="../classes/js/popper.min.js"></script>
        <script src="../classes/js/bootstrap.js"></script>
    </body>
</html>
