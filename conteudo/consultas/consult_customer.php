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
        <title> Consult Customers </title>
        <link rel="stylesheet" href="../classes/css/layout.css"/>

        <script type="text/javascript">
            
        </script>

    </head>
    <body>
        <h1> Consult Customers </h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg']."<br>";
                unset($_SESSION['msg']);
            }
            
            $pagina_atual = filter_input(INPUT_GET,'pagina',
             FILTER_SANITIZE_NUMBER_INT);
            
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
            
            $qtd_result_pg = 2;
            
            $inicio = ($qtd_result_pg * $pagina) - $qtd_result_pg;
            
            $result_clientes = "SELECT * FROM customer LIMIT $inicio, $qtd_result_pg";
            $resultado_cliente = mysqli_query($conn, $result_clientes);
            while ($rows_cliente = mysqli_fetch_assoc($resultado_cliente)){
                echo "Customer ID: " .$rows_cliente['customer_id']. "<br>";
                echo "Customer Name: " .$rows_cliente['customer_name']. "<br>";
                echo "Adrees: " .$rows_cliente['addres']. "<br>";
                echo "City: " .$rows_cliente['city']. "<br>";
                echo "State: " .$rows_cliente['state']. "<br>";
                echo "Zip: " .$rows_cliente['zip']. "<br>";
                echo "State: " .$rows_cliente['state']. "<br>";
                echo "<a href='../edicao/edit_customer.php?customer_id=" .$rows_cliente['customer_id']. "'>Edit</a><br>";
                echo "<a href='../edicao/process_delete_customer.php?customer_id=" .$rows_cliente['customer_id']. "'>Delete</a><br><hr>";
            }
            
            $result_pg = "SELECT COUNT(customer_id) AS num_result FROM customer";
            $resultado_pg = mysqli_query($conn, $result_pg);
            $row_pg = mysqli_fetch_assoc($resultado_pg);
            //echo  $row_pg['num_result'];
            $quantidade_pg = ceil($row_pg['num_result'] / $qtd_result_pg);
            
            $max_links = 1;
            echo "<a href='consult_customer.php?pagina=1'>First page</a> ";
            
            for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                if($pag_ant >= 1){
                echo "<a href='consult_customer.php?pagina=$pag_ant'>$pag_ant</a> ";
                }    
            }
            
            
            echo " $pagina ";
            
            
            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                if($pag_dep <= $quantidade_pg){
                echo "<a href='consult_customer.php?pagina=$pag_dep'>$pag_dep</a> ";
                }
            }
            
            echo "<a href='consult_customer.php?pagina=$quantidade_pg'>Last page</a> ";
            
            
        ?>
        <p></p>
        
    </body>
</html>

