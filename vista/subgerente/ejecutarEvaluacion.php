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
                <li><a href="evaluacion.php"><i class="fa fa-circle-o"></i> Gestión de Evaluaciones</a></li>
                <li><a href="elaborarEvaluacion.php"><i class="fa fa-circle-o"></i> Elaborar Evaluación</a></li>
                <li class="active"><a href="ejecutarEvaluacion.php"><i class="fa fa-circle-o"></i> Ejecutar Evaluación</a></li>
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
            Ejecutar
            <small>Evaluación</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="modal modal-primary" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Ver Evidencia</h4>
                  </div>
                  <div class="modal-body">
                    <div id="evidencialistado">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Incidencia</th>
                            <th>Fecha</th>
                          </tr>
                        </thead>
                        <tbody id="bodyincidencias">
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
                  </div>
                </div>
              </div>
            </div>

          <div class="row">
            <input type="hidden" name="txttrabajador" id="txttrabajador" value="<?php echo $idtrabajador; ?>">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Evaluar</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-lg-4">
                      <label>Evaluación:</label>
                    </div>
                    <div class="col-lg-8">
                      <select class="form-control" name="txtevaluacion" id="txtevaluacion" onchange="listarVincular(); contarPreguntas();">
                        <option value="0">Elegir Evaluación</option>
                      </select><br>
                      <input type="hidden" name="txtcontador" id="txtcontador" value="0">
                    </div>
                    
                  </div>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-lg-4">
                      <label>Colaborador:</label>
                    </div>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" name="txtcolaborador" id="txtcolaborador" required><br>
                      <input type="hidden" name="idcolaborador" id="idcolaborador" value="0">
                    </div>

                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                      <label>Puntúa a tu colaborador utilizando una escala del 1 al 5 en cada uno de los siguientes aspectos:
