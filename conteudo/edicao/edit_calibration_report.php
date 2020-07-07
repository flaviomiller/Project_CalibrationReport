<?php
session_start();
include_once ("../classes/conexoes/conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$result_report = "SELECT * FROM reports WHERE id = '$id'";
$resultado_report = mysqli_query($conn, $result_report);
$row_report = mysqli_fetch_assoc($resultado_report);


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
        <title> Edit Calibration Report </title>
        <link rel="stylesheet" href="../classes/css/layout.css"/>
    </head>
    <body>
        <script type="text/javascript" src="../classes/js/tratamento_form.js"></script>
        
        <h1>Edit Calibration Report</h1>

        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <p></p>
        <form method="POST" action="process_edit_calibrationreport.php">
            <label>Company</label>
            <input name="id" type="hidden" value="<?php echo $row_report['id']; ?>">
            <input name="customer_id" type="hidden" value="<?php echo $row_report['customer_id']; ?>">
            
            <input name="customer_name"  readonly=“true” value="<?php 
                $customer = $row_report['customer_id'];
                
                $result_customer = "SELECT customer_name FROM customer WHERE customer_id = '$customer'";
                $resultado_customer = mysqli_query($conn, $result_customer);
                $row_customer = mysqli_fetch_assoc($resultado_customer);
            echo $row_customer['customer_name']; ?>">
            
            <label>Tech</label>
            <input name="techid" type='hidden' value="<?php echo $_SESSION['techid']; ?>">
            
            <input name="techid_name" readonly=“true” value="<?php 
                $techid = $row_report['techid'];
            
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
            <input id="data"  readonly=“true” name="dtmeasurement" value="<?php echo $row_report['dtmeasurement']; ?>" type="date">

            <p class=espaco></p>
            <label>Location</label>
            <input name="location" value="<?php echo $row_report['location']; ?>" type="text">
            <label>Control#</label>
            <input name="control" value="<?php echo $row_report['control']; ?>" type="text">
            <p class=espaco></p>
            <label>Manufacturer</label>
            <input name="manufacturer" value="<?php echo $row_report['manufacturer']; ?>" type="text">
            <label>Model</label>
            <input name="model" value="<?php echo $row_report['model']; ?>" type="text">
            <p class=espaco></p>
            <label>S/N</label>
            <input name="sn" value="<?php echo $row_report['sn']; ?>" type="text">
            <label>Type</label>
            <input name="type" value="<?php echo $row_report['type']; ?>" type="text">
            <p class=espaco></p>
            <label>Capacity</label>
            <input name="capacity" value="<?php echo $row_report['capacity']; ?>" type="text">
            <label>X</label>
            
            <?php
            $show_capacity = "";
            
            switch ($row_report['nmincapacity']) {
                case 1:
                    $show_capacity = ".01";
                    break;
                case 2:
                    $show_capacity = ".02";
                    break;
                case 3:
                    $show_capacity = ".05";
                    break;
                case 4:
                    $show_capacity = ".1";
                    break;
                case 5:
                    $show_capacity = ".2";
                    break;
                case 6:
                    $show_capacity = ".5";
                    break;
                case 7:
                    $show_capacity = "1";
                    break;
                case 8:
                    $show_capacity = "2";
                    break;
                case 9:
                    $show_capacity = "5";
                    break;
                case 10:
                    $show_capacity = "10";
                    break;
                case 11:
                    $show_capacity = "20";
                    break;
                case 12:
                    $show_capacity = "¼";
                    break;
                }
            
            $show_nmeasure = "";
            
            switch ($row_report['nmeasure']) {
                case 1:
                    $show_nmeasure = "LB";
                    break;
                case 2:
                    $show_nmeasure = "g";
                    break;
                case 3:
                    $show_nmeasure = "oz";
                    break;
                }
                
            $show_ndif = "";
            
            switch ($row_report['ndif']) {
                case 1:
                    $show_ndif = "+";
                    break;
                case 2:
                    $show_ndif = "-";
                    break;
                }
            
            
            ?>
                <select id="mincapacity" name="nmincapacity">
                    <option value="<?php echo $row_report['nmincapacity']; ?>"><?php echo $show_capacity; ?></option>
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
                    <option value="<?php echo $row_report['nmeasure']; ?>"><?php echo $show_nmeasure; ?></option>
                    <option value="1">LB</option>
                    <option value="2">g</option>
                    <option value="3">oz</option>
                </select>
            <p class=espaco></p>
            <label>Test Load</label>
            <input id="cpw" name="preweight" value="<?php echo $row_report['preweight']; ?>" type="text">
            <label>Error</label>
            <input id="cpe" name="preerror" value="<?php echo $row_report['preerror']; ?>" type="text" onblur="autocompletar()">
            
            <select id="dif" name="ndif" onchange="autocompletar()">
                    <option value="<?php echo $row_report['ndif']; ?>"><?php echo $show_ndif; ?></option>
                    <option value="1">+</option>
                    <option value="2">-</option>
                </select>
            <p class=espaco></p>
            
            <h3>Pre-Inspection Test Results</h3>
            <p class=espaco></p>
            <label>Weight</label>
            <input id="cpw1" value="<?php echo $row_report['preweight1']; ?>" name="preweight1" type="text">
            <label>Error</label>
            <input id="cpe1" value="<?php echo $row_report['preerror1']; ?>" name="preerror1" type="text">
            <p class=espaco></p>
            <label>Weight</label>
            <input id="cpw2" value="<?php echo $row_report['preweight2']; ?>" name="preweight2" type="text">
            <label>Error</label>
            <input id="cpe2" value="<?php echo $row_report['preerror2']; ?>" name="preerror2" type="text">
            <p class=espaco></p>
            <label>Weight</label>
            <input id="cpw3" value="<?php echo $row_report['preweight3']; ?>" name="preweight3" type="text">
            <label>Error</label>
            <input id="cpe3" value="<?php echo $row_report['preerror3']; ?>" name="preerror3" type="text">
            <p class=espaco></p>
            <label>Weight</label>
            <input id="cpw4" value="<?php echo $row_report['preweight4']; ?>" name="preweight4" type="text">
            <label>Error</label>
            <input id="cpe4" value="<?php echo $row_report['preerror4']; ?>" name="preerror4" type="text">
            <p class=espaco></p>
            <label>Weight</label>
            <input id="cpw5" value="<?php echo $row_report['preweight5']; ?>" name="preweight5" type="text">
            <label>Error</label>
            <input id="cpe5" value="<?php echo $row_report['preerror5']; ?>" name="preerror5" type="text">
            <p class=espaco></p>
            <h3>Test Results After Adjustments</h3>
            <p class=espaco></p>
            <label>Weight</label>
            <input id="caw1" value="<?php echo $row_report['afterweight1']; ?>" name="afterweight1" required type="text">
            <label>Error</label>
            <input id="cae1" value="<?php echo $row_report['aftererror1']; ?>" name="aftererror1" required type="text">
            <p class=espaco></p>
            <label>Weight</label>
            <input id="caw2" value="<?php echo $row_report['afterweight2']; ?>" name="afterweight2" required type="text">
            <label>Error</label>
            <input id="cae2" value="<?php echo $row_report['aftererror2']; ?>" name="aftererror2" required type="text">
            <p class=espaco></p>
            <label>Weight</label>
            <input id="caw3" value="<?php echo $row_report['afterweight3']; ?>" name="afterweight3" required type="text">
            <label>Error</label>
            <input id="cae3" value="<?php echo $row_report['aftererror3']; ?>" name="aftererror3" required type="text">
            <p class=espaco></p>
            <label>Weight</label>
            <input id="caw4" value="<?php echo $row_report['afterweight4']; ?>" name="afterweight4" required type="text">
            <label>Error</label>
            <input id="cae4" value="<?php echo $row_report['aftererror4']; ?>" name="aftererror4" required type="text">
            <p class=espaco></p>
            <label>Weight</label>
            <input id="caw5" value="<?php echo $row_report['afterweight5']; ?>" name="afterweight5" required type="text">
            <label>Error</label>
            <input id="cae5" value="<?php echo $row_report['aftererror5']; ?>" name="aftererror5" required type="text">
            <p class=espaco></p>
            <label>Date Calibration</label>
            <input id="data1" readonly=“true” name="dtcalibration" value="<?php echo $row_report['dtcalibration']; ?>" type="date">
            <label>Date Due</label>
            <input name="dtdue" readonly=“true” value="<?php echo $row_report['dtdue']; ?>" type="month">
            <p class=espaco></p>
           
            <label>NIST ID#</label>
            <input id="cnistid" value="<?php echo $row_report['nistid']; ?>" readonly=“true” name="nistid" type="text">
            <label>Std Cert#</label>
            <input id="cstdcert" value="<?php echo $row_report['stdcert']; ?>" readonly=“true” name="stdcert" type="text">
            <p class=espaco></p>
            <label>Std Cert. Date</label>
            <input id="cstdcertdate" value="<?php echo $row_report['stdcertdate']; ?>" readonly=“true” name="stdcertdate" type="month">
            <label>Std Cert Due</label>
            <input id="cstdcertdue" value="<?php echo $row_report['stdcertdue']; ?>" readonly=“true” name="stdcertdue" type="month">
            <p class=espaco></p>
            
            <label>NIST ID#</label>
            <input id="cnistid2" value="<?php echo $row_report['nistid2']; ?>" readonly=“true” name="nistid2" type="text">
            <label>Std Cert#</label>
            <input id="cstdcert2" value="<?php echo $row_report['stdcert2']; ?>" readonly=“true” name="stdcert2" type="text">
            <p class=espaco></p>
            <label>Std Cert. Date</label>
            <input id="cstdcertdate2" value="<?php echo $row_report['stdcertdate2']; ?>" readonly=“true” name="stdcertdate2" type="month">
            <label>Std Cert Due</label>
            <input id="cstdcertdue2" value="<?php echo $row_report['stdcertdue2']; ?>" readonly=“true” name="stdcertdue2" type="month">
            <p class=espaco></p>
            
            <input type="submit" value="Submit" name="submitcr" />
        </form>
        <p class=espaco></p>
        <?php
        
        ?>
    </body>
</html>
