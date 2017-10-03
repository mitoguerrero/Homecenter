 $(document).ready(function(){
  validarCampos();
        cargarPeriodo();
        cargarPeriodoDos();
        $("#porevaluacion").hide();
        $("#porcolaborador").hide();
        $("#porresultado").hide();
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
      function cargarPeriodoDos(){
          $.ajax({
            url: "../../controlador/cargarPeriodoTodos.php",
            type: "post",
            dataType: "json",
            success: function(DataJson){
              if(DataJson.state){
                for(data in DataJson.retorno){
                  $("#txtperiodo2").append("<option value='"+DataJson.retorno[data].idperiodo+"'>"+DataJson.retorno[data].nombreperiodo+"</option>");
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
      function cargarEvaluaciondos(){
          $("#txtevaluacion2").empty();
          var parametro={
            "id_periodo":$("#txtperiodo2").val(),
          };
          $.ajax({
            url: "../../controlador/cargarEvaluacionPeriodo.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                $("#txtevaluacion2").append("<option value='0'>Elegir Evaluación</option>")
                for(data in DataJson.retorno){
                  $("#txtevaluacion2").append("<option value='"+DataJson.retorno[data].idevaluacion+"'>"+DataJson.retorno[data].descripcion+"</option>");
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
          $("#porresultado").hide();
        }else if (id==2) {
          $("#porevaluacion").hide();
          $("#porcolaborador").show();
          $("#porresultado").hide();
        }else if (id==3) {
          $("#porevaluacion").hide();
          $("#porcolaborador").hide();
          $("#porresultado").show();
        }else{
          $("#porevaluacion").hide();
          $("#porcolaborador").hide();
          $("#porresultado").hide();
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
      function buscarPorResultado(){
          $("#bodyresultado").empty();
          var parametro={
            "id_resultado":$("#txtresultado").val(),
            "id_evaluacion":$("#txtevaluacion2").val(),
          };
          $.ajax({
            url: "../../controlador/listarReporteResultados.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                $("#bodyresultado").append("<table class='table table-bordered'><thead><tr><th>Colaborador</th><th>Puntaje Total</th><th>Resultado</th></tr></thead><tbody id=bodyreporteevaluacion></tbody></table>");
                for(data in DataJson.retorno){
                  $("#bodyreporteevaluacion").append("<tr><td>"+DataJson.retorno[data].nombre+" "+DataJson.retorno[data].apellido+"</td><td>"+DataJson.retorno[data].puntajetotal+"</td><td>"+DataJson.retorno[data].resultado+"</td></tr>");
                }
              }else{
                            
              }                                                         
            }
          }); 
      }
      function validarCampos(){
        $("#txtcolaborador").validCampoFranz("abcdefghijklmnñopqrstuvwxyz %%");
         $("#txtdescripcion").validCampoFranz("1234567890abcdefghijklmnñopqrstuvwxyz _-#");        
      }