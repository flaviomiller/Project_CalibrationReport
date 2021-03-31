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
                    <form method="POST" action="process_cad_calibrationreport.php">
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
                        <label class="col-form-label col-md-3 col-sm-3 ">Tech </label>
                            <div class="col-md-4 col-sm-9">
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
                    <div class="ln_solid"></div>
                   <div class="form-group row">
                            
                            <label class="col-form-label col-md-3 col-sm-3 ">Manufacturer </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" name="manufacturer" readonly="readonly" value="<?php echo $_SESSION['manufacturer']; ?>" class="form-control" onkeyup="maiuscula(this)">
                            </div>

                            <label class="col-form-label col-md-1 col-sm-3 ">Model </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" name="model" readonly="readonly" value="<?php echo $_SESSION['model']; ?>" class="form-control" onkeyup="maiuscula(this)">
                                <a href='../administracao/select_scale.php'><span class="fa fa-exchange form-control-feedback right" aria-hidden="true"></span></a>
                            </div>

                    </div>
                   <div class="form-group row">
                            
                            
                            <label class="col-form-label col-md-3 col-sm-3 ">Capacity </label>
                            <div class="col-md-2 col-sm-9">
                                <input type="text" name="capacity" readonly="readonly" value="<?php echo $_SESSION['capacity']; ?>" class="form-control" onkeyup="maiuscula(this)">
                            </div>
                            <div class="col-md-auto col-sm-9">
                                <label class="col-form-label col-md-auto col-sm-3 ">X </label>
                            </div>
                            
                            <?php
                                $show_capacity = "";

                                switch ($_SESSION['nmincapacity']) {
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

                                switch ($_SESSION['nmeasure']) {
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

                                $show_type = "";

                                switch ($_SESSION['type']) {
                                    case " ":
                                         $show_type = "IND";
                                         break;
                                    case "BASE":
                                         $show_type = "BASE";
                                         break;
                                    }

                                ?>

                            <div class="col-md col-sm-9 ">
                                    <select class="form-control" id="mincapacity" name="nmincapacity" readonly="readonly">
                                            <option value="<?php echo $_SESSION['nmincapacity']; ?>"><?php echo $show_capacity; ?></option>
                                    </select>
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Measure </label>
                            <div class="col-md-1 col-sm-9">
                                    <select class="form-control" id="measure" name="nmeasure" readonly="readonly">
                                            <option value="<?php echo  $_SESSION['nmeasure']; ?>"><?php echo $show_nmeasure; ?></option>
                                    </select>
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Type</label>
                            <div class="col-md-2 col-sm-9">
                                  <select class="form-control" id="type" name="type" readonly="readonly">
                                            <option value="<?php echo $_SESSION['type']; ?>"><?php echo $show_type; ?></option>
                                    </select>
                            </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 ">S/N </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" name="sn" id="sn" readonly="readonly" value="<?php echo $_SESSION['sn']; ?>" class="form-control" onkeyup="maiuscula(this)">
                            </div>
                    <label class="col-form-label col-md-1 col-sm-3 ">Location </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" name="location" readonly="readonly" value="<?php echo $_SESSION['location']; ?>" class="form-control" onkeyup="maiuscula(this)">
                            </div>
                    </div>                      
                    <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 ">Control#</label>
                            <div class="col-md-4 col-sm-9 ">
                                  <input type="text" name="control" readonly="readonly" value="<?php echo $_SESSION['control']; ?>" class="form-control" onkeyup="maiuscula(this)">
                            </div>
                            <label class="col-md-1 col-sm-3  control-label"></label>
                            <div class="col-md-3 col-sm-9 ">
                                    <div class="checkbox">
                                            <label><input type="checkbox" id="itemCheck" name="itemCheck"  class="flat" onchange="verificafleg()"> Unable to calibrate</label>
                                    </div>
                            </div> 
                    </div>
                    <div class="ln_solid"></div>
                    <div id="ocultar" class="form-group row">
                                                       
                            <label id="testload" class="col-form-label col-md-3 col-sm-3 ">Test load </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cpw" name="preweight" class="form-control" onchange="autocompletar()">
                            </div>
                            
                            <label  class="col-form-label col-md-1 col-sm-3 ">Error </label>
                            <div class="col-md-2 col-sm-2">
                                <input type="text" id="cpe" name="preerror" class="form-control" onblur="autocompletar()">
                            </div>
                            <div class="col-md-2 col-sm-3 ">
                                    <select class="form-control" id="dif" name="ndif" onchange="autocompletar()">
                                            <option value="0" >+/-</option>
                                            <option value="1">+</option>
                                            <option value="2">-</option>
                                    </select>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Comments </label>
                            <div class="col-md-9 col-sm-9 ">
                                    <textarea class="form-control" id="comment" name="comment" rows="3" ></textarea>
                            </div>
                    </div>
                    <div id="ocultar16" class="ln_solid"></div>
                    

                    <div align="right" >                

                      <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      
                    </div>


                    <div class="x_content" style="display:none;">
                        <div id="ocultar1" class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="cpw1" name="preweight1" class="form-control">
                                </div>
                                <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="cpe1" name="preerror1" class="form-control">
                                </div>
                        </div>
                        <div id="ocultar2" class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="cpw2" name="preweight2" class="form-control">
                                </div>
                                <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="cpe2" name="preerror2" class="form-control">
                                </div>
                        </div>
                        <div id="ocultar3" class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="cpw3" name="preweight3" class="form-control">
                                </div>
                                <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="cpe3" name="preerror3" class="form-control">
                                </div>
                        </div>
                        <div id="ocultar4" class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="cpw4" name="preweight4" class="form-control">
                                </div>
                                <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="cpe4" name="preerror4" class="form-control">
                                </div>
                        </div>
                        <div id="ocultar5" class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="cpw5" name="preweight5" class="form-control">
                                </div>
                                <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="cpe5" name="preerror5" class="form-control">
                                </div>
                        </div>
                        
                        <div id="ocultar17" class="ln_solid"></div>
                        <div id="ocultar6" class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="caw1" name="afterweight1" class="form-control">
                                </div>
                                <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="cae1" name="aftererror1" class="form-control">
                                </div>
                        </div>
                        <div id="ocultar7" class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="caw2" name="afterweight2" class="form-control">
                                </div>
                                <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="cae2" name="aftererror2" class="form-control">
                                </div>
                        </div>
                        <div id="ocultar8"class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="caw3" name="afterweight3" class="form-control">
                                </div>
                                <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="cae3" name="aftererror3" class="form-control">
                                </div>
                        </div>
                        <div id="ocultar9" class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="caw4" name="afterweight4" class="form-control">
                                </div>
                                <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="cae4" name="aftererror4" class="form-control">
                                </div>
                        </div>
                        <div id="ocultar10" class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="caw5" name="afterweight5" class="form-control">
                                </div>
                                <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" id="cae5" name="aftererror5" class="form-control">
                                </div>
                        </div>
                        <div id="ocultar18" class="ln_solid"></div>
                        <div id="ocultar11" class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Date Calibration </label>
                                <div class="col-md-4 col-sm-9 ">
                                    <input id="data1" readonly="readonly" name="dtcalibration" id="cdtcalibration" value="<?php echo $_SESSION['dtmeasurement']; ?>" class="form-control">
                                </div>
                                <label class="col-form-label col-md-1 col-sm-3 ">Date due </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" name="dtdue" id="cdtdue" readonly="readonly" value="<?php echo $_SESSION['dtdue']; ?>" class="form-control">
                                </div>
                        </div>
                        
                        <div id="ocultar12" class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">NIST ID# </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" readonly="readonly" id="cnistid" name="nistid" class="form-control">
                                </div>
                                <label class="col-form-label col-md-1 col-sm-3 ">Std Cert# </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" readonly="readonly" id="cstdcert" name="stdcert" class="form-control">
                                </div>
                        </div>
                        <div id="ocultar13" class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Std Cert. Date </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" readonly="readonly" id="cstdcertdate" name="stdcertdate" class="form-control">
                                </div>
                                <label class="col-form-label col-md-1 col-sm-3 ">Std Cert Due </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" readonly="readonly" id="cstdcertdue" name="stdcertdue" class="form-control">
                                </div>
                        </div>
                        
                        <div id="ocultar14" class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">NIST ID# </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" readonly="readonly" id="cnistid2" name="nistid2" class="form-control">
                                </div>
                                <label class="col-form-label col-md-1 col-sm-3 ">Std Cert# </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" readonly="readonly" id="cstdcert2" name="stdcert2" class="form-control">
                                </div>
                        </div>
                        <div id="ocultar15" class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Std Cert. Date </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" readonly="readonly" id="cstdcertdate2" name="stdcertdate2" class="form-control">
                                </div>
                                <label class="col-form-label col-md-1 col-sm-3 ">Std Cert Due </label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="text" readonly="readonly" id="cstdcertdue2" name="stdcertdue2" class="form-control">
                                </div>
                        </div>
                        <div id="ocultar19" class="ln_solid"></div>
                    </div>
                    <div class="form-group">
                            <div class="col-md-9 col-sm-9  offset-md-3">
                                    <button type="button" class="btn btn-success" <?php $_SESSION['controle'] = ""; ?>>Reset</button>
                                    <button type="submit" class="btn btn-success" name="btnSelectCompany">Save</button>
                                    <button type="button" class="btn btn-success"><a href='../administracao/generate_certificate.php?lote=true'>Print</a></button>
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
    <script src="../jquery/jquery-ui.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    
    <!-- Custom Search Scripts -->
  </body>
</html>
