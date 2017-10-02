<?php
  session_name("usuario");
  session_start();

  if(! isset($_SESSION["correo"])){
    header("location:../index.php");
  }
  if ($_SESSION["idtipousuario"]!=1) {
    header("location:../index.php");
  }
  $idtrabajador=$_SESSION["idusuario"];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Administrador</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../../public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="../../public/font-awesome-4.3.0/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../public/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="../../public/dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-yellow">
    <!-- Site wrapper -->
    <div class="wrapper">
      
      <header class="main-header">
        <a href="#" class="logo">Administrador</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../../public/dist/img/avatar5.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $_SESSION["nombreCompleto"] ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../../public/dist/img/avatar5.png" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $_SESSION["nombre"] ?> - Administrador
                      <small>Homecenter 2015</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      
                    </div>
                    <div class="pull-right">
                      <a href="../../controlador/cerrarSesion.php" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../../public/dist/img/avatar5.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION["nombre"] ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENÚ</li>
            <li class=""><a href="administrador.php"><i class="fa fa-home"></i> Inicio</a></li>     
            <li class="active"><a href="incidencias.php"><i class="fa fa-pencil"></i> Registrar Incidencias</a></li>  
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Registrar
            <small>Incidencias</small>
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Registrar</h3>
                </div>
                <div class="box-body">
                <input type="hidden" name="idusuariopermanente" id="idusuariopermanente" value="<?php echo $idtrabajador; ?>">
                <form id="frmincidencia">
                  <div class="row">
                    <div class="col-lg-4">
                      <label>Colaborador:</label>
                    </div>
                    <div class="col-lg-8">
                      <input type="hidden" name="idincidencia" id="idincidencia" value="0">
                      <input type="text" class="form-control" name="txtcolaborador" id="txtcolaborador" placeholder="%%"><br>
                      <input type="hidden" name="idcolaborador" id="idcolaborador">
                    </div>
                    <div class="col-lg-4">
                      <label>Tipo de Incidencia:</label>
                    </div>
                    <div class="col-lg-8">
                      <select class="form-control" name="txttipo" id="txttipo">
                        <option>Elegir Tipo</option>
                      </select><br>
                    </div>
                    <div class="col-lg-4">
                      <label>Categoria Incidencia:</label>
                    </div>
                    <div class="col-lg-8">
                      <select class="form-control" name="txtcategoria" id="txtcategoria">
                        <option>Elegir Categoria</option>
                      </select><br>
                    </div>
                    <div class="col-lg-4">
                      <label>Descripción:</label>
                    </div>
                    <div class="col-lg-8">
                      <textarea class="form-control" name="txtdescripcion" id="txtdescripcion"></textarea><br>
                      <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $idtrabajador; ?>">
                    </div>
                    <div class="col-lg-4">
                      <label>Fecha:</label>
                    </div>
                    <div class="col-lg-8">
                      <input type="text" name="txtfecha" id="txtfecha" class="form-control"><br>
                    </div>
                    <div class="col-lg-4">
                      <label>Hora:</label>
                    </div>
                    <div class="col-lg-2">
                      <select class="form-control" name="txthora" id="txthora">
                        <?php
                          for ($i=0; $i <=23 ; $i++) {
                            if ($i<=9) {
                                $j="0".$i;
                            }else{
                                $j=$i;
                            } 
                            echo "<option value=$j>$j</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-lg-2">
                      <select class="form-control" name="txtminutos" id="txtminutos">
                        <?php
                          for ($i=0; $i <=59 ; $i++) {
                            if ($i<=9) {
                                $j="0".$i;
                            }else{
                                $j=$i;
                            } 
                            echo "<option value=$j>$j</option>";
                          }
                        ?>
                      </select><br>
                    </div>
                    <button class="btn btn-success center-block">Registrar</button><br>
                    <div id="correcto"></div>
                  </div>
                </form>
                
                </div>
              </div>
            </div>
            <div class="col-lg-2"></div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Incidencias</h3>
                </div>
                <div class="box-body">
                  <div id="tablalistado">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          
        </div>
        <strong>Homecenter 2015</a>.</strong> Todos los derechos reservados.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="../../public/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../public/dist/js/jquery-ui.js"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="../../public/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../../public/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="../../public/plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../../public/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../../public/dist/js/app.min.js" type="text/javascript"></script>
    <script src="../../public/plugins/jQuery/validator.js"></script>
    <script src="incidencias.js" type="text/javascript"></script>
  </body>
</html>