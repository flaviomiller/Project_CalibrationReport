<?php
session_start();
include_once ("../classes/conexoes/conexao.php");

if(!empty($_SESSION['name'])){ 
                echo "You are logged in as " .$_SESSION['name']. "<br><br>";
                //echo "Seu ID é: " .$_SESSION['techid']. "<br><br>" ;
                //echo "<a href='sair.php'>Sair</a>";
            } else {
                $_SESSION['msg'] = "Restricted area";
                header("Location: login.php");
        }
    echo "<a href='../administracao/administration.php'>Main page</a> ";
    echo "<a href='sair.php'>Log out</a>";

?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <head>
        <meta charset="UTF-8">
        <title> Selection Company </title>
        <link rel="stylesheet" href="../classes/css/layout.css"/>
    </head>
    <body>
        <script type="text/javascript" src="../classes/js/tratamento_form.js"></script>
        
        <h1>Calibration Report</h1>       
        <form method="POST" action="valida_select_company.php">
            <label>Company</label>
            <select name="customer_id">
                <option>Select Company</option>
                    <?php
                        $results_empresas = "SELECT * FROM customer";
                        $resultado_empresa = mysqli_query($conn, $results_empresas);
                        while ($row_empresas = mysqli_fetch_assoc($resultado_empresa)){ ?>
                        <option value="<?php echo $row_empresas['customer_id']; ?>"><?php echo $row_empresas['customer_name']; ?>
                        </option><?php
                        }
                    ?>
            </select>
            <label>Tech</label>
            <select name="techid">
            <option>Select Tech</option>
                    <?php
                        $results_users = "SELECT * FROM user";
                        $resultado_user = mysqli_query($conn, $results_users);
                        while ($row_users = mysqli_fetch_assoc($resultado_user)){ ?>
                        <option value="<?php echo $row_users['user_id']; ?>"><?php echo $row_users['name']; ?>
                        </option><?php
                        }
                    ?>
            </select>
            <p class=espaco></p>
            <label>Measurement Date</label>
            <input id="data" name="dtmeasurement" value="" type="date" onchange="datas()">
            <label>Date Due</label>
            <input name="dtdue" value="" type="month">
            <p class=espaco></p>
            <p class=espaco></p>
            <input type="submit" value="Next" name="btnSelectCompany" />
        </form>
        <p class=espaco></p>
        <?php
       
        ?>
    </body>
</html>
