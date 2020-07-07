<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Administration </title>
        <link rel="stylesheet" href="../classes/css/layout.css"/>
    </head>
    <body>
        <h1> Administration </h1>
        <?php
            session_start();
            if(!empty($_SESSION['name'])){ 
                echo "You are logged in as " .$_SESSION['name']. "<br><br>";
                //echo "Seu ID é: " .$_SESSION['techid']. "<br><br>" ;
                //echo "<a href='sair.php'>Sair</a>";
            } else {
                $_SESSION['msg'] = "Restricted area";
                header("Location: login.php");
        }?>
        
        <div class="container">
            <table>
               <tr>
                    <td></td>
                    <td><a href="login.php">Login</a><br></td>
               </tr>
               <tr>
                    <td></td>
                    <td><a href="select_company.php">Calibration Report Selection Company</a><br></td>
               </tr>
                <tr>
                    <td></td>
                    <td><a href="../cadastros/cad_calibration_report.php">Calibration Report</a><br></td>
               </tr>
               
               <tr>
                    <td></td>
                    <td><a href="../consultas/consult_calibration_report.php">Consult Reports</a><br></td>
               </tr>
               
               <tr>
                    <td></td>
                    <td><a href="../edicao/edit_calibration_report.php">Edit Reports</a><br></td>
               </tr>
               
               <tr>
                    <td></td>
                    <td><a href="../cadastros/cad_customer.php">Register Customers</a><br></td>
               </tr>
               
               <tr>
                    <td></td>
                    <td><a href="../consultas/consult_customer.php">Consult Customers</a><br></td>
               </tr>
               
               <tr>
                    <td></td>
                    <td><a href="../edicao/edit_customer.php">Edit Customers</a><br></td>
               </tr>
               
               <tr>
                    <td></td>
                    <td><a href="../cadastros/cad_user.php">Register user</a><br></td>
               </tr>
               
               <tr>
                    <td></td>
                    <td><a href="../consultas/consult_user.php">Consult Users</a><br></td>
               </tr>
               
               <tr>
                    <td></td>
                    <td><a href="../edicao/edit_user.php">Edit Users</a><br></td>
               </tr>
               
               <tr>
                    <td></td>
                    <td><a href="../administracao/generate_certificate.php"  target='_blank'>Report Generation</a><br></td>
               </tr>
               
               <tr>
                    <td></td>
                    <td>
                        <?php
                            echo "<a href='sair.php'>Log out</a>";
                        ?><br></td>
               </tr>
            </table>
        </div>
    </body>
</html>