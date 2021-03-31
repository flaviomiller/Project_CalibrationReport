<?php
session_start();
include_once ("../classes/conexoes/conexao.php");

   // if(isset($_SESSION['msg'])){
   //     echo $_SESSION['msg'];
   //     unset($_SESSION['msg']);
   // }

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
                <h3>Register Scale</h3>
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
                        <h2>Selection of data <small>
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
                    <form method="POST" action="process_cad_scale.php">
                    <div class="form-group row">

                        <input name="customer_id" type="hidden" value="<?php echo $_SESSION['customer_id']; ?>">    
                        <label class="col-form-label col-md-3 col-sm-3 ">Company </label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" name="customer_name" readonly="readonly" class="form-control" value="<?php 
                                        $result_customer = "SELECT customer_name FROM customer WHERE customer_id = '$customer'";
                                        $resultado_customer = mysqli_query($conn, $result_customer);
                                        $row_customer = mysqli_fetch_assoc($resultado_customer);
                                    echo $row_customer['customer_name']; ?>">
                            </div>
                    
                    
                    </div>
                    <div class="ln_solid"></div>
                    
                    <div class="form-group row">
                            
                            <label class="col-form-label col-md-3 col-sm-3 ">Manufacturer </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" name="manufacturer" class="form-control" onkeyup="maiuscula(this)">
                            </div>

                            <label class="col-form-label col-md-1 col-sm-3 ">Model </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" name="model" class="form-control" onkeyup="maiuscula(this)">
                            </div>

                    </div>
                    
                    <div class="form-group row">
                            
                            
                            <label class="col-form-label col-md-3 col-sm-3 ">Capacity </label>
                            <div class="col-md-2 col-sm-9">
                                <input type="text" name="capacity" class="form-control" onkeyup="maiuscula(this)">
                            </div>
                            <div class="col-md-auto col-sm-9">
                                <label class="col-form-label col-md-auto col-sm-3 ">X </label>
                            </div>

                            <div class="col-md col-sm-9 ">
                                    <select class="form-control" id="mincapacity" name="nmincapacity">
                                            <option value="0">Select</option>
                                            <option value="7">1</option>
                                            <option value="8">2</option>
                                            <option value="22">4</option>
                                            <option value="9">5</option>
                                            <option value="10">10</option>
                                            <option value="11">20</option>
                                            <option value="4">.1</option>
                                            <option value="5">.2</option>
                                            <option value="6">.5</option>
                                            <option value="1">.01</option>
                                            <option value="2">.02</option>
                                            <option value="3">.05</option>
                                            <option value="12">.001</option>
                                            <option value="13">.002</option>
                                            <option value="14">.005</option>
                                            <option value="15">.0001</option>
                                            <option value="16">.0002</option>
                                            <option value="17">.0005</option>
                                            <option value="19">.00001</option>
                                            <option value="20">.00002</option>
                                            <option value="21">.00005</option>
                                            <option value="23">½</option>
                                            <option value="18">¼</option>
                                    </select>
                            </div>

                            <label class="col-form-label col-md-1 col-sm-3 ">Measure </label>
                            <div class="col-md-1 col-sm-9">
                                    <select class="form-control" id="measure" name="nmeasure">
                                            <option value="0">Select</option>
                                            <option value="1">LB</option>
                                            <option value="2">g</option>
                                            <option value="3">oz</option>
                                            <option value="4">kg</option>
                                            <option value="5">mg</option>
                                    </select>
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Type</label>
                            <div class="col-md-2 col-sm-9">
                                  <select class="form-control" id="type" name="type">
                                            <option value=" ">IND</option>
                                            <option value="BASE">BASE</option>
                                    </select>
                            </div>
                    </div>
                    
                    <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 ">S/N </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" name="sn" id="sn" class="form-control" onkeyup="maiuscula(this)">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Location </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" name="location" class="form-control" onkeyup="maiuscula(this)">
                            </div>
                    </div> 

                    <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3">Control# </label>
                            <div class="col-md-4 col-sm-9">
                                  <input type="text" name="control" class="form-control" onkeyup="maiuscula(this)">
                              </div>
                            </div>

                    <div class="ln_solid"></div>                    
                    
                    <div class="form-group">
                            <div class="col-md-9 col-sm-9  offset-md-3">
                                    <button type="submit" class="btn btn-success" name="submit">Save</button>
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
