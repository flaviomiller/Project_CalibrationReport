<?php
session_start();
include_once ("../classes/conexoes/conexao.php");
$_SESSION['controle'] = "";
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Consult Reports | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

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
                      <li><a href="../cadastros/cad_user.php">Register user</a></li>
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
                <h3>Consult Report</h3>
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
                        <form method="POST" action="">
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-10 ">
                                    <select name="customer_cont" class="form-control">
                                            <option value="">Choose Company</option>
                                            <?php
                                                $results_empresas = "SELECT * FROM customer";
                                                $resultado_empresa = mysqli_query($conn, $results_empresas);
                                                while ($row_empresas = mysqli_fetch_assoc($resultado_empresa)){ ?>
                                                <option value="<?php echo $row_empresas['customer_id']; ?>"><?php echo $row_empresas['customer_name']; ?>
                                                </option><?php
                                                }
                                            ?>
                                    </select>
                            </div>

                            <div class="col-md-4 col-sm-10 ">
                                    <select name="dtmeasurement_cont" class="form-control">
                                            <option value="">Choose Date</option>
                                            <?php
                                                $results_report = "SELECT * FROM reports GROUP BY dtmeasurement";
                                                $resultado_report = mysqli_query($conn, $results_report);
                                                while ($row_report = mysqli_fetch_assoc($resultado_report)){ ?>
                                                <option value="<?php echo $row_report['dtmeasurement']; ?>"><?php echo $row_report['dtmeasurement']; ?>
                                                </option><?php
                                                }
                                            ?>
                                    </select>
                            </div>
                            <div class="col-md-2 col-sm-9">
                                    <button type="submit" class="btn btn-success" name="search">Search</button>
                            </div>
                          </div>
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
                    
                    <div class="x_content">
                    <!--<p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>-->

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">                        
                          <thead>
                          <tr class="headings">
                            <th class="column-title"># </th>
                            <th class="column-title">Measurement Date </th>
                            <th class="column-title">Customer </th>
                            <th class="column-title">Tech ID </th>
                            <th class="column-title">Location </th>
                            <th class="column-title">Control </th>
                            <th class="column-title">Manufacturer </th>
                            <th class="column-title">Model </th>
                            <th class="column-title">Serial Number </th>
                            <th class="column-title no-link last"><span class="nobr">Actions</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                                <?php
                                    
                                    //receber o numero da página
                                    $pagina_atual = filter_input(INPUT_GET,'pagina',
                                     FILTER_SANITIZE_NUMBER_INT);

                                    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

                                    //Seta a quantidade de resultados por página
                                    $qtd_result_pg = 500;

                                    //Calculo do inicio da visualização
                                    $inicio = ($qtd_result_pg * $pagina) - $qtd_result_pg;

                                    $customer_control = "";
                                    $dtmeasurement_control = "";
                                    $selects = "SELECT * FROM reports LIMIT $inicio, $qtd_result_pg";

                                    if (isset($_POST['search'])){

                                      $customer_control = $_POST['customer_cont'];
                                      $dtmeasurement_control = $_POST['dtmeasurement_cont'];
                                      $_SESSION['controle'] = "";
                                      
                                      if(!empty($customer_control) && !empty($dtmeasurement_control)){ 
                                      $selects = "SELECT * FROM reports  WHERE customer_id = '$customer_control' AND dtmeasurement = '$dtmeasurement_control' LIMIT $inicio, $qtd_result_pg";
                                      } elseif(!empty($customer_control) && empty($dtmeasurement_control)){ 
                                        $selects = "SELECT * FROM reports  WHERE customer_id = '$customer_control' LIMIT $inicio, $qtd_result_pg";
                                      }elseif(empty($customer_control) && !empty($dtmeasurement_control)){ 
                                        $selects = "SELECT * FROM reports  WHERE dtmeasurement = '$dtmeasurement_control' LIMIT $inicio, $qtd_result_pg";
                                      }elseif(empty($customer_control) && empty($dtmeasurement_control)){ 
                                        $selects = "SELECT * FROM reports LIMIT $inicio, $qtd_result_pg";
                                      }
                                    }                                    

                                    $result_reports = $selects;
                                    $resultado_report = mysqli_query($conn, $result_reports);
                                    
                                    while ($rows_report = mysqli_fetch_assoc($resultado_report)){
                                        
                                        $customer_id = $rows_report['customer_id'];
                                        
                                        
                                        if(!empty($customer_id)){
                                          //echo "primeiro if";
                                          $_SESSION['valor']  = $rows_report['id'];
                                          
                                          if ($_SESSION['controle'] == ""){
                                          
                                            $_SESSION['controle'] = $_SESSION['valor'];
                                              
                                          
                                            }else{ 
                                              

                                              //$_SESSION['controle'] = "teste";
                                              $_SESSION['controle'] = $_SESSION['controle'] . ","  . $_SESSION['valor'];
                                              
                                          
                                            }
                                        
                                        }else{
                                            
                                            //echo "segundo if";
                                            //unset($_SESSION['controle']);
                                            //$_SESSION['controle'] = "";
                                            //header("Location: testesdefuncoes.php");
                                        
                                        }
                                        
                                        /*
                                        $array = explode(",", $_SESSION['controle']);
                                        
                                        print_r ($array);
                                  
                                        echo "<br><br>";
                                  
                                        $_SESSION['quantidade'] = count($array);
                                  
                                        echo $_SESSION['quantidade'];
                                  
                                        echo "<br><br>";
                                         
                                        $controle = 0;
                                        while ($controle < $_SESSION['quantidade'] ){
                                          print_r($array[$controle]);
                                          echo "<br><br>";
                                          $controle = $controle + 1;
                                          //sleep(1);    */
                                        //} 
                                  
                                      
                                      
                                      //header("Location: ../cadastros/cad_calibration_report.php");



                                        
                                        $result_customer = "SELECT * FROM `customer` WHERE customer_id = '$customer_id'";
                                        $resultado_customer = mysqli_query($conn, $result_customer);
                                        $row_customer = mysqli_fetch_assoc($resultado_customer);

                                        $techi_id = $rows_report['techid'];
                                        $result_user = "SELECT * FROM `user` WHERE user_id = '$techi_id'";
                                        $resultado_user = mysqli_query($conn, $result_user);
                                        $row_user = mysqli_fetch_assoc($resultado_user);
                                        
                                        echo "<tbody>";
                                        echo "<tr class='even pointer'>";
                                        echo "<td>" .$rows_report['id']. "</td>"
                                                . "<td>" .$rows_report['dtmeasurement']. "</td>"
                                                . "<td>" .$row_customer['customer_name']. "</td>"
                                                . "<td>" .$row_user['techid']. "</td>"
                                                . "<td>" .$rows_report['location']. "</td>"
                                                . "<td>" .$rows_report['control']. "</td>"
                                                . "<td>" .$rows_report['manufacturer']. "</td>"
                                                . "<td>" .$rows_report['model']. "</td>"
                                                . "<td>" .$rows_report['sn']. "</td>"
                                                . "<td class=' last'>"
                                                . "<a href='../edicao/edit_calibration_report.php?id=" .$rows_report['id']. "'>"
                                                . "<i class='fa fa-edit'> | </i></a>"
                                                . "<a href='../edicao/process_delete_calibrationreport.php?id=" .$rows_report['id']. "'>"
                                                . " <i class='fa fa-eraser'> | </i></a>"
                                                . "<a href='../administracao/generate_certificate.php?id=" .$rows_report['id']. "'>"
                                                . " <i class='fa fa-print'></i></a></td>";
                                        }
                                        echo "</tr>";
                                        echo "</tbody>";
                                        echo "</table>";
                                        //echo $_SESSION['controle'] . "<br><br>";                                        


                                        //Paginação - Somar a quatidade de relatórios cadastrados
                                        $result_pg = "SELECT COUNT(customer_id) AS num_result FROM reports WHERE customer_id = '$customer_control' AND dtmeasurement = '$dtmeasurement_control'";            
                                        $resultado_pg = mysqli_query($conn, $result_pg);            
                                        $row_pg = mysqli_fetch_assoc($resultado_pg);

                                        //echo  $row_pg['num_result'];

                                        //Quantidade de páginas
                                        $quantidade_pg = ceil($row_pg['num_result'] / $qtd_result_pg);

                                        //Limite de links antes e depois           
                                        $max_links = 2;

                                        echo "<a href='batch_printing.php?pagina=1'>First page</a> ";

                                        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                            if($pag_ant >= 1){
                                            echo "<a href='batch_printing.php?pagina=$pag_ant'>$pag_ant</a> ";
                                            }    
                                        }


                                        echo " $pagina ";


                                        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                            if($pag_dep <= $quantidade_pg){
                                            echo "<a href='batch_printing.php?pagina=$pag_dep'>$pag_dep</a> ";
                                            }
                                        }

                                        echo "<a href='batch_printing.php?pagina=$quantidade_pg'>Last page</a> ";
                                ?>
                    </div>								
                  </div>
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
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
