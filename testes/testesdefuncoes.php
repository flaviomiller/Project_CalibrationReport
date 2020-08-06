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
        <title> Testes de funções</title>
        <link rel="stylesheet" href="css/layout.css"/>

        <script type="text/javascript">
            
        </script>
    </head>
    <body>
        <h1>Teste de Array</h1>
        
        <form method="POST" action="process_teste.php">
       
        <br><input type="number" name="item" value="<?php $_SESSION['userid'] ?>"><br><br>

        <textarea name="comment" ><?php echo $_SESSION['controle']; ?></textarea><br><br>
        <textarea name="comment" ><?php $array = explode(",", $_SESSION['controle']); print_r($array); ?></textarea><br><br>

   <?php  
    $cores = array("azul", "vermelho", "amarelo", "verde"); 
 
    foreach ($array as $value) {
        echo $value . "<br>";
        //print_r("$value <br>");
    }
?> 
        
        <br><input type="submit" name="btnrecebe" value="submit"><input type="submit" name="btnreset" value="reset">
        
        

        </form>





                

        <?php

        ?>
    <script type="text/javascript" src="js/tratamento.js"></script>
    </body>
</html>
