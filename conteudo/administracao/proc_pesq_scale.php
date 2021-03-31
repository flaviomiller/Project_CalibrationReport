<?php
session_start();
include_once ("../classes/conexoes/conexao.php");

$scale = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

$scale_serial_number = filter_input(INPUT_POST, 'palavra_serial', FILTER_SANITIZE_STRING);

$cutomer_id = $_SESSION['customer_id'];

$result_scale = "SELECT * FROM scales WHERE manufacturer LIKE '%$scale%' AND sn LIKE '%$scale_serial_number%' AND customer_id = '$cutomer_id'";
$resultado_scale = mysqli_query($conn, $result_scale);

$cutomer_id = $_SESSION['customer_id'];

if(($resultado_scale) AND ($resultado_scale->num_rows != 0 )){
    echo "<table class='table table-striped jambo_table bulk_action'>";
    echo            "<thead>";
    echo                "<tr class='headings'>";
    echo                "<th class='column-title'>Manufacturer </th>";
    echo                "<th class='column-title'>Model </th>";
    echo                "<th class='column-title'>Capacity </th>";
    echo                "<th class='column-title'>Serial Number </th>";
    echo                "<th class='column-title'>Location </th>";
    echo                "<th class='column-title no-link last'><span class='nobr'>Actions</span>";
    echo                "</th>";
    echo                "<th class='bulk-actions' colspan='7'>";
    echo                  "<a class='antoo' style=color:#fff; font-weight:500;'>Bulk Actions ( <span class='action-cnt'> </span> ) <i class='fa fa-chevron-down'></i></a>";
    echo                "</th>";
    echo              "</tr>";
    echo            "</thead>";
    echo "<tbody>";
    while($row_scale = mysqli_fetch_assoc($resultado_scale)){
     $show_capacity = "";

                                switch ($row_scale['nmincapacity']) {
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
                                        $show_capacity = ".001";
                                        break;
                                    case 13:
                                        $show_capacity = ".002";
                                        break;
                                    case 14:
                                        $show_capacity = ".005";
                                        break;
                                    case 15:
                                        $show_capacity = ".0001";
                                        break;
                                    case 16:
                                        $show_capacity = ".0002";
                                        break;
                                    case 17:
                                        $show_capacity = ".0005";
                                        break;
                                    case 19:
                                        $show_capacity = ".00001";
                                        break;
                                    case 20:
                                        $show_capacity = ".00002";
                                        break;
                                    case 21:
                                        $show_capacity = ".00005";
                                        break;
                                    case 18:
                                        $show_capacity = "¼";
                                        break;
                                    case 23:
                                        $show_capacity = "½";
                                        break;

                                }

                                $show_nmeasure = "";

                                switch ($row_scale['nmeasure']) {
                                    case 1:
                                        $show_nmeasure = "LB";
                                        break;
                                    case 2:
                                        $show_nmeasure = "g";
                                        break;
                                    case 3:
                                        $show_nmeasure = "oz";
                                        break;
                                    case 4:
                                          $show_nmeasure = "kg";
                                          break;
                                    case 5:
                                          $show_nmeasure = "mg";
                                          break;
                                    }
    echo "<tr class='even pointer'>";
    echo "<td>" .$row_scale['manufacturer']. "</td>"
            . "<td>" .$row_scale['model']. "</td>"
            . "<td>" .$row_scale['capacity'] . " X " . $show_capacity . "" . $show_nmeasure . "</td>"
            . "<td>" .$row_scale['sn']. "</td>"
            . "<td>" .$row_scale['location']. "</td>"
            . "<td class=' last'>"
            . "<a href='valida_select_scale.php?id=" .$row_scale['scale_id']. "'>"
            . "<i class='fa fa-check-square-o'></i>&nbsp&nbsp&nbsp</a>"
            . "<a href='../edicao/edit_scale.php?scale_id=" .$row_scale['scale_id']. "'>"
            . "<i class='fa fa-edit'></i>&nbsp&nbsp</a>"
            . "<a href='../edicao/process_delete_scale.php?scale_id=".$row_scale['scale_id'] ."'>"
            . "<i data-toggle='modal' data-target='#apagarRegistro' class='fa fa-eraser'></a>"
            . "</tr>";
}
echo "</tbody>";
echo "</table>";
}else{
    echo "<table class='table table-striped jambo_table bulk_action'>";
    echo            "<thead>";
    echo                "<tr class='headings'>";
    echo                "<th class='column-title'>Manufacturer </th>";
    echo                "<th class='column-title'>Model </th>";
    echo                "<th class='column-title'>Capacity </th>";
    echo                "<th class='column-title'>Serial Number </th>";
    echo                "<th class='column-title'>Location </th>";
    echo                "<th class='column-title no-link last'><span class='nobr'>Actions</span>";
    echo                "</th>";
    echo                "<th class='bulk-actions' colspan='7'>";
    echo                  "<a class='antoo' style=color:#fff; font-weight:500;'>Bulk Actions ( <span class='action-cnt'> </span> ) <i class='fa fa-chevron-down'></i></a>";
    echo                "</th>";
    echo              "</tr>";
    echo            "</thead>";
    echo "<tbody>";
    echo "<tr class='even pointer'>";
    echo "<td>No records found</td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='../cadastros/cad_scale.php' class='fa fa-plus-circle'></a></td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";
}
