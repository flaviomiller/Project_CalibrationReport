<?php

//$_RETORNA_ID['rtid'];

include_once ("../classes/conexoes/conexao.php");

/*$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_report = "SELECT * FROM `reports` WHERE id = '$id'";
$resultado_report = mysqli_query($conn, $result_report);
$row_report = mysqli_fetch_assoc($resultado_report);

$techi_id = $row_report['techid'];
$result_user = "SELECT * FROM `user` WHERE user_id = '$techi_id'";
$resultado_user = mysqli_query($conn, $result_user);
$row_user = mysqli_fetch_assoc($resultado_user);

$customer_id = $row_report['customer_id'];
$result_customer = "SELECT * FROM `customer` WHERE customer_id = '$customer_id'";
$resultado_customer = mysqli_query($conn, $result_customer);
$row_customer = mysqli_fetch_assoc($resultado_customer);

$dataMesurement = new DateTime($row_report['dtcalibration']);
$dataDue = new DateTime($row_report['dtdue']);

$stdCertDate = new DateTime($row_report['stdcertdate']);
$stdCertDue = new DateTime($row_report['stdcertdue']);

$stdCertDate2 = new DateTime($row_report['stdcertdate2']);
$stdCertDue2 = new DateTime($row_report['stdcertdue2']);

$leiaute = $row_report['stdcertdate2'];
$nome1 = $row_report['id'];
$nome2 = $row_report['customer_id'];
$nome3 = date("Ymd");

$lertpmedida = $row_report['nmeasure'];

if ($lertpmedida == 1){

    $tipodemedida = "LB";

} elseif ($lertpmedida == 2){

    $tipodemedida = "g";

} elseif ($lertpmedida == 3){

    $tipodemedida = "oz";

}elseif ($lertpmedida == 4){

    $tipodemedida = "kg";

}


$lertpcapminima = $row_report['nmincapacity'];

if ($lertpcapminima == 1){

    $capacidademinima = ".01";

} elseif ($lertpcapminima == 2){

    $capacidademinima = ".02";

}elseif ($lertpcapminima == 3){

    $capacidademinima = ".05";

}elseif ($lertpcapminima == 4){

    $capacidademinima = ".1";

}elseif ($lertpcapminima == 5){

    $capacidademinima = ".2";

}elseif ($lertpcapminima == 6){

    $capacidademinima = ".5";

}elseif ($lertpcapminima == 7){

    $capacidademinima = "1";

}elseif ($lertpcapminima == 8){

    $capacidademinima = "2";

}elseif ($lertpcapminima == 9){

    $capacidademinima = "5";

}elseif ($lertpcapminima == 10){

    $capacidademinima = "10";

}elseif ($lertpcapminima == 11){

    $capacidademinima = "20";

}elseif ($lertpcapminima == 12){

    $capacidademinima = ".001";

}elseif ($lertpcapminima == 13){

    $capacidademinima = ".002";

}elseif ($lertpcapminima == 14){

    $capacidademinima = ".005";

}elseif ($lertpcapminima == 15){

    $capacidademinima = ".0001";

}elseif ($lertpcapminima == 16){

    $capacidademinima = ".0002";

}elseif ($lertpcapminima == 17){

    $capacidademinima = ".0005";

}


if (!empty($leiaute)) {*/
    $html = '';
    $html .= '<DOCTYPE html>';
    $html .= '    <html>';
    $html .= '   <head>';
    $html .= '    <meta charset="UTF-8">';
    $html .= '    <link rel="stylesheet" href="C:/xampp/htdocs/CalibrationReport/conteudo/classes/css/work_order_table.css"/>';
    $html .= '    <title>Calibration Report</title>';
    $html .= '   </head>';
    $html .= '   <body>';
    $html .= '    <div class="pai">';
    $html .= '					<div class="topleftimg"><img src="C:/xampp/htdocs/CalibrationReport/conteudo/classes/img/Logo_TS.png" width=80 height=70></div>';
    $html .= '					<div class="topleft_2">';
    $html .= '						<p style="text-align: center;font-size: 16px;"><b>PREVENTIVE MAINTENANCE<br>SCHEDULED INSPECTION</b></p>';
    $html .= '					</div>';
    $html .= '					<div class="topcenter_2"><img src="C:/xampp/htdocs/CalibrationReport/conteudo/classes/img/logo_iso.png" width=70 height=70></div>';
    $html .= '					<div class="topright_2">';
    $html .= '						<p style="text-align: right;">PO BOX 7542 - RIVERSIDE, CA 92513<br>';
    $html .= '                        PH, 951.785.1700<br>';
    $html .= '                        RTSCALE1@AOL.COM<br>';
    $html .= '                        ISO 9001:2015 CERTIFIED<br>';
    $html .= '                        ISO 17025 COMPLIANT</p>';
    $html .= '					</div>';
    $html .= '		<div class="tableft">';
    $html .= '			<table class="tg" style="undefined;table-layout: fixed; width: 1025px">';
    $html .= '				<thead>';
    $html .= '				  <tr>';
    $html .= '					<th class="tg-73a0" colspan="24">CUSTOMER</th>';
    $html .= '					<td class="tg-73a0" colspan="9" rowspan="3">';
    $html .= '						&nbsp;&nbsp;CERTS REQUIRED?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Y&nbsp;&nbsp;&nbsp;&nbsp;N<br>';
    $html .= '						&nbsp;&nbsp;LEGAL FOR TRADE?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Y&nbsp;&nbsp;&nbsp;&nbsp;N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ON-SITE<br>';
    $html .= '						&nbsp;&nbsp;SEAL INSTALLED?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Y&nbsp;&nbsp;&nbsp;&nbsp;N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>';
    $html .= '						&nbsp;&nbsp;CALIBRATION STICKER?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Y&nbsp;&nbsp;&nbsp;&nbsp;N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IN-HOUSE</td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-73a0" colspan="14">ADDRESS</td>';
    $html .= '					<td class="tg-73a0" colspan="10">CITY</td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-73a0" colspan="7">STATE</td>';
    $html .= '					<td class="tg-73a0" colspan="7">ZIP</td>';
    $html .= '					<td class="tg-73a0" colspan="10">PO #</td>';
    $html .= '				</thead>	';
    $html .= '				  </tr>';
    $html .= '				</tbody>';
    $html .= '			</table>';
    $html .= '			<table class="tg" style="undefined;table-layout: fixed; width: 1025px">';
    $html .= '				<thead>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-9wq8" rowspan="2"></td>';
    $html .= '					<td class="tg-9o1m" colspan="2" rowspan="2">MFG</td>';
    $html .= '					<td class="tg-9o1m" colspan="2" rowspan="2">MODEL</td>';
    $html .= '					<td class="tg-9o1m" colspan="2" rowspan="2">CAP</td>';
    $html .= '					<td class="tg-9o1m" colspan="2" rowspan="2">SERIAL #</td>';
    $html .= '					<td class="tg-9o1m" colspan="2" rowspan="2">LOC</td>';
    $html .= '					<td class="tg-9o1m" colspan="2" rowspan="2">CORNER<br>LOAD</td>';
    $html .= '					<td class="tg-azew" colspan="4">CORNERS</td>';
    $html .= '					<td class="tg-azew" colspan="4">CORRECTED</td>';
    $html .= '					<td class="tg-9o1m" colspan="2" rowspan="2">TESTE<br>LOAD</td>';
    $html .= '					<td class="tg-9o1m" colspan="2" rowspan="2">TEST<br>RESULTS</td>';
    $html .= '					<td class="tg-9o1m" colspan="2" rowspan="2">ERROR</td>';
    $html .= '					<td class="tg-9o1m" colspan="2" rowspan="2">CORRECTION</td>';
    $html .= '					<td class="tg-9o1m" colspan="2" rowspan="2">RETEST<br>RESULTS</td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-azew">BL</td>';
    $html .= '					<td class="tg-azew">TL</td>';
    $html .= '					<td class="tg-azew">TR</td>';
    $html .= '					<td class="tg-azew">BR</td>';
    $html .= '					<td class="tg-azew">BL</td>';
    $html .= '					<td class="tg-azew">TL</td>';
    $html .= '					<td class="tg-azew">TR</td>';
    $html .= '					<td class="tg-azew">BR</td>';
    $html .= '				  </tr>';
    $html .= '				</thead>';
    $html .= '				<tbody>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-91w8"><sup>1</sup>IND</td>';
    $html .= '					<td class="tg-f4iu" colspan="2"></td>';
    $html .= '					<td class="tg-f4iu" colspan="2"></td>';
    $html .= '					<td class="tg-f4iu" colspan="2"></td>';
    $html .= '					<td class="tg-f4iu" colspan="2"></td>';
    $html .= '					<td class="tg-f4iu" colspan="2"></td>';
    $html .= '					<td class="tg-f4iu" colspan="2"></td>';
    $html .= '					<td class="tg-9o1m"></td>';
    $html .= '					<td class="tg-9o1m"></td>';
    $html .= '					<td class="tg-9o1m"></td>';
    $html .= '					<td class="tg-9o1m"></td>';
    $html .= '					<td class="tg-9o1m"></td>';
    $html .= '					<td class="tg-9o1m"></td>';
    $html .= '					<td class="tg-9o1m"></td>';
    $html .= '					<td class="tg-9o1m"></td>';
    $html .= '					<td class="tg-f4iu" colspan="2"></td>';
    $html .= '					<td class="tg-f4iu" colspan="2"></td>';
    $html .= '					<td class="tg-f4iu" colspan="2"></td>';
    $html .= '					<td class="tg-f4iu" colspan="2"></td>';
    $html .= '					<td class="tg-f4iu" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li">BASE</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-9o1m"></td>';
    $html .= '					<td class="tg-9o1m"></td>';
    $html .= '					<td class="tg-9o1m"></td>';
    $html .= '					<td class="tg-9o1m"></td>';
    $html .= '					<td class="tg-9o1m"></td>';
    $html .= '					<td class="tg-9o1m"></td>';
    $html .= '					<td class="tg-9o1m"></td>';
    $html .= '					<td class="tg-9o1m"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li"><sup>2</sup>IND</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li">BASE</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li"><sup>3</sup>IND</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li">BASE</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li"><sup>4</sup>IND</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li">BASE</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li"><sup>5</sup>IND</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li">BASE</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li"><sup>6</sup>IND</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li">BASE</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li"><sup>7</sup>IND</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li">BASE</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li"><sup>8</sup>IND</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li">BASE</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li"><sup>9</sup>IND</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li">BASE</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li"><sup>10</sup>IND</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-l6li">BASE</td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '					<td class="tg-73a0" colspan="2"></td>';
    $html .= '				  </tr>';
    $html .= '				</tbody>';
    $html .= '			</table>';
    $html .= '		</div>';
    $html .= '		<div class="rodape_2">';
    $html .= '			<p style="font-size: 8px">';
    $html .= '				CUSTOMER SIG.:_______________________________________________ PRINT:_____________________________________________ DATE:______________________________ TECH:____________________________________ LIC. #:___________________________';
    $html .= '			</p>';
    $html .= '		</div>';
    $html .= '    </div>';
    $html .= '   </body>';
    $html .= '  </html>';

    

use Dompdf\Dompdf;

require_once ("dompdf/autoload.inc.php");

$dompdf = new DOMPDF();

$dompdf->load_html('
' . $html . '
            ');
    
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
     
     //$output = $dompdf->output();
    //file_put_contents("../impressoes/REPORTID" . $nome1 ."CMID". $nome2 ."DT".$nome3.".pdf", $output);
    
    $dompdf->stream(
             "arquivo1.pdf", //"REPORTID" . $nome1 ."CMID". $nome2 ."DT".$nome3.".pdf",
             array(
                 "Attachment"=> false
             )
        );           
    
        header("Location: ../consultas/consult_calibration_report.php");
?>