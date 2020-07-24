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

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="administration.php" class="site_title"><i class="fa fa-certificate"></i> <span>Calibration Report</span></a>
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
                    header("Location: login.php");
                    }?>
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
                      <li><a href="select_company.php">Register Calibration Report</a></li>
                      <li><a href="../consultas/consult_calibration_report.php">Consult Reports</a></li>
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
                  <li><a href="sair.php"><i class="fa fa-sign-out"></i> Log out </a></li>
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
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="sair.php">
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
                      <a class="dropdown-item"  href="sair.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
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
                <h3>Selection Screen</h3>
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
                        <h2>Pre-selection of data <small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                            </ul>
                            <div class="clearfix"></div>
                    </div>
                    <form method="POST" action="valida_select_company.php">
                    <div class="form-group row">                        
                            <label class="control-label col-md-3 col-sm-3 ">Company <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                    <select name="customer_id" class="form-control">
                                            <option>Choose Company</option>
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
                    </div>
                    <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Tech <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                    <select name="techid" class="select2_single form-control" tabindex="-1">
                                            <option>Choose Tech</option>
                                            <?php
                                                $results_users = "SELECT * FROM user";
                                                $resultado_user = mysqli_query($conn, $results_users);
                                                while ($row_users = mysqli_fetch_assoc($resultado_user)){ ?>
                                                <option value="<?php echo $row_users['user_id']; ?>"><?php echo $row_users['name']; ?>
                                                </option><?php
                                                }
                                            ?>
                                    </select>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Measurement Date <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                    <input id="data" name="dtmeasurement" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" onchange="datas()">
                                    <script>
                                            function timeFunctionLong(input) {
                                                    setTimeout(function() {
                                                            input.type = 'text';
                                                    }, 60000);
                                            }
                                    </script>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Date due <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9">
                                <input type="number" name="dtdue" class="form-control" id="inputSuccess3" placeholder="Select how many months for next survey">
                            </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                            <div class="col-md-9 col-sm-9  offset-md-3">
                                    <a class="btn btn-primary" href="../cadastros/cad_customer.php" role="button">New</a>
                                    <button type="submit" class="btn btn-success" name="btnSelectCompany">Next</button>
                            </div>
                    </div>
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
