$(document).ready(function(){
        cargarPeriodo();
        validarCampos();
      });
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
      function buscarEvaluados(){
          if ($("#txtevaluacion").val()==0) {
            alert("Debe elegir una evaluacion");
            return;
          };
          $("#bodyevaluados").empty();
          $("#bodynoevaluados").empty();
          var parametro={
            "id_evaluacion":$("#txtevaluacion").val(),
          };
          $.ajax({
            url: "../../controlador/listarEvaluados.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                for(data in DataJson.retorno){
                  $("#bodyevaluados").append("<tr><td>"+DataJson.retorno[data].nombre+"</td><td>"+DataJson.retorno[data].apellido+"</td></tr>");
                }
              }else{
                            
              }                                                         
            }
          }); 
          $.ajax({
            url: "../../controlador/listarNoEvaluados.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                for(data in DataJson.retorno){
                  $("#bodynoevaluados").append("<tr><td>"+DataJson.retorno[data].nombre+"</td><td>"+DataJson.retorno[data].apellido+"</td></tr>");
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