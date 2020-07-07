<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <head>
        <meta charset="UTF-8">
        <title> Login </title>
        <link rel="stylesheet" href="../classes/css/layout.css"/>

        <script type="text/javascript">
            
        </script>

    </head>
    <body>
        <h1> Restricted area </h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            if(isset($_SESSION['msgcad'])){
                echo $_SESSION['msgcad'];
                unset($_SESSION['msgcad']);
            }
        ?>
        <p></p>
        <form method="POST" action="valida_login.php">
            <label>User: </label>
            <input type="text" name="user" placeholder="Enter your username"><br><br>
            
            <label>Password: </label>
            <input type="password" name="password" placeholder="Enter your password"><br><br>
            
            <input type="submit" name="btnLogin" value="Access">
            
        </form>
    </body>
</html>
