 <?php
session_start();
include_once ("../classes/conexoes/conexao.php");

if(!empty($_SESSION['name'])){ 
                echo "Hello " .$_SESSION['name']. ", Welcome! <br><br>";
                //echo "Seu ID é: " .$_SESSION['techid']. "<br><br>" ;
                //echo "<a href='sair.php'>Sair</a>";
            } else {
                $_SESSION['msg'] = "Restricted area";
                header("Location: ../administracao/login.php");
        }
    echo "<a href='../administracao/administration.php'>Main page</a> ";
    echo "<a href='../administracao/sair.php'>Go out</a> ";
   
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <head>
        <meta charset="UTF-8">
        <title> Consult Reports </title>
        <link rel="stylesheet" href="../classes/css/layout.css"/>

        <script type="text/javascript">
            
        </script>

    </head>
    <body>
        <h1> Consult Reports </h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            
            //receber o numero da página
            $pagina_atual = filter_input(INPUT_GET,'pagina',
             FILTER_SANITIZE_NUMBER_INT);
            
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
            
            //Seta a quantidade de resultados por página
            $qtd_result_pg = 2;
            
            //Calculo do inicio da visualização
            $inicio = ($qtd_result_pg * $pagina) - $qtd_result_pg;
            
            $result_reports = "SELECT * FROM reports LIMIT $inicio, $qtd_result_pg";
            $resultado_report = mysqli_query($conn, $result_reports);
            
            
            
            
            while ($rows_report = mysqli_fetch_assoc($resultado_report)){
                
                $customer_id = $rows_report['customer_id'];
                $result_customer = "SELECT * FROM `customer` WHERE customer_id = '$customer_id'";
                $resultado_customer = mysqli_query($conn, $result_customer);
                $row_customer = mysqli_fetch_assoc($resultado_customer);
                
                $techi_id = $rows_report['techid'];
                $result_user = "SELECT * FROM `user` WHERE user_id = '$techi_id'";
                $resultado_user = mysqli_query($conn, $result_user);
                $row_user = mysqli_fetch_assoc($resultado_user);
                
                echo "<table>";
                echo "<tr>";
                echo "<td>";
                
                echo "<b>Customer ID BD:</b> " .$rows_report['id']. "<br>";
                echo "<b>Measurement Date:</b> " .$rows_report['dtmeasurement']. "<br>";
                echo "<b>Customer:</b> " .$row_customer['customer_name']. "<br>";
                echo "<b>Tech ID#:</b> " .$row_user['techid']. "<br>";
                echo "<b>Location:</b> " .$rows_report['location']. "<br>";
                echo "<b>Control:</b> " .$rows_report['control']. "<br>";
                echo "<b>Manufacturer:</b> " .$rows_report['manufacturer']. "<br>";
                echo "<b>Model:</b> " .$rows_report['model']. "<br>";
                echo "<a href='../edicao/edit_calibration_report.php?id=" .$rows_report['id']. "'>Edit</a><br>";
                echo "<a href='../edicao/process_delete_calibrationreport.php?id=" .$rows_report['id']. "'>Delete</a><br>";
                echo "<a href='../administracao/generate_certificate.php?id=" .$rows_report['id']. "'>Print report</a><br>";
                
                echo "</td>";
                echo "<td>";
                
                echo "&nbsp;&nbsp; <b>Serial Number:</b> " .$rows_report['sn']. "<br>";
                echo "&nbsp;&nbsp; <b>Type:</b> " .$rows_report['type']. "<br>";
                echo "&nbsp;&nbsp; <b>Capacity:</b> " .$rows_report['capacity']. "<br>";
                echo "&nbsp;&nbsp; <b>Min. Capacity:</b> " .$rows_report['nmincapacity']. "<br>";
                echo "&nbsp;&nbsp; <b>Measure Type:</b> " .$rows_report['nmeasure']. "<br>";
                echo "&nbsp;&nbsp; <b>Test Load:</b> " .$rows_report['preweight']. "<br>";
                echo "&nbsp;&nbsp; <b>Test Error:</b> " .$rows_report['preerror']. "<br>";
                echo "&nbsp;&nbsp; <b>Difference sign:</b> " .$rows_report['ndif']. "<br>";
                
                echo "</td>";
                echo "<td>";
                
                echo "&nbsp;&nbsp; <b>Weight:</b> " .$rows_report['preweight1']. "<br>";
                echo "&nbsp;&nbsp; <b>Test Error:</b> " .$rows_report['preerror1']. "<br>";
                echo "&nbsp;&nbsp; <b>Weight:</b> " .$rows_report['preweight2']. "<br>";
                echo "&nbsp;&nbsp; <b>Test Error:</b> " .$rows_report['preerror2']. "<br>";
                echo "&nbsp;&nbsp; <b>Weight:</b> " .$rows_report['preweight3']. "<br>";
                echo "&nbsp;&nbsp; <b>Test Error:</b> " .$rows_report['preerror3']. "<br>";
                echo "&nbsp;&nbsp; <b>Weight:</b> " .$rows_report['preweight4']. "<br>";
                echo "&nbsp;&nbsp; <b>Test Error:</b> " .$rows_report['preerror4']. "<br>";
                echo "&nbsp;&nbsp; <b>Weight:</b> " .$rows_report['preweight5']. "<br>";
                echo "&nbsp;&nbsp; <b>Test Error:</b> " .$rows_report['preerror5']. "<br>";
                
                echo "</td>";
                echo "<td>";
                
                echo "&nbsp;&nbsp; <b>Weight:</b> " .$rows_report['afterweight1']. "<br>";
                echo "&nbsp;&nbsp; <b>Test Error:</b> " .$rows_report['aftererror1']. "<br>";
                echo "&nbsp;&nbsp; <b>Weight:</b> " .$rows_report['afterweight2']. "<br>";
                echo "&nbsp;&nbsp; <b>Test Error:</b> " .$rows_report['aftererror2']. "<br>";
                echo "&nbsp;&nbsp; <b>Weight:</b> " .$rows_report['afterweight3']. "<br>";
                echo "&nbsp;&nbsp; <b>Test Error:</b> " .$rows_report['aftererror3']. "<br>";
                echo "&nbsp;&nbsp; <b>Weight:</b> " .$rows_report['afterweight4']. "<br>";
                echo "&nbsp;&nbsp; <b>Test Error:</b> " .$rows_report['aftererror4']. "<br>";
                echo "&nbsp;&nbsp; <b>Weight:</b> " .$rows_report['afterweight5']. "<br>";
                echo "&nbsp;&nbsp; <b>Test Error:</b> " .$rows_report['aftererror5']. "<br>";
                
                echo "</td>";
                echo "<td>";
                
                echo "&nbsp;&nbsp; <b>Data Calibration:</b> " .$rows_report['dtcalibration']. "<br>";
                echo "&nbsp;&nbsp; <b>Data due:</b> " .$rows_report['dtdue']. "<br>";
                echo "&nbsp;&nbsp; <b>NIST ID#:</b> " .$rows_report['nistid']. "<br>";
                echo "&nbsp;&nbsp; <b>Std Cert#:</b> " .$rows_report['stdcert']. "<br>";
                echo "&nbsp;&nbsp; <b>Std Cert. Date:</b> " .$rows_report['stdcertdate']. "<br>";
                echo "&nbsp;&nbsp; <b>Std Cert Due:</b> " .$rows_report['stdcertdue']. "<br>";
                echo "&nbsp;&nbsp; <b>NIST ID#:</b> " .$rows_report['nistid2']. "<br>";
                echo "&nbsp;&nbsp; <b>Std Cert#:</b> " .$rows_report['stdcert2']. "<br>";
                echo "&nbsp;&nbsp; <b>Std Cert. Date:</b> " .$rows_report['stdcertdate2']. "<br>";
                echo "&nbsp;&nbsp; <b>Std Cert Due:</b> " .$rows_report['stdcertdue2']. "<br>";
                
                echo "</td>";
                
                echo "<hr>";
                
                echo "</tr>";
                echo "</table>";
                
                
                
                
                
            }
            //Paginação - Somar a quatidade de relatórios cadastrados
            $result_pg = "SELECT COUNT(customer_id) AS num_result FROM reports";            
            $resultado_pg = mysqli_query($conn, $result_pg);            
            $row_pg = mysqli_fetch_assoc($resultado_pg);
            
            //echo  $row_pg['num_result'];
           
            //Quantidade de páginas
            $quantidade_pg = ceil($row_pg['num_result'] / $qtd_result_pg);
            
            //Limite de links antes e depois           
            $max_links = 2;
            
            echo "<a href='consult_calibration_report.php?pagina=1'>First page</a> ";
            
            for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                if($pag_ant >= 1){
                echo "<a href='consult_calibration_report.php?pagina=$pag_ant'>$pag_ant</a> ";
                }    
            }
            
            
            echo " $pagina ";
            
            
            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                if($pag_dep <= $quantidade_pg){
                echo "<a href='consult_calibration_report.php?pagina=$pag_dep'>$pag_dep</a> ";
                }
            }
            
            echo "<a href='consult_calibration_report.php?pagina=$quantidade_pg'>Last page</a> ";
            
            
        ?>
        <p></p>
        
    </body>
</html>

