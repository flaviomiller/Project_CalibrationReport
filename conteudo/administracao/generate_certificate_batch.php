<?php

session_start();

include_once ("../classes/conexoes/conexao.php");

        //echo "Session Controle: " . $_SESSION['controle'] . "<br><br>";

        $array = explode(",", $_SESSION['controle']);
    
        $_SESSION['quantidade'] = count($array);
        /*
        print_r($array);
        echo "<br><br>";
        echo "Session Quantidade: " . $_SESSION['quantidade'] . "<br><br>";
        echo "Session Controle: " . $_SESSION['controle'];
        */

		
		$html = '';
		$html .= '<DOCTYPE html>';
		$html .= '<html>';
		$html .= '<head>';
		$html .= '<meta charset="UTF-8">';
		$html .= '<link rel="stylesheet" href="../classes/css/certificado.css"/>';
		$html .= '<title>Calibration Report</title>';
		$html .= '</head>';
        $html .= '<body>';
        
		$controle = 0;
		$paginas_rel = 1;

        for ($i = 0; $i < $_SESSION['quantidade']; $i++){
            
            
            
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

            $unablecalibrate = $row_report['stdcertdate'];
			$leiaute = $row_report['stdcertdate2'];
            $nome1 = $row_customer['customer_name'];
            $nome2 = $dataMesurement -> format('m.d');
			$nome = $nome1 ." ".$nome2.".pdf";

            $lertpmedida = $row_report['nmeasure'];

            if ($lertpmedida == 0){

                $tipodemedida = "";

            } elseif ($lertpmedida == 1){

                $tipodemedida = "LB";

            } elseif ($lertpmedida == 2){

                $tipodemedida = "g";

            } elseif ($lertpmedida == 3){

                $tipodemedida = "oz";

            }elseif ($lertpmedida == 4){

                $tipodemedida = "kg";

            }

            //echo "Tipo de Medida vinda do  banco: " . $lertpmedida . "<br>";
            //echo "Tipo de Medida: " . $tipodemedida . "<br><br>";

            $lertpcapminima = $row_report['nmincapacity'];

            if ($lertpcapminima == 0){

                $capacidademinima = "";

            } elseif ($lertpcapminima == 1){

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

            //echo "Tipo de Medida vinda do  banco: " . $lertpcapminima . "<br>";
            //echo "Tipo de Medida: " . $capacidademinima . "<br><br>";
			if (!empty($leiaute)) {
				$html .= '<div class="pai">';
				$html .= '<p> <b><u>Top Scale, Inc. Calibration Report</u></b> <br>';
				$html .= 'P.O. Box 7542 <br> ';
				$html .= 'Riverside, CA  92513 <br>';
				$html .= '(951)785-1700 <br>';
				$html .= '<b>ISO 9001/2015</b> <br>';
				$html .= '<b>PAGE <u>' . $paginas_rel . "</u> OF <u>" . $_SESSION['quantidade'] . "</u></b></p>";
				$html .= '<br>';
				$html .= '<table class="tg">';
				$html .= '<thead>';
				$html .= '<tr>';
				$html .= '<th class="tg-6hwh" colspan="3"><b>'  . $row_customer['customer_name'] . "</b></th>";
				$html .= '<th class="tg-6hwh"></th>';
				$html .= '<th class="tg-6hwh"></th>';
				$html .= '<th class="tg-6hwh"></th>';
				$html .= '<th class="tg-6hwh"></th>';
				$html .= '<th class="tg-6hwh"></th>';
				$html .= '<th class="tg-6hwh"></th>';
				$html .= '<th class="tg-6hwh" colspan="2"><b>DATE:&nbsp;&nbsp;&nbsp;'  . $dataMesurement -> format('m/d/Y') . "</th></b>";
				$html .= '</tr>';
				$html .= '</thead>';
				$html .= '</table>';
				$html .= '<div>';
				$html .= '<table class="tg">';
				$html .= '<thead>';
				$html .= '<tr>';
				$html .= '<th class="tg-1woa" colspan="2">location</th>';
				$html .= '<th class="tg-1woa">Control#</th>';
				$html .= '<th class="tg-1woa">Mfgr.</th>';
				$html .= '<th class="tg-1woa">Model</th>';
				$html .= '<th class="tg-1woa">S/N</th>';
				$html .= '<th class="tg-1woa" colspan="2">Type</th>';
				$html .= '<th class="tg-1woa" colspan="2">Capacity</th>';
				$html .= '</tr>';
				$html .= '</thead>';
				$html .= '<tbody>';
				$html .= '<tr>';
				$html .= '<td class="tg-6hxq" colspan="2">' . $row_report['location'] . "</td>";
				$html .= '<td class="tg-6hxq">' . $row_report['control'] . "</td>";
				$html .= '<td class="tg-6hxq">' . $row_report['manufacturer'] . "</td>";
				$html .= '<td class="tg-6hxq">' . $row_report['model'] . "</td>";
				$html .= '<td class="tg-6hxq">' . $row_report['sn'] . "</td>";
				$html .= '<td class="tg-6hxq" colspan="2">' . $row_report['type'] . "</td>";
				$html .= '<td class="tg-6hxq" colspan="2">' . $row_report['capacity'] . " X " .  $capacidademinima . ""  . $tipodemedida . "</td>";
				$html .= '</tr>';
				$html .= '<tr>';
				$html .= '<td class="tg-6hwh"></td>';
				$html .= '<td class="tg-6hwh"></td>';
				$html .= '<td class="tg-1woa" colspan="6">Pre-Inspection Test Results</td>';
				$html .= '<td class="tg-6hwh"></td>';
				$html .= '<td class="tg-6hwh"></td>';
				$html .= '</tr>';
				$html .= '</tbody>';
				$html .= '</table>';
				$html .= '<table class="tg">';
				$html .= '<thead>';
				$html .= '<tr>';
				$html .= '<th class="tg-6hxq">Wt</th>';
				$html .= '<th class="tg-6hxq">&nbsp;&nbsp;&nbsp;&nbsp;' . $row_report['preweight5'] . "&nbsp;&nbsp;&nbsp;&nbsp;</th>";
				$html .= '<th class="tg-6hxq">Wt:</th>';
				$html .= '<th class="tg-6hxq">' . $row_report['preweight4'] . "</th>";
				$html .= '<th class="tg-6hxq">Wt:</th>';
				$html .= '<th class="tg-6hxq">' . $row_report['preweight3'] . "</th>";
				$html .= '<th class="tg-6hxq">Wt:</th>';
				$html .= '<th class="tg-6hxq">' . $row_report['preweight2'] . "</th>";
				$html .= '<th class="tg-6hxq">Wt:</th>';
				$html .= '<th class="tg-6hxq">' . $row_report['preweight1'] . "</th>";
				$html .= '</tr>';
				$html .= '</thead>';
				$html .= '<tbody>';
				$html .= '<tr>';
				$html .= '<td class="tg-6hxq">Error</td>';
				$html .= '<td class="tg-6hxq">&nbsp;&nbsp;' . $row_report['preerror5'] . "&nbsp;&nbsp;</td>";
				$html .= '<td class="tg-6hxq">Error</td>';
				$html .= '<td class="tg-6hxq">' . $row_report['preerror4'] . "</td>";
				$html .= '<td class="tg-6hxq">Error:</td>';
				$html .= '<td class="tg-6hxq">' . $row_report['preerror3'] . "</td>";
				$html .= '<td class="tg-6hxq">Error:</td>';
				$html .= '<td class="tg-6hxq">' . $row_report['preerror2'] . "</td>";
				$html .= '<td class="tg-6hxq">Error:</td>';
				$html .= '<td class="tg-6hxq">' . $row_report['preerror1'] . "</td>";
				$html .= '</tr>';
				$html .= '<tr>';
				$html .= '<td class="tg-6hwh"></td>';
				$html .= '<td class="tg-6hwh"></td>';
				$html .= '<td class="tg-1woa" colspan="6">Test Results After Adjustments</td>';
				$html .= '<td class="tg-6hwh"></td>';
				$html .= '<td class="tg-6hwh"></td>';
				$html .= '</tr>';
				$html .= '</tbody>';
				$html .= '</table>';
				$html .= '<table class="tg">';
				$html .= '<thead>';
				$html .= '<tr>';
				$html .= '<th class="tg-6hxq">Wt</th>';
				$html .= '<th class="tg-6hxq">' . $row_report['afterweight5'] . "</th>";
				$html .= '<th class="tg-6hxq">Wt:</th>';
				$html .= '<th class="tg-6hxq">' . $row_report['afterweight4'] . "</th>";
				$html .= '<th class="tg-6hxq">Wt:</th>';
				$html .= '<th class="tg-6hxq">' . $row_report['afterweight3'] . "</th>";
				$html .= '<th class="tg-6hxq">Wt:</th>';
				$html .= '<th class="tg-6hxq">' . $row_report['afterweight2'] . "</th>";
				$html .= '<th class="tg-6hxq">Wt:</th>';
				$html .= '<th class="tg-6hxq">' . $row_report['afterweight1'] . "</th>";
				$html .= '</tr>';
				$html .= '</thead>';
				$html .= '<tbody>';
				$html .= '<tr>';
				$html .= '<td class="tg-6hxq">Error</td>';
				$html .= '<td class="tg-6hxq">&nbsp;&nbsp;' . $row_report['aftererror5'] . "&nbsp;&nbsp;</td>";
				$html .= '<td class="tg-6hxq">Error</td>';
				$html .= '<td class="tg-6hxq">' . $row_report['aftererror4'] . "</td>";
				$html .= '<td class="tg-6hxq">Error:</td>';
				$html .= '<td class="tg-6hxq">' . $row_report['aftererror3'] . "</td>";
				$html .= '<td class="tg-6hxq">Error:</td>';
				$html .= '<td class="tg-6hxq">' . $row_report['aftererror2'] . "</td>";
				$html .= '<td class="tg-6hxq">Error:</td>';
				$html .= '<td class="tg-6hxq">' . $row_report['aftererror1'] . "</td>";
				$html .= '</tr>';
				$html .= '</tbody>';
				$html .= '</table>';
				$html .= '<table class="tg">';
				$html .= '<tbody>';
				$html .= '<tr>';
				$html .= '<td class="tg-6hwc">Comments: ' . $row_report['comment'] . "</td>";
				$html .= '</tr>';
				$html .= '</tbody>';
				$html .= '</table>';
				$html .= '<table class="tg">';
				$html .= '<thead>';
				$html .= '<tr>';
				$html .= '<th class="tg-1woa" colspan="2">Cal Date</th>';
				$html .= '<th class="tg-1woa">Cal Due</th>';
				$html .= '<th class="tg-1woa">Tech ID#</th>';
				$html .= '<th class="tg-1woa">NIST ID#</th>';
				$html .= '<th class="tg-1woa">Std Cert#</th>';
				$html .= '<th class="tg-1woa" colspan="2">Std Cert. Date</th>';
				$html .= '<th class="tg-1woa" colspan="2">Std Cert Due</th>';
				$html .= '</tr>';
				$html .= '</thead>';
				$html .= '<tbody>';
				$html .= '<tr>';



				$html .= '<td class="tg-6hxq" colspan="2">' . $dataMesurement -> format('m/d/Y') . "</td>";
				$html .= '<td class="tg-6hxq">' . $dataDue -> format('m/Y') . "</td>";
				$html .= '<td class="tg-6hxq">' . $row_user['techid'] . "</td>";
				$html .= '<td class="tg-6hxq">' . $row_report['nistid'] . "</td>";
				$html .= '<td class="tg-6hxq">' . $row_report['stdcert'] . "</td>";
				$html .= '<td class="tg-6hxq" colspan="2">' . $stdCertDate -> format('m/Y') . "</td>";
				$html .= '<td class="tg-6hxq" colspan="2">' . $stdCertDue -> format('m/Y') . "</td>";
				$html .= '</tr>';
				$html .= '</tbody>';

				$html .= '<tr>';
				$html .= '<td class="tg-6hxq" colspan="2">' . $dataMesurement -> format('m/d/Y') . "</td>";
				$html .= '<td class="tg-6hxq">' . $dataDue -> format('m/Y') . "</td>";
				$html .= '<td class="tg-6hxq">' . $row_user['techid'] . "</td>";
				$html .= '<td class="tg-6hxq">' . $row_report['nistid2'] . "</td>";
				$html .= '<td class="tg-6hxq">' . $row_report['stdcert2'] . "</td>";
				$html .= '<td class="tg-6hxq" colspan="2">' . $stdCertDate2 -> format('m/Y') . "</td>";
				$html .= '<td class="tg-6hxq" colspan="2">' . $stdCertDue2 -> format('m/Y') . "</td>";

				$html .= '</tr>';
				$html .= '</tbody>';

				$html .= '</table>';
				$html .= '</div>';
				$html .= '<div class="rodapeleft">';
				$html .= '<p>';
				$html .= 'Top Scale, Inc. certifies that the above listed instruments were calibrated to manufacturer’s specifications.  ';
				$html .= '<b>Standards are traceable to the National Institute of Standards and Technologies through documents on the ';
				$html .= 'file at Top Scale, Inc. Procedures and policies comply with MIL-STD-45662a and ANSI/Z540-1-1998.  ';
				$html .= 'All inst.. ±.1% of full capacity.</b>';
				$html .= '</p>';
				$html .= '<br>';
				$html .= '<p><b>';
				$html .= 'TECHNICIAN SIGNATURE:  ________________________________________________________';
				$html .= '</b></p>';
				$html .= '</div>';
				$html .= '<div class="rodaperight">';
				$html .= '<p>';
				$html .= '<b>ISO CERT NO. 2019-R0031</b>';
				$html .= '<br>';
				$html .= '</p>';
				$html .= '</div>';
				$html .= '</div>';
				
				$controle = $controle + 1;
				$paginas_rel = $paginas_rel + 1;

			} else {

				$html .= '<div class="pai">';
				$html .= '<p> <b><u>Top Scale, Inc. Calibration Report</u></b> <br>';
				$html .= 'P.O. Box 7542 <br> ';
				$html .= 'Riverside, CA  92513 <br>';
				$html .= '(951)785-1700 <br>';
				$html .= '<b>ISO 9001/2015</b> <br>';
				$html .= '<b>PAGE <u>' . $paginas_rel . "</u> OF <u>" . $_SESSION['quantidade'] . "</u></b></p>";
				$html .= '<br>';
				$html .= '<table class="tg">';
				$html .= '<thead>';
				$html .= '<tr>';
				$html .= '<th class="tg-6hwh" colspan="3"><b>'  . $row_customer['customer_name'] . "</b></th>";
				$html .= '<th class="tg-6hwh"></th>';
				$html .= '<th class="tg-6hwh"></th>';
				$html .= '<th class="tg-6hwh"></th>';
				$html .= '<th class="tg-6hwh"></th>';
				$html .= '<th class="tg-6hwh"></th>';
				$html .= '<th class="tg-6hwh"></th>';
				$html .= '<th class="tg-6hwh" colspan="2"><b>DATE:&nbsp;&nbsp;&nbsp;'  . $dataMesurement -> format('m/d/Y') . "</th></b>";
				$html .= '</tr>';
				$html .= '</thead>';
				$html .= '</table>';
				$html .= '<div>';
				$html .= '<table class="tg">';
				$html .= '<thead>';
				$html .= '<tr>';
				$html .= '<th class="tg-1woa" colspan="2">location</th>';
				$html .= '<th class="tg-1woa">Control#</th>';
				$html .= '<th class="tg-1woa">Mfgr.</th>';
				$html .= '<th class="tg-1woa">Model</th>';
				$html .= '<th class="tg-1woa">S/N</th>';
				$html .= '<th class="tg-1woa" colspan="2">Type</th>';
				$html .= '<th class="tg-1woa" colspan="2">Capacity</th>';
				$html .= '</tr>';
				$html .= '</thead>';
				$html .= '<tbody>';
				$html .= '<tr>';
				$html .= '<td class="tg-6hxq" colspan="2">' . $row_report['location'] . "</td>";
				$html .= '<td class="tg-6hxq">' . $row_report['control'] . "</td>";
				$html .= '<td class="tg-6hxq">' . $row_report['manufacturer'] . "</td>";
				$html .= '<td class="tg-6hxq">' . $row_report['model'] . "</td>";
				$html .= '<td class="tg-6hxq">' . $row_report['sn'] . "</td>";
				$html .= '<td class="tg-6hxq" colspan="2">' . $row_report['type'] . "</td>";
				$html .= '<td class="tg-6hxq" colspan="2">' . $row_report['capacity'] . " X " .  $capacidademinima . ""  . $tipodemedida . "</td>";
				$html .= '</tr>';
				$html .= '<tr>';
				$html .= '<td class="tg-6hwh"></td>';
				$html .= '<td class="tg-6hwh"></td>';
				$html .= '<td class="tg-1woa" colspan="6">Pre-Inspection Test Results</td>';
				$html .= '<td class="tg-6hwh"></td>';
				$html .= '<td class="tg-6hwh"></td>';
				$html .= '</tr>';
				$html .= '</tbody>';
				$html .= '</table>';
				$html .= '<table class="tg">';
				$html .= '<thead>';
				$html .= '<tr>';
				$html .= '<th class="tg-6hxq">Wt</th>';
				$html .= '<th class="tg-6hxq">&nbsp;&nbsp;&nbsp;&nbsp;' . $row_report['preweight5'] . "&nbsp;&nbsp;&nbsp;&nbsp;</th>";
				$html .= '<th class="tg-6hxq">Wt:</th>';
				$html .= '<th class="tg-6hxq">' . $row_report['preweight4'] . "</th>";
				$html .= '<th class="tg-6hxq">Wt:</th>';
				$html .= '<th class="tg-6hxq">' . $row_report['preweight3'] . "</th>";
				$html .= '<th class="tg-6hxq">Wt:</th>';
				$html .= '<th class="tg-6hxq">' . $row_report['preweight2'] . "</th>";
				$html .= '<th class="tg-6hxq">Wt:</th>';
				$html .= '<th class="tg-6hxq">' . $row_report['preweight1'] . "</th>";
				$html .= '</tr>';
				$html .= '</thead>';
				$html .= '<tbody>';
				$html .= '<tr>';
				$html .= '<td class="tg-6hxq">Error</td>';
				$html .= '<td class="tg-6hxq">&nbsp;&nbsp;' . $row_report['preerror5'] . "&nbsp;&nbsp;</td>";
				$html .= '<td class="tg-6hxq">Error</td>';
				$html .= '<td class="tg-6hxq">' . $row_report['preerror4'] . "</td>";
				$html .= '<td class="tg-6hxq">Error:</td>';
				$html .= '<td class="tg-6hxq">' . $row_report['preerror3'] . "</td>";
				$html .= '<td class="tg-6hxq">Error:</td>';
				$html .= '<td class="tg-6hxq">' . $row_report['preerror2'] . "</td>";
				$html .= '<td class="tg-6hxq">Error:</td>';
				$html .= '<td class="tg-6hxq">' . $row_report['preerror1'] . "</td>";
				$html .= '</tr>';
				$html .= '<tr>';
				$html .= '<td class="tg-6hwh"></td>';
				$html .= '<td class="tg-6hwh"></td>';
				$html .= '<td class="tg-1woa" colspan="6">Test Results After Adjustments</td>';
				$html .= '<td class="tg-6hwh"></td>';
				$html .= '<td class="tg-6hwh"></td>';
				$html .= '</tr>';
				$html .= '</tbody>';
				$html .= '</table>';
				$html .= '<table class="tg">';
				$html .= '<thead>';
				$html .= '<tr>';
				$html .= '<th class="tg-6hxq">Wt</th>';
				$html .= '<th class="tg-6hxq">' . $row_report['afterweight5'] . "</th>";
				$html .= '<th class="tg-6hxq">Wt:</th>';
				$html .= '<th class="tg-6hxq">' . $row_report['afterweight4'] . "</th>";
				$html .= '<th class="tg-6hxq">Wt:</th>';
				$html .= '<th class="tg-6hxq">' . $row_report['afterweight3'] . "</th>";
				$html .= '<th class="tg-6hxq">Wt:</th>';
				$html .= '<th class="tg-6hxq">' . $row_report['afterweight2'] . "</th>";
				$html .= '<th class="tg-6hxq">Wt:</th>';
				$html .= '<th class="tg-6hxq">' . $row_report['afterweight1'] . "</th>";
				$html .= '</tr>';
				$html .= '</thead>';
				$html .= '<tbody>';
				$html .= '<tr>';
				$html .= '<td class="tg-6hxq">Error</td>';
				$html .= '<td class="tg-6hxq">&nbsp;&nbsp;' . $row_report['aftererror5'] . "&nbsp;&nbsp;</td>";
				$html .= '<td class="tg-6hxq">Error</td>';
				$html .= '<td class="tg-6hxq">' . $row_report['aftererror4'] . "</td>";
				$html .= '<td class="tg-6hxq">Error:</td>';
				$html .= '<td class="tg-6hxq">' . $row_report['aftererror3'] . "</td>";
				$html .= '<td class="tg-6hxq">Error:</td>';
				$html .= '<td class="tg-6hxq">' . $row_report['aftererror2'] . "</td>";
				$html .= '<td class="tg-6hxq">Error:</td>';
				$html .= '<td class="tg-6hxq">' . $row_report['aftererror1'] . "</td>";
				$html .= '</tr>';
				$html .= '</tbody>';
				$html .= '</table>';
				$html .= '<table class="tg">';
				$html .= '<tbody>';
				$html .= '<tr>';
				$html .= '<td class="tg-6hwc">Comments: ' . $row_report['comment'] . "</td>";
				$html .= '</tr>';
				$html .= '</tbody>';
				$html .= '</table>';
				$html .= '<table class="tg">';
				$html .= '<thead>';
				$html .= '<tr>';
				$html .= '<th class="tg-1woa" colspan="2">Cal Date</th>';
				$html .= '<th class="tg-1woa">Cal Due</th>';
				$html .= '<th class="tg-1woa">Tech ID#</th>';
				$html .= '<th class="tg-1woa">NIST ID#</th>';
				$html .= '<th class="tg-1woa">Std Cert#</th>';
				$html .= '<th class="tg-1woa" colspan="2">Std Cert. Date</th>';
				$html .= '<th class="tg-1woa" colspan="2">Std Cert Due</th>';
				$html .= '</tr>';
				$html .= '</thead>';
				$html .= '<tbody>';
				$html .= '<tr>';
				if (!empty($unablecalibrate)) {
				$html .= '<td class="tg-6hxq" colspan="2">' . $dataMesurement -> format('m/d/Y') . "</td>";
				$html .= '<td class="tg-6hxq">' . $dataDue -> format('m/Y') . "</td>";
				$html .= '<td class="tg-6hxq">' . $row_user['techid'] . "</td>";
				$html .= '<td class="tg-6hxq">' . $row_report['nistid'] . "</td>";
				$html .= '<td class="tg-6hxq">' . $row_report['stdcert'] . "</td>";
				$html .= '<td class="tg-6hxq" colspan="2">' . $stdCertDate -> format('m/Y') . "</td>";
				$html .= '<td class="tg-6hxq" colspan="2">' . $stdCertDue -> format('m/Y') . "</td>";
				} else {
					$html .= '<td class="tg-6hxq" colspan="2"> &nbsp; </td>';
					$html .= '<td class="tg-6hxq"> </td>';
					$html .= '<td class="tg-6hxq"> </td>';
					$html .= '<td class="tg-6hxq"> </td>';
					$html .= '<td class="tg-6hxq"> </td>';
					$html .= '<td class="tg-6hxq" colspan="2"> </td>';
					$html .= '<td class="tg-6hxq" colspan="2"> </td>';
				}
				$html .= '</tr>';
				$html .= '</tbody>';

				$html .= '</table>';
				$html .= '</div>';
				$html .= '<div class="rodapeleft">';
				$html .= '<p>';
				$html .= 'Top Scale, Inc. certifies that the above listed instruments were calibrated to manufacturer’s specifications.  ';
				$html .= '<b>Standards are traceable to the National Institute of Standards and Technologies through documents on the ';
				$html .= 'file at Top Scale, Inc. Procedures and policies comply with MIL-STD-45662a and ANSI/Z540-1-1998.  ';
				$html .= 'All inst.. ±.1% of full capacity.</b>';
				$html .= '</p>';
				$html .= '<br>';
				$html .= '<p><b>';
				$html .= 'TECHNICIAN SIGNATURE:  ________________________________________________________';
				$html .= '</b></p>';
				$html .= '</div>';
				$html .= '<div class="rodaperight">';
				$html .= '<p>';
				$html .= '<b>ISO CERT NO. 2019-R0031</b>';
				$html .= '<br>';
				$html .= '</p>';
				$html .= '</div>';
				$html .= '</div>';

				$controle = $controle + 1;
				$paginas_rel = $paginas_rel + 1;
			}
		}
		$html .= '</body>';
		$html .= '</html>'; 

    
$gerahtml = $html;


use Dompdf\Dompdf;

require_once ("dompdf/autoload.inc.php");

$dompdf = new DOMPDF();
$dompdf->load_html($gerahtml);
$dompdf->render();

//Salvar em um diretório
$output = $dompdf->output();
file_put_contents("../impressoes/". $nome, $output);

//header("Location: download_report.php");
header("Location: valida_send_email.php?btnSendEmail&arquivo=$nome&nome_empresa=$nome1&data=$nome2");
//echo  "<script>alert('Relatório gerado com Sucesso!);</script>";
//Renderizar e baixaxr imediatemente
//$dompdf->stream($nome,array("Attachment"=> false));

		

?>