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
        <title> Register User </title>
        <link rel="stylesheet" href="../classes/css/layout.css"/>

        <script type="text/javascript">
            
        </script>

    </head>
    <body>
        <h1> Consult Users </h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg']. "<br><br>";
                unset($_SESSION['msg']);
            }
            $pagina_atual = filter_input(INPUT_GET,'pagina',
             FILTER_SANITIZE_NUMBER_INT);
            
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
            
            $qtd_result_pg = 2;
            
            $inicio = ($qtd_result_pg * $pagina) - $qtd_result_pg;
            
            $result_usuarios = "SELECT * FROM user LIMIT $inicio, $qtd_result_pg";
            $resultado_usuarios = mysqli_query($conn, $result_usuarios);
            while ($rows_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                echo "ID: " .$rows_usuario['user_id']. "<br>";
                echo "Name: " .$rows_usuario['name']. "<br>";
                echo "E-Mail: " .$rows_usuario['email']. "<br>";
                echo "User: " .$rows_usuario['user']. "<br>";
                echo "Tech ID: " .$rows_usuario['techid']. "<br>";
                echo "<a href='../edicao/edit_user.php?user_id=" .$rows_usuario['user_id']. "'>Edit</a><br>";
                echo "<a href='../edicao/process_delete_user.php?user_id=" .$rows_usuario['user_id']. "'>Delete</a><br><hr>";
            }
            
            $result_pg = "SELECT COUNT(user_id) AS num_result FROM user";
            $resultado_pg = mysqli_query($conn, $result_pg);
            $row_pg = mysqli_fetch_assoc($resultado_pg);
            //echo  $row_pg['num_result'];
            $quantidade_pg = ceil($row_pg['num_result'] / $qtd_result_pg);
            
            $max_links = 1;
            echo "<a href='consult_user.php?pagina=1'>First page</a> ";
            
            for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                if($pag_ant >= 1){
                echo "<a href='consult_user.php?pagina=$pag_ant'>$pag_ant</a> ";
                }    
            }
            
            
            echo " $pagina ";
            
            
            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                if($pag_dep <= $quantidade_pg){
                echo "<a href='consult_user.php?pagina=$pag_dep'>$pag_dep</a> ";
                }
            }
            
            echo "<a href='consult_user.php?pagina=$quantidade_pg'>Last page</a> ";
            
            
        ?>
        <p></p>
        
    </body>
</html>
