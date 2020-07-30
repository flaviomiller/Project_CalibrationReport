<?php
session_start();
include_once ("../classes/conexoes/conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$result_report = "SELECT * FROM reports WHERE id = '$id'";
$resultado_report = mysqli_query($conn, $result_report);
$row_report = mysqli_fetch_assoc($resultado_report);

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
                <h3>Edit Calibration Report</h3>
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
                    <form method="POST" action="process_edit_calibrationreport.php">
                    <div class="form-group row">
                        <input name="id" type="hidden" value="<?php echo $row_report['id']; ?>">
                        <input name="customer_id" type="hidden" value="<?php echo $row_report['customer_id']; ?>">   
                        <label class="col-form-label col-md-3 col-sm-3 ">Company </label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" name="customer_name" readonly="readonly" class="form-control" value="<?php 
                                    $customer = $row_report['customer_id'];

                                    $result_customer = "SELECT customer_name FROM customer WHERE customer_id = '$customer'";
                                    $resultado_customer = mysqli_query($conn, $result_customer);
                                    $row_customer = mysqli_fetch_assoc($resultado_customer);
                                echo $row_customer['customer_name']; ?>">
                            </div>
                    </div>
                    <div class="form-group row">   
                        <label class="col-form-label col-md-3 col-sm-3 ">Tech </label>
                            <div class="col-md-4 col-sm-9">
                                <input name="techid" type='hidden' value="<?php echo $_SESSION['techid']; ?>">
                                <input type="text" name="techid_name" readonly="readonly" class="form-control" value="<?php 
                                    $techid = $row_report['techid'];

                                    $result_tech = "SELECT name FROM user WHERE user_id = '$techid'";
                                    $resultado_tech = mysqli_query($conn, $result_tech);
                                    $row_tech = mysqli_fetch_assoc($resultado_tech);
                                echo $row_tech['name']; ?>">
                            </div>
                            <label class="col-form-label col-md-2 col-sm-3 ">Measurement Date </label>
                            <div class="col-md-3 col-sm-9 ">
                                    <input id="data" name="dtmeasurement" readonly="readonly" value="<?php echo $row_report['dtmeasurement']; ?>" class="date-picker form-control" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="autocompletar()">
                            </div>
                    </div>
                    <div class="ln_solid"></div>
                   <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Control# </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" name="control" value="<?php echo $row_report['control']; ?>" class="form-control">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Manufacturer </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" name="manufacturer" value="<?php echo $row_report['manufacturer']; ?>" class="form-control">
                            </div>
                    </div>
                   <div class="form-group row">
                            
                            <label class="col-form-label col-md-3 col-sm-3 ">Model </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" name="model" value="<?php echo $row_report['model']; ?>" class="form-control">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Capacity </label>
                            <div class="col-md-2 col-sm-9">
                                <input type="text" name="capacity" value="<?php echo $row_report['capacity']; ?>" class="form-control">
                            </div>
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
                                    case 4:
                                          $show_nmeasure = "kg";
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
                            <div class="col-md-2 col-sm-9 ">
                                    <select class="form-control" id="mincapacity" name="nmincapacity">
                                            <option value="<?php echo $row_report['nmincapacity']; ?>"><?php echo $show_capacity; ?></option>
                                            <option value="7">1</option>
                                            <option value="8">2</option>
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
                                            <!--<option value="12">&nbsp;&nbsp;¼</option>-->
                                    </select>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">S/N </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" name="sn" value="<?php echo $row_report['sn']; ?>" class="form-control">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Location </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" name="location" value="<?php echo $row_report['location']; ?>" class="form-control">
                            </div>
                    </div>                      
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Type </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" name="type" value="<?php echo $row_report['type']; ?>" class="form-control">
                            </div>
                            <label class="col-md-1 col-sm-3  control-label"></label>

                            <div class="col-md-3 col-sm-9 ">
                                    <div class="checkbox">
                                            <label><input type="checkbox" id="itemCheck" name="itemCheck"  class="flat" onchange="verificafleg()" disabled> Unable to calibrate</label>
                                    </div>
                                    
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Test load </label>
                            <div class="col-md-2 col-sm-9">
                                <input type="text" id="cpw" name="preweight" value="<?php echo $row_report['preweight']; ?>" class="form-control">
                            </div>
                            <div class="col-md-2 col-sm-9 ">
                                    <select class="form-control" id="measure" name="nmeasure">
                                            <option value="<?php echo $row_report['nmeasure']; ?>"><?php echo $show_nmeasure; ?></option>
                                            <option value="1">LB</option>
                                            <option value="2">g</option>
                                            <option value="3">oz</option>
                                            <option value="4">kg</option>
                                    </select>
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                            <div class="col-md-2 col-sm-9">
                                <input type="text" id="cpe" name="preerror" value="<?php echo $row_report['preerror']; ?>" class="form-control" onblur="autocompletar()">
                            </div>
                            <div class="col-md-2 col-sm-9 ">
                                    <select class="form-control" id="dif" name="ndif" onchange="autocompletar()">
                                            <option value="<?php echo $row_report['ndif']; ?>"><?php echo $show_ndif; ?></option>
                                            <option value="1">+</option>
                                            <option value="2">-</option>
                                    </select>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Comments </label>
                            <div class="col-md-9 col-sm-9 ">
                                    <textarea class="form-control" id="comment" name="comment" rows="3" ><?php echo $row_report['comment']; ?></textarea>
                            </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cpw1" name="preweight1" value="<?php echo $row_report['preweight1']; ?>" class="form-control">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cpe1" name="preerror1" value="<?php echo $row_report['preerror1']; ?>" class="form-control">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cpw2" name="preweight2" value="<?php echo $row_report['preweight2']; ?>" class="form-control">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cpe2" name="preerror2" value="<?php echo $row_report['preerror2']; ?>" class="form-control">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cpw3" name="preweight3" value="<?php echo $row_report['preweight3']; ?>" class="form-control">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cpe3" name="preerror3" value="<?php echo $row_report['preerror3']; ?>" class="form-control">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cpw4" name="preweight4" value="<?php echo $row_report['preweight4']; ?>" class="form-control">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cpe4" name="preerror4" value="<?php echo $row_report['preerror4']; ?>" class="form-control">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cpw5" name="preweight5" value="<?php echo $row_report['preweight5']; ?>" class="form-control">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cpe5" name="preerror5" value="<?php echo $row_report['preerror5']; ?>" class="form-control">
                            </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="caw1" name="afterweight1" value="<?php echo $row_report['afterweight1']; ?>" class="form-control">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cae1" name="aftererror1" value="<?php echo $row_report['aftererror1']; ?>" class="form-control">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="caw2" name="afterweight2" value="<?php echo $row_report['afterweight2']; ?>" class="form-control">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cae2" name="aftererror2" value="<?php echo $row_report['aftererror2']; ?>" class="form-control">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="caw3" name="afterweight3" value="<?php echo $row_report['afterweight3']; ?>" class="form-control">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cae3" name="aftererror3" value="<?php echo $row_report['aftererror3']; ?>" class="form-control">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="caw4" name="afterweight4" value="<?php echo $row_report['afterweight4']; ?>" class="form-control">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cae4" name="aftererror4" value="<?php echo $row_report['aftererror4']; ?>" class="form-control">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Weight </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="caw5" name="afterweight5" value="<?php echo $row_report['afterweight5']; ?>" class="form-control">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Error </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cae5" name="aftererror5" value="<?php echo $row_report['aftererror5']; ?>" class="form-control">
                            </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Date Calibration </label>
                            <div class="col-md-4 col-sm-9 ">
                                    <input id="data1" readonly="readonly" name="dtcalibration" value="<?php echo $row_report['dtcalibration']; ?>" class="date-picker form-control" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Date due </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" name="dtdue" readonly="readonly" value="<?php echo $row_report['dtdue']; ?>" class="form-control">
                            </div>
                    </div>
                    
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">NIST ID# </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cnistid" name="nistid" readonly="readonly" value="<?php echo $row_report['nistid']; ?>" class="form-control">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Std Cert# </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cstdcert" name="stdcert" readonly="readonly" value="<?php echo $row_report['stdcert']; ?>" class="form-control">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Std Cert. Date </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cstdcertdate" name="stdcertdate" readonly="readonly" value="<?php echo $row_report['stdcertdate']; ?>" class="form-control">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Std Cert Due </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cstdcertdue" name="stdcertdue" readonly="readonly" value="<?php echo $row_report['stdcertdue']; ?>" class="form-control">
                            </div>
                    </div>
                    
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">NIST ID# </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cnistid2" name="nistid2" readonly="readonly" value="<?php echo $row_report['nistid2']; ?>" class="form-control">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Std Cert# </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cstdcert2" name="stdcert2" readonly="readonly" value="<?php echo $row_report['stdcert2']; ?>" class="form-control">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Std Cert. Date </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cstdcertdate2" name="stdcertdate2" readonly="readonly" value="<?php echo $row_report['stdcertdate2']; ?>" class="form-control">
                            </div>
                            <label class="col-form-label col-md-1 col-sm-3 ">Std Cert Due </label>
                            <div class="col-md-4 col-sm-9">
                                <input type="text" id="cstdcertdue2" name="stdcertdue2" readonly="readonly" value="<?php echo $row_report['stdcertdue2']; ?>" class="form-control">
                            </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                            <div class="col-md-9 col-sm-9  offset-md-3">
                                    <button type="submit" class="btn btn-success" name="btnSelectCompany">Save</button>
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
