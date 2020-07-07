 <?php
session_start();
include_once("../classes/conexoes/conexao.php");

$id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_NUMBER_INT);

$result_user = "SELECT * FROM user WHERE user_id = '$id'";
$resultado_user = mysqli_query($conn, $result_user);
$row_user = mysqli_fetch_assoc($resultado_user);


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
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <head>
        <meta charset="UTF-8">
        <title> Edit User </title>
        <link rel="stylesheet" href="../classes/css/layout.css"/>

        <script type="text/javascript">
            
        </script>

    </head>
    <body>
        <h1> Edit User </h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <p></p>
        <form method="POST" action="process_edit_user.php">
            <input type="hidden" name="user_id" value="<?php echo $row_user['user_id']; ?>">
            <label>Name: </label>
            <input type="text" name="name" value="<?php echo $row_user['name']; ?>"><br><br>
            <label>E-Mail: </label>
            <input type="email" name="email" value="<?php echo $row_user['email']; ?>"><br><br>
            <label>User: </label>
            <input type="text" name="user" value="<?php echo $row_user['user']; ?>"><br><br>
            <label>Tech ID: </label>
            <input type="text" name="techid" value="<?php echo $row_user['techid']; ?>"><br><br>
            <input type="submit" name="btnEditUsuario" value="Edit">
        </form>
    </body>
</html>