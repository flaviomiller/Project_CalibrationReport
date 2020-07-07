<?php
session_start();
include_once ("../classes/conexoes/conexao.php");

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
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <head>
        <meta charset="UTF-8">
        <title> Calibration Report </title>
        <link rel="stylesheet" href="../classes/css/layout.css"/>
    </head>
    <body>
        <script type="text/javascript" src="../classes/js/tratamento_form.js"></script>
        
        <h1>Calibration Report</h1>
        <a href="../administracao/select_company.php"> Change company or Technician ID <a/>
        <p></p>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <p></p>
        <?php
        $customer = $_SESSION['customer_id'];
        $techid = $_SESSION['techid'];
        ?>
        <form method="POST" action="process_cad_calibrationreport.php">
            <label>Company</label>
            <input name="customer_id" type="hidden" value="<?php echo $_SESSION['customer_id']; ?>">
            
            <input name="customer_name"  readonly=“true” value="<?php 
                $result_customer = "SELECT customer_name FROM customer WHERE customer_id = '$customer'";
                $resultado_customer = mysqli_query($conn, $result_customer);
                $row_customer = mysqli_fetch_assoc($resultado_customer);
            echo $row_customer['customer_name']; ?>">
            
            <label>Tech</label>
            <input name="techid" type='hidden' value="<?php echo $_SESSION['techid']; ?>">
            
            <input name="techid_name" readonly=“true” value="<?php 
                $result_tech = "SELECT name FROM user WHERE user_id = '$techid'";
                $resultado_tech = mysqli_query($conn, $result_tech);
                $row_tech = mysqli_fetch_assoc($resultado_tech);
            echo $row_tech['name']; ?>">
            
            <label>Tech ID</label>
            <input name="techid_id" readonly=“true” value="<?php 
                $result_tech = "SELECT techid FROM user WHERE user_id = '$techid'";
                $resultado_tech = mysqli_query($conn, $result_tech);
                $row_tech = mysqli_fetch_assoc($resultado_tech);
            echo $row_tech['techid']; ?>">
                        
            <p class=espaco></p>
            <label>Measurement Date</label>
            <input id="data"  readonly=“true” name="dtmeasurement" value="<?php echo $_SESSION['dtmeasurement']; ?>" type="date" onchange="datas()">

            <p class=espaco></p>
            <label>Location</label>
            <input name="location" type="text">
            <label>Control#</label>
            <input name="control" type="text">
            <p class=espaco></p>
            <label>Manufacturer</label>
            <input name="manufacturer" type="text">
            <label>Model</label>
            <input name="model" type="text">
            <p class=espaco></p>
            <label>S/N</label>
            <input name="sn" type="text">
            <label>Type</label>
            <input name="type" type="text">
            <p class=espaco></p>
            <label>Capacity</label>
            <input name="capacity" type="text">
            <label>X</label>
                <select id="mincapacity" name="nmincapacity">
                    <option value="0">Select</option>
                    <option value="1">.01</option>
                    <option value="2">.02</option>
                    <option value="3">.05</option>
                    <option value="4">&nbsp;.1</option>
                    <option value="5">&nbsp;.2</option>
                    <option value="6">&nbsp;.5</option>
                    <option value="7">&nbsp;&nbsp;1</option>
                    <option value="8">&nbsp;&nbsp;2</option>
                    <option value="9">&nbsp;&nbsp;5</option>
                    <option value="10">&nbsp;10</option>
                    <option value="11">&nbsp;20</option>
                    <option value="12">&nbsp;&nbsp;¼</option>
                </select>
            <label>Measure type</label>
                <select id="measure" name="nmeasure">
                    <option value="0">Select</option>
                    <option value="1">LB</option>
                    <option value="2">g</option>
                    <option value="3">oz</option>
                </select>
            <p class=espaco></p>
            <label>Test Load</label>
            <input id="cpw" name="preweight" type="text">
            <label>Error</label>
            <input id="cpe" name="preerror" type="text" onblur="autocompletar()">
            <select id="dif" name="ndif" onchange="autocompletar()">
                    <option value="0" >Select</option>
                    <option value="1">+</option>
                    <option value="2">-</option>
                </select>
            <p class=espaco></p>
            <h3>Pre-Inspection Test Results</h3>
            <p class=espaco></p>
            <label>Weight</label>
            <input id="cpw1" name="preweight1" type="text">
            <label>Error</label>
            <input id="cpe1" name="preerror1" type="text">
            <p class=espaco></p>
            <label>Weight</label>
            <input id="cpw2" name="preweight2" type="text">
            <label>Error</label>
            <input id="cpe2" name="preerror2" type="text">
            <p class=espaco></p>
            <label>Weight</label>
            <input id="cpw3" name="preweight3" type="text">
            <label>Error</label>
            <input id="cpe3" name="preerror3" type="text">
            <p class=espaco></p>
            <label>Weight</label>
            <input id="cpw4" name="preweight4" type="text">
            <label>Error</label>
            <input id="cpe4" name="preerror4" type="text">
            <p class=espaco></p>
            <label>Weight</label>
            <input id="cpw5" name="preweight5" type="text">
            <label>Error</label>
            <input id="cpe5" name="preerror5" type="text">
            <p class=espaco></p>
            <h3>Test Results After Adjustments</h3>
            <p class=espaco></p>
            <label>Weight</label>
            <input id="caw1" name="afterweight1" required type="text">
            <label>Error</label>
            <input id="cae1" name="aftererror1" required type="text">
            <p class=espaco></p>
            <label>Weight</label>
            <input id="caw2" name="afterweight2" required type="text">
            <label>Error</label>
            <input id="cae2" name="aftererror2" required type="text">
            <p class=espaco></p>
            <label>Weight</label>
            <input id="caw3" name="afterweight3" required type="text">
            <label>Error</label>
            <input id="cae3" name="aftererror3" required type="text">
            <p class=espaco></p>
            <label>Weight</label>
            <input id="caw4" name="afterweight4" required type="text">
            <label>Error</label>
            <input id="cae4" name="aftererror4" required type="text">
            <p class=espaco></p>
            <label>Weight</label>
            <input id="caw5" name="afterweight5" required type="text">
            <label>Error</label>
            <input id="cae5" name="aftererror5" required type="text">
            <p class=espaco></p>
            <label>Date Calibration</label>
            <input id="data1" readonly=“true” name="dtcalibration" value="<?php echo $_SESSION['dtmeasurement']; ?>" type="date">
            <label>Date Due</label>
            <input name="dtdue" readonly=“true” value="<?php echo $_SESSION['dtdue']; ?>" type="month">
            <p class=espaco></p>
           
            <label>NIST ID#</label>
            <input id="cnistid" name="nistid" type="text">
            <label>Std Cert#</label>
            <input id="cstdcert" name="stdcert" type="text">
            <p class=espaco></p>
            <label>Std Cert. Date</label>
            <input id="cstdcertdate" name="stdcertdate" type="month">
            <label>Std Cert Due</label>
            <input id="cstdcertdue" name="stdcertdue" type="month">
            <p class=espaco></p>
            
            <label>NIST ID#</label>
            <input id="cnistid2" name="nistid2" type="text">
            <label>Std Cert#</label>
            <input id="cstdcert2" name="stdcert2" type="text">
            <p class=espaco></p>
            <label>Std Cert. Date</label>
            <input id="cstdcertdate2" name="stdcertdate2" type="month">
            <label>Std Cert Due</label>
            <input id="cstdcertdue2" name="stdcertdue2" type="month">
            <p class=espaco></p>
            
            <input type="submit" value="Submit" name="submitcr" />
        </form>
        <p class=espaco></p>
        <?php
        
        ?>
    </body>
</html>