(1 significa muy deficiente y 5 es sobresaliente).<br></label>
                      <form id="frmejecutar">
                        <div id="listadocategoria">
                      
                        </div>

                      <button class="btn btn-success center-block">Guardar Evaluación</button><br>
                      </form>
                      <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtpuntajetotal" id="txtpuntajetotal" value="0" readonly="readonly">
                      </div>
                      <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtresultado" id="txtresultado" value="Bueno" readonly="readonly">
                      </div>
                      
                      
                    </div>
                    <div class="col-lg-1">
                      
                    </div>
                  
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-1"></div>
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
        cargarEvaluacion();
        cargarCategoria();
        $("#txtcolaborador").autocomplete({
            source: "../../controlador/buscarColaboradorNoEvaluado.php", //el archivo que realiza la busqueda
            minLength: 2, //le decimos que tenga al menos 2 caracteres para ejecutrar la busqueda
            select: f_seleccionar_registro, //funcion que se ejecuta cuando el usuario selecciona un registro
            focus: f_marcar_registro
        });
        $('#frmejecutar').submit(function(e) {
            e.preventDefault();
                var preguntas = "";
                var suma=0;
                $("#frmejecutar").find(':input').each(function(){

                  var elemento= this;
                  if (elemento.checked) {
                    if(elemento.value == ""){

                    }else{                   
                      preguntas += elemento.value+";";
                    }
                  }
                  
                });
                $("#frmejecutar").find(':input').each(function(){

                  var elemento= this;
                  if (elemento.checked) {
                    if(elemento.value == ""){

                    }else{                   
                      suma += parseInt(elemento.value);
                      $("#txtpuntajetotal").val(suma);

                    }
                  }
                  total=$("#txtpuntajetotal").val();
                  cuenta=$("#txtcontador").val();

                  if (parseInt(total)<=parseInt(cuenta)) {
                    mensaje="PÉSIMO";
                  }else if (parseInt(total)<=parseInt(cuenta)*2) {
                    mensaje='MALO';
                  }else if (parseInt(total)<=parseInt(cuenta)*3) {
                    mensaje='REGULAR';
                  }else if (parseInt(total)<=parseInt(cuenta)*4) {
                    mensaje='BUENO';
                  }else if (parseInt(total)<=parseInt(cuenta)*5) {
                    mensaje='EXCELENTE';
                  }else{
                    mensaje='OTRO';
                  };
                  $("#txtresultado").val(mensaje);
                });
                //alert(total+" "+cuenta+" "+mensaje);
                //return;
                
                var parametro={
                  "preguntas":preguntas,
                  "evaluacion":$("#txtevaluacion").val(),
                  "usuario":$("#txttrabajador").val(),
                  "idcolaborador":$("#idcolaborador").val(),
                  "txttotal":$("#txtpuntajetotal").val(),
                  "resultado":$("#txtresultado").val(),
                };

                if ($("#idcolaborador").val()==0) {
                  alert("Tiene que buscar al colaborador");
                  return;
                }
                if ($("#txtevaluacion").val()==0) {
                  alert("Tiene que elegir una evaluación");
                  return;
                };
                  $.ajax({
                        url: "../../controlador/ejecutarEvaluacion.php",
                        type: "post",
                        dataType: "json",
                        data:parametro,

                        success: function(DataJson){
                          if(DataJson.state){
                            alert("Correcto");
                            $("#txtcolaborador").val("");
                            $("#idcolaborador").val(0);
                          }else{
                            alert("Incorrecto");
                            $("#txtcolaborador").val("");
                            $("#idcolaborador").val(0);
                          }                      
                                                      
                        }
                  }); 
        });
      }); 
      function contarPreguntas(){
          evaluacion=$("#txtevaluacion").val();
          parametro={
            "id_evaluacion": evaluacion,
          }
          $.ajax({
                        url: "../../controlador/contarPreguntas.php",
                        type: "post",
                        dataType: "json",
                        data: parametro,
                        success: function(DataJson){
                          if(DataJson.state){
                            
                              //alert(DataJson.retorno.cantidad);
                              $("#txtcontador").val(DataJson.retorno.cantidad);
                             
                                //alert(DataJson.resultado[data].nombre_alumno);
                          }else{
                           
                          }                      
                                                      
                        }
          }); 
      }
      function cargarEvaluacion(){
          $.ajax({
            url: "../../controlador/cargarEvaluacion.php",
            type: "post",
            dataType: "json",
            success: function(DataJson){
              if(DataJson.state){
                for(data in DataJson.retorno){
                  $("#txtevaluacion").append("<option value='"+DataJson.retorno[data].idevaluacion+"'>"+DataJson.retorno[data].descripcion+"</option>");
                }
              }else{
                            
              }                                                         
            }
          }); 
      }
      function listarVincular(){
        $("tbody").empty();
          evaluacion=$("#txtevaluacion").val();
          var parametro={
            "id_evaluacion":evaluacion,
          };
          $.ajax({
            url: "../../controlador/listarVincular.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                for(data in DataJson.retorno){
                  $("."+DataJson.retorno[data].idcategoria+"").append("<tr><td colspan='2'>"+DataJson.retorno[data].descripcion+"</td><td><input type='radio' name='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' id='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' value='1,"+DataJson.retorno[data].idpreguntaevaluacion+"'></td><td><input type='radio' name='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' id='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' value='2,"+DataJson.retorno[data].idpreguntaevaluacion+"'></td><td><input type='radio' name='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' id='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' value='3,"+DataJson.retorno[data].idpreguntaevaluacion+"'></td><td><input type='radio' name='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' id='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' value='4,"+DataJson.retorno[data].idpreguntaevaluacion+"'></td><td><input type='radio' name='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' id='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' value='5,"+DataJson.retorno[data].idpreguntaevaluacion+"'></td></tr>");
                }
              }else{
                            
              }                                                         
            }
          }); 
      }
      function listarIncidencias(){
          colaborador=$("#idcolaborador").val();
          var parametro={
            "idcolaborador":colaborador,
          };
          $.ajax({
            url: "../../controlador/listarIncidenciaCategoria.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                for(data in DataJson.retorno){
                  $("#"+DataJson.retorno[data].idcategoria+"").html("<a class='btn btn-info' onclick='verDetalle("+DataJson.retorno[data].idcategoria+")' data-toggle='modal' data-target='#myModal'>Ver Detalle</a> <span class='label label-danger pull-right'>"+DataJson.retorno[data].cantidad+"</span>");
                }
              }else{
                            
              }                                                         
            }
          }); 
      }
      function verDetalle(id){
          $("#bodyincidencias").empty();
          colaborador=$("#idcolaborador").val();
          var parametro={
            "idcolaborador":colaborador,
            "idcategoria":id,
          };
          $.ajax({
            url: "../../controlador/listarDetalleIncidencia.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                for(data in DataJson.retorno){
                  $("#bodyincidencias").append("<tr><td>"+DataJson.retorno[data].descripcion+"</td><td>"+DataJson.retorno[data].fecharegistro+"</td></tr>");
                }
              }else{
                            
              }                                                         
            }
          }); 
      }
      function cargarCategoria(){
          $.ajax({
            url: "../../controlador/cargarCategoria.php",
            type: "post",
            dataType: "json",
            success: function(DataJson){
              if(DataJson.state){
                for(data in DataJson.retorno){
                  $("#listadocategoria").append("<div class='box box-primary'><div class='box box-header'><h4 class='box-title'>"+DataJson.retorno[data].nombrecategoria+"</h4></div><div class='box box-body'><table class='table table-bordered' class='tablapregunta'><thead><tr><th rowspan='2'>Pregunta</th><th>Incidencias</th><th colspan='5'>Opciones</th></tr><tr><td id="+DataJson.retorno[data].idcategoria+"></td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr></thead><tbody class='"+DataJson.retorno[data].idcategoria+"'></tbody></table></div></div>");
                }
              }else{
                            
              }                                                         
            }
          }); 
      }
      function f_seleccionar_registro(event, ui){
        var registro = ui.item.value;
        $("#idcolaborador").val( registro.codigo);
        $("#txtcolaborador").val( registro.nombre);
        event.preventDefault();
        listarIncidencias();
      }
          
      function f_marcar_registro(event, ui){
        var registro = ui.item.value;
        $("#txtcolaborador").val( registro.nombre);
        event.preventDefault();
      }
    </script>
  </body>
</html>