<?php
session_start();
include_once ("../classes/conexoes/conexao.php");


        /*$array = explode(",", $_SESSION['controle']);
    
        $_SESSION['quantidade'] = count($array);
               
        $controle = 0;
        $paginas_rel = 1;
        $ind = 1;
        $linembranco = 3;
        

            $id = $array[0];

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

            }*/



    $html = '';
    $html .= '<DOCTYPE html>';
    $html .= '   <html>';
    $html .= '   <head>';
    $html .= '    <meta charset="UTF-8">';
    $html .= '    <link rel="stylesheet" href="C:/xampp/htdocs/CalibrationReport/conteudo/classes/css/work_order_table.css"/>';
    $html .= '    <title>Calibration Report</title>';
    $html .= '   </head>';
    $html .= '   <body>';
    $html .= '    <div class="pai">';
    $html .= '					<div class="topleftimg"><img src="C:/xampp/htdocs/CalibrationReport/conteudo/classes/img/Logo_TS.png" width=90 height=70></div>';
    $html .= '					<div class="topleft">';
    $html .= '						PO BOX 7542 - RIVERSIDE, CA 92513<br>';
    $html .= '						PH, 951.785.1700 - PH. 951.676.00.89<br>';
    $html .= '						RTSCALE1@AOL.COM';
    $html .= '					</div>';
    $html .= '					<div class="topcenter"><img src="C:/xampp/htdocs/CalibrationReport/conteudo/classes/img/logo_iso.png" width=90 height=70></div>';
    $html .= '					<div class="topright">';
    $html .= '						<b style="font-size: 12px">WORK ORDER #62021</b><br>';
    $html .= '						CA STATE REGISTRATRION #0104<br>';
    $html .= '						ISO 9001:2015 CERTIFICATION $2019-R0031<br>';
    $html .= '						WEIGTHS & MEASURES NOTIFICATION<br>';
    $html .= '						REQUIRED: X YES X NO';
    $html .= '					</div>';
    $html .= '		<div class="tableft">';
    $html .= '			<table class="tg" style="undefined;table-layout: fixed; width: 1025px">';
    $html .= '				<thead>';
    $html .= '				  <tr>';
    $html .= '					<th class="tg-73a0" colspan="22">CUSTOMER &nbsp;&nbsp;&nbsp;    </th>';
    $html .= '					<th class="tg-73a0" colspan="9">DATE&nbsp;&nbsp;&nbsp;  </th>';
    $html .= '				  </tr>';
    $html .= '				</thead>';
    $html .= '				<tbody>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-73a0" colspan="11">ADDRESS &nbsp;&nbsp;&nbsp;   </td>';
    $html .= '					<td class="tg-73a0" colspan="11">CITY &nbsp;&nbsp;&nbsp;  </td>';
    $html .= '					<td class="tg-73a0" colspan="9">CONTACT</td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-73a0" colspan="5">STATE &nbsp;&nbsp;&nbsp;  </td>';
    $html .= '					<td class="tg-73a0" colspan="8">ZIP &nbsp;&nbsp;&nbsp;  </td>';
    $html .= '					<td class="tg-73a1" colspan="9"> SVC <input type="checkbox" class="titulo" name="svc" value"svc"></input> ATC <input type="checkbox" class="titulo" name="atc" value"atc"></input> OTHER <input type="checkbox" class="titulo" name="other" value"other"></input></td>';
    $html .= '					<td class="tg-73a0" colspan="5">PHONE</td>';
    $html .= '					<td class="tg-73a0" colspan="4">PO #</td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-73a0" colspan="22">SERVICE PERFORMED</td>';
    $html .= '					<td class="tg-73a0" colspan="9">REMARKS</td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-73a0" colspan="22"> </td>';
    $html .= '					<td class="tg-73a0" colspan="9"> </td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-73a0" colspan="22"> </td>';
    $html .= '					<td class="tg-73a0" colspan="9"> </td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-73a0" colspan="22"> </td>';
    $html .= '					<td class="tg-73a0" colspan="9"> </td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-73a0" colspan="22"> </td>';
    $html .= '					<td class="tg-73a0" colspan="9"> </td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-73a0" colspan="22"> </td>';
    $html .= '					<td class="tg-73a0" colspan="9"> </td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-73a0" colspan="22"> </td>';
    $html .= '					<td class="tg-73a0" colspan="9"> </td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-73a0" colspan="22"> </td>';
    $html .= '					<td class="tg-73a0" colspan="9"> </td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-73a0" colspan="22"> </td>';
    $html .= '					<td class="tg-73a0" colspan="9"> </td>';
    $html .= '				  </tr>';
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
    $html .= '					<td class="tg-9o1m" colspan="2" rowspan="2">TEST<br>LOAD</td>';
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

    /*for ($i = 0; $i < sizeof($array); $i++){

        $id = $array[$controle];
         

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
            }*/

    $html .= '				  <tr>';
    $html .= '					<td class="tg-91w8"><sup></sup>IND</td>';
    $html .= '					<td class="tg-f4iu" colspan="2"> </td>';
    $html .= '					<td class="tg-f4iu" colspan="2"> </td>';
    $html .= '					<td class="tg-f4iu" colspan="2"> </td>';
    $html .= '					<td class="tg-f4iu" colspan="2"> </td>';
    $html .= '					<td class="tg-f4iu" colspan="2"> </td>';
    $html .= '					<td class="tg-f4iu" colspan="2"> </td>';
    $html .= '					<td class="tg-9o1m">X</td>';
    $html .= '					<td class="tg-9o1m">X</td>';
    $html .= '					<td class="tg-9o1m">X</td>';
    $html .= '					<td class="tg-9o1m">X</td>';
    $html .= '					<td class="tg-9o1m">X</td>';
    $html .= '					<td class="tg-9o1m">X</td>';
    $html .= '					<td class="tg-9o1m">X</td>';
    $html .= '					<td class="tg-9o1m">X</td>';
    $html .= '					<td class="tg-f4iu" colspan="2"> </td>';
    $html .= '					<td class="tg-f4iu" colspan="2">TEST RESULT</td>';
    $html .= '					<td class="tg-f4iu" colspan="2"> </td>';
    $html .= '					<td class="tg-f4iu" colspan="2"> </td>';
    $html .= '					<td class="tg-f4iu" colspan="2"> </td>';
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
    
    /*$controle = $controle + 1;
    $ind = $ind + 1;
    $linembranco = $linembranco -1;
    
    if ($controle > 2){

        goto rodape;
        
    }

}

    for ($i = 0; $i < $linembranco; $i++){*/

    $html .= '				  <tr>';
    $html .= '					<td class="tg-91w8"><sup> </sup>IND</td>';
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

   /* $controle = $controle + 1;
    $ind = $ind + 1;

} rodape:*/

    $html .= '				  <tr>';
    $html .= '					<td class="tg-f4iu" colspan="3">DATE</td>';
    $html .= '					<td class="tg-f4iu" colspan="4">TRASNPORTATION</td>';
    $html .= '					<td class="tg-f4iu" colspan="3">EQUIPAMENT</td>';
    $html .= '					<td class="tg-f4iu" colspan="3">EXPENSES</td>';
    $html .= '					<td class="tg-f4iu" colspan="5">EXPENSES</td>';
    $html .= '					<td class="tg-f4iu" colspan="4">TECHNICIAN</td>';
    $html .= '					<td class="tg-f4iu" colspan="5">HRS. PER MAN</td>';
    $html .= '					<td class="tg-f4iu" colspan="4">TOTAL HRS.</td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-73a0" colspan="3"> </td>';
    $html .= '					<td class="tg-73a0" colspan="4"></td>';
    $html .= '					<td class="tg-73a0" colspan="3"></td>';
    $html .= '					<td class="tg-73a0" colspan="3"></td>';
    $html .= '					<td class="tg-73a0" colspan="5"></td>';
    $html .= '					<td class="tg-73a0" colspan="4"></td>';
    $html .= '					<td class="tg-73a0" colspan="5"></td>';
    $html .= '					<td class="tg-73a0" colspan="4"></td>';
    $html .= '				  </tr>';
    $html .= '				  <tr>';
    $html .= '					<td class="tg-73a0" colspan="3"> </td>';
    $html .= '					<td class="tg-73a0" colspan="4"></td>';
    $html .= '					<td class="tg-73a0" colspan="3"></td>';
    $html .= '					<td class="tg-73a0" colspan="3"></td>';
    $html .= '					<td class="tg-73a0" colspan="5"></td>';
    $html .= '					<td class="tg-73a0" colspan="4"></td>';
    $html .= '					<td class="tg-73a0" colspan="5"></td>';
    $html .= '					<td class="tg-73a0" colspan="4"></td>';
    $html .= '				  </tr>';
    $html .= '				</tbody>';
    $html .= '			</table>';
    $html .= '		</div>';
    $html .= '		<div class="rodape">';
    $html .= '			<b style="font-size: 12px">CERTIFICATE OF GUARANTEED CALIBRATION</b>';
    $html .= '			<p style="font-size: 8px">THIS IS TO CERTIFY THA THE WEIGHING EQUIPAMENT INDICATED ON THIS WORK ORDER HAS BEEN TESTED USING EQUIPMENT PERIODICALLY CALIBRATED WITH WEIGHTS TRACEABLE TO THE<br>';
    $html .= '			NATIONAL BUREAU OS STANDARDS. THIS CALIBRATION IS TRACEABLE TO NIST OS NATURAL PHYSICAL CONSTANTS AND IS IN COMPLIANCE WITH MIL-STD45662A,<br>';
    $html .= '			ANSI/NCSL Z540-1-1994, 10CFR50, APPENDIX B, ISO 9001:2015 CERTIFIED.</p>';
    $html .= '			<b style="font-size: 12px">';
    $html .= '				TRACEABLE CALIBRATION CERTIFICATION CERTS AVAILABLE UPON REQUEST<br>';
    $html .= '				CERTS REQUIRED: X YES X NO    PM SHEET: X YES X NO';
    $html .= '			</br><br><br><br>';
    $html .= '			<p style="font-size: 8px">';
    $html .= '				CUSTOMER SIG.:_______________________________________________ PRINT:_____________________________________________ DATE:______________________________ TECH:____________________________________ LIC. #:___________________________';
    $html .= '			</p>';
    $html .= '		</div>';
    $html .= '    </div>';

    //$controle = $controle + 1;
	//$paginas_rel = $paginas_rel + 1;

//}


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