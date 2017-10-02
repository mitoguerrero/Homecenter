<?php
  session_name("usuario");
  session_start();

  if(! isset($_SESSION["correo"])){
    header("location:../index.php");
  }
  if ($_SESSION["idtipousuario"]!=2) {
    header("location:../../index.php");
  }
  $idtrabajador=$_SESSION["idusuario"];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Sub Gerente</title>
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
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pencil-square-o"></i>
                <span>Gestiones</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="colaborador.php"><i class="fa fa-circle-o"></i> Gestión de Colaboradores</a></li>
                <li><a href="periodo.php"><i class="fa fa-circle-o"></i> Gestión de Periodos</a></li>
                <li><a href="categoria.php"><i class="fa fa-circle-o"></i> Gestión de Categoria de Incidencia</a></li>
                <li><a href="pregunta.php"><i class="fa fa-circle-o"></i> Gestión de Pregunta</a></li>
              </ul>
            </li> 
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-check"></i>
                <span>Evaluación</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="evaluacion.php"><i class="fa fa-circle-o"></i> Gestión de Evaluaciones</a></li>
                <li><a href="elaborarEvaluacion.php"><i class="fa fa-circle-o"></i> Elaborar Evaluación</a></li>
                <li><a href="ejecutarEvaluacion.php"><i class="fa fa-circle-o"></i> Ejecutar Evaluación</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-line-chart"></i>
                <span>Reportes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="reporteColaborador.php"><i class="fa fa-circle-o"></i> Colaboradores Evaluados</a></li>
                <li><a href="reporteResultados.php"><i class="fa fa-circle-o"></i> Resultados e Interpretación</a></li>
                <li><a href="reporteGraficos.php"><i class="fa fa-circle-o"></i> Gráficos</a></li>
                <li class=""><a href="reporteIncidencias.php"><i class="fa fa-circle-o"></i> Incidencias</a></li>
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
            Gestiones
            <small>Evaluación</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Registro</h3>
                </div>
                <div class="box-body">
                <input type="hidden" name="idusuariopermanente" id="idusuariopermanente" value="<?php echo $idtrabajador; ?>">
                <form id="frmevaluacion">
                  <div class="row">
                    <input type="hidden" name="idevaluacion" id="idevaluacion" value="0">
                    <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $idtrabajador; ?>">
                    <div class="col-lg-4">
                      <label>Periodo:</label>
                    </div>
                    <div class="col-lg-8">
                      <select class="form-control" name="txtperiodo" id="txtperiodo">
                        <option value="0">Elegir Periodo</option>
                      </select><br>
                    </div>
                    <div class="col-lg-4">
                      <label>Nombre Evaluación:</label>
                    </div>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" name="txtnombre" id="txtnombre" required><br>
                    </div>
                    <button class="btn btn-success center-block">Registrar</button><br>
                    <div id="correcto"></div>
                  </div>
                  </form>
                  <div class="box-footer">
                      <div class="row">
                        <div class="col-lg-2">
                          
                        </div>
                        <div class="col-lg-8">
                          <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Buscar Evaluación">
                        </div>
                        <div class="col-lg-2">
                          
                        </div>
                      </div>
                   </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2"></div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Evaluaciones</h3>
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
    <script type="text/javascript">
      $(document).ready(function(){
        cargarPeriodo();
        listar();
        $("#buscar").autocomplete({
            source: "../../controlador/buscarEvaluacion.php", //el archivo que realiza la busqueda
            minLength: 2, //le decimos que tenga al menos 2 caracteres para ejecutrar la busqueda
            select: f_seleccionar_registro, //funcion que se ejecuta cuando el usuario selecciona un registro
            focus: f_marcar_registro
        });
        $("#frmevaluacion").submit(function(e){
                e.preventDefault();

                var id=$("#idevaluacion").val();
                if (id!=0) {
                    ruta='../../controlador/editarEvaluacion.php';
                }else{
                    ruta='../../controlador/registrarEvaluacion.php';
                }
                var data =$("#frmevaluacion").serializeArray();

                $.ajax({
                    url: ruta,
                    type: 'post',
                    dataType: 'json',
                    data: data,
        
                })
                .done(function(){
                    // Success message
                    $('#correcto').html("<div class='alert alert-success' id='alertacierrate'>");
                    $('#correcto > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#correcto > .alert-success').append("<strong>Registro Exitoso");
                    $('#correcto > .alert-success').append('</div>');
                    limpiarformulario();
                    setTimeout("borraralerta();", 5000);
                    listar();
                    usuario=$("#idusuariopermanente").val();
                    $("#idusuario").val(usuario);
                })
                .fail(function(){
                    // Fail message
                    $('#correcto').html("<div class='alert alert-danger' id='alertacierrate'>");
                    $('#correcto > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#correcto > .alert-danger').append("<strong>Registro incorrecto, intente nuevamente!");
                    $('#correcto > .alert-danger').append('</div>');
                    limpiarformulario();
                    setTimeout("borraralerta();", 5000);
                    listar();
                    usuario=$("#idusuariopermanente").val();
                    $("#idusuario").val(usuario);

                })
            });
      });
      function borraralerta(){
          $("#alertacierrate").alert('close');
      }
      function limpiarformulario(){
          $(document).ready(function() {

              $("#frmevaluacion").find(':input').each(function() {
                  var elemento= this;
                  $('input[type=text]').each(function()
                  {
                      elemento.value = "";
                  });

                  $('textarea').each(function()
                  {
                      elemento.value = "";
                  });

                  $('select option:first').attr('selected','selected');
                  
              });


          });
         
      }
      function cargarPeriodo(){
          $.ajax({
            url: "../../controlador/cargarPeriodo.php",
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
      function listar(){
          $("#tablalistado").load("../../controlador/listarEvaluacion.php", function(){
            $("#table_id").dataTable();
          });  
      }
      function f_seleccionar_registro(event, ui){
        var registro = ui.item.value;
        $("#idevaluacion").val( registro.codigo);
        $("#txtnombre").val( registro.nombre);
        $("#txtperiodo").val( registro.periodo);
        event.preventDefault();
      }
          
      function f_marcar_registro(event, ui){
        var registro = ui.item.value;
        $("#buscar").val( registro.nombre);
        event.preventDefault();
      }
      function cambiarEstado(evaluacion,estado){
        var parametro={
          "id_evaluacion":evaluacion,
          "id":estado,
        };
        $.ajax({
            url: "../../controlador/editarEstadoEvaluacion.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){              
                alert("Correcto");
                listar();
              }else{
                alert("incorrecto");
                listar();   
              }                                                              
            }
        }); 
      }
    </script>
  </body>
</html>