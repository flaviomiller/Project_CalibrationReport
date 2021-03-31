<?php
session_start();
include_once ("../classes/conexoes/conexao.php");


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Calibration Report | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../jquery/jquery-ui.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="../administracao/administration.php" class="site_title"><i class="fa fa-certificate"></i> <span>Calibration Report</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                  <img src="../classes/img/badge.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>
                    <?php
                    if(!empty($_SESSION['name'])){ 
                        echo $_SESSION['name'];
                        } else {
                    $_SESSION['msg'] = "Restricted area";
                    header("Location: ../administracao/login.php");
                    }
                    $customer = $_SESSION['customer_id'];
                    $techid = $_SESSION['techid'];
                    ?>
                </h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Main</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-print"></i> Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="../administracao/select_company.php">Register Calibration Report</a></li>
                        <li><a href="../consultas/consult_calibration_report.php">Consult Reports</a></li>
                        <li><a href="../administracao/batch_printing.php">Batch Print</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-building-o"></i> Customers <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../cadastros/cad_customer.php">Register Customers</a></li>
                      <li><a href="../consultas/consult_customer.php">Consult Customers</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../cadastros/cad_user.php">Register user</a></a></li>
                      <li><a href="../consultas/consult_user.php">Consult Users</a></li>
                    </ul>
                  </li>                 
                  <li><a href="../administracao/sair.php"><i class="fa fa-sign-out"></i> Log out </a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="../administracao/sair.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="../classes/img/badge.png" alt=""><?php echo $_SESSION['name']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="../administracao/sair.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Register Calibration Report</h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <!-- page content body -->
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <!-- page content body Inserir o Forumlário a partir daqui-->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Selection of Scale <small>
                            <?php
                                if(isset($_SESSION['msg'])){
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }?>
                            </small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                            </ul>
                            <div class="clearfix"></div>
                    </div>
                    <form method="POST" action="">
                    <div class="form-group row">
                        <input name="customer_id" type="hidden" value="<?php echo $_SESSION['customer_id']; ?>">    
                        <label class="col-form-label col-md-3 col-sm-3 ">Company </label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" name="customer_name" readonly="readonly" class="form-control" value="<?php 
                                        $result_customer = "SELECT customer_name FROM customer WHERE customer_id = '$customer'";
                                        $resultado_customer = mysqli_query($conn, $result_customer);
                                        $row_customer = mysqli_fetch_assoc($resultado_customer);
                                    echo $row_customer['customer_name']; ?>">
                                <a href='../administracao/select_company.php'><span class="fa fa-exchange form-control-feedback right" aria-hidden="true"></span></a>
                            </div>
                    </div>
                    <div class="form-group row">   
                        <label class="col-form-label col-md-3 col-sm-1 ">Tech </label>
                            <div class="col-md-4 col-sm-1">
                                <input name="techid" type='hidden' value="<?php echo $_SESSION['techid']; ?>">
                                <input type="text" name="techid_name" readonly="readonly" class="form-control" value="<?php 
                                    $result_tech = "SELECT name FROM user WHERE user_id = '$techid'";
                                    $resultado_tech = mysqli_query($conn, $result_tech);
                                    $row_tech = mysqli_fetch_assoc($resultado_tech);
                                echo $row_tech['name']; ?>">
                            </div>
                            <label class="col-form-label col-md-2 col-sm-3 ">Measurement Date </label>
                            <div class="col-md-3 col-sm-9 ">
                                    <input id="data" name="dtmeasurement" readonly="readonly" value="<?php echo $_SESSION['dtmeasurement']; ?>" class="date-picker form-control" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="autocompletar()">
                            </div>
                    </div>
                   <div class="ln_solid"></div><!--Divisa depois dos dados da empresa tecnico e data-->
                   
                   <!--Início da Adaptação-->
                   
                  <!--Campos de Consulta-->

                  <div class="form-group row">   
                        <label class="col-form-label col-md-3 col-sm-3">Manufacturer </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="manufacturer" name="manufacturer" placeholder="Insert the scale manufacturer..." class="form-control" value="" onkeyup="maiuscula(this)">
                            </div>
                            <label class="col-form-label col-md-2 col-sm-3 ">Serial Number </label>
                            <div class="col-md-3 col-sm-9 ">
                                <input type="text" id="sn" name="sn"  placeholder="Insert the serial number..." class="form-control" value="" onkeyup="maiuscula(this)">
                            </div>
                  </div>
                    
                  <div class="form-group row">   
                        <label class="col-form-label col-md-3 col-sm-3">New Scale </label>
                            <div class="col-form-label col-md-2 col-sm-9">
                              <a href="../cadastros/cad_scale.php" class="fa fa-plus-circle"></a>
                            </div>
                  </div>
                   <!--Inicio da Tabela de Retorno da Consulta-->
                   <div class="x_content">
                    <!--<p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>-->
                    <div class="table-responsive">

                    <!--Div que recebe o retorno da cosulta-->
                    <div class="resultado">

                            <?php
                              $cutomer_id = $_SESSION['customer_id'];
                              

                              $result_scale = "SELECT * FROM scales WHERE customer_id = '$cutomer_id'";
                              $resultado_scale = mysqli_query($conn, $result_scale);
                              
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
                                            case 22:
                                                $show_capacity = "4";
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
                            ?>

                    </div>
                      
                    								
                  </div>

                  <!--Término da Adaptação-->

                    <div id="ocultar16" class="ln_solid"></div>                
                  </form>
                </div>
              </div>
                
                <!-- /final Formulario -->
                
             </div>
            </div>
        </div>
      </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            ©2020 All Rights Reserved. Red Thread Tech.
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- Script Próprio -->
    <script type="text/javascript" src="../classes/js/tratamento_form.js"></script>
    <script type="text/javascript" src="../classes/js/personalizado.js"></script>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <script src="../jquery/jquery-ui.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    
    <!-- Custom Search Scripts -->
<script>

$(function(){
    $("#manufacturer").keyup(function(){
        //Recuperar o valor do campo
        var pesquisa = $(this).val();

        //Verificar se algo foi digitado
        if(pesquisa != ''){
            var dados = {
                palavra : pesquisa
            }
            $.post('proc_pesq_scale.php', dados, function(retorna){
                //Mostra dentro da ul resultado obtido
                $(".resultado").html(retorna);
            });
        }
    });
});
//-------------------------------------------------------
$(function(){
    $("#sn").keyup(function(){
        //Recuperar o valor do campo
        var pesquisa = $(this).val();

        //Verificar se algo foi digitado
        if(pesquisa != ''){
            var dados = {
              palavra_serial : pesquisa
            }
            $.post('proc_pesq_scale.php', dados, function(retorna){
                //Mostra dentro da ul resultado obtido
                $(".resultado").html(retorna);
            });
        }
    });

});

</script>
  </body>
</html>
