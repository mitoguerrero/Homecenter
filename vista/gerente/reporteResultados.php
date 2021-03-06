<?php
  session_name("usuario");
  session_start();

  if(! isset($_SESSION["correo"])){
    header("location:../index.php");
  }
  if ($_SESSION["idtipousuario"]!=3) {
    header("location:../../index.php");
  }
  $idtrabajador=$_SESSION["idusuario"];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Gerente</title>
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
        <a href="#" class="logo">Sub Gerente</a>
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
                      <?php echo $_SESSION["nombre"] ?> - Sub Gerente
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
            <li class=""><a href="subgerente.php"><i class="fa fa-home"></i> Inicio</a></li>     
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-line-chart"></i>
                <span>Reportes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="reporteColaborador.php"><i class="fa fa-circle-o"></i> Colaboradores Evaluados</a></li>
                <li><a href="reporteResultados.php"><i class="fa fa-circle-o"></i> Resultados e Interpretación</a></li>
              </ul>
            </li>    
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
            Reportes
            <small>Resultados e Interpretación</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="row">
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Buscar</h3>
                  </div>
                  <div class="box-body">
                    <div class="row">
                      <div class="col-lg-4">
                        <label>Buscar Por:</label>
                      </div>
                      <div class="col-lg-8">
                        <select class="form-control" name="txtbuscar" id="txtbuscar" onchange="elegir(this.value);">
                          <option value="0">Elegir</option>
                          <option value="1">Por Evaluación</option>
                          <option value="2">Por Colaborador</option>
                        </select><br>
                      </div>
                      <div id="porevaluacion">
                        <div class="col-lg-4">
                          <label>Periodo:</label>
                        </div>
                        <div class="col-lg-8">
                          <select class="form-control" name="txtperiodo" id="txtperiodo" onchange="cargarEvaluacion();">
                            <option value="0">Elegir Periodo</option>
                          </select><br>
                        </div>
                        <div class="col-lg-4">
                          <label>Evaluación:</label>
                        </div>
                        <div class="col-lg-8">
                          <select class="form-control" name="txtevaluacion" id="txtevaluacion">
                            <option value="0">Elegir Evaluación</option>
                          </select><br>
                        </div>
                        <button class="btn btn-success center-block" onclick="buscarPorEvaluacion();">Buscar</button>
                      </div>
                      <div id="porcolaborador">
                        <div class="col-lg-4">
                          <label>Colaborador:</label>
                        </div>
                        <div class="col-lg-8">
                         <input type="text" class="form-control" name="txtcolaborador" id="txtcolaborador"><br>
                         <input type="hidden" id="idcolaborador" id="idcolaborador">
                        </div>
                        <button class="btn btn-success center-block" onclick="buscarPorColaborador();">Buscar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="box box-success">
                  <div class="box-header">
                    <h3 class="box-title">Resultado</h3>
                  </div>
                  <div class="box-body" id="bodyresultado">
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2"></div>
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
    <!-- SlimScroll -->
    <script src="../../public/plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../../public/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../../public/dist/js/app.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        cargarPeriodo();
        $("#porevaluacion").hide();
        $("#porcolaborador").hide();
        $("#txtcolaborador").autocomplete({
            source: "../../controlador/buscarColaborador.php", //el archivo que realiza la busqueda
            minLength: 2, //le decimos que tenga al menos 2 caracteres para ejecutrar la busqueda
            select: f_seleccionar_registro, //funcion que se ejecuta cuando el usuario selecciona un registro
            focus: f_marcar_registro
        });
        
      });
      function f_seleccionar_registro(event, ui){
        var registro = ui.item.value;
        $("#idcolaborador").val( registro.codigo);
        $("#txtcolaborador").val( registro.nombre);
        event.preventDefault();
      }
          
      function f_marcar_registro(event, ui){
        var registro = ui.item.value;
        $("#txtcolaborador").val( registro.nombre);
        event.preventDefault();
      }
      function cargarPeriodo(){
          $.ajax({
            url: "../../controlador/cargarPeriodoTodos.php",
            type: "post",
            dataType: "json",
            success: function(DataJson){
              if(DataJson.state){
                for(data in DataJson.retorno){
                  $("#txtperiodo").append("<option value='"+DataJson.retorno[data].idperiodo+"'>"+DataJson.retorno[data].nombreperiodo+"</option>");
                }
              }else{
                            
              }                                                         
            }
          }); 
      }
      function cargarEvaluacion(){
          $("#txtevaluacion").empty();
          var parametro={
            "id_periodo":$("#txtperiodo").val(),
          };
          $.ajax({
            url: "../../controlador/cargarEvaluacionPeriodo.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                $("#txtevaluacion").append("<option value='0'>Elegir Evaluación</option>")
                for(data in DataJson.retorno){
                  $("#txtevaluacion").append("<option value='"+DataJson.retorno[data].idevaluacion+"'>"+DataJson.retorno[data].descripcion+"</option>");
                }
              }else{
                            
              }                                                         
            }
          }); 
      }
      function elegir(id){
        $("#bodyresultado").empty();
        if (id==1) {
          $("#porevaluacion").show();
          $("#porcolaborador").hide();
        }else if (id==2) {
          $("#porevaluacion").hide();
          $("#porcolaborador").show();
        }else{
          $("#porevaluacion").hide();
          $("#porcolaborador").hide();
        }
      }
      function buscarPorEvaluacion(){
          $("#bodyresultado").empty();
          var parametro={
            "id_evaluacion":$("#txtevaluacion").val(),
          };
          $.ajax({
            url: "../../controlador/listarReporteEvaluacion.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                $("#bodyresultado").append("<table class='table table-bordered'><thead><tr><th>Colaborador</th><th>Puntaje Total</th><th>Resultado</th></tr></thead><tbody id=bodyreporteevaluacion></tbody></table>");
                for(data in DataJson.retorno){
                  $("#bodyreporteevaluacion").append("<tr><td>"+DataJson.retorno[data].apellido+" "+DataJson.retorno[data].nombre+"</td><td>"+DataJson.retorno[data].puntajetotal+"</td><td>"+DataJson.retorno[data].resultado+"</td></tr>");
                }
              }else{
                            
              }                                                         
            }
          }); 
      }
      function buscarPorColaborador(){
          $("#bodyresultado").empty();
          var parametro={
            "id_usuario":$("#idcolaborador").val(),
          };
          $.ajax({
            url: "../../controlador/listarReporteUsuario.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                $("#bodyresultado").append("<table class='table table-bordered'><thead><tr><th>Periodo</th><th>Evaluacion</th><th>Puntaje Total</th><th>Resultado</th></tr></thead><tbody id=bodyreporteevaluacion></tbody></table>");
                for(data in DataJson.retorno){
                  $("#bodyreporteevaluacion").append("<tr><td>"+DataJson.retorno[data].nombreperiodo+"</td><td>"+DataJson.retorno[data].descripcion+"</td><td>"+DataJson.retorno[data].puntajetotal+"</td><td>"+DataJson.retorno[data].resultado+"</td></tr>");
                }
              }else{
                            
              }                                                         
            }
          }); 
      }
    </script>
  </body>
</html>