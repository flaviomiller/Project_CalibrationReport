 <?php
session_start();
ob_start();

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
    
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <head>
        <meta charset="UTF-8">
        <title> Register User </title>
        <link rel="stylesheet" href="../classes/css/layout.css"/>
        <link rel="stylesheet" href="../classes/css/bootstrap.css"/>

    </head>
    <body>
        <div class="container-fluid";>
        <h2> Register User </h2>
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
        <form method="POST" action="">
            <label>Name: </label>
            <input type="text" name="name" placeholder="Enter name"><br><br>
            <label>E-Mail: </label>
            <input type="email" name="email" placeholder="Enter an email"><br><br>
            <label>User: </label>
            <input type="text" name="user" placeholder="Enter user"><br><br>
            <label>Password: </label>
            <input type="password" name="password" placeholder="Enter a password"><br><br>
            <label>Tech ID: </label>
            <input type="text" name="techid" placeholder="Enter technician id"><br><br>
            <input type="submit" name="btnCadUsuario" value="Register">
        </form>
        </div>
        <script type="text/javascript"></script>
        <script src="../classes/js/jquery-3.5.1.slim.min.js"></script>
        <script src="../classes/js/popper.min.js"></script>
        <script src="../classes/js/bootstrap.js"></script>
    </body>
</html>